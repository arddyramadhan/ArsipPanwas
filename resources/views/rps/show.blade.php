@extends('master.dashboard.app')
@section('judul', 'Rencana Pembelajaran Semester')
@section('content')
@php
$base = 'rps'
@endphp
@push('jshead')
@if (Request::segment(5) == 'lainnya')
<script>
    window.onload = function() {
        var el = document.getElementById('lainnya');
        el.scrollIntoView(true);
    }
</script>
@endif
@if (Request::segment(5) == 'cpmk')
<script>
    window.onload = function() {
        var el = document.getElementById('cpmk');
        el.scrollIntoView(true);
    }

</script>
@endif
@endpush
<div>
    <div class="d-flex justify-content-between pb-2">
        <ol class="breadcrumb breadcrumb-arrows" style="font-size: 17px" aria-label="breadcrumbs">
            <li class="breadcrumb-item {{ Request::segment(4) == 'matakuliah' ? 'active' : '' }}"><a href="{{ url('./'.$base.'/'.$matakuliah->id.'/show/matakuliah') }}">Matakuliah</a></li>
            <li class="breadcrumb-item {{ Request::segment(4) == 'capaian' ? 'active' : '' }}"><a href="{{ url('./'.$base.'/'.$matakuliah->id.'/show/capaian') }}">Capaian Pembelajaran</a></li>
            <li class="breadcrumb-item {{ Request::segment(4) == 'rencana' ? 'active' : '' }}" aria-current="page"><a href="{{ url('./'.$base.'/'.$matakuliah->id.'/show/rencana') }}">Rencana Pembelajaran</a></li>
        </ol>
        <a href="{{ url('/'.$base.'/'.$matakuliah->id.'/rps_pdf') }}" target="__blank" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                <rect x="7" y="13" width="10" height="8" rx="2" />
            </svg>
            Cetak RPS
        </a>
    </div>
    @include('alert_error')
    <div class="page-body">
        @if (Request::segment(4) == 'matakuliah')
        @include('rps.matakuliah')
        @endif
        @if (Request::segment(4) == 'capaian')
        @include('rps.capaian')
        @endif
        @if (Request::segment(4) == 'rencana')
        @include('rps.rencana')
        @endif
    </div>

    {{-- ! modal CPMK --}}
    <div class="modal fade" id="modalNotification" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah data CPMK & Sub-CPMK</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/'.$base.'/'.$matakuliah->id.'/cpmk') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="" class="lable">
                                <h3>CPMK</h3>
                            </label>
                            <textarea name="deskripsi" id="" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="lable">
                                <h3>Sub - CPMK</h3>
                            </label>
                            <textarea name="sub_deskripsi" id="" cols="30" rows="5" class="mytextarea form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ! modal rencana pembelajaran --}}
    <div class="modal fade" id="buat_rencana" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah Rencana Kegiatan Pembelajaran</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/rencana_pembelajaran/'.$matakuliah->id.'/store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="lable">
                                <h3>Kemampuan akhir tiap tahapan belajar (Sub-CPMK)</h3>
                            </label>
                            <textarea name="tahap_belajar" id="" cols="30" rows="2" class="forsm-control mytextarea"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="lable">
                                <h3>Indikator</h3>
                            </label>
                            <textarea name="indikator" id="" cols="30" rows="2" class="form-control mytextarea"></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="" class="lable">
                                    <h3>Kriteria</h3>
                                </label>
                                <textarea name="kriteria" id="" cols="30" rows="2" class="form-control mytextarea"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="lable">
                                    <h3>Bentuk</h3>
                                </label>
                                <textarea name="bentuk" id="" cols="30" rows="2" class="form-control mytextarea"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            {{-- !Luring --}}
                            <div class="col-md-6 pr-3 border">
                                <label for="" class="lable">
                                    <h3>Luring</h3>
                                </label>
                                <div class="mb-3">
                                    <label for="" class="lable bold">
                                        Karakteristik Pembelajaran (Luring)
                                    </label>
                                    <br>
                                    @forelse ($karakteristik as $item)
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" value="{{ $item->id }}" name="karakteristik[]" type="checkbox">
                                        <span class="form-check-label">{{ $item->nama }}</span>
                                    </label>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="mb-3">
                                    <label for="" class="lable bold">
                                        Bentuk Pembelajaran (Luring)
                                    </label>
                                    <br>
                                    @forelse ($bentuk as $item)
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" value="{{ $item->id }}" name="bentuk_pembelajaran[]" type="checkbox">
                                        <span class="form-check-label">{{ $item->nama }}</span>
                                    </label>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="mb-3">
                                    <label for="" class="lable bold">
                                        Metode Pembelajaran (Luring)
                                    </label>
                                    <br>
                                    @forelse ($metode_pembelajaran as $item)
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" value="{{ $item->id }}" name="metode_pembelajaran[]" type="checkbox">
                                        <span class="form-check-label">{{ $item->nama }}</span>
                                    </label>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="" class="lable bold">
                                        Penugasan Mahasiswa (Luring)
                                    </label>
                                    <textarea name="penugasan_luring" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                            {{-- !Daring --}}
                            <div class="col-md-6 border">
                                <label for="" class="lable">
                                    <h3>Daring</h3>
                                </label>
                                <div class="mb-3">
                                    <label for="" class="lable bold">
                                        Karakteristik Pembelajaran (Daring)
                                    </label>
                                    <br>
                                    @forelse ($karakteristik as $item)
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" value="{{ $item->id }}" name="karakteristik_daring[]" type="checkbox">
                                        <span class="form-check-label">{{ $item->nama }}</span>
                                    </label>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="mb-3">
                                    <label for="" class="lable bold">
                                        Bentuk Pembelajaran (Daring)
                                    </label>
                                    <br>
                                    @forelse ($bentuk as $item)
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" value="{{ $item->id }}" name="bentuk_pembelajaran_daring[]" type="checkbox">
                                        <span class="form-check-label">{{ $item->nama }}</span>
                                    </label>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="mb-3">
                                    <label for="" class="lable bold">
                                        Metode Pembelajaran (Daring)
                                    </label>
                                    <br>
                                    @forelse ($metode_pembelajaran as $item)
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" value="{{ $item->id }}" name="metode_pembelajaran_daring[]" type="checkbox">
                                        <span class="form-check-label">{{ $item->nama }}</span>
                                    </label>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="lable bold">
                                        Penugasan Mahasiswa (Daring)
                                    </label>
                                    <textarea name="penugasan_daring" id="" cols="30" rows="5" class="form-control"></textarea>
                                    <p class="text-green">*info : Kosongkan (Daring) apabula ingin menggunakan inputan yang sama pada (Luring)</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="" class="lable">
                                    <h3>Materi Pembelajaran</h3>
                                </label>
                                <textarea name="materi" id="" class="form-control" cols="30" rows="5" placeholder="Materi Pembelajaran Mahasiswa"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="lable">
                                    <h3>Bobot</h3>
                                </label>
                                <input type="number" name="bobot" id="" class="form-control">
                            </div>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="" class="lable">
                                <h3>Sub - CPMK</h3>
                            </label>
                            <textarea name="sub_deskripsi" id="" cols="30" rows="5" class="mytextarea form-control"></textarea>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-md btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ! Edit --}}
    @forelse($matakuliah->cpmk as $edit)
    <div class="modal fade" id="edit{{ $edit->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Perbaharui Data</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/'.$base.'/'.$edit->id.'/cpmk_update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group mt-2">
                            <label for="" class="lable">
                                <h3>Urutan</h3>
                            </label>
                            <input type="number" name="urutan" id="" min="0" max="{{ $matakuliah->cpmk->count() }}" value="{{ $edit->urutan ?? old('urutan')}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="lable">
                                <h3>CPMK</h3>
                            </label>
                            <textarea name="deskripsi" id="" cols="30" rows="2" class="form-control">{{ $edit->deskripsi ?? old('deskripsi')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="lable">
                                <h3>Sub - CPMK</h3>
                            </label>
                            <textarea name="sub_deskripsi" id="" cols="30" rows="5" class="mytextarea form-control">{{ $edit->sub_deskripsi ?? old('sub_deskripsi')}}</textarea>
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
    @forelse($matakuliah->cpmk as $delete)
    <div class="modal fade" id="delete{{ $delete->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Hapus Data! </p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <h3>Yakin ingin menghapus data ini?
                        </h3>
                    </center>
                    <form action="{{  url('./'.$base.'/'.$delete->id.'/cpmk_delete')  }}" method="POST">
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
@push('footer')
{{-- @if (Request::segment(5) == 'lainnya')
<script>
    window.onload = function() {
        var el = document.getElementById('lainnya');
        el.scrollIntoView(true);
    }
</script>
@endif
@if (Request::segment(5) == 'cpmk')
<script>
    window.onload = function() {
        var el = document.getElementById('cpmk');
        el.scrollIntoView(true);
    }
</script>
@endif --}}

@endpush
@include('tinymce')
@include('select2')
@include('datatable')
@endsection
