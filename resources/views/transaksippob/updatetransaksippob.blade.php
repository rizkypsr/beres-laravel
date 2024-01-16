<div class="modal fade" id="updatetpp-{{$tpp->id_transaksippob}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-tittle">Update Data PPOB</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       
      </div>
      <div class="modal-body">
        <form role="form" action="/updatetpp/{{$tpp->id_transaksippob}}"  method="POST" enctype="multipart/form-data"  >
          @csrf
          
            
            <div class="box-body">
              
               {{-- <div class="form-group">
                    <label for="">customer</label>
                    <select class="form-control" name="customer_ppob" id="customer_update" required >
                        <option selected hidden value="{{$tpp->customer_ppob}}"> {{$tpp->customer->nama_customer}}</option>
                        @foreach ($customer as $item)
                              <option value="{{ $item->id_customer }}">{{ $item->id_customer}} </option>
                        @endforeach
                    </select>
                  </div> --}}
                {{-- <div class="form-group">
                  <label for="">Produk</label>
                  <select class="form-control" name="produk_ppob"  required >
                      <option selected hidden value="{{$tpp->produk_transaksi_ppob}}">{{$tpp->produk_transaksi_ppob}}</option>
                      @foreach ($detailppob as $item)
                          <option value="{{ $item->ppob->judul_ppob }}">{{ $item->ppob->judul_ppob}} </option>
                      @endforeach
                  </select>
              </div> --}}
                <div class="form-group">
                  <label for="exampleInputEmail1" >Harga/Keterangan</label> 
                  <input type="text" class="form-control" name="harga_ppob" required value="{{$tpp->harga_transaksi_ppob}}" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" >Bayar PPOB</label> 
                  <input type="text" class="form-control" name="bayar_ppob" required value="{{$tpp->bayar_transaksi_ppob}}" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" >Nomor Inputan </label> 
                  <input type="number" class="form-control" name="nomor_inputan" required value="{{$tpp->nomor_inputan}}" >
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