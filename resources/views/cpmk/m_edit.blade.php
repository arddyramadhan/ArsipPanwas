@forelse($karakteristik as $kar_edit)
<div class="modal fade" id="edit_karakteristik{{ $kar_edit->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Perbaharui Data Karakteristik</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('./karakteristik/'.$kar_edit->id.'/update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mt-2">
                        <label for="" class="lable">Karakteristik Pembelajaran</label>
                        <input type="text" name="nama" id="" value="{{ $kar_edit->nama ?? old('nama')}}" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

@forelse($bentuk as $btk_edit)
<div class="modal fade" id="edit_bentuk{{ $btk_edit->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Perbaharui Data</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('./bentuk/'.$btk_edit->id.'/update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mt-2">
                        <label for="" class="lable">Bentuk Pembelajaran</label>
                        <input type="text" name="nama" id="" value="{{ $btk_edit->nama ?? old('nama')}}" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

@forelse($metode_pembelajaran as $mtd_edit)
<div class="modal fade" id="edit_metode_pembelajaran{{ $mtd_edit->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Perbaharui Data</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('./metode_pembelajaran/'.$mtd_edit->id.'/update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mt-2">
                        <label for="" class="lable">Metode Pembelajaran</label>
                        <input type="text" name="nama" id="" value="{{ $mtd_edit->nama ?? old('nama')}}" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse
