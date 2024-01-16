<div class="modal fade" id="tambahkota">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Tambah Data Kecamatan</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/addkecamatan/{{$kota->id_kota}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
              <div class="form-group">
                  <label for="">Nama kota</label>
                  <select class="form-control" name="id_kota_kecamatan" id="id_kota_kecamatan" required >
                      <option selected value="{{$kota->id_kota}}">{{$kota->nama_kota}}</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Nama Kecamatan</label> 
                <input type="text" class="form-control" name="nama_kecamatan" required autocomplete="nama_kecamatan" >
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