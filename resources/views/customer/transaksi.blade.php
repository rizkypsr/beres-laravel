@extends('layout.master')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
  <div class="page-heading"><br>
    <h3>Data Transaksi

    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
            {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i class="fas fa-plus"></i> Tambah Customer </button>
            @include('customer.addcustomer') --}}

        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Customer</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Produk</th>
                            <th>QTY</th>
                            <th>Total Harga</th>
                            <th>Id Pembayaran</th>
                            <th>Status</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $data)
                        <tr>
                          <td>{{ $data->id_transaksi}}</td>
                          <td>{{ $data->id_customer_transaksi}}</td>
                          <td>{{ $data->tanggal_transaksi}}</td>
                          <td>{{ $data->kategori_transaksi}}</td>
                          <td>{{ $data->produk_transaksi}}</td>
                          <td>{{ $data->qty_transaksi}}</td>
                          
                          <td>
                            {{ $data->total_harga_transaksi}}
                            </td>
                          
                          
                            <td>
                                {{ $data->id_pembayaran}}
                                </td>
                                <td>{{ $data->status_transaksi}}</td>
                          
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


