@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Data Barang Masuk</h4>
                    <a href="{{ route('barang-masuk.create') }}" class="btn btn-primary">Tambah Barang Masuk</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Supplier</th>
                                    <th>Kode Barang</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Terima</th>
                                    <th>Lokasi Gudang</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->supplier->nama }}</td>
                                        <td>{{ $item->barang->nama_barang }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->tanggal_terima }}</td>
                                        <td>{{ $item->gudang->nama }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            <a href="{{ route('barang-masuk.edit', $item->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <button class="btn btn-sm btn-danger delete-button"
                                                data-id="{{ $item->id }}">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@if (session()->has('success'))
    <script>
        setTimeout(function() {
            Swal.fire({
                title: "{{ __('Success!') }}",
                text: "{!! \Session::get('success') !!}",
                icon: "success",
                type: "success"
            });
        }, 1000);
    </script>
@endif

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-button').click(function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/barang-masuk/' + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Dihapus!',
                                    'Data barang masuk berhasil dihapus.',
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
