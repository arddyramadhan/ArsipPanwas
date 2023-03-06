@extends('master.dashboard.app')
@section('judul', 'Daftar Dosen yang belum di sinkrnisasi')
@section('content')
@php
$base = 'dashboard'
@endphp
@if ($data)
<div class="mb-2">
    <form action="{{ url('/'.$base.'/sinkron') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <input type="hidden" name="jurusan_id" value="{{ $jurusan_id }}">
            <input type="hidden" name="jurusan_sidapro" value="{{ $jurusan_sidapro }}">
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mx-1" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3.5 5.5l1.5 1.5l2.5 -2.5" />
                    <path d="M3.5 11.5l1.5 1.5l2.5 -2.5" />
                    <path d="M3.5 17.5l1.5 1.5l2.5 -2.5" />
                    <line x1="11" y1="6" x2="20" y2="6" />
                    <line x1="11" y1="12" x2="20" y2="12" />
                    <line x1="11" y1="18" x2="20" y2="18" />
                </svg>
                Sinkron sekarang
            </button>
        </div>
    </form>
</div>
@endif
<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="" class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Nama</th>
                            <th class="border-0">NIP</th>
                            <th class="border-0">NIDN</th>
                            <th class="border-0">Jenis Kelamin</th>
                            <th class="border-0">Email</th>
                            <th class="border-0">Telp</th>
                            <th class="border-0">Pendidikan</th>
                            <th class="border-0">Tanggal Lahir</th>
                            <th class="border-0">Tempat Lahir</th>
                            <th class="border-0">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $no => $item)
                        <tr>
                            <td valign="middle">{{ ++$no }}</td>
                            <td valign="middle">{{ $item['nama'] }}</td>
                            <td valign="middle">{{ $item['nip'] }}</td>
                            <td valign="middle">{{ $item['nidn'] }}</td>
                            <td valign="middle">{{ $item['jk'] == 'P' ? 'Perempuan' : 'Laki-laki'}}</td>
                            <td valign="middle">{{ $item['email'] }}</td>
                            <td valign="middle">{{ $item['hp'] }}</td>
                            <td valign="middle">{{ $item['pendidikan'] }}</td>
                            <td valign="middle">{{ $item['tgl_lahir'] }}</td>
                            <td valign="middle">{{ $item['tempat_lahir'] }}</td>
                            <td valign="middle">{{ $item['alamat'] }}</td>
                        </tr>
                        @empty
                        <tr class="">
                            <td colspan="11" align="center"><strong>Tidak ditemukan dosen baru untuk di sinkronisasi ke sistem</strong></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="dosen" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ url('/'.$base.'/cekSinkron') }}" method="POST" enctype="multipart/form-data">
    <div class="modal-header">
        <p class="modal-title" id="modalTitleNotify">Tambah data Operator</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        @csrf
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
</div> --}}

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
{{-- </div>
    @empty
    @endforelse --}}
{{-- ! delete --}}
{{-- @forelse($data as $delete)
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
@endforelse --}}
</div>
@include('datatable')
@endsection
