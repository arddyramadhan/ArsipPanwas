@extends('master.dashboard.app')
@section('judul', 'Profil Lulusan Jurusan dan CPL')
@section('content')
@php
$base = 'profil_jurusan'
@endphp
@include('alert_error')
<div class="mb-2">
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#modalNotification">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Data Profil Lulusan
        </button>
        <a href="{{ url('/profil_jurusan/cetak') }}" class="btn btn-info">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-license" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" />
                <line x1="9" y1="7" x2="13" y2="7" />
                <line x1="9" y1="11" x2="13" y2="11" />
            </svg>
            Cetak
        </a>
    </div>
</div>
<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            {{-- <div class="table-responsive"> --}}
            <div class="">
                <table width="100%" class="table table-centered mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%" class="border-0 rounded-start">#</th>
                            <th width="20%" class="border-0">Profil Lulusan</th>
                            <th width="60%" class="border-0">Deskripsi</th>
                            <th width="15%" class="border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $no => $item)
                        <tr>
                            <td valign="middle">{{ ++$no }}</td>
                            <td valign="middle">{{ $item->nama }}</td>
                            <td valign="middle">{{ $item->deskripsi }}</td>
                            <td class="table-nowrap" valign="middle" align="center">
                                <a data-bs-toggle="modal" data-bs-target="#lihat{{ $item->id }}" class="badge bg-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
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
                            <td colspan="5" align="center"><strong>Data Belum di tambahkan</strong></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Button Modal -->
    {{-- <button type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal"
            data-bs-target="#modalNotification">Notification</button> --}}
    <!-- Modal Content -->
    <div class="modal fade" id="modalNotification" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah data</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/'.$base.'/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="" class="lable"><strong>Profil Lulusan</strong></label>
                            <input type="text" name="nama" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="lable"><strong>Deskripsi</strong></label>
                            <textarea name="deskripsi" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            @php
                            $isi = null;
                            @endphp
                            @forelse ($capaian_lulusan as $item)
                                @if ($isi != $item->profil_lulusan->nama)
                                <h4 class="mt-3"><strong>{{ $isi = $item->profil_lulusan->nama }}</strong></h4>
                                @endif
                                {{-- <label class="form-check form-check-inline">
                                    <input class="form-check-input" value="{{ $item->id }}" {{ $matakuliah->cpl->where('capaian_lulusan_id', $item->id)->count() > 0 ? 'checked' : '' }} name="capaian_lulusan[]" type="checkbox">
                                    <span class="form-check-label">{{ '('.$item->profil_lulusan->singkatan.'-'.$item->urutan.')' }} {{ $item->deskripsi }}</span>
                                </label> --}}
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" value="{{ $item->id }}" name="capaian_lulusan[]" type="checkbox">
                                    <span class="form-check-label">(<strong>{{ $item->profil_lulusan->singkatan.'-'.$item->urutan }}</strong>) {{ $item->deskripsi }}</span>
                                </label>
                                <br>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ! Lihat --}}
    @forelse($data as $lihat)
    <div class="modal fade" id="lihat{{ $lihat->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Detail Profil Lulusa</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <th width="19%">Profil Lulusan</th>
                            <th width="1%">:</th>
                            <td width="80%">{{ $lihat->nama }}</td>
                        </tr>
                        <tr>
                            <th colspan="3" width="100%" style="padding: 4px"></th>
                        </tr>
                        <tr>
                            <th width="19%" valign="top">Deskripsi</th>
                            <th width="1%" valign="top">:</th>
                            <td width="80%">{{ $lihat->deskripsi }}</td>
                        </tr>
                    </table>
                    @php
                    $isi = null;
                    @endphp
                    @forelse ($capaian_lulusan as $item)
                        @if ($isi != $item->profil_lulusan->nama)
                        <h4 class="mt-3"><strong>{{ $isi = $item->profil_lulusan->nama }}</strong></h4>
                        @endif
                        {{-- <p style="margin-bottom: 5px">
                            (<strong>{{ $item->profil_lulusan->singkatan.'-'.$item->urutan }}</strong>) 
                        </p> --}}
                        @if ($lihat->profil_jurusan_capaian->where('capaian_lulusan_id',  $item->id)->count() > 0)
                            <table width="100%">
                                <tr>
                                    <td width="50px" valign="top">
                                        (<strong>{{ $item->profil_lulusan->singkatan.'-'.$item->urutan }}</strong>)
                                    </td>
                                    <td width="auto" valign="top">
                                        {{ $item->deskripsi }}
                                    </td>
                                </tr>
                            </table>
                        @endif
                    @empty
                    @endforelse
                </div>
                {{-- <div class="modal-footer">
                </div> --}}
            </div>
        </div>
    </div>
    @empty
    @endforelse
    {{-- ! Edit --}}
    {{-- @forelse($data as $edit)
    <div class="modal fade" id="edit{{ $edit->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Perbaharui Data</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('./'.$base.'/'.$edit->id.'/update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mt-2">
                            <label for="" class="lable">Nama</label>
                            <input type="text" name="nama" id="" value="{{ $edit->nama ?? old('nama')}}" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="lable">Singkatan</label>
                            <input type="text" name="singkatan" id="" value="{{ $edit->singkatan ?? old('singkatan')}}" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="lable">Urutan</label>
                            <input type="number" name="urutan" id="" min="0" max="{{ $data->count() }}" value="{{ $edit->urutan ?? old('urutan')}}" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    @endforelse --}}

    {{-- ! delete --}}
    {{-- @forelse($data as $delete)
    <div class="modal fade" id="delete{{ $delete->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Ubah Data </p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <h3>Yakin ingin menghapus data ini?
                        </h3>
                    </center>
                    <form action="{{  url('./'.$base.'/'.$edit->id.'/delete')  }}" method="POST">
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

    @endforelse --}}
</div>
@endsection
