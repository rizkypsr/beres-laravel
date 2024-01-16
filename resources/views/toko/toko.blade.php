@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Data Toko

                    </h3>
                </div>
                <!-- Page Heading -->



                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex">
                        {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
                        <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#tambahkota"><i
                                class="fas fa-plus"></i> Tambah Toko </button>
                        @include('toko.addtoko')
                        <a href="/toko-export" class="btn btn-success btn-md mr-2">Toko Export</a>
                        <form action="/toko-import" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" accept=".csv, .xlsx" style="display: none;"
                                onchange="this.form.submit()">
                            <button type="button" class="btn btn-success btn-md"
                                onclick="document.querySelector('input[name=file]').click()">Toko Import</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableht" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id Toko</th>
                                        <th>Kecamatan</th>
                                        <th>Nama Toko</th>
                                        <th>Alamat</th>
                                        <th>Saldo</th>
                                        <th>No Handphone</th>
                                        <th>Tempat dan Tanggal Lahir</th>
                                        <th>QrQode</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Top Up</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($toko as $data)
                                        <tr>
                                            <td>{{ $data->id_customer }}</td>
                                            <td>{{ $data->kecamatan->nama_kecamatan }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->alamat_customer }}</td>
                                            <td>{{ $data->saldo_customer }}</td>
                                            <td>{{ $data->no_hp_customer }}</td>
                                            <td>{{ strtoupper($data->tempat_lahir) }}, {{ $data->tgl_lahir }}</td>
                                            <td>
                                                <button class="btn btn-secondary edit" data-bs-toggle="modal"
                                                    data-bs-target="#qrcodetoko-{{ $data->id_customer }}"><i
                                                        class="fa fa-code"></i> QrQode </button>
                                                @include('toko.qrcodetoko', [
                                                    'toko' => $data,
                                                ])
                                            </td>

                                            <td>
                                                <button class="btn btn-success edit" data-bs-toggle="modal"
                                                    data-bs-target="#updatetoko-{{ $data->id_customer }}"><i
                                                        class="fas fa-edit"></i> Update </button>
                                                @include('toko.updatetoko', [
                                                    'toko' => $data,
                                                ])
                                            </td>


                                            <td>
                                                <form action="/deletetoko/{{ $data->id_customer }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash-alt"></i> DELETE </button>
                                                </form>
                                            </td>

                                            <td>
                                                <button class="btn btn-info edit" data-bs-toggle="modal"
                                                    data-bs-target="#topuptoko-{{ $data->id_customer }}"><i
                                                        class="fas fa-edit"></i> Top Up </button>
                                                @include('toko.topuptoko', [
                                                    'toko' => $data,
                                                ])
                                            </td>
                                            {{-- <td><a href="/transaksi/{{$data->nik_customer}}" class="btn btn-info"> Log Transaksi</a></td> --}}
                                            {{-- <td> <button  class="btn btn-info edit" data-bs-toggle="modal" data-bs-target="#transaksicustomer-{{$data->nik_customer}}"  ><i class="fas fa-edit"></i> Update </button>
                                    @include('customer.transaksicustomer',[
                                      'customer'=>$data
                                    ])</td> --}}

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
