@extends('layout.master')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Log Transfer / Bayar Toko
                    </h3>
                </div>
                <!-- Page Heading -->



                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="/transferexport" class="btn btn-success btn-sm">Export Transfer</a>
                        {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
                        {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i class="fas fa-plus"></i> Tambah Kota </button> --}}
                        {{-- @include('kota.addkota') --}}

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableht" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Kecamatan</th>
                                        <th>Pengirim</th>
                                        <th>Penerima</th>
                                        <th>Tanggal</th>
                                        <th>Nominal</th>

                                        {{-- <th>Kecamatan</th>
                            <th>Edit</th>
                            <th>Delete</th> --}}


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($transfer as $data)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $data->kecamatan->nama_kecamatan }}</td>
                                            <td>{{ $data->customer->nama }}</td>
                                            <td>{{ $data->customerpenerima->nama }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->nominal }}</td>


                                            {{-- <td><a href="/kecamatan/{{$data->id_kota}}" class="btn btn-secondary"><i class="fas fa-map-marker"></i> Kecamatan </a></td> --}}
                                            {{-- <td>
                            <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updatekota-{{$data->id_kota}}"  ><i class="fas fa-edit"></i> Update </button>
                            @include('kota.updatekota',[
                              'kota'=>$data
                            ])
                            </td> --}}


                                            {{-- <td>
                                <form action="/deletekota/{{ $data->id_kota }}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> DELETE </button>
                                </form>
                                </td> --}}

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
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableht').DataTable();
        });
    </script>
@endpush
