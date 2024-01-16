@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Data Qurban Sampah

                    </h3>
                </div>
                <!-- Page Heading -->



                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i
                                class="fas fa-plus"></i> Tambah Qurban </button>
                        @include('qurbansampah.addqurbansampah')

                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Gambar Qurban</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Edit</th>
                                        <th>Delete</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($qurban as $data)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td> <img src="{{ $data->gambar_qurban }}" alt="" width="80px"
                                                    height="120px"></td>
                                            <td>{{ $data->nama_qurban }}</td>
                                            <td>{{ $data->deskripsi_qurban }}</td>

                                            <td>
                                                <button class="btn btn-success edit" data-bs-toggle="modal"
                                                    data-bs-target="#updatequrban-{{ $data->id_qurban }}"><i
                                                        class="fas fa-edit"></i> Update </button>
                                                @include('qurbansampah.updatequrbansampah', [
                                                    'qurban' => $data,
                                                ])
                                            </td>


                                            <td>
                                                <form action="/deletequrban/{{ $data->id_qurban }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger"><i
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
