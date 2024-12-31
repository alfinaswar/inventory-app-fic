<?php

namespace App\Http\Controllers;

use App\Models\MasterSupplier;
use Illuminate\Http\Request;

class MasterSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = MasterSupplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {

        MasterSupplier::create($request->all());

        return redirect()->route('master-supplier.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $supplier = MasterSupplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {

        $supplier = MasterSupplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('master-supplier.index')->with('success', 'Data Supplier Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $supplier = MasterSupplier::findOrFail($id);
        $supplier->delete();

        return response()->json(['success' => 'Data supplier berhasil dihapus']);
    }
}
