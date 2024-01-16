<div class="modal fade" id="qrcodetoko-{{ $toko->id_customer }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Update Data Toko</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <h4>
                    NIK : {{ $toko->id_customer }} <br>
                    Nama : {{ $toko->nama }}
                </h4>
                <span>{!! QrCode::size(200)->generate(json_encode(['user_id' => $toko->id_customer, 'user_type' => 'toko'])) !!}</span>
            </div>

        </div>
    </div>
</div>
