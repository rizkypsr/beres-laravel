<div class="modal fade" id="updatePoint-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Update Point</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{ route('user-challenges.update', $elearning->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option hidden disabled value="" {{ $data->status == -1 ? 'selected' : '' }}> Pilih
                                Status</option>
                            <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Tolak </option>
                            <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Terima</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> Ubah </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
