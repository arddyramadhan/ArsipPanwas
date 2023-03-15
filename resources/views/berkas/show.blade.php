@extends('master.dashboard.app')
@section('judul', 'Detail Surat Masuk')
@section('content')
<div>
    <div class="d-flex justify-content-end pb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
            Perbaharui
        </button>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <table class="table-borderles" width="100%">
                <tr>
                    <td>Asal Surat</td>
                    <th>:</th>
                    <th>{{ $surat_masuk->asal }}</th>
                </tr>
                <tr>
                    <td width="12%">Nomor Surat</td>
                    <th>:</th>
                    <th>{{ $surat_masuk->nomor }}</th>
                </tr>
                <tr>
                    <td width="12%">Tanggal Surat</td>
                    <th>:</th>
                    <th>{{ date('d-m-Y', strtotime($surat_masuk->tgl_surat)) }}</th>
                </tr>
                <tr>
                    <td width="12%">Deskripsi</td>
                    <th>:</th>
                    <th>{{ $surat_masuk->deskripsi }}</th>
                </tr>
            </table>
        </div>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-header">
            <h3>Berkas</h3>
        </div>
        <div class="card-body">
            <embed type="application/pdf" src=" {{ asset($surat_masuk->file) }} " width="100%" height="800px">
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ url('./surat_masuk/'.$surat_masuk->id.'/update') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Ubah Data </p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="lable">Nomor</label>
                            <input type="text" name="nomor" value="{{ $surat_masuk->nomor }}" id="" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="" class="lable">Tanggal Surat Masuk</label>
                            <input type="date" value="{{ date('Y-m-d', strtotime($surat_masuk->tgl_surat)) }}" name="tgl_surat" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="lable">Asal Surat</label>
                            <input type="text" value="{{ old('asal') ?? $surat_masuk->asal }}" id="asal" name="asal" id="" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="" class="lable">Deskripsi</label>
                            <textarea name="deskripsi" id="" class="form-control" cols="30" rows="10">{{ $surat_masuk->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="lable">File</label>
                            <input type="file" name="file" id="" class="form-control">
                            <span class="text-sm text-info">info : Kosongkan apabila tidak ingin mengubah file</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
