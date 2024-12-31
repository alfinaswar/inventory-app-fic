@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Barang Masuk</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('barang-masuk.update', $barangMasuk->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="supplier_id" class="form-label">Supplier</label>
                                        <select name="supplier_id" class="form-control" required>
                                            <option value="">Pilih Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}"
                                                    {{ $supplier->id == $barangMasuk->supplier_id ? 'selected' : '' }}>
                                                    {{ $supplier->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kode_barang" class="form-label">Nama Barang</label>
                                        <select id="single-select" name="kode_barang">
                                            <option value="">Pilih Barang</option>
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $barangMasuk->kode_barang ? 'selected' : '' }}>
                                                    {{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" name="jumlah" id="jumlah"
                                            class="form-control input-default" placeholder="Masukkan Jumlah"
                                            value="{{ $barangMasuk->jumlah }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_terima" class="form-label">Tanggal Terima</label>
                                        <input type="date" name="tanggal_terima" id="tanggal_terima"
                                            class="form-control input-default" value="{{ $barangMasuk->tanggal_terima }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="satuan" class="form-label">Satuan</label>
                                        <input type="text" name="satuan" id="satuan"
                                            class="form-control input-default" placeholder="Masukkan Satuan"
                                            value="{{ $barangMasuk->satuan }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                        <input type="text" name="harga_satuan" id="harga_satuan"
                                            class="form-control input-default" placeholder="Masukkan Harga Satuan"
                                            value="{{ number_format($barangMasuk->harga_satuan, 0, ',', '.') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total_harga" class="form-label">Total Harga</label>
                                        <input type="text" name="total_harga" id="total_harga"
                                            class="form-control input-default" placeholder="Masukkan Total Harga"
                                            value="{{ number_format($barangMasuk->total_harga, 0, ',', '.') }}" readonly
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lokasi_gudang" class="form-label">Diterima Gudang</label>
                                        <select class="multi-select" name="lokasi_gudang">
                                            <option value="">Pilih Gudang</option>
                                            @foreach ($gudang as $g)
                                                <option value="{{ $g->id }}"
                                                    {{ $g->id == $barangMasuk->lokasi_gudang ? 'selected' : '' }}>
                                                    {{ $g->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Masukkan Keterangan">{{ $barangMasuk->keterangan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary">Batal</a>
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

        function calculateTotalHarga() {
            const jumlah = parseFloat(document.getElementById('jumlah').value) || 0;
            const hargaSatuan = parseNumber(document.getElementById('harga_satuan').value) || 0;
            const totalHarga = jumlah * hargaSatuan;
            document.getElementById('total_harga').value = formatNumber(totalHarga);
        }

        document.getElementById('jumlah').addEventListener('input', calculateTotalHarga);
        document.getElementById('harga_satuan').addEventListener('input', function() {
            this.value = formatNumber(parseNumber(this.value));
            calculateTotalHarga();
        });
    </script>
@endpush
