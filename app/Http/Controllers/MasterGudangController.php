<?php

namespace App\Http\Controllers;

use App\Models\MasterGudang;
use Illuminate\Http\Request;

class MasterGudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gudangs = MasterGudang::all();
        return view('master_gudang.index', compact('gudangs'));
    }

    public function create()
    {
        return view('master_gudang.create');
    }

    public function store(Request $request)
    {

        MasterGudang::create($request->all());
        return redirect()->route('master-gudang.index')->with('success', 'Gudang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $gudang = MasterGudang::findOrFail($id);
        return view('master_gudang.edit', compact('gudang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
        ]);

        $gudang = MasterGudang::findOrFail($id);
        $gudang->update($request->all());

        return redirect()->route('master-gudang.index')->with('success', 'Gudang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        MasterGudang::findOrFail($id)->delete();
        return response()->json(['success' => 'Gudang berhasil dihapus.']);
    }

}
