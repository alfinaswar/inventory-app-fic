@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- Stock Report -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Stok</h4>
                </div>
                <div class="card-body">
                    <!-- Stock Report Filter -->
                    <form action="{{ route('laporan.stok') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="start-date-stock">Tanggal Awal</label>
                            <input type="date" name="start_date" id="start-date-stock" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="end-date-stock">Tanggal Akhir</label>
                            <input type="date" name="end_date" id="end-date-stock" class="form-control">
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Generate Laporan</button>
                    </form>

                </div>
            </div>
        </div>

        <!-- Incoming Goods Report -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Barang Masuk</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.BarangMasuk') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="start-date-incoming">Tanggal Awal</label>
                            <input type="date" name="start_date" id="start-date-incoming" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="end-date-incoming">Tanggal Akhir</label>
                            <input type="date" name="end_date" id="end-date-incoming" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="supplier">Supplier</label>
                            <select id="supplier" name="supplier" class="form-control">
                                <option value="">Pilih Supplier</option>
                                @foreach ($supliers as $i)
                                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Generate Laporan</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Outgoing Goods Report -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Barang Keluar</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.BarangKeluar') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="start-date-stock">Tanggal Awal</label>
                            <input type="date" name="start_date" id="start-date-stock" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="end-date-stock">Tanggal Akhir</label>
                            <input type="date" name="end_date" id="end-date-stock" class="form-control">
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Generate Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
