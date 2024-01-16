@extends('layout.master')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Transaksi Jual Sampah

                    </h3>
                </div>
                <!-- Page Heading -->



                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
                        {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahtransaksijs"><i class="fas fa-plus"></i> Tambah Transaksi Jual Sampah </button>
            @include('transaksijs.addtransaksijs') --}}
                        <a href="/jualsampahexport" class="btn btn-success btn-sm">Export Jual Sampah</a>


                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableht" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Customer</th>
                                        <th>Kecamatan</th>
                                        <th>Jenis Sampah</th>
                                        <th>Satuan </th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Tanggal</th>
                                        {{-- <th>edit</th> --}}

                                        <th>status</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($tjs as $data)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $data->customer->nama }}</td>
                                            <td>{{ $data->kecamatan->nama_kecamatan }}</td>
                                            <td>{{ $data->produkjs->judul_js }}</td>
                                            <td> {{ $data->satuan_js }}</td>
                                            <td>{{ $data->jumlah_js }}</td>
                                            <td>{{ $data->harga_js }}</td>
                                            <td>{{ $data->total_js }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            {{-- <td>
                              @if ($data->status_js == 'belum diproses')
                              <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updatetransaksijs-{{$data->id_transaksijs}}"  ><i class="fas fa-edit"></i>  </button>
                              @include('transaksijs.updatetransaksijs',[
                                'tjs'=>$data
                              ])
                              @endif
                              @if ($data->status_js == 'sedang diproses')
                              <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updatetransaksijs-{{$data->id_transaksijs}}"  ><i class="fas fa-edit"></i>  </button>
                              @include('transaksijs.updatetransaksijs',[
                                'tjs'=>$data
                              ])
                              @endif
                            
                            </td> --}}



                                            <td>{{ $data->status_js }}</td>

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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableht').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {

            $("#customer-search-js").select2({
                dropdownParent: $("#tambahtransaksijs")
            });
        });
    </script>
@endpush
