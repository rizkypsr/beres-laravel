<div class="modal fade" id="tambahkota">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Tambah Data Produk UMKM</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/addprodukumkm"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                <div class="form-group">
                    <label for="">UMKM</label>
                    <select class="form-control" name="id_umkm_produk" id="id_umkm_produk" required >
                        <option selected hidden disabled value=""> Pilih UMKM</option>
                        @foreach ($umkm as $item)
                            <option value="{{ $item->id_umkm }}">{{ $item->nama_umkm}} </option>
                        @endforeach
                    </select>
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Nama Produk</label> 
                <input type="text" class="form-control" name="nama_produk_umkm" required  >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Deskripsi Produk</label> 
                <input type="text" class="form-control" name="deskripsi_produk_umkm" required  >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Gambar Produk</label> 
                <input type="file" class="form-control" name="gambar_produk_umkm" required  >
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