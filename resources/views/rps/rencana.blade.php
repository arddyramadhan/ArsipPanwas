{{-- @if (Request::segment(4) == 'rencana') --}}
<div class="container">
    <h2 class="mb-3">Rencana Pembelajaran</h2>
    <div class="row row-cards">
        <div class="col-12">
            <div id="cpmk" class="card card-sm">
                <div class="card-status-top bg-green"></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title ">Rencana Kegiatan Pembelajaran</h3>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buat_rencana">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Rencana
                        </button>
                    </div>
                    <div class="mt-4">
                        <table width="100%" class="">
                            <tr>
                                <th>Minggu</th>
                                <th>Kemampuan akhir</th>
                                <th>Indikator</th>
                                <th>Kriteria dan Bentuk</th>
                                <th>Luring</th>
                                <th>Daring</th>
                                <th>Materi</th>
                                <th width="6%">Aksi</th>
                            </tr>
                            <tr>
                                <th colspan="8" style="border-top: 1px solid darkgray">
                                </th>
                            </tr>
                            @forelse ($matakuliah->rencana_pembelajaran as $no => $item)
                            <tr>
                                <td valign="top">
                                    Ke - {{ $item->urutan }}
                                </td>
                                <td valign="top">
                                    {!! $item->tahap_belajar !!}
                                </td>
                                <td valign="top">
                                    {!! $item->indikator !!}
                                </td>
                                <td valign="top">
                                    <strong>Kriteria Penilaian:</strong>
                                    <br>
                                    {!! $item->kriteria !!}
                                    <br>
                                    <strong>Bentuk Penilaian:</strong>
                                    <br>
                                    {!! $item->bentuk !!}
                                </td>
                                <td valign="top">
                                    <strong>KP: </strong>
                                    <br>
                                    <strong>BP: </strong>
                                    <br>
                                    <strong>MP: </strong>
                                    <br>
                                    <strong>PM: </strong>
                                    <br>
                                </td>
                                <td valign="top">
                                    <strong>KP: </strong>
                                    <br>
                                    <strong>BP: </strong>
                                    <br>
                                    <strong>MP: </strong>
                                    <br>
                                    <strong>PM: </strong>
                                    <br>
                                </td>
                                <td valign="top">
                                    {!! $item->materi !!}
                                </td>
                                <td valign="top">
                                    <div class="d-flex justify-content-between">
                                        <a data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" class="badge bg-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}" class="badge bg-danger ml-1">
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
                            <tr>
                                <th colspan="8" style="border-top: 1px solid darkgray">
                                </th>
                            </tr>
                            @empty
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- @endif --}}
