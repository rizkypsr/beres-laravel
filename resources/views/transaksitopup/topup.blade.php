@extends('layout.master')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
  <div class="page-heading"><br>
    <h3>Log Transaksi Topup
    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/topupexport" class="btn btn-success btn-sm">Export Top Up</a>
            {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i class="fas fa-plus"></i> Tambah Kota </button> --}}
            {{-- @include('kota.addkota') --}}

        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Customer</th>
                            <th>Kecamatan</th>
                            <th>Tanggal topup</th>
                            <th>Nominal</th>
                            <th>Total Saldo</th>
                            {{-- <th>Kecamatan</th>
                            <th>Edit</th>
                            <th>Delete</th> --}}

                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                    @endphp
                        @foreach ($topup as $data)
                        <tr>
                          <th>{{ $no++}}</th>
                          <td>{{ $data->nama_customer_topup}}</td>
                          <td>{{ $data->kecamatan->nama_kecamatan}}</td>
                          <td>{{ $data->tanggal_topup}}</td>
                          <td>{{ $data->nominal_topup}}</td>
                          <td>{{ $data->total_saldo_topup}}</td>
                          
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
    $(document).ready( function () {
    $('#tableht').DataTable();
} );


</script>
@endpush


