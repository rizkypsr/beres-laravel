<div class="modal fade" id="updateChallenge-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Update Challenge</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{ route('challenge.update', $challenge->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Judul Challenge</label>
                            <input id="judul" type="text" class="form-control" name="judul"
                                value="{{ old('judul', $challenge->judul) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Challenge</label>
                            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ old('deskripsi', $challenge->deskripsi) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hari</label>
                            <select class="form-control" name="hari" id="hari" required>
                                <option selected hidden disabled value="">Pilih Hari</option>
                                <option value="senin" {{ old('hari', $challenge->hari) == 'senin' ? 'selected' : '' }}>
                                    Senin</option>
                                <option value="selasa"
                                    {{ old('hari', $challenge->hari) == 'selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="rabu" {{ old('hari', $challenge->hari) == 'rabu' ? 'selected' : '' }}>
                                    Rabu</option>
                                <option value="kamis" {{ old('hari', $challenge->hari) == 'kamis' ? 'selected' : '' }}>
                                    Kamis</option>
                                <option value="jumat" {{ old('hari', $challenge->hari) == 'jumat' ? 'selected' : '' }}>
                                    Jumat</option>
                                <option value="sabtu" {{ old('hari', $challenge->hari) == 'sabtu' ? 'selected' : '' }}>
                                    Sabtu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="link">Link Youtube</label>
                            <input type="text" class="form-control" name="link"
                                value="{{ old('link', $challenge->link) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Poin</label>
                            <select class="form-control" name="point" id="hari" required>
                                <option value="1" {{ old('hari', $challenge->point) == '1' ? 'selected' : '' }}>1
                                </option>
                                <option value="5" {{ old('hari', $challenge->point) == '5' ? 'selected' : '' }}>5
                                </option>
                                <option value="10" {{ old('hari', $challenge->point) == '10' ? 'selected' : '' }}>
                                    10
                                </option>
                                <option value="25" {{ old('hari', $challenge->point) == '25' ? 'selected' : '' }}>
                                    25
                                </option>
                                <option value="50" {{ old('hari', $challenge->point) == '50' ? 'selected' : '' }}>
                                    50
                                </option>
                                <option value="100" {{ old('hari', $challenge->point) == '100' ? 'selected' : '' }}>
                                    100</option>
                            </select>
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
