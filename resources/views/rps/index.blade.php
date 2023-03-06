@extends('master.dashboard.app')
@section('judul', 'Rencana Pembelajaran Semester')
@section('content')
@php
$base = 'rps'
@endphp
@include('alert_error')
{{-- <div class="mb-2">
    <div class="d-flex justify-content-end">
        <a class="btn btn-primary" href="{{ url('/'.$base.'/create') }}">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Data Mata Kuliah
        </a>
    </div>
</div> --}}
<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="mytable" class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Kode</th>
                            <th class="border-0">Mata Kuliah</th>
                            <th class="border-0">SKS</th>
                            <th class="border-0">Semester</th>
                            <th class="border-0">Koordinator</th>
                            <th class="border-0">Pengembang RPS</th>
                            <th class="border-0">Jenis</th>
                            <th class="border-0">Keterangan</th>
                            <th class="border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $no => $item)
                        <tr>
                            <td align="left" valign="top">{{ ++$no }}</td>
                            <td align="left" valign="top">{{ $item->kode.'-'.$item->jenjang.'-'.$item->urutan.'-'.$item->semester.'-'.$item->sks }}</td>
                            <td align="left" valign="top">{{ $item->nama }}</td>
                            <td align="left" valign="top">{{ $item->sks }}</td>
                            <td align="left" valign="top">{{ $item->semester }}</td>
                            <td align="left" valign="top">{{ $item->pegawai->nama }}</td>
                            <td align="left" valign="top">
                                <ol>
                                    @forelse ($item->pegawai_rps as $rps)
                                    <li>
                                        {{ $rps->nama }}
                                    </li>
                                    @empty
                                    @endforelse
                                </ol>
                            </td>
                            <td align="left" valign="top">{{ $item->jenis->nama }}</td>
                            <td align="left" valign="top">{{ $item->rumpun->singkatan }}</td>
                            <td align="left" valign="top">
                                <a href="{{ url('./'.$base.'/'.$item->id.'/show/matakuliah') }}" class="badge bg-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                                {{-- <a data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" class="badge bg-success">
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
                                </a> --}}
                            </td>
                        </tr>
                        @empty
                        {{-- <tr class="">
                            <td colspan="10" align="center"><strong>Data Belum di tambahkan</strong></td>
                        </tr> --}}
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('datatable')
@endsection
