<div class="modal fade" id="updatelj-{{$lj->id_layanan}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update Layanan Sedekah sampah </h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updatelj/{{$lj->id_layanan}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                
                <div class="box-body">
                    {{-- <div class="form-group">
                        <label for="">Kecamatan </label>
                        <select class="form-control" name="kecamatan_layanan" id="kecamatan_layanan" required >
                            <option selected hidden value="{{$lj->kecamatan_layanan}}"> {{$lj->kecamatan->nama_kecamatan}}</option>
                            @foreach ($kecamatan as $item)
                                <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan}} </option>
                            @endforeach
                        </select>
                    </div> --}}
    
               
                  {{-- <div class="form-group">
                    <label for="exampleInputEmail1" >Nama</label> 
                    <input type="text" class="form-control" name="nama_layanan" required value="{{$lj->nama_layanan}}" >
                  </div> --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Alamat</label> 
                    <input type="text" class="form-control" name="alamat_layanan" required value="{{$lj->alamat_layanan}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >No Handphone </label> 
                    <input type="number" class="form-control" name="no_hp_layanan" required value="{{$lj->no_hp_layanan}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Jenis Sampah </label> 
                    <input type="text" class="form-control" name="jenis_sampah_layanan" required value="{{$lj->jenis_sampah_layanan}}"  >
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