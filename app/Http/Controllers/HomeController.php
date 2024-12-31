<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\MasterBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stok = MasterBarang::select('stok', DB::raw('SUM(stok) as total'))->get();
        $barangMasuk = BarangMasuk::select('jumlah', DB::raw('SUM(jumlah) as total'))->get();
        $barangKeluar = BarangKeluar::select('jumlah', DB::raw('SUM(jumlah) as total'))->get();
        $jenisbarang = MasterBarang::all()->count();
        return view('home', compact('stok', 'jenisbarang', 'barangMasuk', 'barangKeluar'));
    }
}
