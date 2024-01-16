<div class="modal fade" id="tambahchallenge">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Tambah Data Challenge</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form role="form" action="{{ route('challenge.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Judul Challenge</label>
                            <input id="judul" type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Challenge</label>
                            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image[]" multiple required>
                        </div>
                        <div class="form-group">
                            <label for="link">Link Youtube</label>
                            <input id="link" type="text" class="form-control" name="link" required>
                        </div>
                        <div class="form-group">
                            <label for="">Hari</label>
                            <select class="form-control" name="hari" id="hari" required>
                                <option selected hidden disabled value=""> Pilih Hari</option>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                                <option value="sabtu">Sabtu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Poin</label>
                            <select class="form-control" name="point" id="hari" required>
                                <option selected value="1">1</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
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
