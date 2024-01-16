<div class="modal fade" id="updateArtikel-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Update Artikel</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{ route('artikel.update', $artikel->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="box-body">
                        <div class="form-group">
                            <label for="no_urut">Nomor Urut</label>
                            <input id="no_urut" type="number" class="form-control" name="no_urut"
                                value="{{ old('no_urut', $artikel->no_urut) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input id="judul" type="text" class="form-control" name="judul"
                                value="{{ old('judul', $artikel->judul) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="subjudul">Sub Judul</label>
                            <input id="subjudul" type="text" class="form-control" name="subjudul"
                                value="{{ old('subjudul', $artikel->subjudul) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="link">Link Youtube</label>
                            <input id="link" type="text" class="form-control" name="link"
                                value="{{ old('link', $artikel->link) }}" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> Ubah </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
