<div class="modal fade" id="topupcustomer-{{$customer->id_customer}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Top up saldo customer</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
          <form role="form" action="/topupcustomer/{{$customer->id_customer}}"  method="POST" enctype="multipart/form-data"  >
            @csrf
            
              
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1"  >Saldo Saat Ini : </label> 
                    <span>{{$customer->saldo_customer}}</span>
                    
                  </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1" >Top up</label> 
                  <input type="number" class="form-control" name="saldo_customer" required autocomplete="saldo_customer"  >
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