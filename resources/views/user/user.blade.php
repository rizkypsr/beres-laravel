@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
  <div class="page-heading"><br>
    <h3>Data Admin

    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i class="fas fa-plus"></i> Tambah Admin </button>
            @include('user.adduser')

        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Kecamatan</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                    @endphp
                        @foreach ($user as $data)
                        <tr>
                          <th>{{ $no++}}</th>
                          <td>{{ $data->kecamatan->nama_kecamatan}}</td>
                          <td>{{ $data->email}}</td>
                          <td>{{ $data->name}}</td>
                          <td> {{$data->role}} </td>
                          
                          <td><div class="row">
                            <button  class="btn btn-success btn-sm edit" data-bs-toggle="modal" data-bs-target="#updateuser-{{$data->id}}"  ><i class="fas fa-edit"></i> Update </button>
                            @include('user.updateuser',[
                              'user'=>$data
                            ])
                             <button  class="btn btn-info btn-sm edit" data-bs-toggle="modal" data-bs-target="#updatepassword-{{$data->id}}"  ><i class="fas fa-edit"></i> New Password </button>
                             @include('user.password',[
                               'user'=>$data
                             ])
                          </div>
                            
                            </td>
                          
                          
                            <td>
                                @if ($data->role == 'superadmin')
                                   <p>Superadmin tidak dapat dihapus</p>
                                @endif
                                @if ($data->role == 'admin')
                                <form action="/deleteuser/{{ $data->id }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ?')"><i class="fas fa-trash-alt"></i> DELETE </button>
                                    </form>
                                    </td>
                                @endif
                                @if ($data->role == 'adminppob')
                                <form action="/deleteuser/{{ $data->id }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data ?')"><i class="fas fa-trash-alt"></i> DELETE </button>
                                    </form>
                                    </td>
                                @endif
                                
                          
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


