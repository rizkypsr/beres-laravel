@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
  <div class="page-heading"><br>
    <h3>Data Info Kamu
    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkota"><i class="fas fa-plus"></i> Tambah Info </button>
            @include('info.addinfo')

        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Gambar</th>
                            {{-- <th>Kecamatan</th> --}}
                            {{-- <th>Edit</th> --}}
                            <th>Delete</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                    @endphp
                        @foreach ($info as $data)
                        <tr>
                          <th>{{ $no++}}</th>
                          <td><img src="{{ $data->gambar_info}}" alt="" width="80px" height="120px"></td>
                          {{-- <td><a href="/kecamatan/{{$data->id_kota}}" class="btn btn-secondary"><i class="fas fa-map-marker"></i> Kecamatan </a></td> --}}
                          {{-- <td>
                            <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updateinfo-{{$data->id_info}}"  ><i class="fas fa-edit"></i> Update </button>
                            @include('info.updateinfo',[
                              'info'=>$data
                            ])
                            </td> --}}
                          
                          
                            <td>
                                <form action="/deleteinfo/{{ $data->id_info }}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> DELETE </button>
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


