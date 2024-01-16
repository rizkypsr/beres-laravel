@extends('layout.master')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
  <div class="page-heading"><br>
    <h3>Share URL
    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="/transferexport" class="btn btn-success btn-sm">Export Transfer</a> --}}
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
                            <th>URL</th>
                            <th>action</th>
                            <th>status</th>
                         
                            
                            {{-- <th>Kecamatan</th>
                            <th>Edit</th>
                            <th>Delete</th> --}}

                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($share as $data)
                        <tr>
                          <td>{{ $data->id_share}}</td>
                          <td>{{ $data->url}}</td>
                          <td>@if ($data->status_share == 'belum diproses')
                            <a href="/accshare/{{ $data->id_share }}" class="btn btn-info " onclick="return confirm('yakin ingin lanjut ?')"></i> Proses Sekarang </a>
                          @endif</td>
                          <td>{{ $data->status_share}}</td>
                         
                          
                          
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


