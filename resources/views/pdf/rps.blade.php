<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RPS matakuliah </title>
    <link href="{{ asset('/assets/arddytablepdf.css') }}" rel="stylesheet" />
    <style>
        td {
        padding: 8px;
        }
        th {
        padding: 8px;
        }

        .table2 tr *{
            font-size: 10pt
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <th class="all" width="20%">
                <img src="{{ asset('./static/logo.png') }}" width="90" alt="Elektronik LHP" class="navbar-brand-image">
            </th>
            <th class="all" align="center" width="auto">
                <h1 class="title">
                    UNIVERSITAS NEGERI GORONTALO
                    <br>
                    FAKULTAS SASTRA DAN BUDAYA
                    <br>
                    PRODI {{ strtoupper($matakuliah->program_studi->nama) }}</h1>
            </th>
            <th class="all" valign="top" align="center" width="18%">Kode Dokumen</th>
        </tr>
        <tr>
            <th class="all" style="background-color: #e0e0e0" align="center" colspan="3">
                RENCANA PEMBELAJARAN SEMESTER
            </th>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <th class="ntop" width="20%">Mata Kuliah</th>
            <th class="ntop" width="17%">Kode MK</th>
            <th class="ntop" colspan="2" width="12%">Rumpun MK</th>
            <th class="ntop" width="23%" colspan="3">Bobot (SKS)</th>
            <th class="ntop" width="10%">Semester</th>
            <th class="ntop" width="18%">Tanggal</th>
        </tr>
        <tr>
            <th class="all" align="center">Metodologi Penelitian</th>
            <td class="all" align="center">{{ $matakuliah->kode.'-'.$matakuliah->jenjang.'-'.$matakuliah->urutan.'-'.$matakuliah->semester.'-'.$matakuliah->sks }}</td>
            <td class="all" align="center" colspan="2">{{ $matakuliah->rumpun->singkatan }}</td>
            <td class="all" align="center">T = <strong>{{ $matakuliah->teori }}</strong></td>
            <td class="all" align="center">P = <strong>{{ $matakuliah->praktek }}</strong></td>
            <td class="all" align="center">L = <strong>{{ $matakuliah->lapangan }}</strong></td>
            <td class="all" align="center">{{ $matakuliah->semester }}</td>
            <td class="all" align="center">{{ date($matakuliah->created_at) }}</td>
        </tr>
    </table>
    @if ($matakuliah->pegawai_rps->count() < 2) 
    <table width="100%">
        <tr>
            <td class="y" valign="top" class="" width="20%">
                Pengesahan Wakil <br> Direktur 1,
            </td>
            <td class="y" valign="top" align="center" width="29%">
                Pengembang RPS,
            </td>
            <td class="y" valign="top" align="center" width="23%">
                Koordinator RMK,
            </td>
            <td class="y" valign="top" align="center" width="28%">
                Kajur/Kaprodi,
            </td>
        </tr>
        <tr>
            <td class="y" valign="top" style="padding : 20px">
            </td>
            <td class="y" valign="top" align="center" style="padding : 20px">
            </td>
            <td class="y" valign="top" align="center" style="padding : 20px">
            </td>
            <td class="y" valign="top" align="center" style="padding : 20px">
            </td>
        </tr>

        <tr>
            <td class="y" valign="top" width="20%">
                Pengesahan Wakil <br> Direktur 1,
            </td>
            <td class="y" valign="top" align="center" width="27%">
                ({{ $matakuliah->pegawai_rps->first()->nama }})
            </td>
            <td class="y" valign="top" align="center" width="22%">
                ({{ $matakuliah->pegawai->nama }})
            </td>
            <td class="y" valign="top" align="center" width="28%">
                Kajur/Kaprodi,
            </td>
        </tr>
    </table>
    @else
    <table width="100%">
        <tr>
            <td class="y" valign="top" class="" width="20%">
                Pengesahan {{ $matakuliah->program_studi->jurusan->fakultas->pegawai_fakultas->where('status', 'aktiv')->first()->jabatan == 'dekan' ? 'Dekan Fakultas' : 'Wakil Dekan' }} {{ $matakuliah->program_studi->jurusan->fakultas->pegawai_fakultas->where('status', 'aktiv')->first()->urutan }},
            </td>
            <td class="y" valign="top" align="center" width="29%">
                Pengembang RPS,
            </td>
            <td class="y" valign="top" align="center" width="23%">
                Koordinator RMK,
            </td>
            <td class="y" valign="top" align="center" width="28%">
                {{ $matakuliah->program_studi->pegawai_prodi->where('status', 'aktiv')->count() > 0 
                ? 'Kepala Program Studi' : 'Kepala Jurusan' }}
            </td>
        </tr>
        <tr>
            <td class="y" valign="top" style="padding : 20px">
            </td>
            <td class="y" valign="top" align="center" style="padding : 20px">
            </td>
            <td class="y" valign="top" align="center" style="padding : 20px">
            </td>
            <td class="y" valign="top" align="center" style="padding : 20px">
            </td>
        </tr>
        <tr>
            <td class="y" valign="bottom" align="center" width="20%">

                ({{ $matakuliah->program_studi->jurusan->fakultas->pegawai_fakultas->where('status', 'aktiv')->first()->pegawai->nama }})
            </td>
            <td class="y" valign="bottom" align="center" width="27%">
                @forelse ($matakuliah->pegawai_rps as $item)
                    ({{ $item->nama }}) <br>
                @empty
                @endforelse
            </td>
            <td class="y" valign="bottom" align="center" width="22%">
                ({{ $matakuliah->pegawai->nama }})
            </td>
            <td class="y" valign="bottom" align="center" width="28%">
                {{-- ({{ $matakuliah->program_studi->jurusan->fakultas->pegawai_jurusan->where('status', 'aktiv')->first()->pegawai->nama }}) --}}
                {{ $matakuliah->program_studi->pegawai_prodi->where('status', 'aktiv')->count() > 0 
                ? $matakuliah->program_studi->pegawai_prodi->where('status', 'aktiv')->first()->pegawai->nama 
                : $matakuliah->program_studi->jurusan->pegawai_jurusan->where('status', 'aktiv')->first()->pegawai->nama
                }}
            </td>
        </tr>
    </table>
    @endif

        <table width="100%">
            <tr style="background-color: #e0e0e0">
                <th class="all" width="20%">
                    Capaian Pembelajaran (CP)
                </th>
                <th class="all" colspan="2" valign="top" align="left" width="auto">
                    Capaian Pembelajaran Lulusan (CPL) yang Dibebankan pada MK
                </th>
            </tr>
            @forelse ($profil_lulusan as $profil)
            @forelse ($profil->capaian_lulusan->where('jurusan_id', $matakuliah->program_studi->jurusan_id) as $capaian)
            @if ($matakuliah->cpl->where('capaian_lulusan_id', $capaian->id)->count() > 0)
            <tr>
                <td class="y">
                </td>
                <td class="all" valign="top" align="left" width="11%">
                    CPL {{ $profil->urutan }} ({{ $capaian->profil_lulusan->singkatan }}-{{ $capaian->urutan }})
                </td>
                <td class="all" valign="top" align="left" width="auto">
                    {{ $capaian->deskripsi }}
                </td>
            </tr>
            @endif
            @empty
            @endforelse
            @empty
            @endforelse
            <tr>
                <th class="y">
                </th>
                <th style="background-color: #e0e0e0" class="all" colspan="2" valign="top" align="left" width="auto">
                    Capaian Pembelajaran Mata Kuliah (CPMK)
                </th>
            </tr>
            @forelse ($matakuliah->cpmk as $cpmk)
            <tr>
                <td class="y">
                </td>
                <td class="all" valign="top" align="left" width="11%">
                    CPMK {{ $cpmk->urutan }}
                </td>
                <td class="all" valign="top" align="left" width="auto">
                    {{ $cpmk->deskripsi }}
                </td>
            </tr>
            @empty
            @endforelse

            <tr>
                <th class="y">
                </th>
                <th style="background-color: #e0e0e0" class="all" colspan="2" valign="top" align="left" width="auto">
                    Kemampuan Akhir Tiap Tahapan Belajar (CPMK)
                </th>
            </tr>
            @forelse ($matakuliah->cpmk as $sub_cpmk)
            <tr>
                <td class="y">
                </td>
                <td class="all" style="padding-top: 20px" valign="top" align="left" width="11%">
                    SUB-CPMK {{ $sub_cpmk->urutan }}
                </td>
                <td class="all" style="padding: 0" valign="top" align="left" width="auto">
                    {!! $sub_cpmk->sub_deskripsi !!}
                </td>
            </tr>
            @empty
            @endforelse

            <tr>
                <th class="all" align="left">
                    Deskripsi Singkat Mata Kuliah
                </th>
                <td class="all" colspan="2" valign="top" align="left" width="auto">
                    {{ $matakuliah->deskripsi }}
                </td>
            </tr>
            <tr>
                <th class="all" valign="top" align="left" style="padding-top:26px">
                    Bahan Kajian/Materi Pembelajaran
                </th>
                <td class="all"  colspan="2" valign="top" align="left" width="auto">
                    {!! $matakuliah->kajian !!}
                </td>
            </tr>
            <tr>
                <th class="all" align="left" width="20%">
                    Pustaka
                </th>
                <th style="background-color: #e0e0e0" class="all" colspan="2" valign="top" align="left" width="auto">
                    Utama
                </th>
            </tr>
            <tr>
                <th class="y" align="left" width="20%">
                </th>
                <td class="all" colspan="2" valign="top" align="left" width="auto">
                    {!! $matakuliah->pustaka_utama !!}
                </td>
            </tr>
            <tr>
                <th class="y" align="left" width="20%">
                </th>
                <th style="background-color: #e0e0e0" class="all" colspan="2" valign="top" align="left" width="auto">
                    Pendukung
                </th>
            </tr>
            <tr>
                <th class="y" align="left" width="20%">
                </th>
                <td class="all" colspan="2" valign="top" align="left" width="auto">

                    {!! $matakuliah->pustaka_pendukung !!}
                </td>
            </tr>
            <tr>
                <th class="all" align="left">
                    Dosen Pengampu
                </th>
                <td class="all" colspan="2" valign="top" align="left" width="auto">
                    @forelse ($matakuliah->pegawai_pengampu as $nomor => $pengampu)
                    {{ ++$nomor }}. {{ $pengampu->nama }} <br>
                    @empty
                    @endforelse
                </td>
            </tr>
            <tr>
                <th class="all" align="left">
                    Mata Kuliah Syarat
                </th>
                <td class="all" colspan="2" valign="top" align="left" width="auto">
                    {{ $matakuliah->mk_persyaratan }}
                </td>
            </tr>
        </table>

        <br>
        <br>
        <br>
        <center>
            <h1>RENCANA KEGIATAN PEMBELAJARAN</h1>
        </center>
        <table width="100%" class="table2">

            <tr>
                <th class="all"  width="5%" width="5%" rowspan="2" valign="center">
                    Minggu ke-
                </th>
                <th class="all"  width="16%" rowspan="2" valign="center">
                    Kemampuan akhir tiap tahapan belajar (Sub-SPMK)
                </th>
                <th class="all"  width="24%" valign="center" colspan="2">
                    Penilaian
                </th>
                <th class="all"  width="25%" valign="center" colspan="2">
                    Karakteristik Pembelajaran (KP), Bentuk Pembelajaran (BP), Metode Pembelajaran (MP), Penugasan Mahasiswa (PM), Estimasi Waktu (EW)
                </th>
                <th class="all"  width="8%" rowspan="2" valign="center">
                    Materi Pembelajaran
                </th>
                <th class="all"  width="5%" rowspan="2" valign="center">
                    Bobot Penilaian (%)
                </th>
            </tr>
            <tr>
                <td class="all" align="center" width="12%" valign="center">Indikator</td>
                <td class="all" align="center" width="12%" valign="center">Kriteria dan Bentuk</td>
                <td class="all" align="left" valign="center">
                    <center><strong>Luring</strong></center>
                    <p style="font-size: 14px">
                        TM = Tatap Muka <br>
                        TT = Tugas Terstruktur <br>
                        TgM = Tugas Mandiri</p>
                </td>
                <td class="all" align="left" valign="center">
                    <center>
                        <strong>Daring</strong>
                    </center>
                    <p style="font-size: 14px">
                        SM = Sinkronus Maya <br>
                        AM = Asinkronus Mandiri <br>
                        AK = Asinkronis Kolaboratif
                    </p>
                </td>
            </tr>
            <tr>
                <td class="all" style="padding: 0px" align="center" valign="center">
                    <i>(1)</i>
                </td>
                <td class="all" style="padding: 0px" align="center" valign="center">
                    <i>(2)</i>
                </td>
                <td class="all" style="padding: 0px" align="center" valign="center">
                    <i>(3)</i>
                </td>
                <td class="all" style="padding: 0px" align="center" valign="center">
                    <i>(4)</i>
                </td>
                <td class="all" style="padding: 0px" align="center" valign="center">
                    <i>(5)</i>
                </td>
                <td class="all" style="padding: 0px" align="center" valign="center">
                    <i>(6)</i>
                </td>
                <td class="all" style="padding: 0px" align="center" valign="center">
                    <i>(7)</i>
                </td>
                <td class="all" style="padding: 0px" align="center" valign="center">
                    <i>(8)</i>
                </td>
            </tr>
            @forelse ($matakuliah->rencana_pembelajaran as $rencana)
                <tr>
                    <td class="all" style="padding-top: 18px" align="center" valign="top">
                        {{ $rencana->urutan }}
                    </td>
                    @if ($rencana->tahap_belajar == 'uts')
                    <td class="all" style="padding-top: 18px" colspan="7" align="left" valign="top">
                        <strong>Ujian Tengah Semeter (UTS)</strong>
                    </td>
                    @elseif ($rencana->tahap_belajar == 'uas')
                    <td class="all" style="padding-top: 18px" colspan="7" align="left" valign="top">
                        <strong>Ujian Akhir Semeter (UAS)</strong>
                    </td>
                        
                    @else
                        <td class="all" style="padding-top: 0px" align="between" valign="top">
                            {!! $rencana->tahap_belajar !!}
                        </td>
                        <td class="all" style="padding-top: 0px" align="left" valign="top">
                            {!! $rencana->indikator !!}
                        </td>
                        <td class="all" style="padding-top: 18px" align="left" valign="top">
                            <strong>Kriteria Penilaian:</strong><br>
                            {!! $rencana->kriteria !!} <br><br>

                            <strong>Bentuk Penilaian:</strong><br>
                            {!! $rencana->bentuk !!}

                        </td>
                        <td class="all" style="padding-top: 18px" align="left" valign="top">
                            <strong>KP:</strong>
                            @forelse ($rencana->karakteristik_pembelajaran as $kp => $karakteristik)
                            @php
                            ++$kp
                            @endphp
                            {{ $kp > 1 ? $kp == $rencana->rps_karakteristik_pembelajaran->count() ? 'dan '.$karakteristik->nama : ', '.$karakteristik->nama : $karakteristik->nama }}
                            @empty
                            @endforelse
                            <br>
                            <strong>BP:</strong>
                            @forelse ($rencana->bentuk_pembelajaran as $bp => $bentuk)
                            @php
                            ++$bp
                            @endphp
                            {{ $bp > 1 ? $bp == $rencana->rps_bentuk_pembelajaran->count() ? 'dan '.$bentuk->nama : ', '.$bentuk->nama : $bentuk->nama }}
                            @empty
                            @endforelse
                            <br>
                            <strong>MP:</strong>
                            @forelse ($rencana->metode_pembelajaran as $mp => $metode)
                            @php
                            ++$mp
                            @endphp
                            {{ $mp > 1 ? $mp == $rencana->rps_metode->count() ? 'dan '.$metode->nama : ', '.$metode->nama : $metode->nama }}
                            @empty
                            @endforelse
                            <br>
                            <strong>PM:</strong>
                            {!! $rencana->penugasan_luring !!}
                            <br>
                            <strong>EW:</strong><br>
                            <table width="100%">
                                <tr>
                                    <td style="padding: 0" width="20%">TM</td>
                                    <td style="padding: 0" width="80%">: {{ $matakuliah->sks }} x 50 menit </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0" width="20%">TT</td>
                                    <td style="padding: 0" width="80%">: {{ $matakuliah->sks }} x 60 menit </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0" width="20%">TgM</td>
                                    <td style="padding: 0" width="80%">: {{ $matakuliah->sks }} x 60 menit </td>
                                </tr>
                            </table>
                        </td>
                        <td class="all" style="padding-top: 18px" align="left" valign="top">
                            <strong>KP:</strong>
                            @forelse ($rencana->karakteristik_pembelajaran_daring as $kp => $karakteristik)
                            @php
                            ++$kp
                            @endphp
                            {{ $kp > 1 ? $kp == $rencana->rps_karakteristik_pembelajaran_daring->count() ? 'dan '.$karakteristik->nama : ', '.$karakteristik->nama : $karakteristik->nama }}
                            @empty
                            @endforelse
                            <br>
                            <strong>BP:</strong>
                            @forelse ($rencana->bentuk_pembelajaran_daring as $bp => $bentuk)
                            @php
                            ++$bp
                            @endphp
                            {{ $bp > 1 ? $bp == $rencana->rps_bentuk_pembelajaran_daring->count() ? 'dan '.$bentuk->nama : ', '.$bentuk->nama : $bentuk->nama }}
                            @empty
                            @endforelse
                            <br>
                            <strong>MP:</strong>
                            @forelse ($rencana->metode_pembelajaran_daring as $mp => $metode)
                            @php
                            ++$mp
                            @endphp
                            {{ $mp > 1 ? $mp == $rencana->rps_metode_daring->count() ? 'dan '.$metode->nama : ', '.$metode->nama : $metode->nama }}
                            @empty
                            @endforelse
                            <br>
                            <strong>PM:</strong>
                            {!! $rencana->penugasan_daring !!}
                            <br>
                            <strong>EW:</strong><br>
                            <table width="100%">
                                <tr>
                                    <td style="padding: 0" width="20%">SM</td>
                                    <td style="padding: 0" width="80%">: {{ $matakuliah->sks }} x 50 menit </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0" width="20%">AK</td>
                                    <td style="padding: 0" width="80%">: {{ $matakuliah->sks }} x 60 menit </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0" width="20%">AM</td>
                                    <td style="padding: 0" width="80%">: {{ $matakuliah->sks }} x 60 menit </td>
                                </tr>
                            </table>
                        </td>
                        <td class="all" style="padding: 18px" align="left" valign="top">
                            {!! $rencana->materi !!}
                        </td>
                        <td class="all" style="padding: 18px" align="left" valign="top">
                            {{ $rencana->bobot }}%
                        </td>
                    @endif
                    
                </tr>
            @empty
                
            @endforelse
        </table>




        {{-- <script>
        window.print();larag

    </script> --}}
</body>
</html>
