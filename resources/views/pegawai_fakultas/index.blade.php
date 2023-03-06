@extends('master.dashboard.app')
@section('judul', 'Manajemen Jabatan Fakultas')
@section('content')
@php
$base = 'pegawai_fakultas'
@endphp
@include('alert_error')

<div class="mb-2">
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNotification">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Data Jabatan
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
                            <th class="border-0">Dosen</th>
                            <th class="border-0">Jabatan</th>
                            <th class="border-0">Urutan</th>
                            <th class="border-0">Status</th>
                            <th class="border-0 text-center" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $no => $item)
                        <tr>
                            <td valign="middle">{{ ++$no }}</td>
                            <td valign="middle">{{ $item->pegawai->nama }}</td>
                            <td valign="middle">{{ $item->jabatan == 'dekan' ? 'Dekan Fakultas' : 'Wakil Dekan' }}</td>
                            <td valign="middle">{{ $item->urutan ?? '-' }}</td>
                            <td valign="middle">{{ $item->status == 'aktiv' ? 'Aktiv' : 'Non-Aktiv'}}</td>
                            <td valign="middle" align="center">
                                <div class="d-flex justify-content-between">
                                    <form action="{{ url('./'.$base.'/'.$item->id.'/set') }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="badge bg-yellow" title="Set Aktiv">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pin" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 4.5l-4 4l-4 1.5l-1.5 1.5l7 7l1.5 -1.5l1.5 -4l4 -4" />
                                                <line x1="9" y1="15" x2="4.5" y2="19.5" />
                                                <line x1="14.5" y1="4" x2="20" y2="9.5" />
                                            </svg>
                                        </button>
                                    </form>
                                    {{-- <a href="{{ url('./'.$base.'/'.$item->id) }}" class="badge bg-yellow">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pin" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 4.5l-4 4l-4 1.5l-1.5 1.5l7 7l1.5 -1.5l1.5 -4l4 -4" />
                                        <line x1="9" y1="15" x2="4.5" y2="19.5" />
                                        <line x1="14.5" y1="4" x2="20" y2="9.5" />
                                    </svg>
                                    </a> --}}
                                    <button data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" class="badge bg-success mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                            <line x1="16" y1="5" x2="19" y2="8" />
                                        </svg>
                                    </button>
                                    <button data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}" class="badge bg-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="4" y1="7" x2="20" y2="7" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="">
                            <td colspan="6" align="center"><strong>Data Belum di tambahkan</strong></td>
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
    <div class="modal fade" id="modalNotification" tabindex="-100" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah data</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/'.$base.'/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="" class="lable">Dosen</label>
                            <select name="pegawai_id" id="" class="form-select">
                                <option value="">Pilih satu!!</option>
                                @forelse ($pegawai as $dosen)
                                <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                @empty
                                <option value="">--</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Jabatan</label>
                            <select name="jabatan" id="" class="form-select">
                                <option disabled selected value="">Pilih satu!!</option>
                                <option value="dekan">Dekan Fakultas</option>
                                <option value="wadek">Wakil Dekan</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Status</label>
                            <select name="status" id="" class="form-select">
                                <option disabled selected value="">Pilih satu!!</option>
                                <option value="aktiv">Aktiv</option>
                                <option value="tidak">Non-Aktiv</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Nomor</label>
                            <input type="text" name="urutan" class="form-control">
                            <p style="font-size: 13px" class="text-success">*info: Tambahkan angka apabila jabatan yang sama lebih dari 1 (jabatan yang sama > 1) </p>
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
            <form action="{{ url('/'.$base.'/'.$edit->id.'/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="" class="lable">Dosen</label>
                        <select name="pegawai_id" id="" class="form-select">
                            @forelse ($pegawai as $dosen)
                            <option {{ $edit->pegawai_id == $dosen->id ? 'selected' : '' }} value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                            @empty
                            <option value="">--</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Jabatan</label>
                        <select name="jabatan" id="" class="form-select">
                            <option {{ $edit->jabatan == 'dekan' ? 'selected' : '' }} value="dekan">Dekan Fakultas</option>
                            <option {{ $edit->jabatan == 'wadek' ? 'selected' : '' }} value="wadek">Wakil Dekan</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Status</label>
                        <select name="status" id="" class="form-select">
                            <option disabled selected value="">Pilih satu!!</option>
                            <option {{ $edit->status == 'aktiv' ? 'selected' : '' }} value="aktiv">Aktiv</option>
                            <option {{ $edit->status == 'tidak' ? 'selected' : '' }} value="tidak">Non-Aktiv</option>
                        </select>
                    </div>
                    @if ($edit->urutan != null)
                        <div class="mb-2">
                            <label for="" class="lable">Nomor</label>
                            <input type="text" value="{{ $edit->urutan }}" name="urutan" class="form-control">
                            <p style="font-size: 13px" class="text-success">*info: Tambahkan angka apabila jabatan yang sama lebih dari 1 (jabatan yang sama > 1) </p>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Perbaharui</button>
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
@include('select2')
@endsection
