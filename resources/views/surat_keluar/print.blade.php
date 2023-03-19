<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        .title {
            font-family: "Sans-Serif", serif;
        }

        * {
            font-family: "Sans-Serif", serif;
            /* font-family: "Calibri"; */
            font-size: 22px;
        }

    </style>
</head>
<body style="padding-left: 1cm; padding-right: 1cm">
    <img src="{{ asset('./static/header.png') }}" width="100%" alt="">
    <table width="100%">
        <tr>
            <td align="right">Kabila Bone, {{ date('d-F-Y', strtotime($surat_keluar->tgl_surat)) }}</td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <th width="20%" align="left">Nomor</th>
            <th align="left">:</th>
            <td align="left">{{ $surat_keluar->nomor }}</td>
        </tr>
        <tr>
            <th align="left" valign="top">Lampiran</th>
            <th align="left" valign="top">:</th>
            <td align="left">{!! $surat_keluar->lampiran !!}</td>
        </tr>
        <tr>
            <th align="left">Perihal</th>
            <th align="left">:</th>
            <td align="left">Undangan</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td style="padding: 5px 0 0 0"><strong>Kepada Yth.</strong></td>
        </tr>
        <tr>
            <td style="padding: 5px 0 0 0"><strong>{{ $surat_keluar->kepada }}</strong></td>
        </tr>
        <tr>
            <td style="padding: 5px 0 0 0">Di -</td>
        </tr>
        <tr>
            <td style="padding: 5px 0 0 0"> &emsp; &emsp; &ensp;Tempat</td>
        </tr>
        <tr>
            <td style="padding: 20px 0 0 0">Dengan Hormat,</td>
        </tr>
        <tr>
            <td style="padding: 5px 0 0 0">&emsp; &emsp; &ensp; {!! $surat_keluar->isi !!}</td>
        </tr>
    </table>
    <br>
    <table width="100%">
        <tr>
            <td width="20%" align="left">Hari/Tanggal</td>
            <td align="left">:</td>
            <td align="left">{{ date('d F Y', strtotime($surat_keluar->waktu)) }}</td>
        </tr>
        <tr>
            <td width="20%" align="left">Pukul</td>
            <td align="left">:</td>
            <td align="left">{{ date('H.i', strtotime($surat_keluar->waktu)) }} WITA s.d Selesai</td>
        </tr>
        <tr>
            <td width="20%" align="left">Tempat</td>
            <td align="left">:</td>
            <td align="left">{{ $surat_keluar->tempat }}</td>
        </tr>
    </table>
    <p>&emsp; &emsp; &ensp; Demikian undangan ini kami sampaikan, atas perhatiannya diucapkan terima kasih.</p>
    <br><br>
    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td align="center"><strong>KETUA</strong></td>
        </tr>
        <tr>
            <td colspan="2" style="padding-bottom: 100px"> </td>
        </tr>
        <tr>
            <td width="60%"></td>
            <td align="center"><strong>HENDRIK SETIAWAN</strong></td>
        </tr>
    </table>
    <br>
    <span style="border-bottom: 1px solid black; ">Tembusan Kepada:</span>
    <p style="padding-left: 20px;">{!! $surat_keluar->tembusan !!}</p>
    {{-- @if (Request::segment(3) == 'print')
        <script>
            window.print();
        </script>
    @endif --}}
</body>
</html>
