<div class="modal fade" id="tambahkota">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Tambah Data Qurban</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/addqurban"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
               
              
              <div class="form-group">
                <label for="exampleInputEmail1" >Nama Qurban</label> 
                <input type="text" class="form-control" name="nama_qurban" required  >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Gambar </label> 
                <input type="file" class="form-control" name="gambar_qurban" required  >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Deskripsi</label> 
                <input type="text" class="form-control" name="deskripsi_qurban" required  >
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