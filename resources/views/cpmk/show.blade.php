@extends('master.dashboard.app')
@section('judul', 'Pengaturan Fakultas')
@section('content')
<div>
    <div class="d-flex justify-content-end pb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $fakultas->id }}">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Ubah Data
        </button>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <table class="table-borderles" width="100%">
                <tr>
                    <td width="12%">Nama Fakultas</td>
                    <th>:</th>
                    <th>{{ $fakultas->nama }}</th>
                </tr>
                <tr>
                    <td>Alamat Fakultas</td>

                    <th>:</th>
                    <th>{{ $fakultas->alamat }}</th>
                </tr>
            </table>
        </div>
    </div>
    {{-- ! Edit --}}
        <div class="modal fade" id="edit{{ $fakultas->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalTitleNotify" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="modalTitleNotify">Ubah Data </p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('./fakultas/'.$fakultas->id.'/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group py-2">
                                <label for="" class="lable">Nama Fakultas</label>
                                <input type="text" name="nama" id="" value="{{ $fakultas->nama }}" class="form-control">
                            </div>
                            <div class="form-group py-2">
                                <label for="" class="lable">Alamat Fakultas</label>
                                <textarea name="alamat" id="" class="form-control" cols="30"
                                    rows="10">{{ $fakultas->alamat }}</textarea>
                            </div>
                            <div class="form-group py-2">
                                <label for="" class="lable">Logo Fakultas</label>

                                <input type="file" name="logo" class="form-control" id="">
                            </div>
                            <div class="form-group py-2">
                                <img src="{{ asset($fakultas->logo) }}" alt="" style="height: 100px; width:auto">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
