@forelse($karakteristik as $kar_delete)
<div class="modal fade" id="delete_karakteristik{{ $kar_delete->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Hapus Data</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <h3>Yakin ingin menghapus data ini?</h3>
                </center>
                <form action="{{ url('/karakteristik/'.$kar_delete->id.'/delete') }}" method="POST">
                    @csrf
                    @method('delete')
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

@forelse($bentuk as $btk_delete)
<div class="modal fade" id="delete_bentuk{{ $btk_delete->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Hapus Data</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <h3>Yakin ingin menghapus data ini?</h3>
                </center>
                <form action="{{ url('/bentuk/'.$btk_delete->id.'/delete') }}" method="POST">
                    @csrf
                    @method('delete')
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

@forelse($metode_pembelajaran as $mtd_delete)
<div class="modal fade" id="delete_metode_pembelajaran{{ $mtd_delete->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Hapus Data</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <h3>Yakin ingin menghapus data ini?</h3>
                </center>
                <form action="{{ url('/metode_pembelajaran/'.$mtd_delete->id.'/delete') }}" method="POST">
                    @csrf
                    @method('delete')
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse