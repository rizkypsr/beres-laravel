@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
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
                        {{-- <a href="{{url('addcustomers')}}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahtransaksi"><i
                                class="fas fa-plus"></i> Tambah Transaksi PPOB </button>
                        @include('transaksippob.addtransaksippob')

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

                                        <th>delete</th>
                                        <th>Action</th>
                                        <th>Status</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($tpp as $data)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $data->customer->nama }}</td>
                                            <td>{{ $data->ppob->judul_ppob }}</td>
                                            <td>{{ $data->harga_transaksi_ppob }}</td>
                                            <td> {{ $data->bayar_transaksi_ppob }}</td>
                                            <td>{{ $data->nomor_inputan }}</td>
                                            <td>{{ $data->tanggal_transaksi_ppob }}</td>




                                            <td>
                                                @if ($data->status_ppob == 'belum diproses')
                                                    <form action="/deletetpp/{{ $data->id_transaksippob }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('yakin ingin menghapus data ?')"><i
                                                                class="fas fa-trash-alt"></i> </button>
                                                    </form>
                                                @endif
                                                @if ($data->status_ppob == 'sedang diproses')
                                                    <form action="/deletetpp/{{ $data->id_transaksippob }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('yakin ingin menghapus data ?')"><i
                                                                class="fas fa-trash-alt"></i> </button>
                                                    </form>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($data->status_ppob == 'belum diproses')
                                                    <a href="/acctpp/{{ $data->id_transaksippob }}"
                                                        class="btn btn-warning "
                                                        onclick="return confirm('yakin ingin lanjut ?')"></i> Proses
                                                        Sekarang </a>
                                                @endif
                                                @if ($data->status_ppob == 'sedang diproses')
                                                    <a href="/selesaitpp/{{ $data->id_transaksippob }}"
                                                        class="btn btn-success "
                                                        onclick="return confirm('yakin ingin selesai ?')"></i> Selesai </a>
                                                @endif

                                            </td>
                                            <td>{{ $data->status_ppob }}</td>

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
        $(document).ready(function() {
            $('#tableht').DataTable();

        });
    </script>
    <script>
        $(document).ready(function() {

            $("#customer-search").select2({
                dropdownParent: $("#tambahtransaksi")
            });
        });
    </script>

    {{-- <script>
    $(document).ready(function() {
   
$("#customer_update").select2({
		dropdownParent: $("#testingupdate")
	});
    });
</script> --}}
@endpush
