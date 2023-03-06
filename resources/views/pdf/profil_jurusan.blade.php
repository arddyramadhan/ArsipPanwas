<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Jurusan</title>
    <link href="{{ asset('/assets/arddytablepdf.css') }}" rel="stylesheet" />
    <style>
        table tr * {
            font-size: 11pt
        }
        .left2 {
            border-left: 2px solid black
        }
        .right2 {
            border-right: 2px solid black
        }

        .top2 {
            border-top: 2px solid black
        }

        .bottom2 {
            border-bottom: 2px solid black
        }
    </style>
</head>
<body>
    <center>
        <h1>PROFIL JURUSAN PENDIDIKAN BAHASA DAN SASTRA INDONESIA</h1>
    </center>
    <table width="100%" style="border: 2px solid black">
        <tr style="background-color: lightsteelblue">
            <th class="all" valign="center" colspan="2">Capaian Lulusan</th>
            <th class="all" valign="center">Matakuliah</th>
            @foreach ($profil_lulusan as $profil)
                <th class="all left2 right2" colspan="{{ $profil->capaian_lulusan->where('jurusan_id', $data->first()->program_studi->jurusan_id)->count() }}">{{ $profil->nama }}</th>
            @endforeach
        </tr>
        {{-- <tr style="background-color: lightsteelblue">
            @foreach ($profil_lulusan as $profil)
                @php
                    $no_cap = 0;
                @endphp
                @foreach ($profil->capaian_lulusan->where('jurusan_id', $data->first()->program_studi->jurusan_id) as $capaian)
                    @php
                        ++$no_cap;
                    @endphp
                    <th class="all {{ $no_cap == 1 ? 'left2' : '' }} {{ $no_cap == $profil->capaian_lulusan->where('jurusan_id', $data->first()->program_studi->jurusan_id)->count() ? 'right2' : '' }}">{{ $capaian->profil_lulusan->singkatan.$capaian->urutan }}</th>
                @endforeach
            @endforeach
        </tr>
        @forelse ($semester as $s_no => $s_item)
            @php
            ++$s_no
            // $no = 0;
            @endphp
            <tr>
                <th align="left" colspan="100" class="all right2" style="{{ $s_no > 1 ? 'padding-top: 10px' : ''}}" width="100%">Semester {{ $s_item->semester }}</th>
            </tr>
            @php
            $no= 0;
            @endphp
            @foreach ($data->where('semester', $s_item->semester) as $mk)
            <tr>
                <td class="all" align="center" width="">{{ ++$no }}</td>
                <td class="all" align="left" style="padding-left: 10px" width="">{{ $mk->nama }}</td>
                @foreach ($profil_lulusan as $profil)
                    @php
                        $no_cap = 0
                    @endphp
                    @foreach ($profil->capaian_lulusan->where('jurusan_id', $data->first()->program_studi->jurusan_id) as $capaian)
                        @php
                            ++$no_cap;
                        @endphp
                        <td class="all {{ $no_cap == 1 ? 'left2' : '' }} {{ $no_cap == $profil->capaian_lulusan->where('jurusan_id', $data->first()->program_studi->jurusan_id)->count() ? 'right2' : '' }}" style="{{ $mk->cpl->where('capaian_lulusan_id', $capaian->id)->count() > 0 ? 'background-color: lightgoldenrodyellow' : '' }}" align="center" width="">
                            @if ($mk->cpl->where('capaian_lulusan_id', $capaian->id)->count() > 0)
                                <img src="{{ asset('./static/cek.png') }}" width="12px" alt="Elektronik LHP" class="navbar-brand-image">
                            @endif
                        </td>
                    @endforeach
                @endforeach
            </tr>
            @endforeach
        @empty
        @endforelse --}}
    </table>
</body>
</html>
