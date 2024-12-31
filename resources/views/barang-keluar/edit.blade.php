@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Barang Keluar</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('barang-keluar.update', $barangKeluar->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="kode_barang" class="form-label">Nama Barang</label>
                                        <select id="single-select" name="kode_barang" class="form-control" required>
                                            <option value="">Pilih Barang</option>
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $barangKeluar->kode_barang == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" name="jumlah" id="jumlah"
                                            class="form-control input-default" placeholder="Masukkan Jumlah"
                                            value="{{ $barangKeluar->jumlah }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                                        <input type="date" name="tanggal_keluar" id="tanggal_keluar"
                                            class="form-control input-default" value="{{ $barangKeluar->tanggal_keluar }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tujuan" class="form-label">Tujuan</label>
                                        <input type="text" name="tujuan" id="tujuan"
                                            class="form-control input-default" placeholder="Masukkan Tujuan"
                                            value="{{ $barangKeluar->tujuan }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Masukkan Keterangan">{{ $barangKeluar->keterangan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('barang-keluar.index') }}" class="btn btn-secondary">Batal</a>
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
        function formatNumber(n) {
            return n.toLocaleString('id-ID');
        }

        function parseNumber(n) {
            return parseFloat(n.replace(/\./g, '').replace(',', '.'));
        }

        document.getElementById('jumlah').addEventListener('input', function() {
            this.value = formatNumber(parseNumber(this.value));
        });
    </script>
@endpush
