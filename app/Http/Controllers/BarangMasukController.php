<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\MasterBarang;
use App\Models\MasterGudang;
use App\Models\MasterSupplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BarangMasuk::with('supplier', 'gudang', 'barang')->get();
        return view('barang-masuk.index', compact('data'));
    }

    public function create()
    {
        $suppliers = MasterSupplier::all();
        $barang = MasterBarang::all();
        $gudang = MasterGudang::all();
        return view('barang-masuk.create', compact('suppliers', 'barang', 'gudang'));
    }

    public function store(Request $request)
    {
        $kode_barang_masuk = $this->generateKodeBarangMasuk();

        $barangMasuk = BarangMasuk::create([
            'kode' => $kode_barang_masuk,
            'supplier_id' => $request->supplier_id,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'tanggal_terima' => $request->tanggal_terima,
            'satuan' => $request->satuan,
            'harga_satuan' => $this->formatToDatabaseValue($request->harga_satuan),
            'total_harga' => $this->formatToDatabaseValue($request->total_harga),
            'lokasi_gudang' => $request->lokasi_gudang,
            'diterima_oleh' => $request->diterima_oleh,
            'keterangan' => $request->keterangan,
        ]);

        $barang = MasterBarang::find($request->kode_barang);
        if ($barang) {
            $barang->stok += $request->jumlah;
            $barang->save();
        }

        return redirect()->route('barang-masuk.index')->with('success', 'Data Barang Masuk berhasil disimpan.');
    }

    private function generateKodeBarangMasuk()
    {
        $lastKode = BarangMasuk::latest('created_at')->first();
        if (!$lastKode) {
            return 'INV-IN00000001';
        }
        $lastKodeNumber = (int) substr($lastKode->kode_barang_masuk, 6);
        $newKodeNumber = str_pad($lastKodeNumber + 1, 8, '0', STR_PAD_LEFT);
        return 'INV-IN' . $newKodeNumber;
    }


    private function formatToDatabaseValue($value)
    {
        $formattedValue = str_replace(['Rp. ', '.'], '', $value);
        return (float) $formattedValue;
    }

    public function edit($id)
    {
        $suppliers = MasterSupplier::get();
        $barang = MasterBarang::get();
        $barangMasuk = BarangMasuk::find($id);
        $gudang = MasterGudang::all();
        return view('barang-masuk.edit', compact('barangMasuk', 'suppliers', 'barang', 'gudang'));
    }

    public function update(Request $request, BarangMasuk $barangMasuk)
    {

        $barang = MasterBarang::find($barangMasuk->kode_barang);
        if ($barang) {
            $barang->stok -= $barangMasuk->jumlah;
        }

        $barangMasuk->update([
            'supplier_id' => $request->supplier_id,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'tanggal_terima' => $request->tanggal_terima,
            'satuan' => $request->satuan,
            'harga_satuan' => $this->formatToDatabaseValue($request->harga_satuan),
            'total_harga' => $this->formatToDatabaseValue($request->total_harga),
            'lokasi_gudang' => $request->lokasi_gudang,
            'diterima_oleh' => $request->diterima_oleh,
            'keterangan' => $request->keterangan,
        ]);

        if ($barang) {
            $barang->stok += $request->jumlah; // Tambahkan stok baru
            $barang->save();
        }

        return redirect()->route('barang-masuk.index')->with('success', 'Data Barang Masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barang = MasterBarang::find($barangMasuk->kode_barang);

        if ($barang) {
            $barang->stok -= $barangMasuk->jumlah;
            $barang->save();
        }

        $barangMasuk->delete();
        return response()->json(['success' => 'Data Barang Masuk berhasil dihapus.']);
    }
}
