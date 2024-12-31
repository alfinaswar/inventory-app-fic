<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\MasterBarang;
use App\Models\MasterSupplier;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supliers = MasterSupplier::all();
        return view('laporan.index', compact('supliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function stok(Request $request)
    {
        $tanggal_awal = $request->input('start_date');
        $tanggal_akhir = $request->input('end_date');

        $query = MasterBarang::query();

        if ($tanggal_awal) {
            $query->whereDate('created_at', '>=', $tanggal_awal);
        }

        if ($tanggal_akhir) {
            $query->whereDate('created_at', '<=', $tanggal_akhir);
        }

        $stok = $query->get();
        $pdf = PDF::loadView('laporan.laporan-stok', compact('stok'));
        return $pdf->download('laporan-stok.pdf');
    }
    public function BarangKeluar(Request $request)
    {
        $tanggal_awal = $request->input('start_date');
        $tanggal_akhir = $request->input('end_date');

        $query = BarangKeluar::query();

        if ($tanggal_awal) {
            $query->whereDate('created_at', '>=', $tanggal_awal);
        }

        if ($tanggal_akhir) {
            $query->whereDate('created_at', '<=', $tanggal_akhir);
        }

        $data = $query->with('barang')->get();
        $pdf = PDF::loadView('laporan.laporan-barang-keluar', compact('data'));
        return $pdf->download('laporan-barang-keluar.pdf');
    }
    public function BarangMasuk(Request $request)
    {
        $tanggal_awal = $request->input('start_date');
        $tanggal_akhir = $request->input('end_date');
        $supplier = $request->input('supplier');

        $query = BarangMasuk::query();

        if ($tanggal_awal) {
            $query->whereDate('created_at', '>=', $tanggal_awal);
        }

        if ($tanggal_akhir) {
            $query->whereDate('created_at', '<=', $tanggal_akhir);
        }
        if ($supplier) {
            $query->where('supplier_id', $supplier);
        }

        $data = $query->with('supplier', 'gudang', 'barang')->get();
        $pdf = PDF::loadView('laporan.laporan-barang-masuk', compact('data'));
        return $pdf->download('laporan-barang-masuk.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
