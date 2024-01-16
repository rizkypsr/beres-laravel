@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
@endsection

@section('content')
<div id="layoutSidenav_content">
    <main>
<div class="container-fluid">
  <div class="page-heading"><br>
    <h3>Layanan Sedekah Sampah

    </h3>
</div>
    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahlayananjemput"><i class="fas fa-plus"></i> Tambah Layanan Jemput </button>
            @include('layananjemput.addlayananjemput')

        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Kecamatan</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Handphone</th>
                            <th>Jenis Sampah</th>
                            {{-- <th>edit</th> --}}
                            <th>Tanggal</th>
                            <th>delete</th>
                            <th>Action</th>
                            <th>Status</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                    @endphp
                        @foreach ($lj as $data)
                        <tr>
                          <th>{{ $no++}}</th>
                          <td>{{ $data->kecamatan->nama_kecamatan}}</td>
                          <td>{{ $data->nama_layanan}}</td>
                          <td>{{ $data->alamat_layanan}}</td>
                          <td> {{$data->no_hp_layanan}}</td>
                          <td>{{$data->jenis_sampah_layanan}}</td>
                          <td>{{$data->created_at}}</td>
                         
                          {{-- <td>
                              @if ($data->status_layanan == 'belum diproses')
                              <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updatelj-{{$data->id_layanan}}"  ><i class="fas fa-edit"></i>  </button>
                              @include('layananjemput.updatelayananjemput',[
                                'lj'=>$data
                              ])
                              @endif
                              @if ($data->status_layanan == 'sedang diproses')
                              <button  class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#updatelj-{{$data->id_layanan}}"  ><i class="fas fa-edit"></i>  </button>
                              @include('layananjemput.updatelayananjemput',[
                                'lj'=>$data
                              ])
                              @endif
                            
                            </td> --}}
                          
                          
                            <td>
                                @if ($data->status_layanan == 'belum diproses')
                                <form action="/deletelj/{{ $data->id_layanan }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data ?')"><i class="fas fa-trash-alt"></i>  </button>
                                    </form>  
                                @endif
                                @if ($data->status_layanan == 'sedang diproses')
                                <form action="/deletelj/{{ $data->id_layanan }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data ?')"><i class="fas fa-trash-alt"></i>  </button>
                                    </form>
                                @endif
                                
                            </td>
                                <td>
                                    @if ($data->status_layanan == 'belum diproses')
                                    <a href="/acclj/{{ $data->id_layanan }}" class="btn btn-warning " onclick="return confirm('yakin ingin lanjut ?')"></i> Proses Sekarang </a>
                                    @endif
                                    @if ($data->status_layanan == 'sedang diproses')
                                    <a href="/selesailj/{{ $data->id_layanan }}" class="btn btn-success " onclick="return confirm('yakin ingin selesai ?')"></i> Selesai </a> 
                                    @endif

                            </td>
                                <td>{{$data->status_layanan}}</td>
                          
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready( function () {
    $('#tableht').DataTable();
} );


</script>
<script>
    $(document).ready(function() {
   
$("#customer-search-jemput").select2({
		dropdownParent: $("#tambahlayananjemput")
	});
    });
</script>
@endpush


