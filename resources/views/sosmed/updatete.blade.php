<div class="modal fade" id="updatete-{{$te->id_sosmed}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update Telegram</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updatesosmedte/{{$te->id_sosmed}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                
              <div class="form-group">
                <label for="exampleInputEmail1" >Link Telegram</label> 
                <input type="text" class="form-control" name="deskripsi_sosmed" value="{{$te->deskripsi_sosmed}}">
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