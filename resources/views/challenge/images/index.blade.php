@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Daftar Gambar Challenge</h3>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahChallengeImage">
                                <i class="fas fa-plus"></i> Tambah Gambar Challenge
                            </button>
                            <select class="form-control" name="challenge_id" style="width: 25%;">
                                <option selected value=""> Pilih Challenge</option>
                                @foreach ($challenges as $data)
                                    <option value="{{ $data->id }}">{{ $data->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        @include('challenge.images.add', [
                            'challenges' => $challenges,
                        ])
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul Challenge</th>
                                        <th>Image</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($challengeImages as $data)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $data->challenge->judul }}</td>
                                            <td>
                                                <a href="{{ asset('storage/challenges/' . $data->image) }}"
                                                    target="__blank">
                                                    <img src="{{ asset('storage/challenges/' . $data->image) }}"
                                                        alt="Challenge" style="max-width: 100px;">
                                                </a>
                                            </td>
                                            <td>
                                                <form class="mr-3"
                                                    action="{{ route('challenge-image.destroy', $data->id) }}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit"
                                                        onclick="return confirm('Apakah Anda yakin ingin mengapus data ?')"
                                                        class="btn btn-danger d-flex align-items-center">
                                                        <i class="fas fa-trash-alt mx-1"></i>
                                                        <span class='mx-1'>DELETE</span>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <button class="btn btn-success edit" data-bs-toggle="modal"
                                                    data-bs-target="#updateChallengeImage-{{ $data->id }}"><i
                                                        class="fas fa-edit"></i> Update </button>
                                                @include('challenge.images.edit', [
                                                    'challengeImage' => $data,
                                                ])
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
                columnDefs: [{
                        width: '10%',
                        targets: 0
                    },
                    {
                        width: '10%',
                        targets: 1
                    },
                    {
                        width: '10%',
                        targets: 3
                    },
                    {
                        width: '10%',
                        targets: 4
                    }
                ],
                fixedColumns: true,
            });
        });

        document.querySelector('select[name="challenge_id"]').addEventListener('change', function(e) {
            var challengeId = e.target.value;
            var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname +
                '?challenge_id=' + challengeId;
            window.location.href = newUrl;
        });

        // Get challenge_id from URL parameters
        var urlParams = new URLSearchParams(window.location.search);
        var challengeId = urlParams.get('challenge_id');

        // Set the selected attribute on the matching option
        if (challengeId) {
            var selectElement = document.querySelector('select[name="challenge_id"]');
            var options = selectElement.options;
            for (var i = 0; i < options.length; i++) {
                if (options[i].value == challengeId) {
                    options[i].selected = true;
                    break;
                }
            }
        }
    </script>
@endpush
