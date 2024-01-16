@extends('layout.master')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
  <div class="page-heading"><br>
    <h3>Transaksi PPOB

    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/ppobexport" class="btn btn-success btn-sm">PPOB Export</a>
            {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
            {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i class="fas fa-plus"></i> Tambah Transaksi PPOB </button>
            @include('transaksippob.addtransaksippob') --}}

        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Customer</th>
                            <th>Produk </th>
                            <th>Harga </th>
                            <th>Bayar </th>
                            <th>Nomor</th>
                            <th>Tanggal</th>
                            <th>Status</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                    @endphp
                        @foreach ($tpp as $data)
                        <tr>
                          <th>{{ $no++}}</th>
                          <td>{{ $data->customer->nama_customer}}</td>
                          <td>{{ $data->produk_transaksi_ppob}}</td>
                          <td>{{ $data->harga_transaksi_ppob}}</td>
                          <td> {{$data->bayar_transaksi_ppob}}</td>
                          <td>{{$data->nomor_inputan}}</td>
                          <td>{{$data->tanggal_transaksi_ppob}}</td>
                         
                         
                          
                          
                                
                                <td>{{$data->status_ppob}}</td>
                          
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


