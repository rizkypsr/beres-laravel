@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
  <div class="page-heading"><br>
    <h3>FAQ

    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i class="fas fa-plus"></i> Tambah FAQ </button>
            @include('faq.addfaq')

        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Judul</th>
                            <th>Deskripsi</th>
                            <th>Edit</th>
                            <th>Delete</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                    @endphp
                        @foreach ($faq as $data)
                        <tr>
                          <th>{{ $no++}}</th>
                          <td>{{ $data->judul_faq}}</td>
                          <td>{{ $data->deskripsi_faq}}</td>
                          <td>
                            <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updatefaq-{{$data->id_faq}}"  ><i class="fas fa-edit"></i> Update </button>
                            @include('faq.updatefaq',[
                              'faq'=>$data
                            ])
                            </td>
                          
                          
                            <td>
                                <form action="/deletefaq/{{ $data->id_faq }}" method="post">
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


