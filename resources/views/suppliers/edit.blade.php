@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Supplier</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('master-supplier.update', $supplier->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Supplier</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ $supplier->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kontak_person" class="form-label">Kontak Person</label>
                            <input type="text" name="kontak_person" id="kontak_person" class="form-control"
                                value="{{ $supplier->kontak_person }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ $supplier->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control"
                                value="{{ $supplier->telepon }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required>{{ $supplier->alamat }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
