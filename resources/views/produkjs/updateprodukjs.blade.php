<div class="modal fade" id="updateprodukjs-{{$produkjs->id_js}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update Data Jual Sampah</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updateprodukjs/{{$produkjs->id_js}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">

                <div class="form-group">
                  <label for="">Kecamatan </label>
                  <select class="form-control" name="id_kecamatan" id="id_kecamatan" required >
                      <option selected hidden value="{{$produkjs->id_kecamatan}}"> {{$produkjs->kecamatan->nama_kecamatan}}</option>
                      @foreach ($kecamatan as $item)
                          <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan}} </option>
                      @endforeach
                  </select>
              </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1" >Gambar Produk</label> 
                    <input type="file" class="form-control" name="gambar_js"   value="{{$produkjs->gambar_js}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Nama Produk</label> 
                    <input type="text" class="form-control" name="judul_js" required value="{{$produkjs->judul_js}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Deskripsi Produk</label> 
                    <input type="text" class="form-control" name="deskripsi_js"  value="{{$produkjs->deskripsi_js}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Harga Produk</label> 
                    <input type="number" class="form-control" name="harga_js" required value="{{$produkjs->harga_js}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Satuan Produk</label> 
                    <input type="text" class="form-control" name="satuan_js" required value="{{$produkjs->satuan_js}}" >
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