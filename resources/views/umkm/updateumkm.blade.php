<div class="modal fade" id="updateumkm-{{$umkm->id_umkm}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update Data UMKM</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updateumkm/{{$umkm->id_umkm}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                
                <div class="form-group">
                  <label for="">Nama Kecamatan</label>
                  <select class="form-control" name="id_kecamatan_umkm" id="id_kecamatan_umkm" required >
                      <option selected hidden  value="{{$umkm->kecamatan->id_kecamatan}}"> {{$umkm->kecamatan->nama_kecamatan}}</option>
                      @foreach ($kecamatan as $item)
                          <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan}} </option>
                      @endforeach
                  </select>
              </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Nama UMKM</label> 
                    <input type="text" class="form-control" name="nama_umkm" required autocomplete="nama_umkm" value="{{$umkm->nama_umkm}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Deskripsi</label> 
                    <input type="text" class="form-control" name="deskripsi_umkm" required autocomplete="deskripsi_umkm" value="{{$umkm->deskripsi_umkm}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Gambar</label> 
                    <input type="file" class="form-control" name="gambar_umkm"  >
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