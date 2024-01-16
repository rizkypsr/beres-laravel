<div class="modal fade" id="tambahtransaksi">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Tambah Transaksi PPOB</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/addtpp"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
               <div class="form-group"> 
               <label for="">Customer</label>
                  <select class="form-controll" data-width="100%" name="customer_ppob" id="customer-search" required >
                      <option selected hidden disabled value=""> Pilih Customer</option>
                      @foreach ($customer as $item)
                          <option value="{{ $item->id_customer }}">{{ $item->id_customer}} </option>
                      @endforeach
                  </select>
              </div>
            
              {{-- <div class="form-group">
                <label for="">produk</label>
                <select class="form-control" name="produk_transaksi_ppob" id="produk_transaksi_ppob" required >
                    <option selected hidden disabled value=""> Pilih Produk</option>
                    @foreach ($ppob as $item)
                        <option value="{{ $item->id_ppob }}">{{ $item->judul_ppob}} </option>
                    @endforeach
                </select>
            </div> --}}
            <div class="form-group">
              <label for="">Harga</label>
              <select class="form-control" name="harga_transaksi_ppob" id="harga_transaksi_ppob" required >
                  <option selected hidden disabled value=""> Pilih Harga/Keterangan</option>
                  @foreach ($detailppob as $item)
                      <option value="{{ $item->id_detailppob }}">{{ $item->harga_detailppob}} </option>
                  @endforeach
              </select>
          </div>
              {{-- <div class="form-group">
                <label for="exampleInputEmail1" >Harga/Keterangan</label> 
                <input type="text" class="form-control" name="harga_transaksi_ppob" required  >
              </div> --}}
              <div class="form-group">
                <label for="exampleInputEmail1" >Tanggal</label> 
                <input type="date" class="form-control" name="tanggal_transaksi_ppob" required  >
              </div>
              {{-- <div class="form-group">
                <label for="exampleInputEmail1" >Bayar PPOB</label> 
                <input type="number" class="form-control" name="bayar_transaksi_ppob" required  >
              </div> --}}
              <div class="form-group">
                <label for="exampleInputEmail1" >Nomor inputan </label> 
                <input type="number" class="form-control" name="nomor_inputan" required  >
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