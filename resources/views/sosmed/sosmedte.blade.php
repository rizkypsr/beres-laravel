@extends('layout.master')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
  <div class="page-heading"><br>
    <h3>
Telegram
    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
           
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                @foreach ($te as $data)
                <h3> No Telegram/Link Telegram : {{$data->deskripsi_sosmed}}</h3> <br>
                 <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updatete-{{$data->id_sosmed}}"  ><i class="fas fa-edit"></i> Update No Telegram </button>
                @include('sosmed.updatete',[
                  'te'=>$data
                ])
            @endforeach
                {{-- <table class="table table-bordered" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Link Telegram</th>
                            <th>Edit</th>
                           

                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($te as $data)
                        <tr>
                          <td>{{ $data->id_sosmed}}</td>
                          <td>{{ $data->deskripsi_sosmed}}</td>
                          <td>
                            <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updatete-{{$data->id_sosmed}}"  ><i class="fas fa-edit"></i> Update </button>
                            @include('sosmed.updatete',[
                              'te'=>$data
                            ])
                            </td>
                          
                          
                           
                          
                        </tr>
                        @endforeach
                        
                    </tbody>
                    
                    
                </table> --}}
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


