<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\MasterBarang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BarangKeluar::with('barang')->get();
        return view('barang-keluar.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = MasterBarang::all();
        return view('barang-keluar.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $barang = MasterBarang::find($request->kode_barang);
        if (!$barang) {
            return redirect()->back()->with('error', 'Data Barang Tidak Ditemukan.');
        }
        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->with('warning', 'Jumlah Barang Keluar Melebihin Stok');
        }
        $kode = $this->generateKode();
        BarangKeluar::create([
            'kode' => $kode,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'tanggal_keluar' => $request->tanggal_keluar,
            'tujuan' => $request->tujuan,
            'keterangan' => $request->keterangan,
        ]);
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('barang-keluar.index')->with('success', 'Data Barang Keluar berhasil disimpan.');
    }

    private function generateKode()
    {
        $lastKode = BarangKeluar::latest('created_at')->first();
        if (!$lastKode) {
            return 'INV-OUT00000001';
        }
        $lastKodeNumber = (int) substr($lastKode->kode, 7);
        $newKodeNumber = str_pad($lastKodeNumber + 1, 8, '0', STR_PAD_LEFT);
        return 'INV-OUT' . $newKodeNumber;
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        $barang = MasterBarang::all();
        return view('barang-keluar.edit', compact('barangKeluar', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $barangKeluar->update([
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'tanggal_keluar' => $request->tanggal_keluar,
            'tujuan' => $request->tujuan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('barang-keluar.index')->with('success', 'Data Barang Keluar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barang = MasterBarang::find($barangKeluar->kode_barang);

        if ($barang) {
            $barang->stok += $barangKeluar->jumlah;
            $barang->save();
        }

        $barangKeluar->delete();
        return response()->json(['success' => 'Data Barang Keluar berhasil dihapus.']);
    }

}
