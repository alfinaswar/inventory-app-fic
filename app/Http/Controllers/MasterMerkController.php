<?php

namespace App\Http\Controllers;

use App\Models\MasterMerk;
use Illuminate\Http\Request;

class MasterMerkController extends Controller
{
    public function index()
    {
        $merks = MasterMerk::all();
        return view('master_merk.index', compact('merks'));
    }

    public function create()
    {
        return view('master_merk.create');
    }

    public function store(Request $request)
    {

        MasterMerk::create($request->all());

        return redirect()->route('master-merk.index')->with('success', 'Merk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $merk = MasterMerk::findOrFail($id);
        return view('master_merk.edit', compact('merk'));
    }

    public function update(Request $request, $id)
    {
        $merk = MasterMerk::findOrFail($id);
        $merk->update($request->all());

        return redirect()->route('master-merk.index')->with('success', 'Merk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $merk = MasterMerk::findOrFail($id);
        $merk->delete();

        return response()->json(['success' => 'Data merk berhasil dihapus']);
    }
}
