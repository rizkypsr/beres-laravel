<div class="modal fade" id="updateprodukumkm-{{$produkumkm->id_produk_umkm}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update Data UMKM</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updateprodukumkm/{{$produkumkm->id_produk_umkm}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                
                <div class="form-group">
                    <label for="">UMKM</label>
                    <select class="form-control" name="id_umkm_produk" id="id_umkm_produk" required >
                        <option selected hidden value="{{$produkumkm->id_umkm_produk}}"> {{$produkumkm->umkm->nama_umkm}}</option>
                        @foreach ($umkm as $item)
                            <option value="{{ $item->id_umkm }}">{{ $item->nama_umkm}} </option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Nama Produk</label> 
                    <input type="text" class="form-control" name="nama_produk_umkm" required autocomplete="nama_produk_umkm" value="{{$produkumkm->nama_produk_umkm}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Deskripsi</label> 
                    <input type="text" class="form-control" name="deskripsi_produk_umkm" required autocomplete="deskripsi_produk_umkm" value="{{$produkumkm->deskripsi_produk_umkm}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Gambar</label> 
                    <input type="file" class="form-control" name="gambar_produk_umkm"  >
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




