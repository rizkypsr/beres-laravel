<div class="modal fade" id="tambahArtikel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Tambah Data Artikel</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form role="form" action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input id="judul" type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="judul">Sub Judul</label>
                            <input id="judul" type="text" class="form-control" name="subjudul" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="judul">Link Youtube</label>
                            <input id="judul" type="text" class="form-control" name="link" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image[]" multiple required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> Tambah </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
