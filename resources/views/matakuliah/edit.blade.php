@extends('master.dashboard.app')
@php
    $mk = $matakuliah->nama;
@endphp
@section('judul', 'Pembaharuan Mata Kuliah '.$mk)
@section('content')
@php
$base = 'matakuliah'
@endphp
@include('alert_error')
<div>
    <form class="row row-cards" action="{{ url('/'.$base.'/'.$matakuliah->id.'/update') }}" method="post">
        @csrf
        @method('patch')
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Pembaharuan Mata Kuliah</h3>
                </div>
                <div class="card-body">
                    <label class="form-label">Kode Mata Kuliah</label>
                    <div class="d-flex">
                        {{-- <div class="row col-md-12"> --}}
                        <div class="col-md-4 ">
                            <input type="text" class="form-control text-center" name="kode" placeholder="Kode" value="{{ $matakuliah->kode }}">
                        </div>
                        <div class="col-md-2  px-1">
                            {{-- <input type="text" class="form-control text-center" name="example" placeholder=""  value=""> --}}
                            @if (Auth::user()->pegawai->status == 'dosen')
                            <select class="form-select text-center" name="jenjang">
                                {{-- <option value="" selected disabled>--</option> --}}
                                <option {{ $matakuliah->program_studi->jurusan->jenjang == 's1' ? 'selected' : 'disabled'}} value="6">S1</option>
                                <option {{ $matakuliah->program_studi->jurusan->jenjang == 's2' ? 'selected' : 'disabled'}} value="8">S2</option>

                            </select>
                            @else
                            <select class="form-select text-center" name="jenjang">
                                <option value="6" {{ Auth::user()->pegawai->jurusan->jenjang == 's1' ? 'selected' : 'disabled' }}>S1</option>
                                <option value="8" {{ Auth::user()->pegawai->jurusan->jenjang == 's2' ? 'selected' : 'disabled'}}>S2</option>
                            </select>
                            @endif
                        </div>
                        <div class="col-md-2 ">
                            <input type="text" class="form-control text-center" name="urutan" placeholder="" value="{{ $matakuliah->urutan }}">

                        </div>
                        <div class="col-md-2  px-1">
                            <input type="number" min="0" max="8" value="{{ $matakuliah->semester }}" class="form-control text-center" name="semester" placeholder="">

                            <span class="text-info" style="font-size: 10px">*Semester</span>
                        </div>
                        <div class="col-md-2 ">
                            <input type="number" min="0" value="{{ $matakuliah->sks }}" max="4" class="form-control text-center" name="sks" placeholder="">

                            <span class="text-info" style="font-size: 10px">*SKS</span>
                        </div>
                        {{-- </div> --}}
                    </div>
                    <div class="d-flex col-md-12">
                        {{-- <div class="row col-md-12"> --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label">SKS Teori</label>
                            <input type="text" min="0" max="4" value="{{ $matakuliah->teori }}" class="form-control" name="teori" placeholder="Teori">

                        </div>
                        <div class="col-md-4 mb-3 px-2">
                            <label class="form-label">SKS Praktek</label>
                            <input type="text" min="0" max="4" class="form-control" value="{{ $matakuliah->praktek }}" name="praktek" placeholder="Praktek">

                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">SKS Lapangan</label>
                            <input type="text" min="0" max="4" class="form-control" value="{{ $matakuliah->lapangan }}" name="lapangan" placeholder="Lapangan">
                        </div>
                        {{-- </div> --}}
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" value="{{ $matakuliah->nama }}" name="nama" placeholder="Nama">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Mata Kuliah</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="form-label">Jenis Mata Kuliah</div>
                        <select class="form-select" name="jenis_id">
                            <option value="" selected disabled>Pilih satu</option>
                            @forelse ($jenis as $item)
                            <option {{ $matakuliah->jenis_id == $item->id  ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <div class="form-label">Rumpun Mata Kuliah</div>
                        <select class="form-select" name="rumpun_id">
                            <option value="" selected disabled>Pilih satu</option>
                            @forelse ($rumpun as $item)
                            <option {{ $matakuliah->rumpun_id == $item->id  ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Koordinator RMK</div>
                        <select class="form-select select2bs4" name="pegawai_id" >
                            <option value="" selected disabled>Pilih satu</option>
                            @forelse ($pegawai as $item)
                            <option {{ $matakuliah->pegawai_id == $item->id  ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Mata Kuliah</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="form-label">Kurikulum</div>
                        <div>
                            @forelse ($kurikulum as $item)
                            <label class="form-check form-check-inline">
                                <input {{ $matakuliah->matakuliah_kurikulum->where('kurikulum_id', $item->id)->count() > 0 ? 'checked' : ''}} class="form-check-input" value="{{ $item->id }}" name="kurikulum[]" type="checkbox">
                                <span class="form-check-label">{{ $item->nama }} </span>
                            </label>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Pengembang RPS</div>
                        <select class="form-select select2bs4" name="pegawai_rps[]" multiple>
                            @forelse ($pegawai as $item)
                                <option {{ $matakuliah->pegawai_rps->where('id', $item->id)->count() > 0 ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah Persyaratan</label>
                        <input type="text" class="form-control" value="{{ $matakuliah->mk_persyaratan }}" name="mk_persyaratan" placeholder="Mata Kuliah Persyaratan">
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Program Studi</div>
                        <select class="form-select" name="program_studi_id">
                            <option value="" selected disabled>Pilih satu</option>
                            @forelse ($program_studi as $item)
                            <option {{ $matakuliah->program_studi_id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Mata Kuliah</label>
                        <textarea type="text" rows="4" cols="30" class="form-control" name="deskripsi" placeholder="Deskripsi">{{ $matakuliah->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/'.$base.'/'.$matakuliah->id.'/show') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Pembaharuan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- </div> --}}
</div>
@include('select2')
@endsection
