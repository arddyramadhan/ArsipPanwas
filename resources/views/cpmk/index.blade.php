@extends('master.dashboard.app')
@section('judul', 'Data CPMK Luring dan Daring')
@section('content')
@php
$base = 'luring'
@endphp
@include('alert_error')

<div>
    <div class="container">
        <div class="row row-cards mt-2">
            <div class="col-12">
                <div id="cpmk" class="card card-sm">
                    <div class="card-status-top bg-green"></div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Karakteristik Pembelajaran</h3>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#karakteristik">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Karakteristik
                            </button>
                        </div>
                        <div class="mt-3">
                            <table width="100%">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="auto">Karakteristik Pembelajaran</th>
                                    <th width="6%" align="center">Aksi</th>
                                </tr>
                                <tr>
                                    <th colspan="3" style="border-top: 1px solid darkgray">
                                    </th>
                                </tr>
                                @forelse ($karakteristik as $no => $kar)
                                <tr>
                                    <td valign="top">
                                        {{ ++$no }}
                                    </td>
                                    <td valign="top">
                                        {{ $kar->nama }}
                                    </td>
                                    <td valign="top">
                                        <div class="d-flex justify-content-between">
                                            <a data-bs-toggle="modal" data-bs-target="#edit_karakteristik{{ $kar->id }}" class="badge bg-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                    <line x1="16" y1="5" x2="19" y2="8" />
                                                </svg>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete_karakteristik{{ $kar->id }}" class="badge bg-danger">
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
                                    <th colspan="3" style="border-top: 1px solid darkgray">
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

        <div class="row row-cards mt-2">
            <div class="col-12">
                <div id="cpmk" class="card card-sm">
                    <div class="card-status-top bg-green"></div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Bentuk Pembelajaran</h3>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bentuk">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Bentuk
                            </button>
                        </div>
                        <div class="mt-3">
                            <table width="100%">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="auto">Bentuk Pembelajaran</th>
                                    <th width="6%" align="center">Aksi</th>
                                </tr>
                                <tr>
                                    <th colspan="3" style="border-top: 1px solid darkgray">
                                    </th>
                                </tr>
                                @forelse ($bentuk as $no => $btk)
                                <tr>
                                    <td valign="top">
                                        {{ ++$no }}
                                    </td>
                                    <td valign="top">
                                        {{ $btk->nama }}
                                    </td>
                                    <td valign="top">
                                        <div class="d-flex justify-content-between">
                                            <a data-bs-toggle="modal" data-bs-target="#edit_bentuk{{ $btk->id }}" class="badge bg-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                    <line x1="16" y1="5" x2="19" y2="8" />
                                                </svg>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete_bentuk{{ $btk->id }}" class="badge bg-danger">

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
                                    <th colspan="3" style="border-top: 1px solid darkgray">
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

        <div class="row row-cards mt-2">
            <div class="col-12">
                <div id="cpmk" class="card card-sm">
                    <div class="card-status-top bg-green"></div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Metode Pembelajaran</h3>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#metode">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Metode
                            </button>
                        </div>
                        <div class="mt-3">
                            <table width="100%">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="auto">Metode Pembelajaran</th>
                                    <th width="6%" align="center">Aksi</th>
                                </tr>
                                <tr>
                                    <th colspan="3" style="border-top: 1px solid darkgray">
                                    </th>
                                </tr>
                                @forelse ($metode_pembelajaran as $no => $mtd)
                                <tr>
                                    <td valign="top">
                                        {{ ++$no }}
                                    </td>
                                    <td valign="top">
                                        {{ $mtd->nama }}
                                    </td>
                                    <td valign="top">
                                        <div class="d-flex justify-content-between">
                                            <a data-bs-toggle="modal" data-bs-target="#edit_metode_pembelajaran{{ $mtd->id }}" class="badge bg-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                    <line x1="16" y1="5" x2="19" y2="8" />
                                                </svg>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete_metode_pembelajaran{{ $mtd->id }}" class="badge bg-danger">


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
                                    <th colspan="3" style="border-top: 1px solid darkgray">
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
    @include('cpmk.m_create')
    @include('cpmk.m_edit')
    @include('cpmk.m_delete')
</div>
@endsection
