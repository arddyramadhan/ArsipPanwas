@extends('master.dashboard.app')
@section('judul', 'Detail Surat Keluar')
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
                    <td width="20%">Nomor</td>
                    <th>:</th>
                    <th>{{ $surat_keluar->nomor }}</th>
                </tr>
                <tr>
                    <td valign="top">Lampiran</td>
                    <th valign="top">:</th>

                    <th>{!! $surat_keluar->lampiran !!}</th>
                </tr>
                <tr>
                    <td>Kepada</td>
                    <th>:</th>
                    <th>{{ $surat_keluar->kepada }}</th>
                </tr>
                <tr>
                    <td valign="top">Isi Surat Keluar</td>
                    <th valign="top">:</th>
                    <th>{!! $surat_keluar->isi !!}</th>
                </tr>
                <tr>
                    <td>Tanggal Surat Keluar</td>
                    <th>:</th>
                    <th>{{$surat_keluar->tgl_surat }}</th>
                </tr>
                <tr>
                    <td>Waktu / Tanggal kegiatan</td>
                    <th>:</th>
                    <th>{{$surat_keluar->waktu}}</th>
                </tr>
                <tr>
                    <td>Tempat kegiatan</td>
                    <th>:</th>
                    <th>{{  $surat_keluar->tempat  }}</th>
                </tr>
                <tr>
                    <td valign="top">Tembusan</td>
                    <th valign="top">:</th>
                    <th>{!! $surat_keluar->tembusan  !!}</th>
                </tr>
            </table>
        </div>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3>Preview Hasil</h3>
            <a href="{{ url('surat_keluar/'.$surat_keluar->id.'/print') }}" target="__blank" class="btn btn-warning">
                Cetak
            </a>
        </div>
        <div class="card-body">
            <iframe src="{{ url('surat_keluar/'.$surat_keluar->id.'/print') }}" width="100%" height="900"></iframe>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ url('./surat_keluar/'.$surat_keluar->id.'/update') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Ubah Data </p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                    <div class="mb-2">
                        <label for="" class="lable">Nomor</label>
                        <input type="text" name="nomor" value="{{ $surat_keluar->nomor }}" id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Lampiran</label>
                        <textarea name="lampiran" id=""class="form-control" cols="30" rows="3">{{ $surat_keluar->lampiran }}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Kepada</label>
                        <input type="text" value="{{ $surat_keluar->kepada }}" name="kepada" id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Isi Surat Keluar</label>
                        <textarea name="isi" id="" cols="30" rows="2" class="mytextarea form-control">{{ $surat_keluar->isi }}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Tanggal Surat Keluar</label>
                        <input type="date" value="{{ date('Y-m-d', strtotime($surat_keluar->tgl_surat)) }}" name="tgl_surat" id="" class="form-control">

                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Waktu dan Tanggal Kegiatan</label>
                        <input type="datetime-local" value="{{ date('Y-m-d H:i', strtotime($surat_keluar->waktu)) }}" name="waktu" id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Tempat Kegiatan</label>
                        <input type="text" name="tempat" value="{{ $surat_keluar->tempat }}" id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Tembusan</label>
                        <textarea name="tembusan" id="" class="form-control" cols="30" rows="3">{{ $surat_keluar->tembusan }}</textarea>
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
@include('tinymce')