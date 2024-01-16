<div class="modal fade" id="updatetoko-{{ $toko->id_customer }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Update Data Toko</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="/updatetoko/{{ $toko->id_customer }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <select class="form-control" name="id_kecamatan_customer" id="id_kecamatan_customer"
                                required>
                                <option selected hidden value="{{ $toko->kecamatan->id_kecamatan }}">
                                    {{ $toko->kecamatan->nama_kecamatan }}</option>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Toko</label>
                            <input type="text" class="form-control" name="nama" required
                                autocomplete="nama_customer" value="{{ $toko->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" name="alamat_customer" required
                                autocomplete="alamat_customer" value="{{ $toko->alamat_customer }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pin Toko</label>
                            <input type="password" class="form-control" name="pin_customer">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Handphone</label>
                            <input type="number" class="form-control" name="no_hp_customer" required
                                autocomplete="no_hp_customer" value="{{ $toko->no_hp_customer }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir"
                                value="{{ $toko->tempat_lahir }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" value="{{ $toko->tgl_lahir }}"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
