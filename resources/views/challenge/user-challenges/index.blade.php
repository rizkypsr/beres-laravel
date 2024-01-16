@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading d-flex justify-content-between align-items-center mb-3 mt-5">
                    <h3>Daftar User yang Mengikuti</h3>
                    <div class="d-flex align-items-center">
                        <p class="mr-3">Total Video: {{ $totalVideos }}</p>
                        <form action="{{ route('user-challenges.destroyAllVideos') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin mengapus data ?')"
                                class="btn btn-danger d-flex align-items-center {{ $totalVideos <= 0 ? 'disabled' : '' }} "
                                style="height: 3.5rem;">
                                <i class="fas fa-trash-alt mx-1"></i>
                                <span class='mx-1'>Hapus Semua Video</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableht">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul Challenge</th>
                                        <th>Challenge Hari</th>
                                        <th>Nama User</th>
                                        <th>No Hp</th>
                                        <th>Jam dan Tanggal Upload</th>
                                        <th>Point</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($userChallenges as $data)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $data->challenge->judul }}</td>
                                            <td>{{ $data->challenge->hari }}</td>
                                            <td>{{ $data->customer->nama ?? '' }}</td>
                                            <td>{{ $data->customer->no_hp_customer ?? '' }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>{{ $data->challenge->point }}</td>
                                            <td>
                                                @if ($data->user_challenge_images->count() < 0)
                                                    <span class="badge badge-danger">Tidak Ada Gambar</span>
                                                @else
                                                    <a
                                                        href="{{ route('user-challenge-image.index', [
                                                            'user_challenge_id' => $data->id,
                                                        ]) }}">Lihat
                                                        Semua Gambar</a>
                                                @endif
                                            </td>
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
                                            <td>
                                                <div class="btn-group btn-group-horizontal">
                                                    <form class="mr-3"
                                                        action="{{ route('user-challenges.destroy', $data->id) }}"
                                                        method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah Anda yakin ingin mengapus data ?')"
                                                            class="btn btn-danger d-flex align-items-center whitespace-nowrap">
                                                            <i class="far fa-trash-alt pr-2" aria-hidden="true"></i>Delete
                                                        </button>
                                                    </form>
                                                    @if ($data->status == -1)
                                                        <button type="button"
                                                            class="btn btn-success d-flex align-items-center mr-2 whitespace-nowrap"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updatePoint-{{ $data->id }}">
                                                            <i class="fas fa-check pr-2" aria-hidden="true"></i>Update
                                                            Status
                                                        </button>
                                                        @include('elearnings.edit', [
                                                            'elearning' => $data,
                                                        ])
                                                    @endif
                                                    <a href="{{ asset('storage/' . $data->link) }}" target="__blank"
                                                        class="btn btn-warning d-flex align-items-center {{ $data->link == null ? 'disabled' : '' }} btn-sm whitespace-nowrap">
                                                        <i class="fas fa-video pr-2" aria-hidden="true"></i>
                                                        <span
                                                            class="mx-1">{{ $data->link == null ? 'Tidak Ada Video' : 'Lihat Video' }}</span>
                                                    </a>
                                                </div>
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
            $('#tableht').DataTable({
                responsive: true,
                columnDefs: [{
                    width: '3rem',
                    targets: 9,
                }, ],
            });
        });
    </script>
@endpush
