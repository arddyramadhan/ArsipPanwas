@extends('master.dashboard.app')
@section('judul', 'Detail Matakuliah')
@section('content')
@php
$base = 'matakuliah'
@endphp
<div>
    <div class="d-flex justify-content-end pb-2">
        {{-- <ol class="breadcrumb breadcrumb-arrows" style="font-size: 17px" aria-label="breadcrumbs">
            <li class="breadcrumb-item {{ Request::segment(4) == 'matakuliah' ? 'active' : '' }}"><a href="{{ url('./'.$base.'/'.$matakuliah->id.'/show/matakuliah') }}">Matakuliah</a></li>
        <li class="breadcrumb-item {{ Request::segment(4) == 'capaian' ? 'active' : '' }}"><a href="{{ url('./'.$base.'/'.$matakuliah->id.'/show/capaian') }}">Capaian Pembelajaran</a></li>
        <li class="breadcrumb-item {{ Request::segment(4) == 'rencana' ? 'active' : '' }}" aria-current="page"><a href="{{ url('./'.$base.'/'.$matakuliah->id.'/show/rencana') }}">Rencana Pembelajaran</a></li>
        </ol> --}}
        @if (Auth::user()->hasRole('operator'))
        <a href="{{ url('/'.$base.'/'.$matakuliah->id.'/edit') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                <line x1="16" y1="5" x2="19" y2="8" />
            </svg>
            Perbaharui
        </a>
        @endif
    </div>
    @include('alert_error')
    <div class="page-body">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card card-sm">
                    <div class="card-status-top bg-green"></div>
                    <div class="card-body">
                        <h2 class="card-title">Detail Mata kuliah</h2>
                        <div class="mt-1">
                            <div class="row mb-2">
                                <div class="col-md-2">Kode Mata kuliah</div>
                                <div class="col-md-10 bold">: {{ strtoupper($matakuliah->kode).'-'.$matakuliah->jenjang.'-'.$matakuliah->urutan.'-'.$matakuliah->semester.'-'.$matakuliah->sks }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Nama Mata kuliah</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->nama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Rumpun Mata kuliah</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->rumpun->nama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Koordinator RMK</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->pegawai->nama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Semester</div>
                                <div class="col-md-10 bold">: Semester {{ $matakuliah->semester }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">SKS Matakuliah</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->sks }} SKS</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Bobot SKS Teori</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->teori }} (teori)</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Bobot SKS Praktek</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->praktek }} (praktek)</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Bobot SKS Lapangan</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->lapangan }} (lapangan)</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Jenis Mata kuliah</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->jenis->nama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Kurikulum</div>
                                <div class="col-md-10 bold">:
                                    @forelse ($matakuliah->kurikulum as $no => $item)
                                    @php
                                    ++$no
                                    @endphp
                                    {{ $no > 1 ? ' | '.$item->nama : $item->nama }}
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Program Studi</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->program_studi->nama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Deskripsi</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->deskripsi }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Mata Kuliah Persyaratan</div>
                                <div class="col-md-10 bold">: {{ $matakuliah->mk_persyaratan }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">Pengembang RPS </div>
                                <div class="col-md-10 bold">
                                    <ol>
                                        @forelse ($matakuliah->pegawai_rps as $no => $rps)
                                        @php
                                        ++$no
                                        @endphp
                                        <li>
                                            {{ $rps->nama }}
                                        </li>
                                        @empty
                                        @endforelse
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @push('footer')

@endpush
@include('tinymce')
@include('select2')
@include('datatable') --}}
@endsection
