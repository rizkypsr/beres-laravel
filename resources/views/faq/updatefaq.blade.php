<div class="modal fade" id="updatefaq-{{$faq->id_faq}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update FAQ</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/updatefaq/{{$faq->id_faq}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                
              <div class="form-group">
                <label for="exampleInputEmail1" >Judul</label> 
                <input type="text" class="form-control" name="judul_faq" required  value="{{$faq->judul_faq}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Deskripsi</label> 
                <input type="text" class="form-control" name="deskripsi_faq" required  value="{{$faq->deskripsi_faq}}">
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