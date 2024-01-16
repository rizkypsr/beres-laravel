<div class="modal fade" id="tambahkota">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Tambah Data PPOB</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/addinfo"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
               
              
            
              <div class="form-group">
                <label for="exampleInputEmail1" >Info Gambar</label> 
                <input type="file" class="form-control" name="gambar_info" required  >
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