@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Barang</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('master-barang.update', $masterBarang->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="kode_barang" class="form-label">Kode Barang</label>
                                        <input type="text" name="kode_barang" id="kode_barang"
                                            class="form-control input-default" value="{{ $masterBarang->kode_barang }}"
                                            readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                        <input type="text" name="nama_barang" id="nama_barang"
                                            class="form-control input-default" value="{{ $masterBarang->nama_barang }}"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <input type="text" name="kategori" id="kategori" class="form-control"
                                            value="{{ $masterBarang->kategori }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="satuan" class="form-label">Satuan</label>
                                        <input type="text" name="satuan" id="satuan"
                                            class="form-control input-default" value="{{ $masterBarang->satuan }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="number" name="stok" id="stok" class="form-control"
                                            value="{{ $masterBarang->stok }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="merk" class="form-label">Merk</label>
                                        <select name="merk" class="form-control">
                                            <option value="">Pilih Merk</option>
                                            @foreach ($merk as $item)
                                                <option value="{{ $item->merk }}"
                                                    {{ $masterBarang->merk == $item->merk ? 'selected' : '' }}>
                                                    {{ $item->merk }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_beli" class="form-label">Harga Beli</label>
                                        <input type="text" name="harga_beli" id="harga_beli"
                                            class="form-control input-default"
                                            value="{{ number_format($masterBarang->harga_beli, 0, ',', '.') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="harga_jual" class="form-label">Harga Jual</label>
                                        <input type="text" name="harga_jual" id="harga_jual"
                                            class="form-control input-default"
                                            value="{{ number_format($masterBarang->harga_jual, 0, ',', '.') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stok_minimal" class="form-label">Stok Minimal</label>
                                        <input type="number" name="stok_minimal" id="stok_minimal" class="form-control"
                                            value="{{ $masterBarang->stok_minimal }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ $masterBarang->deskripsi }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a class="btn btn-warning" href="{{ route('master-barang.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString();
            var split = number_string.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
        document.getElementById('harga_beli').addEventListener('keyup', function(e) {
            this.value = formatRupiah(this.value, 'Rp. ');
        });

        document.getElementById('harga_jual').addEventListener('keyup', function(e) {
            this.value = formatRupiah(this.value, 'Rp. ');
        });
    </script>
@endpush
