<div class="modal fade" id="updatepassword-{{$user->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update User </h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updatepassword/{{$user->id}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
               
              {{-- <div class="form-group">
                <label for="exampleInputEmail1" >email</label> 
                <input type="email" class="form-control" name="email" required value="{{$user->email}}" >
              </div> --}}
              <div class="form-group">
                <label for="exampleInputEmail1" >New Password</label> 
                <input type="password" class="form-control" name="password" required  >
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