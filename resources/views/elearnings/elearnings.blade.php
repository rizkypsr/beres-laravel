@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Environment Learnings</h3>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Judul Challenge</th>
                                        <th>Challenge Hari</th>
                                        <th>Nama User</th>
                                        <th>No Hp</th>
                                        <th>Jam dan Tanggal Upload</th>
                                        <th>Jumlah Point yang Diberikan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($elearnings as $data)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $data->challenge->judul }}</td>
                                            <td>{{ $data->challenge->hari }}</td>
                                            <td>{{ $data->user->nama }}</td>
                                            <td>{{ $data->user->no_hp_customer }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>{{ $data->point }}</td>
                                            <td>
                                                @if ($data->status == -1)
                                                    <span class="badge badge-secondary">Menunggu Persetujuan</span>
                                                @endif
                                                @if ($data->status == 0)
                                                    <span class="badge badge-danger">Ditolak</span>
                                                @endif
                                                @if ($data->status == 1)
                                                    <span class="badge badge-success">Diterima</span>
                                                @endif
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <form class="mr-3" action="{{ route('elearning.destroy', $data->id) }}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger d-flex align-items-center"
                                                        style="height: 3.5rem;">
                                                        <i class="fas fa-trash-alt mx-1"></i>
                                                        <span class='mx-1'>DELETE</span>
                                                    </button>
                                                </form>
                                                @if ($data->status == -1)
                                                    <button class="btn btn-success d-flex align-items-center mr-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updatePoint-{{ $data->id }}"
                                                        style="height: 3.5rem;">
                                                        <i class="fas fa-check"></i>
                                                        <span class="mx-1">UPDATE STATUS</span>
                                                    </button>
                                                    @include('elearnings.edit', [
                                                        'elearning' => $data,
                                                    ])
                                                @endif
                                                <a href="{{ $data->link }}" target="__blank"
                                                    class="btn btn-warning d-flex align-items-center"
                                                    style="height: 3.5rem;">
                                                    <i class="fas fa-video mx-1"></i>
                                                    <span class="mx-1">LIHAT VIDEO</span>
                                                </a>
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
        $(document).ready(function() {
            $('#tableht').DataTable();
        });
    </script>
@endpush
