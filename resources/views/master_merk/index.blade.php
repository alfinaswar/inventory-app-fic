@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Master Merk</h4>
                    <a href="{{ route('master-merk.create') }}" class="btn btn-primary">Tambah Data Merk</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Nama Merk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($merks as $merk)
                                    <tr>
                                        <td>{{ $merk->merk }}</td>
                                        <td>
                                            <a href="{{ route('master-merk.edit', $merk->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <button class="btn btn-sm btn-danger delete-button"
                                                data-id="{{ $merk->id }}">Hapus</button>
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
            swal.fire({
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
                            url: '/master-merk/' + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Dihapus!',
                                    'Data merk berhasil dihapus.',
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
