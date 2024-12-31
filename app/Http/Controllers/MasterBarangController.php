<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use App\Models\MasterMerk;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MasterBarang::latest()->get();
        $merk = MasterMerk::get();
        return view('master-barang.index', compact('data', 'merk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merk = MasterMerk::get();
        return view('master-barang.create', compact('merk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_barang = $this->generateKodeBarang();

        MasterBarang::create([
            'kode_barang' => $kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'merk' => $request->merk,
            'harga_beli' => $this->formatToDatabaseValue($request->harga_beli),
            'harga_jual' => $this->formatToDatabaseValue($request->harga_jual),
            'stok_minimal' => $request->stok_minimal,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('master-barang.index')->with('success', 'Data barang berhasil disimpan!');
    }

    private function generateKodeBarang()
    {
        $lastKode = MasterBarang::latest('created_at')->first();
        if (!$lastKode) {
            return 'INV00000001';
        }
        $lastKodeNumber = (int) substr($lastKode->kode_barang, 3);
        $newKodeNumber = str_pad($lastKodeNumber + 1, 8, '0', STR_PAD_LEFT);
        return 'INV' . $newKodeNumber;
    }

    private function formatToDatabaseValue($value)
    {
        $formattedValue = str_replace(['Rp. ', '.'], '', $value);
        return (float) $formattedValue;
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterBarang $masterBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $merk = MasterMerk::get();
        $masterBarang = MasterBarang::find($id);
        return view('master-barang.edit', compact('masterBarang', 'merk'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterBarang $masterBarang)
    {

        $masterBarang->update([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'merk' => $request->merk,
            'harga_beli' => $this->formatToDatabaseValue($request->harga_beli),
            'harga_jual' => $this->formatToDatabaseValue($request->harga_jual),
            'stok_minimal' => $request->stok_minimal,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('master-barang.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        MasterBarang::findOrFail($id)->delete();
        return response()->json(['success' => 'Gudang berhasil dihapus.']);
    }
}
