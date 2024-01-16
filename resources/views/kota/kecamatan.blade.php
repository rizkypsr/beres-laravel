@extends('layout.master')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
    <br>
  <div class="page-heading">
    <h3>Data Kecamatan Di {{$kota->nama_kota}}

    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
            
            <a href="/kota" class="btn btn-primary"><i class="fas fa-arrow-left"></i> </a>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i class="fas fa-plus"></i> Tambah Kecamatan </button>
            @include('kota.addkecamatan')

        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Kota</th>
                            <th>Nama Kecamatan</th>
                            <th>Edit</th>
                            <th>Delete</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                    @endphp
                        @foreach ($kecamatan as $data)
                        <tr>
                          <th>{{ $no++ }}</th>
                          <td>{{ $data->kota->nama_kota}}</td>
                          <td>{{ $data->nama_kecamatan}}</td>
                          <td>
                            <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updatekecamatan-{{$data->id_kecamatan}}"  ><i class="fas fa-edit"></i> Update </button>
                            @include('kota.updatekecamatan',[
                              'kecamatan'=>$data
                            ])
                            </td>
                          
                          
                            <td>
                                <form action="/deletekecamatan/{{ $data->id_kecamatan}}" method="post">
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
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
    $('#tableht').DataTable();
} );


</script>
@endpush


