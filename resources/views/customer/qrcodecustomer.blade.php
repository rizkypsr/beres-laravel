<div class="modal fade" id="qrcodecustomer-{{ $customer->id_customer }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Update Data Customer</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <h4>
                    NIK : {{ $customer->id_customer }} <br>
                    Nama : {{ $customer->nama }}
                </h4>
                <span>{!! QrCode::size(200)->generate(json_encode(['user_id' => $customer->id_customer, 'user_type' => 'customer'])) !!}</span>
            </div>

        </div>
    </div>
</div>
