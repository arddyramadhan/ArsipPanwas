<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Distribusi Matakuliah</title>
    <link href="{{ asset('/assets/arddytablepdf.css') }}" rel="stylesheet" />
    <style>
        table tr *{
        font-size: 12pt
        }

    </style>
</head>
<body>
    <center>
        <h1> DISTRIBUSI MATA KULIAH JURUSAN PENDIDIKAN BAHASA DAN SASTRA INDONESIA
            <br> KURIKULUM
            @forelse ($kurikulum as $no => $item)
            @php
            ++$no
            @endphp
            {{ $no > 1 ? $no == $kurikulum->count() ? 'DAN '.$item->nama : ', '.$item->nama : $item->nama }}
            @empty
            @endforelse
        </h1>
    </center>
    <table width="100%">
        @forelse ($semester as $s_no => $s_item)
        @php
        ++$s_no
        @endphp
        <tr>
            <th colspan="11" style="{{ $s_no > 1 ? 'padding-top: 30px' : ''}}" width="100%">Semester {{ $s_item->semester }}</th>
        </tr>
        <tr  style="background-color: lightsteelblue">
            <th class="all" rowspan="2">No</th>
            <th class="all" rowspan="2">Kode</th>
            <th class="all" rowspan="2">Mata Kuliah</th>
            <th class="all" rowspan="2">SKS</th>
            <th class="all" colspan="4">Komposisi</th>
            <th class="all" rowspan="2">Unit Pelaksana</th>
            <th class="all" rowspan="2">Rumpun MK</th>
            <th class="all" rowspan="2">Keterangan</th>
        </tr>
        <tr  style="background-color: lightsteelblue">
            <th class="all">T</th>
            <th class="all">P</th>
            <th class="all">L</th>
            <th class="all">∑</th>
        </tr>
            @php
                $no= 0;
            @endphp
            @foreach ($data->where('semester', $s_item->semester) as $mk)
            <tr>
                <td class="all" align="center" width="">{{ ++$no }}</td>
                <td class="all" align="center" width="">{{ strtoupper($mk->kode.'-'.$mk->jenjang.'-'.$mk->urutan.'-'.$mk->semester.'-'.$mk->sks) }}</td>
                <td class="all" align="left" style="padding-left: 10px" width="">{{ $mk->nama }}</td>
                <td class="all" align="center" width="">{{ $mk->sks }}</td>
                <td class="all" align="center" width="">{{ $mk->teori }}</td>
                <td class="all" align="center" width="">{{ $mk->praktek }}</td>
                <td class="all" align="center" width="">{{ $mk->lapangan }}</td>
                <td class="all" align="center" width="">{{ $mk->sks }}</td>
                <td class="all" align="center" width="">{{ $mk->jenis->nama }}</td>
                <td class="all" align="center" width="">{{ strtoupper($mk->rumpun->singkatan) }}</td>
                <td class="all" align="center" width="">{{ $mk->semester }}</td>
            </tr>
            @endforeach
            <tr style="background-color: lightgray">
                <th class="nright" align="center" width=""></th>
                <th class="x" align="center" width=""></th>
                <th class="x" align="left" style="padding-left: 10px" width="">Jumlah SKS</th>
                <th class="all" align="center" width="">{{ $data->where('semester', $s_item->semester)->sum('sks') }}</th>
                <th class="all" align="center" width="">{{ $data->where('semester', $s_item->semester)->sum('teori') }}</th>
                <th class="all" align="center" width="">{{ $data->where('semester', $s_item->semester)->sum('praktek') }}</th>
                <th class="all" align="center" width="">{{ $data->where('semester', $s_item->semester)->sum('lapangan') }}</th>
                <th class="all" align="center" width="">{{ $data->where('semester', $s_item->semester)->sum('sks') }}</th>
                <th class="x" align="center" width=""></th>
                <th class="x" align="center" width=""></th>
                <th class="nleft" align="center" width=""></th>
            </tr>
        @empty
        @endforelse
    </table>
    <br>
    <br>

    @php
    $cek = 0;
    @endphp
    @forelse ($kelompok as $item)
        @if ($data->where('rumpun_id', $item->id)->count() > 0)
            @php
            $cek = 1;
            @endphp
        @endif
    @empty
    @endforelse

    @if ($cek == 1 )
        <center>
            <h1> Rincian Jumlah SKS berdasarkan Kelompok Mata Kuliah
                <br> KURIKULUM
                @forelse ($kurikulum as $no => $item)
                @php
                ++$no
                @endphp
                {{ $no > 1 ? $no == $kurikulum->count() ? 'DAN '.$item->nama : ', '.$item->nama : $item->nama }}
                @empty
                @endforelse
            </h1>
        </center>

        <table width="100%">
            <tr>
                <th class="all">No</th>
                <th class="all">Rumpun Mata Kuliah</th>
                <th class="all">SKS</th>
            </tr>
            @forelse ($kelompok as $no => $rumpun)
            <tr>
                <th class="all">{{ ++$no }}</th>
                <th class="all" align="left">{{ $rumpun->nama }}</th>
                <th class="all">{{ $data->where('rumpun_id', $rumpun->id)->count() }}</th>
            </tr>
            @empty
            @endforelse
        </table>
    @endif

    {{-- <script>
        window.print();larag

    </script> --}}
</body>
</html>
