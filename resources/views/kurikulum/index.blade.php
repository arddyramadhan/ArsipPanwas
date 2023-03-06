@extends('master.dashboard.app')
@section('judul', 'Manajemen Kurikulum')
@section('content')
@php
$base = 'kurikulum'
@endphp
@include('alert_error')

<div class="mb-2">
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Data Kurikulum
        </button>
    </div>
</div>
<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Nama</th>
                            <th class="border-0">Keterangan</th>
                            <th class="border-0">Jurusan</th>
                            <th class="border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $no => $item)
                        <tr>
                            <td valign="middle">{{ ++$no }}</td>
                            <td valign="middle">{{ $item->nama }}</td>
                            <td valign="middle">{{ $item->keterangan }}</td>
                            <td valign="middle">{{ $item->jurusan->nama }}</td>
                            <td valign="middle" align="center">
                                {{-- <a href="{{ url('./'.$base.'/'.$item->id) }}" class="badge bg-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a> --}}
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
                            </td>
                        </tr>
                        @empty
                        <tr class="">
                            <td colspan="4" align="center"><strong>Data Belum di tambahkan</strong></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah data</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/'.$base.'/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="lable">Nama Kurikulum</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="3" name="keterangan" required class="form-control"></textarea>
                        </div>
                        {{-- @if (Auth::user()->pegawai->status== 'dosen')
                        <div class="mb-2">
                            <label for="" class="lable">Jurusan</label>
                            <select name="jurusan_id" id="" class="form-control">
                                <option value="">Pilih satu!!</option>
                                @forelse ($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @empty
                                <option value="">--</option>
                                @endforelse
                            </select>
                        </div>
                        @endif --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </div>
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
                            <label for="" class="lable">Nama Kurikulum</label>
                            <input type="text" name="nama" id="" value="{{ $edit->nama ?? old('nama')}}" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="lable">Keterangan</label>
                            <input type="text" name="keterangan" id="" value="{{ $edit->keterangan ?? old('keterangan')}}" class="form-control">
                        </div>
                        {{-- @if (Auth::user()->pegawai->status== 'dosen')
                        <div class="mb-2">
                            <label for="" class="lable">Jurusan</label>
                            <select name="jurusan_id" id="" class="form-control">
                                <option value="">Pilih satu!!</option>
                                @forelse ($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @empty
                                <option value="">--</option>
                                @endforelse
                            </select>
                        </div>
                        @endif --}}
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
</div>
@endsection