<div class="modal fade" id="updateppob-{{$ppob->id_ppob}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update Data PPOB</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updateppob/{{$ppob->id_ppob}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                
                
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Judul</label> 
                    <input type="text" class="form-control" name="judul_ppob" required  value="{{$ppob->judul_ppob}}">
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputEmail1" >Gambar</label> 
                    <input type="file" class="form-control" name="gambar_ppob"  >
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