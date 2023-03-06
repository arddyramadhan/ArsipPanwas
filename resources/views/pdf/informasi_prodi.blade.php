<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Program Strudi</title>
    <link href="{{ asset('/assets/arddytablepdf.css') }}" rel="stylesheet" />
    <style>
        table tr *{
            font-size: 13pt;
            line-height: 1em;
        }
        td, th{
            padding: 20px
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
        <h1>INFORMASI PROGRAM STUDI {{ strtoupper($program_studi->nama) }}</h1>
    </center>
    <table width="100%">
        <tr>
            <td class="nright" width="30%" valign="top">
                Nama Program Studi
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->nama }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Kode Program Studi
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->kode }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Akreditas / Nomor Akreditas
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->akreditas }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Tanggal Berdiri
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ date('d-m-Y', strtotime($program_studi->tgl_berdiri)) }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Pejabat Penandatangan SK Pendirian Prodi
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{$program_studi->penandatangan_sk }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Bulan dan tahun dimulainya penyelenggaraan Prodi
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ date('m-Y' ,strtotime($program_studi->bulan_tahun_prodi)) }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Sk Penyelenggaraan
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->sk_penyelenggaraan}}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Alamat
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->alamat }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Kode Pos
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->pos }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Telepon
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->tlp }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Faximile
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->fax }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Email
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->email }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Deskripsi
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->deskripsi }}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Visi
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->visi }}
            </th>
        </tr>
        <tr>
            <td class="nright" style="padding-top: 30px" width="30%" valign="top">
                Misi
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {!! $program_studi->misi !!}
            </th>
        </tr>
        <tr>
            <td class="nright" width="30%" valign="top">
                Kompetensi Lulusan
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {{ $program_studi->kompetensi_lulusan }}
            </th>
        </tr>
        <tr>
            <td class="nright" style="padding-top: 30px" width="30%" valign="top">
                Tujuan Prodi
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto">
                {!! $program_studi->tujuan_prodi !!}
            </th>
        </tr>
        <tr>
            <td class="nright" style="padding-top: 30px" width="30%" valign="top">
                Strategi Pencapaian
            </td>
            {{-- <td class="nright" width="1%" valign="top">
                :
            </td> --}}
            <th align="left" class="all" valign="top" width="auto" >
                <p style="line-height: 0;">
                    {!! $program_studi->strategi_pencapaian !!}
                </p>
            </th>
        </tr>
    </table>

</body>
</html>
