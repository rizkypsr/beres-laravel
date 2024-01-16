@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Artikel</h3>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahArtikel"><i
                                class="fas fa-plus"></i> Tambah Artikel</button>
                        @include('artikel.add')
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Urut</th>
                                        <th>Judul</th>
                                        <th>Sub Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Link Youtube</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($artikel as $data)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <th>{{ $data->no_urut }}</th>
                                            <td>{{ $data->judul }}</td>
                                            <td>{{ $data->subjudul }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td>
                                                <a href="{{ $data->link }}" target="__blank">Lihat Video</a>
                                            </td>
                                            <td>{{ $data->created_at }}</td>
                                            <td class="d-flex align-items-center">
                                                <form class="mr-3" action="{{ route('artikel.destroy', $data->id) }}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit"
                                                        onclick="return confirm('Apakah Anda yakin ingin mengapus data ?')"
                                                        class="btn btn-danger d-flex align-items-center">
                                                        <i class="fas fa-trash-alt mx-1"></i>
                                                        <span class='mx-1'>DELETE</span>
                                                    </button>
                                                </form>
                                                <button class="btn btn-success d-flex align-items-center mr-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#updateArtikel-{{ $data->id }}">
                                                    <i class="fas fa-pencil"></i>
                                                    <span class="mx-1">UPDATE</span>
                                                </button>
                                                @include('artikel.edit', [
                                                    'artikel' => $data,
                                                ])
                                                <a href="artikel-image?artikel_id={{ $data->id }}"
                                                    class="btn btn-info d-flex align-items-center mr-3">
                                                    <i class="fas fa-image"></i>
                                                    <span class="mx-1">GAMBAR</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @include('sweetalert::alert')
                        </div>
                    </div>
                </div>

            </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableht').DataTable();
        });
    </script>
@endpush
