@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
  <div class="page-heading"><br>
    <h3>Data Produk PPOB

    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i class="fas fa-plus"></i> Tambah Produk PPOB </button>
            @include('detailppob.adddetailppob')

        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Jenis PPOB</th>
                            {{-- <th>Gambar PPOB</th> --}}
                            <th>Nama/Harga PPOB</th>
                            <th>Total Bayar</th>
                            <th>Edit</th>
                            <th>Delete</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                    @endphp
                        @foreach ($detailppob as $data)
                        <tr>
                          <th>{{ $no++}}</th>
                          <td>{{ $data->ppob->judul_ppob}}</td>
                          {{-- <td> <img src="{{ $data->gambar_detailppob}}" alt="" width="80px" height="120px"></td> --}}
                          <td>{{ $data->harga_detailppob}}</td>
                          <td>{{ $data->bayar_detailppob}}</td>
                         
                          
                          <td>
                            <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updatedetailppob-{{$data->id_detailppob}}"  ><i class="fas fa-edit"></i> Update </button>
                            @include('detailppob.updatedetailppob',[
                              'detailppob'=>$data
                            ])
                            </td>
                          
                          
                            <td>
                                <form action="/deletedetailppob/{{ $data->id_detailppob }}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data ?')"><i class="fas fa-trash-alt"></i> DELETE </button>
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
    $(document).ready( function () {
    $('#tableht').DataTable();
} );


</script>
@endpush


