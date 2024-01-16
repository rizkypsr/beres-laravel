<div class="modal fade" id="tambahlayananjemput">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Tambah Layanan Sedekah Sampah</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/addlj"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                {{-- <div class="form-group">
                    <label for="">Kecamatan </label>
                    <select class="form-control" name="kecamatan_layanan" id="kecamatan_layanan" required >
                        <option selected hidden disabled value=""> Pilih Kecamatan</option>
                        @foreach ($kecamatan as $item)
                            <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan}} </option>
                        @endforeach
                    </select>
                </div> --}}

           
                {{-- <div class="form-group"> 
                  <label for="">Customer</label>
                     <select class="form-controll" data-width="100%" name="nama_layanan" id="customer-search-jemput" required >
                         <option selected hidden disabled value=""> Pilih Customer</option>
                         @foreach ($customer as $item)
                             <option value="{{ $item->id_customer }}">{{ $item->nama_customer}} </option>
                         @endforeach
                     </select>
                 </div> --}}
                 <div class="form-group">
                  <label for="">Kecamatan </label>
                  <select class="form-control" name="kecamatan_layanan" id="id_kecamatan_customer" required >
                      <option selected hidden disabled value=""> Pilih Kecamatan</option>
                      @foreach ($kecamatan as $item)
                          <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan}} </option>
                      @endforeach
                  </select>
              </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1" >Nama Customer</label> 
                  <input type="text" class="form-control" name="nama_layanan" required  >
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Alamat</label> 
                <input type="text" class="form-control" name="alamat_layanan" required  >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >No Handphone </label> 
                <input type="number" class="form-control" name="no_hp_layanan" required  >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Jenis Sampah </label> 
                <input type="text" class="form-control" name="jenis_sampah_layanan" required   >
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