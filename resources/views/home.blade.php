@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- Number of Items Going Out -->
        <div class="col-xl-3 col-xxl-6 col-sm-6">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="icon me-3">
                        <img src="{{ asset('') }}assets/images/avatar/delivery.png" alt="">
                    </div>
                    <div class="mt-2">
                        <p class="mb-0 invoice-num1">
                            <span class="text-dark me-1">Total Barang Masuk</span>
                        </p>
                        <h2 class="invoice-num">{{ $barangMasuk[0]->total ?? 0 }}</h2>

                    </div>
                </div>
            </div>
        </div>

        <!-- Number of Items Coming In -->
        <div class="col-xl-3 col-xxl-6 col-sm-6">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="icon me-3">
                        <img src="{{ asset('') }}assets/images/avatar/send.png" alt="">
                    </div>
                    <div class="mt-2">
                        <p class="mb-0 invoice-num1">
                            <span class="text-dark me-1">Total Barang Keluar</span>
                        </p>
                        <h2 class="invoice-num">{{ $barangKeluar[0]->total ?? 0 }}</h2>

                    </div>
                </div>
            </div>
        </div>

        <!-- Number of Stock Items -->
        <div class="col-xl-3 col-xxl-6 col-sm-6">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="icon me-3">
                        <img src="{{ asset('') }}assets/images/avatar/in-stock.png" alt="">
                    </div>
                    <div class="mt-2">
                        <p class="mb-0 invoice-num1">
                            <span class="text-dark me-1">Total Stok Barang</span>
                        </p>
                        <h2 class="invoice-num">{{ $stok[0]->total ?? 0 }}</h2>

                    </div>
                </div>
            </div>
        </div>

        <!-- Number of Item Types -->
        <div class="col-xl-3 col-xxl-6 col-sm-6">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="icon me-3">
                        <img src="{{ asset('') }}assets/images/avatar/boxes.png" alt="">
                    </div>
                    <div class="mt-2">
                        <p class="mb-0 invoice-num1">
                            <span class="text-dark me-1">Total Jenis Barang</span>
                        </p>
                        <h2 class="invoice-num">{{ $jenisbarang }}</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
