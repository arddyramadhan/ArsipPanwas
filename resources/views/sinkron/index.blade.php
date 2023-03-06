@extends('master.dashboard.app')
@section('judul', 'Manajemen User')
@section('content')
@php
$base = 'dashboard'
@endphp
@include('alert_error')
<div class="mb-2">
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#dosen">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Sinkron
        </button>
    </div>
</div>
<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="mytable" class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Nama</th>
                            <th class="border-0">NIP</th>
                            <th class="border-0">Jenis Kelamin</th>
                            <th class="border-0">Telp</th>
                            <th class="border-0">Akses</th>
                            <th class="border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $no => $item)
                        <tr>
                            <td valign="middle">{{ ++$no }}</td>
                            <td valign="middle">{{ $item->nama }}</td>
                            <td valign="middle">{{ $item->nip }}</td>
                            <td valign="middle">{{ $item->jk == 'P' ? 'Perempuan' : 'Laki-laki'}}</td>
                            <td valign="middle">{{ $item->hp }}</td>
                            <td valign="middle">
                                @if ($item->status == 'dosen')
                                <span class="badge badge-sm bg-success">Dosen</span>
                                @if ($item->user->hasRole('operator'))
                                <span class="badge badge-sm bg-primary">Operator (All)</span>
                                @endif
                                @endif
                                @if ($item->status == 'operator')
                                <span class="badge badge-sm bg-primary">Operator ({{ $item->jurusan->nama }}) </span>
                                @endif
                            </td>
                            <td valign="middle" align="center">
                                <a href="{{ url('./'.$base.'/'.$item->id) }}" class="badge bg-info">
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
                        {{-- <tr class="">
                                <td colspan="4" align="center"><strong>Data Belum di tambahkan</strong></td>
                            </tr> --}}
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dosen" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ url('/'.$base.'/cekSinkron') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <p class="modal-title" id="modalTitleNotify">Tambah data Operator</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        {{-- <div class="mb-2">
                            <label for="" class="lable">Info : Pilih jurusan</label>
                        </div>                         --}}
                        <div class="mb-2">
                            <label for="" class="lable">Jurusan Sidapro</label>
                            <select name="jurusan_sidapro" id="" class="form-control" required>
                                <option value="" disabled selected>Pilih satu.!</option>
                                @forelse ($jurusan_sidapro->data as $sidapro)
                                <option value="{{ $sidapro->id }}">{{ $sidapro->department_name }}</option>
                                @empty
                                @endforelse
                            </select>
                            <p class="text-info">info: Pilih Jurusan yang ada pada sidapro</p>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Jurusan Kurikulum</label>
                            <select name="jurusan_id" id="" class="form-control" required>
                                <option value="" disabled selected>Pilih satu.!</option>
                                @forelse ($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @empty
                                @endforelse
                            </select>
                            <p class="text-info">info: Pilih Jurusan yang ingin ditambahkan data dosen</p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cek Data Dosen</button>
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
                <div class="modal-body">
                    <form action="{{ url('./'.$base.'/'.$edit->id.'/update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mt-2">
                            <label for="" class="lable">Nama</label>
                            <input type="text" name="nama" id="" value="{{ $edit->nama ?? old('nama')}}" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="lable">Alamat</label>
                            <input type="text" name="alamat" id="" value="{{ $edit->alamat ?? old('alamat')}}" class="form-control">
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
    @endforelse
    {{-- ! delete --}}
    @forelse($data as $delete)
    <div class="modal fade" id="delete{{ $delete->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Hapus data</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{  url('./'.$base.'/'.$delete->id.'/delete')  }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <center>
                            <h5>Yakin ingin menghapus data ini?
                            </h5>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @empty

    @endforelse
</div>
@include('datatable')
@endsection
