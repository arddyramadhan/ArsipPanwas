<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struktur Matakuliah</title>
    <link href="{{ asset('/assets/arddytablepdf.css') }}" rel="stylesheet" />
    <style>
        table tr * {
            font-size: 12pt
        }
    </style>
</head>
<body>
    <center>
        <h1> STRUKTUR KURIKULUM JURUSSAN PENDIDIKAN BAHASA DAN SASTRA INDONESIA
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
        @forelse ($kelompok as $no => $item)
        @php
        ++$no
        @endphp
        <tr>
            <th colspan="15" style="{{ $no > 1 ? 'padding-top: 30px' : ''}};padding-bottom: 10px " width="100%">{{ $nama_kelompok->find($item->id)->nama }}</th>

        </tr>
        <tr style="background-color: lightsteelblue">
            <th class="all" rowspan="2">No</th>
            <th class="all" rowspan="2">Kode</th>
            <th class="all" rowspan="2">Mata Kuliah ({{ $nama_kelompok->find($item->id)->singkatan }})</th>
            <th class="all" rowspan="2">SKS</th>
            <th class="all" colspan="9">SEMESTER</th>
            <th class="all" rowspan="2">Unit Pelaksana</th>
            <th class="all" rowspan="2">Keterangan</th>
        </tr>
        <tr style="background-color: lightsteelblue">
            <th class="all">0</th>
            <th class="all">1</th>
            <th class="all">2</th>
            <th class="all">3</th>
            <th class="all">4</th>
            <th class="all">5</th>
            <th class="all">6</th>
            <th class="all">7</th>
            <th class="all">8</th>
        </tr>
        @php
        $no= 0;
        @endphp
        @foreach ($data->where('rumpun_id', $item->id) as $mk)
        <tr>
            <td class="all" align="center" width="">{{ ++$no }}</td>
            <td class="all" align="center" width="">{{ strtoupper($mk->kode.'-'.$mk->jenjang.'-'.$mk->urutan.'-'.$mk->semester.'-'.$mk->sks) }}</td>
            <td class="all" align="left" style="padding-left: 10px" width="">{{ $mk->nama }}</td>
            <td class="all" align="center" width="">{{ $mk->sks }}</td>
            <td class="all" align="center" style="{{ $mk->semester == 0 ? 'background-color: lightgoldenrodyellow' : '' }}" width="">{{ $mk->semester == 0 ? 'x' : '-' }}</td>
            <td class="all" align="center" style="{{ $mk->semester == 1 ? 'background-color: lightgoldenrodyellow' : '' }}" width="">{{ $mk->semester == 1 ? 'x' : '-' }}</td>
            <td class="all" align="center" style="{{ $mk->semester == 2 ? 'background-color: lightgoldenrodyellow' : '' }}" width="">{{ $mk->semester == 2 ? 'x' : '-' }}</td>
            <td class="all" align="center" style="{{ $mk->semester == 3 ? 'background-color: lightgoldenrodyellow' : '' }}" width="">{{ $mk->semester == 3 ? 'x' : '-' }}</td>
            <td class="all" align="center" style="{{ $mk->semester == 4 ? 'background-color: lightgoldenrodyellow' : '' }}" width="">{{ $mk->semester == 4 ? 'x' : '-' }}</td>
            <td class="all" align="center" style="{{ $mk->semester == 5 ? 'background-color: lightgoldenrodyellow' : '' }}" width="">{{ $mk->semester == 5 ? 'x' : '-' }}</td>
            <td class="all" align="center" style="{{ $mk->semester == 6 ? 'background-color: lightgoldenrodyellow' : '' }}" width="">{{ $mk->semester == 6 ? 'x' : '-' }}</td>
            <td class="all" align="center" style="{{ $mk->semester == 7 ? 'background-color: lightgoldenrodyellow' : '' }}" width="">{{ $mk->semester == 7 ? 'x' : '-' }}</td>
            <td class="all" align="center" style="{{ $mk->semester == 8 ? 'background-color: lightgoldenrodyellow' : '' }}" width="">{{ $mk->semester == 8 ? 'x' : '-' }}</td>
            <td class="all" align="center" width="">{{ $mk->jenis->nama }}</td>
            <td class="all" align="center" width="">{{ $mk->semester }}</td>
        </tr>
        @endforeach
        <tr style="background-color: lightgray">
            <th class="nright" align="center" width=""></th>
            <th class="x" align="center" width=""></th>
            <th class="x" align="left" style="padding-left: 10px" width="">Jumlah</th>
            <th class="all" align="center" width="">{{ $data->where('rumpun_id', $item->id)->sum('sks') }}</th>
            <th class="all" align="center" width="">{{ $data->where('rumpun_id', $item->id)->where('semester', 0)->count() }}</th>
            <th class="all" align="center" width="">{{ $data->where('rumpun_id', $item->id)->where('semester', 1)->count() }}</th>
            <th class="all" align="center" width="">{{ $data->where('rumpun_id', $item->id)->where('semester', 2)->count() }}</th>
            <th class="all" align="center" width="">{{ $data->where('rumpun_id', $item->id)->where('semester', 3)->count() }}</th>
            <th class="all" align="center" width="">{{ $data->where('rumpun_id', $item->id)->where('semester', 4)->count() }}</th>
            <th class="all" align="center" width="">{{ $data->where('rumpun_id', $item->id)->where('semester', 5)->count() }}</th>
            <th class="all" align="center" width="">{{ $data->where('rumpun_id', $item->id)->where('semester', 6)->count() }}</th>
            <th class="all" align="center" width="">{{ $data->where('rumpun_id', $item->id)->where('semester', 7)->count() }}</th>
            <th class="all" align="center" width="">{{ $data->where('rumpun_id', $item->id)->where('semester', 8)->count() }}</th>
            <th class="x" align="center" width=""></th>
            <th class="nleft" align="center" width=""></th>
        </tr>
        @empty
        @endforelse
    </table>
    <br>
    <br>

    {{-- <script>
        window.print();larag

    </script> --}}
</body>
</html>
