<div class="modal fade" id="updatetransaksijs-{{$tjs->id_transaksijs}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update Data UMKM</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updatetransaksijs/{{$tjs->id_transaksijs}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1" >Customer</label>  
                    <input type="text" class="form-control" name="id_cs_js" required  value="{{$tjs->id_cs_js}}" >
                  </div> --}}
                  {{-- <div class="form-group">
                    <label for="">Kecamatan Customer</label>
                    <select class="form-control" name="id_kc_js" id="id_kc_js" required >
                        <option selected hidden value="{{$tjs->id_kc_js}}">{{$tjs->kecamatan->nama_kecamatan}}</option>
                        @foreach ($kecamatan as $item)
                            <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan}} </option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group">
                  <label for="">Jenis Sampah</label>
                  <select class="form-control" name="jenissampah_js" id="jenissampah_js" required >
                      <option selected hidden value="{{$tjs->jenissampah_js}}">{{$tjs->produkjs->judul_js}}</option>
                      @foreach ($produkjs as $item)
                          <option value="{{ $item->id_js }}">{{ $item->judul_js}} </option>
                      @endforeach
                  </select>
              </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputEmail1" >Jenis sampah</label> 
                    <input type="text" class="form-control" name="jenissampah_js" required value="{{$tjs->jenissampah_js}}" >
                  </div> --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Satuan</label> 
                    <input type="text" class="form-control" name="satuan_js" required value="{{$tjs->satuan_js}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Jumlah </label> 
                    <input type="number" class="form-control" name="jumlah_js" required value="{{$tjs->jumlah_js}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >harga </label> 
                    <input type="number" class="form-control" name="harga_js" required value="{{$tjs->harga_js}}" >
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