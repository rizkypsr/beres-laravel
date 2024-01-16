@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Daftar Gambar Artikel</h3>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahArtikelImage">
                                <i class="fas fa-plus"></i> Tambah Gambar Artikel
                            </button>
                            <select class="form-control" name="artikel_id" style="width: 25%;">
                                <option selected value=""> Pilih Artikel</option>
                                @foreach ($artikel as $data)
                                    <option value="{{ $data->id }}">{{ $data->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        @include('artikel.images.add', [
                            'artikel' => $artikel,
                        ])
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableht" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul Artikel</th>
                                        <th>Image</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($artikelImages as $data)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $data->artikel->judul }}</td>
                                            <td>
                                                <a href="{{ asset('storage/artikel/' . $data->image) }}" target="__blank">
                                                    <img src="{{ asset('storage/artikel/' . $data->image) }}" alt="Artikel"
                                                        style="max-width: 100px;">
                                                </a>
                                            </td>
                                            <td>
                                                <form class="mr-3"
                                                    action="{{ route('artikel-image.destroy', $data->id) }}" method="post">
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
                                                    data-bs-target="#updateArtikelImage-{{ $data->id }}"><i
                                                        class="fas fa-edit"></i> Update </button>
                                                @include('artikel.images.edit', [
                                                    'artikelImage' => $data,
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

        document.querySelector('select[name="artikel_id"]').addEventListener('change', function(e) {
            var artikelId = e.target.value;
            var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname +
                '?artikel_id=' + artikelId;
            window.location.href = newUrl;
        });

        // Get artikel_id from URL parameters
        var urlParams = new URLSearchParams(window.location.search);
        var artikelId = urlParams.get('artikel_id');

        // Set the selected attribute on the matching option
        if (artikelId) {
            var selectElement = document.querySelector('select[name="artikel_id"]');
            var options = selectElement.options;
            for (var i = 0; i < options.length; i++) {
                if (options[i].value == artikelId) {
                    options[i].selected = true;
                    break;
                }
            }
        }
    </script>
@endpush
