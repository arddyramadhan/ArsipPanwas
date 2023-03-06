@extends('master.dashboard.app')
@section('judul', 'Data Program Studi')
@section('content')
@php
$base = 'program_studi'
@endphp
@include('alert_error')
<div class="mb-2">
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNotification">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Program Studi
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
                            <th class="border-0">Ketua Prodi</th>
                            <th class="border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $no => $item)
                        <tr>
                            <td valign="middle">{{ ++$no }}</td>
                            <td valign="middle">{{ $item->nama }}</td>
                            <td valign="middle">{{ $item->ketua_prodi ? $item->ketua_prodi->pegawai->nama : 'Belum di tentukan'}}</td>
                            <td valign="middle" align="center">
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
                            <td colspan="4" align="center"><strong>Data Belum di tambahkan</strong></td>
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
                    <p class="modal-title" id="modalTitleNotify">Tambah data program studi</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/program_studi/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="" class="lable">Nama Program Studi</label>
                            <input type="text" name="nama" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Kode Program Studi</label>
                            <input type="text" name="kode" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Akreditas / Nomor Akreditas</label>
                            <input type="text" name="akreditas" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Tanggal Berdiri</label>
                            <input type="date" value="{{ date('Y-m-d') }}" name="tgl_berdiri" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Pejabat Penandatangan SK Pendirian Prodi</label>
                            <input type="text" name="penandatangan_sk" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Bulan dan tahun dimulainya penyelenggaraan Prodi</label>
                            <input type="month" value="{{ date('Y-m') }}" name="bulan_tahun_prodi" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">SK Penyelenggara</label>
                            <input type="text" name="sk_penyelenggaraan" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Kode Pos</label>
                            <input type="text" name="pos" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Telepon</label>
                            <input type="text" name="tlp" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Faximile</label>
                            <input type="text" name="fax" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Website</label>
                            <input type="text" name="web" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Deskripsi</label>
                            <textarea name="deskripsi" id="" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Visi</label>
                            <textarea name="visi" id="" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Misi</label>
                            <textarea name="misi" id="" cols="30" rows="10" class="form-control mytextarea"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Kompetensi Lulusan</label>
                            <textarea name="kompetensi_lulusan" id="" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Tujuan Program Studi</label>
                            <textarea name="tujuan_prodi" id="" cols="30" rows="10" class="form-control mytextarea"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Strategi Pencapaian</label>
                            <textarea name="strategi_pencapaian" id="" cols="30" rows="10" class="form-control mytextarea"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ! Lihar --}}
    @forelse($data as $lihat)
    <div class="modal fade" id="lihat{{ $lihat->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Detail Data Prodi</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td width="30%" valign="top">
                                Nama Program Studi
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->nama }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Kode Program Studi
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->kode }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Akreditas / Nomor Akreditas
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->akreditas }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Tanggal Berdiri
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ date('Y-m-d', strtotime($lihat->tgl_berdiri)) }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Pejabat Penandatangan SK Pendirian Prodi
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{$lihat->penandatangan_sk }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Bulan dan tahun dimulainya penyelenggaraan Prodi
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ date('Y-m' ,strtotime($lihat->bulan_tahun_prodi)) }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Sk Penyelenggaraan
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->sk_penyelenggaraan}}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Alamat
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->alamat }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Kode Pos
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->pos }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Telepon
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->tlp }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Faximile
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->fax }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Email
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->email }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Deskripsi
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->deskripsi }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Visi
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->visi }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Misi
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {!! $lihat->misi !!}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Kompetensi Lulusan
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {{ $lihat->kompetensi_lulusan }}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Tujuan Prodi
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto">
                                {!! $lihat->tujuan_prodi !!}
                            </th>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                Strategi Pencapaian
                            </td>
                            <td width="1%" valign="top">
                                :
                            </td>
                            <th valign="top" width="auto" >
                                {!! $lihat->strategi_pencapaian !!}
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <a target="__blank" href="{{ url('/program_studi/'.$lihat->id.'/cetak') }}" class="btn btn-info">Cetak Dokumen Program Studi</a>
                </div>
            </div>
        </div>
    </div>
    @empty
    @endforelse

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
                    {{-- <form action="{{ url('/program_studi/store') }}" method="POST" enctype="multipart/form-data"> --}}
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="" class="lable">Nama Program Studi</label>
                            <input type="text" name="nama" value="{{ $edit->nama }}" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Kode Program Studi</label>
                            <input type="text" name="kode" value="{{ $edit->kode }}" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Akreditas / Nomor Akreditas</label>
                            <input type="text" name="akreditas" value="{{ $edit->akreditas }}" id="" class="form-control">

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Tanggal Berdiri</label>
                            <input type="date" value="{{ date('Y-m-d', strtotime($edit->tgl_berdiri)) }}" name="tgl_berdiri" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Pejabat Penandatangan SK Pendirian Prodi</label>
                            <input type="text" name="penandatangan_sk" value="{{ $edit->penandatangan_sk }}" id="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Bulan dan tahun dimulainya penyelenggaraan Prodi</label>
                            <input type="month" value="{{ date('Y-m' ,strtotime($edit->bulan_tahun_prodi)) }}" name="bulan_tahun_prodi" id="" class="form-control">

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">SK Penyelenggara</label>
                            <input type="text" name="sk_penyelenggaraan" value="{{ $edit->sk_penyelenggaraan }}" id="" class="form-control">

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $edit->alamat }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Kode Pos</label>
                            <input type="text" name="pos" value="{{ $edit->pos}}" id="" class="form-control">

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Telepon</label>
                            <input type="text" name="tlp" value="{{ $edit->tlp}}" id="" class="form-control">

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Faximile</label>
                            <input type="text" name="fax" value="{{ $edit->fax }}" id="" class="form-control">

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Email</label>
                            <input type="email" name="email" value="{{ $edit->email }}" id="" class="form-control">

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Website</label>
                            <input type="text" name="web" id="" value="{{ $edit->web }}" class="form-control">

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Deskripsi</label>
                            <textarea name="deskripsi" id="" cols="30" rows="7" class="form-control">{{ $edit->deskripsi }}</textarea>

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Visi</label>
                            <textarea name="visi" id="" cols="30" rows="7" class="form-control">{{ $edit->visi }}</textarea>

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Misi</label>
                            <textarea name="misi" id="" cols="30" rows="10" class="form-control mytextarea">{{ $edit->misi }}</textarea>

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Kompetensi Lulusan</label>
                            <textarea name="kompetensi_lulusan" id="" cols="30" rows="7" class="form-control">{{ $edit->kompetensi_lulusan }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Tujuan Program Studi</label>
                            <textarea name="tujuan_prodi" id="" cols="30" rows="10" class="form-control mytextarea">{{ $edit->tujuan_prodi }}</textarea>

                        </div>
                        <div class="mb-2">
                            <label for="" class="lable">Strategi Pencapaian</label>
                            <textarea name="strategi_pencapaian" id="" cols="30" rows="10" class="form-control mytextarea">{{ $edit->strategi_pencapaian }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Pembaharuan</button>
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
                        <h3>Yakin ingin menghapus data ini?
                        </h3>
                    </center>
                    <form action="{{ url('/'.$base.'/'.$delete->id.'/delete') }}" method="POST">
                        @csrf
                        @method('delete')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    @endforelse
</div>
@include('tinymce')
@endsection
