<div class="modal fade" id="tambahtransaksijs">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Tambah Transaksi jual sampah</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/addtransaksijs"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
               
                <div class="form-group"> 
                  <label for="">Customer</label>
                     <select class="form-controll" data-width="100%" name="id_cs_js" id="customer-search-js" required >
                         <option selected hidden disabled value=""> Pilih Customer</option>
                         @foreach ($customer as $item)
                             <option value="{{ $item->id_customer }}">{{ $item->id_customer}} </option>
                         @endforeach
                     </select>
                 </div>
              {{-- <div class="form-group">
                <label for="">Kecamatan Customer</label>
                <select class="form-control" name="id_kc_js" id="id_kc_js" required >
                    <option selected hidden disabled value=""> Pilih Kecamatan</option>
                    @foreach ($kecamatan as $item)
                        <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan}} </option>
                    @endforeach
                </select>
            </div> --}}
            <div class="form-group">
              <label for="">Jenis Sampah</label>
              <select class="form-control" name="jenissampah_js" id="jenissampah_js" required >
                  <option selected hidden disabled>pilih jenis sampah</option>
                  @foreach ($produkjs as $item)
                      <option value="{{ $item->id_js }}">{{ $item->judul_js}} </option>
                  @endforeach
              </select>
          </div>
              {{-- <div class="form-group">
                <label for="exampleInputEmail1" >Jenis sampah</label> 
                <input type="text" class="form-control" name="jenissampah_js" required  >
              </div> --}}
              {{-- <div class="form-group">
                <label for="exampleInputEmail1" >Satuan</label> 
                <input type="text" class="form-control" name="satuan_js" required  >
              </div> --}}
              <div class="form-group">
                <label for="exampleInputEmail1" >Jumlah </label> 
                <input type="number" step="any" class="form-control" name="jumlah_js" placeholder="/kg/L" required  >
              </div>
              {{-- <div class="form-group">
                <label for="exampleInputEmail1" >harga </label> 
                <input type="number" class="form-control" name="harga_js" required  >
              </div> --}}
              
             
              
             
              
              
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