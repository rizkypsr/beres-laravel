<div class="modal fade" id="updateuser-{{$user->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update User </h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updateuser/{{$user->id}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                <div class="form-group">
                    <label for="">Kecamatan Admin User</label>
                    <select class="form-control" name="id_kecamatan_user" id="id_kecamatan_user" required >
                        <option selected hidden  value="{{$user->id_kecamatan_user}}"> {{$user->kecamatan->nama_kecamatan}}</option>
                        @foreach ($kecamatan as $item)
                            <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan}} </option>
                        @endforeach
                    </select>
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Nama </label> 
                <input type="text" class="form-control" name="name" required value="{{$user->name}}" >
              </div>
              {{-- <div class="form-group">
                <label for="exampleInputEmail1" >email</label> 
                <input type="email" class="form-control" name="email" required value="{{$user->email}}" >
              </div> --}}
              {{-- <div class="form-group">
                <label for="exampleInputEmail1" >Password</label> 
                <input type="password" class="form-control" name="password" required value="{{$user->password}}" >
              </div> --}}
              <div class="form-group">
            <label for="">Role</label>
            <select name="role" id="role" class="form-control" required>
            <option selected hidden value="{{$user->role}}">{{$user->role}}</option>
            <option value="admin">Admin</option>
            <option value="adminppob">Admin ppob</option>    
            </select>     
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