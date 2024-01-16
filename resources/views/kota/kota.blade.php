@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Data Kota

                    </h3>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i
                                class="fas fa-plus"></i> Tambah Kota </button>
                        @include('kota.addkota')
                        <a href="/kotaexport" class="btn btn-success btn-md mr-2">Kota Export</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama Kota</th>
                                        <th>Kecamatan</th>
                                        <th>Edit</th>
                                        <th>Delete</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($kota as $data)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $data->nama_kota }}</td>
                                            <td><a href="/kecamatan/{{ $data->id_kota }}" class="btn btn-secondary"><i
                                                        class="fas fa-map-marker"></i> Kecamatan </a></td>
                                            <td>
                                                <button class="btn btn-success edit" data-bs-toggle="modal"
                                                    data-bs-target="#updatekota-{{ $data->id_kota }}"><i
                                                        class="fas fa-edit"></i> Update </button>
                                                @include('kota.updatekota', [
                                                    'kota' => $data,
                                                ])
                                            </td>


                                            <td>
                                                <form action="/deletekota/{{ $data->id_kota }}" method="post">
                                                    {{ csrf_field() }}

                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('yakin ingin menghapus data ?')"><i
                                                            class="fas fa-trash-alt"></i> DELETE </button>
                                                </form>
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
