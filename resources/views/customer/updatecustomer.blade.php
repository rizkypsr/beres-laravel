<div class="modal fade" id="updatecustomer-{{ $customer->id_customer }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Update Data Customer</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form role="form" action="/updatecustomer/{{ $customer->id_customer }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="box-body">

                        {{-- <div class="form-group">
                  <label for="exampleInputEmail1" >Id Anggota</label> 
                  <input type="number" class="form-control" name="id_customer" required autocomplete="id_customer" value="{{$customer->id_customer}}" >
                </div> --}}
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <select class="form-control" name="id_kecamatan_customer" id="id_kecamatan_customer"
                                required>
                                <option selected hidden value="{{ $customer->kecamatan->id_kecamatan }}">
                                    {{ $customer->kecamatan->nama_kecamatan }}</option>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Customer</label>
                            <input type="text" class="form-control" name="nama_customer" required
                                autocomplete="nama_customer" value="{{ $customer->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" name="alamat_customer" required
                                autocomplete="alamat_customer" value="{{ $customer->alamat_customer }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pin Customer (max 6 karakter)</label>
                            <input type="password" class="form-control" name="pin_customer" maxlength="6" required
                                autocomplete="pin_customer" value="{{ $customer->pin_customer }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Handphone</label>
                            <input type="number" class="form-control" name="no_hp_customer" required
                                autocomplete="no_hp_customer" value="{{ $customer->no_hp_customer }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir"
                                value="{{ $customer->tempat_lahir }}" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir"
                                value="{{ $customer->tgl_lahir }}" required>
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
