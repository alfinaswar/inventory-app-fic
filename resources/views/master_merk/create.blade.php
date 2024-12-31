@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data Merk</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('master-merk.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Merk</label>
                            <input type="text" class="form-control" placeholder="Nama Merk" id="nama" name="merk"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
