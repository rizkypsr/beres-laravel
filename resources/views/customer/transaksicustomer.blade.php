<div class="modal fade" id="transaksicustomer-{{$customer->nik_customer}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-tittle">Update Data Customer</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <div class="modal-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="tableht" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Customer</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Produk</th>
                            <th>QTY</th>
                            <th>Total Harga</th>
                            <th>Id Pembayaran</th>
                            <th>Status</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($transaksi as $value)
                        @if ($value->id_customer_transaksi == $customer->nik_customer)
                        <tr>
                            <td>{{ $value->id_transaksi}}</td>
                            <td>{{ $value->customer->nama_customer}}</td>
                            <td>{{ $value->tanggal_transaksi}}</td>
                            <td>{{ $value->kategori_transaksi}}</td>
                            <td>{{ $value->produk_transaksi}}</td>
                            <td>{{ $value->qty_transaksi}}</td>
  
                            <td>
                              {{ $value->total_harga_transaksi}}
                              </td>
                            
                            
                              <td>
                                  {{ $value->id_pembayaran}}
                                  </td>
                                  <td>{{ $value->status_transaksi}}</td>
                            
                          </tr>
                        @endif
                        
                        @endforeach
                        
                    </tbody>
                    
                    
                </table>
                @include('sweetalert::alert')
            </div>
            <button type="button" class="btn btn-info pull-left" data-bs-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>