<div class="modal fade" id="updatedetailppob-{{$detailppob->id_detailppob}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update Detail Produk</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updatedetailppob/{{$detailppob->id_detailppob}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                
                
                <div class="form-group">
                  <label for="">Jenis PPOB</label>
                  <select class="form-control" name="id_ppob_detail" id="id_ppob_detail" required >
                      <option selected hidden  value="{{$detailppob->ppob->id_ppob}}"> {{$detailppob->ppob->judul_ppob}}</option>
                      @foreach ($ppob as $item)
                          <option value="{{ $item->id_ppob }}">{{ $item->judul_ppob}} </option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Nama/Harga PPOB</label> 
                <input type="text" class="form-control" name="harga_detailppob" required value="{{$detailppob->harga_detailppob}}"  >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Bayar </label> 
                <input type="text" class="form-control" name="bayar_detailppob" required  value="{{$detailppob->bayar_detailppob}}">
              </div>
              {{-- <div class="form-group">
                <label for="exampleInputEmail1" >Gambar Produk PPOB</label> 
                <input type="file" class="form-control" name="gambar_detailppob"  value="{{$detailppob->gambar_detailppob}}">
              </div> --}}
             
              
             
              
              
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