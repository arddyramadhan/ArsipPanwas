@extends('master.dashboard.app')
@section('judul', 'Data Jabatan Jurusan')
@section('content')
@php
$base = 'pegawai_jurusan'
@endphp
@include('alert_error')
<div class="mb-2">
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#jurusan">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Jabatan Jurusan
        </button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#prodi">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Jabatan Prodi
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
                            <th class="border-0">Jurusan/Prodi</th>
                            <th class="border-0">Status</th>
                            <th class="border-0 text-center" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 0;
                        @endphp
                        @forelse($data_jurusan as $jurusan)
                        <tr>
                            <td valign="middle">{{ ++$no }}</td>
                            <td valign="middle">{{ $jurusan->pegawai->nama }}</td>
                            <td valign="middle">{{ $jurusan->jabatan == 'kajur' ? 'Kajur' : 'Sekjur' }}</td>
                            <td valign="middle">Jurusan {{ $jurusan->jurusan->nama}}</td>
                            <td valign="middle">{{ $jurusan->status == 'aktiv' ? 'Aktiv' : 'Non-Aktiv'}}</td>
                            <td valign="middle" align="center">
                                <div class="d-flex justify-content-between">
                                    <form action="{{ url('./'.$base.'/jurusan/'.$jurusan->id.'/set') }}" method="post">
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
                                    {{-- <button data-bs-toggle="modal" data-bs-target="#editjurusan{{ $jurusan->id }}" class="badge bg-success mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                        <line x1="16" y1="5" x2="19" y2="8" />
                                    </svg>
                                    </button> --}}
                                    <button data-bs-toggle="modal" data-bs-target="#deletejurusan{{ $jurusan->id }}" class="badge bg-danger">
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
                        @endforelse

                        @forelse($data_prodi as $prodi)
                        <tr>
                            <td valign="middle">{{ ++$no }}</td>
                            <td valign="middle">{{ $prodi->pegawai->nama }}</td>
                            <td valign="middle">{{ $prodi->jabatan }}</td>
                            <td valign="middle">Prodi {{ $prodi->program_studi->nama }}</td>
                            <td valign="middle">{{ $prodi->status == 'aktiv' ? 'Aktiv' : 'Non-Aktiv'}}</td>
                            <td valign="middle" align="center">
                                <div class="d-flex justify-content-between">
                                    <form action="{{ url('./'.$base.'/prodi/'.$prodi->id.'/set') }}" method="post">
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
                                    {{-- <button data-bs-toggle="modal" data-bs-target="#editprodi{{ $prodi->id }}" class="badge bg-success mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                        <line x1="16" y1="5" x2="19" y2="8" />
                                    </svg>
                                    </button> --}}
                                    <button data-bs-toggle="modal" data-bs-target="#deleteprodi{{ $prodi->id }}" class="badge bg-danger">
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
    <div class="modal fade" id="jurusan" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah data</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/'.$base.'/jurusan/store') }}" method="POST" enctype="multipart/form-data">
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
                                <option value="kajur">Kajur</option>
                                <option value="sekjur">Sekjur</option>
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Content -->
    <div class="modal fade" id="prodi" tabindex="-100" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah data</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/'.$base.'/prodi/store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="" class="lable">Program studi</label>
                            <select name="program_studi_id" id="" class="form-select">
                                <option value="">Pilih satu!!</option>
                                @forelse ($program_studi as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @empty
                                <option value="">--</option>
                                @endforelse
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ! Edit --}}
    @forelse($data_jurusan as $editjurusan)
    <div class="modal fade" id="editjurusan{{ $editjurusan->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Perbaharui Data</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/'.$base.'/jurusan/'.$editjurusan->id.'/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="" class="lable">Dosen</label>
                            <select name="pegawai_id" id="" class="form-select">
                                @forelse ($pegawai as $dosen)
                                <option {{ $editjurusan->pegawai_id == $dosen->id ? 'selected' : '' }} value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                @empty
                                <option value="">--</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Jabatan</label>
                            <select name="jabatan" id="" class="form-select">
                                <option {{ $editjurusan->jabatan == 'kajur' ? 'selected' : '' }} value="dekan">Kajur</option>
                                <option {{ $editjurusan->jabatan == 'sekjur' ? 'selected' : '' }} value="wadek">Sekjur</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Status</label>
                            <select name="status" id="" class="form-select">
                                <option disabled selected value="">Pilih satu!!</option>
                                <option {{ $editjurusan->status == 'aktiv' ? 'selected' : '' }} value="aktiv">Aktiv</option>
                                <option {{ $editjurusan->status == 'tidak' ? 'selected' : '' }} value="tidak">Non-Aktiv</option>
                            </select>
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

    {{-- ! Edit --}}
    @forelse($data_prodi as $editprodi)
    <div class="modal fade" id="editprodi{{ $editprodi->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Perbaharui Data</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/'.$base.'/prodi/'.$editprodi->id.'/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="" class="lable">Dosen</label>
                            <select name="pegawai_id" id="" class="form-select">
                                @forelse ($pegawai as $dosen)
                                <option {{ $editprodi->pegawai_id == $dosen->id ? 'selected' : '' }} value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                @empty
                                <option value="">--</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Status</label>
                            <select name="status" id="" class="form-select">
                                <option disabled selected value="">Pilih satu!!</option>
                                <option {{ $editprodi->status == 'aktiv' ? 'selected' : '' }} value="aktiv">Aktiv</option>
                                <option {{ $editprodi->status == 'tidak' ? 'selected' : '' }} value="tidak">Non-Aktiv</option>
                            </select>
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

    {{-- ! delete --}}
    @forelse($data_jurusan as $delete_jurusan)
    <div class="modal fade" id="deletejurusan{{ $delete_jurusan->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Ubah Data </p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/'.$base.'/jurusan/'.$delete_jurusan->id.'/delete') }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <center>
                            <h3>Yakin ingin menghapus data ini?
                            </h3>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @empty
    @endforelse

</div>
{{-- @include('select2') --}}
@endsection
