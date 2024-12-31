@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data Gudang</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('master-gudang.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Gudang</label>
                            <input type="text" class="form-control" placeholder="Nama Gudang" id="nama"
                                name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" placeholder="Alamat Gudang" id="alamat" name="alamat" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" placeholder="Telepon Gudang" id="telepon"
                                name="telepon" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
