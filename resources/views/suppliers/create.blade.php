@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data Supplier</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('master-supplier.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Supplier</label>
                            <input type="text" class="form-control" placeholder="Nama Supplier" id="nama"
                                name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="kontak_person" class="form-label">Kontak Person</label>
                            <input type="text" class="form-control" placeholder="Kontak Supplier" id="kontak_person"
                                name="kontak_person" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Email Supplier" id="email"
                                name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" placeholder="Telepon Supplier" id="telepon"
                                name="telepon" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" placeholder="Alamat Supplier" name="alamat" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
