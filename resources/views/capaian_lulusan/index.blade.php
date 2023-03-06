@extends('master.dashboard.app')
@section('judul', 'Capaian Lulusan Jurusan')
@section('content')
@php
$base = 'capaian_lulusan'
@endphp
@include('alert_error')
<div class="mb-2">
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Data Capaian Lulusan
        </button>
    </div>
</div>
<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table width="100%" id="mytable" class="table table-centered mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%" class="border-0 rounded-start">#</th>
                            <th width="20%" class="border-0">Parameter</th>
                            <th width="60%" class="border-0">Capaian Lulusan</th>
                            <th width="5%"  class="border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $no => $item)
                        <tr>
                            <td align="left" valign="top">{{ ++$no }}</td>
                            <td align="left" valign="top">
                                {{ $item->profil_lulusan->nama. ' ('.$item->profil_lulusan->singkatan.'-'.$item->urutan.')' }}</td>
                            <td align="left" valign="top">{{ $item->deskripsi }}</td>
                            <td valign="middle" align="center" >
                                <div class="d-flex justify-content-between">
                                    <a data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" class="badge bg-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                            <line x1="16" y1="5" x2="19" y2="8" />
                                        </svg>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}" class="badge bg-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="4" y1="7" x2="20" y2="7" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
    
                                    </a>
                                </div>
                            </td>

                        </tr>
                        @empty
                        {{-- <tr class="">
                            <td colspan="10" align="center"><strong>Data Belum di tambahkan</strong></td>
                        </tr> --}}
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Tambah Data</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/'.$base.'/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="" class="lable">Parameter</label>
                        <select name="profil_lulusan_id" id="" class="form-control">
                            <option value="">Pilih satu!!</option>
                            @forelse ($profil_lulusan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                            <option value="">--</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Capaian Lulusan</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" name="deskripsi" required class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ! Edit --}}
@forelse($data as $edit)
<div class="modal fade" id="edit{{ $edit->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <p class="modal-title" id="modalTitleNotify">Perbaharui Data</p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('./'.$base.'/'.$edit->id.'/update') }}" method="POST">
            <div class="modal-body">
                @csrf
                @method('PATCH')
                <div class="form-group mt-2">
                    <label for="" class="lable">Capaian Lulusan</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" name="deskripsi" required class="form-control text-left">{{ $edit->deskripsi}}</textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="" class="lable">Urutan</label>
                    <input type="number" name="urutan" min="1" max="{{ $parameter->where('profil_lulusan_id', $edit->profil_lulusan_id)->count() }}" id="" value="{{ $edit->urutan ?? old('urutan')}}" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>
@empty
@endforelse

{{-- ! delete --}}
@forelse($data as $delete)
<div class="modal fade" id="delete{{ $delete->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Ubah Data </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <h5>Yakin ingin menghapus data ini?
                    </h5>
                </center>
                <form action="{{ url('/'.$base.'/'.$delete->id.'/delete') }}" method="POST">
                    @csrf
                    @method('delete')
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse
@include('datatable')
@endsection
