<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Program Strudi</title>
    <link href="{{ asset('/assets/arddytablepdf.css') }}" rel="stylesheet" />
    <style>
        table tr * {
            font-size: 13pt
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
        <h1>PROFIL PROGRAM STUDI {{ strtoupper($profil_prodi->first()->program_studi->nama) }}</h1>
    </center>
    <table width="100%" style="">
        <tr style="background-color: lightsteelblue">
            <th class="all" width="75%" valign="center" colspan="2">Capaian Lulusan Program Studi</th>

            @foreach ($profil_prodi as $prodi)
                <th class="all">{{ $prodi->nama }}</th>
            @endforeach
        </tr>
        @foreach ($profil_lulusan as $profil)
            <tr>
                    <th style="background-color: lightgray" class="all" align="left" style="padding-left: 10px" colspan="{{ $profil_prodi->count() + 2 }}">{{ $profil->nama }}</th>
            </tr>
            @forelse ($capaian_lulusan->where('profil_lulusan_id', $profil->id) as $capaian)
                <tr>
                    <th class="all" colspan="">{{ $profil->singkatan.$capaian->urutan }}</th>
                    <td class="all" align="between" colspan="">{{ $capaian->deskripsi }}</td>
                    @foreach ($profil_prodi as $prodi)
                        @if ($capaian->profil_prodi_capaian->where('profil_prodi_id', $prodi->id)->count() > 0 )
                        <td class="all" align="center" style="background-color: lightgoldenrodyellow">
                            <img src="{{ asset('./static/cek.png') }}" width="20px" alt="Elektronik LHP" class="navbar-brand-image">
                        </td>
                        @else
                        <td class="all">

                        </td>
                        @endif
                    @endforeach
                </tr>
            @empty
            @endforelse
        @endforeach
    </table>
</body>
</html>
