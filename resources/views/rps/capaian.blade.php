{{-- @if (Request::segment(4) == 'capaian') --}}
<div class="container">
    <h2 class="mb-3">Capaian Pembelajaran</h2>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card card-sm">
                <div class="card-status-top bg-primary"></div>
                <div class="card-body">
                    <h3 class="card-title">Capaian Pembelajaran Lulusan (CPL)</h3>
                    <div class="mt-2">
                        <form action="{{ url('/'.$base.'/'.$matakuliah->id.'/cpl') }}" method="post">
                            @csrf
                            @method('patch')
                            <div>
                                @php
                                $isi = null;
                                @endphp
                                @forelse ($capaian_lulusan as $item)
                                @if ($isi != $item->profil_lulusan->nama)
                                <h4 class="mt-2">{{ $isi = $item->profil_lulusan->nama }}</h4>
                                @endif
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" value="{{ $item->id }}" {{ $matakuliah->cpl->where('capaian_lulusan_id', $item->id)->count() > 0 ? 'checked' : '' }} name="capaian_lulusan[]" type="checkbox">
                                    <span class="form-check-label">{{ '('.$item->profil_lulusan->singkatan.'-'.$item->urutan.')' }} {{ $item->deskripsi }}</span>
                                </label><br>
                                @empty
                                @endforelse
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                                    </svg>
                                    Simpan CPL
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cards mt-2">
        <div class="col-12">
            <div id="cpmk" class="card card-sm">
                <div class="card-status-top bg-green"></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title ">Capaian Pembelajaran Matakuliah</h3>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNotification">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <rect x="7" y="13" width="10" height="8" rx="2" />
                            </svg>
                            Tambah CPMK
                        </button>
                    </div>
                    <div class="mt-2">
                        <table width="100%">
                            <tr>
                                <th colspan="4">
                                    CPMK
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4" style="border-top: 1px solid darkgray">
                                </th>
                            </tr>
                            @forelse ($matakuliah->cpmk as $no => $cpmk)
                            <tr>
                                <td width="15%" valign="top">

                                    CPMK {{ $cpmk->urutan }}

                                </td>
                                <td width="1%" valign="top">
                                    :
                                </td>
                                <td width="auto" valign="top">
                                    {{ $cpmk->deskripsi }}
                                </td>
                                <td width="6%" valign="top">
                                    <div class="d-flex justify-content-between">
                                        <a data-bs-toggle="modal" data-bs-target="#edit{{ $cpmk->id }}" class="badge bg-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#delete{{ $cpmk->id }}" class="badge bg-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                            {{-- <tr>
                                        <th colspan="3" style="border-top: 1px solid darkgray">
                                        </th>
                                    </tr> --}}
                        </table>
                    </div>
                    <div class="mt-4">
                        <table width="100%">
                            <tr>
                                <th colspan="4">
                                    SUB - CPMK
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4" style="border-top: 1px solid darkgray">
                                </th>
                            </tr>
                            @forelse ($matakuliah->cpmk as $no => $cpmk)
                            <tr>
                                <td width="15%" valign="top">
                                    SUB - CPMK {{ $cpmk->urutan }}
                                </td>
                                <td width="1%" valign="top">
                                    :
                                </td>
                                <td width="auto" valign="top">
                                    {!! $cpmk->sub_deskripsi !!}
                                </td>
                                <td width="6%" valign="top">
                                    <div class="d-flex justify-content-between">
                                        <a data-bs-toggle="modal" data-bs-target="#edit{{ $cpmk->id }}" class="badge bg-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#delete{{ $cpmk->id }}" class="badge bg-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                            {{-- <tr>
                                        <th colspan="3" style="border-top: 1px solid darkgray">
                                        </th>
                                    </tr> --}}

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cards mt-2">
        <div class="col-12">
            <div id="lainnya" class="card card-sm">
                <div class="card-status-top bg-primary"></div>
                <div class="card-body">
                    <h3 class="card-title">Lainnya</h3>
                    <div class="mt-2">
                        <form action="{{ url('/'.$base.'/'.$matakuliah->id.'/lainnya') }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="mt-2">
                                <h4 class="mt-2">Deskripsi Singkat Mata Kuliah</h4>
                                <textarea name="deskripsi" id="" cols="30" rows="2" class="form-control">{{ $matakuliah->deskripsi }}</textarea>
                            </div>
                            <div class="mt-3">
                                <h4 class="mt-2">Bahan Kajian/Materi Pembelajaran</h4>
                                <textarea name="kajian" id="" cols="30" rows="2" class="mytextarea form-control">{{ $matakuliah->kajian }}</textarea>
                            </div>
                            <div class="mt-3">
                                <h4 class="mt-2">Pustaka Utama</h4>
                                <textarea name="pustaka_utama" id="" cols="30" rows="2" class="mytextarea form-control">{{ $matakuliah->pustaka_utama }}</textarea>
                            </div>
                            <div class="mt-3">
                                <h4 class="mt-2">Pustaka Pendukung</h4>
                                <textarea name="pustaka_pendukung" id="" cols="30" rows="2" class="mytextarea form-control">{{ $matakuliah->pustaka_pendukung }}</textarea>
                            </div>
                            <div class="mt-3">
                                <h4 class="mt-2">Matakuliah Persyaratan</h4>
                                <input type="text" value="{{ $matakuliah->mk_persyaratan }}" name="mk_persyaratan" class="form-control">

                            </div>
                            <div class="my-3">
                                <div class="form-label">Dosen Pengampu</div>
                                <select class="form-select select2bs4" name="pengampu[]" multiple>
                                    @forelse ($pegawai as $item)
                                    <option value="{{ $item->id }}" {{ $matakuliah->pengampu->where('pegawai_id', $item->id)->count() > 0 ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                                    </svg>
                                    Simpan Lainnya
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endif --}}
