<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta11
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>E-Arsip | Kabila Bone</title>

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif !important;
        }

    </style>
    <!-- CSS files -->
    <link href="{{ asset('/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/demo.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    @stack('head')
</head>
<body>
    @stack('jshead')
    <div class="page">
        @include('master.dashboard.header')
        @include('master.dashboard.navbar')
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                @yield('judul')
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item"><a href="./docs/index.html" class="link-secondary">Documentation</a></li>
                                <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                                <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                                <li class="list-inline-item">
                                    <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                                        Sponsor
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2023
                                    {{-- <a href="" class="link-secondary bold"></a>. --}}
                                </li>
                                <li class="list-inline-item">
                                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                                        v1.0.0-beta
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        @if (Auth::user()->hasRole(['operator', 'dosen']))
            <div class="modal fade" id="ubah_akun" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="modal-title" id="modalTitleNotify">Perbaharui Data</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('/pegawai/'.Auth::user()->pegawai->id.'/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label for="" class="lable">Nama</label>
                                    <input type="text" name="nama" value="{{ Auth::user()->pegawai->nama }}" required id="" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="lable">NIP</label>
                                    <input type="text" name="nip" value="{{ Auth::user()->pegawai->nip }}" required id="" class="form-control">

                                </div>
                                <div class="mb-2">
                                    <label for="" class="lable">NIDN</label>
                                    <input type="text" name="nidn" value="{{ Auth::user()->pegawai->nidn }}" required id="" class="form-control">

                                </div>
                                <div class="mb-2">
                                    <label for="" class="lable">Jenis Kelamin</label>
                                    <select name="jk" id="" class="form-control">
                                        <option value="" disabled selected>Pilih satu.!</option>
                                        <option {{ Auth::user()->pegawai->jk == 'L' ? 'selected' : '' }} value="L">Laki-laki</option>
                                        <option {{ Auth::user()->pegawai->jk == 'P' ? 'selected' : '' }} value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="lable">Alamat</label>
                                    <input type="text" name="alamat" value="{{ Auth::user()->pegawai->alamat }}" required id="" class="form-control">

                                </div>
                                <div class="mb-2">
                                    <label for="" class="lable">Tanggal lahir</label>
                                    <input type="date" name="tgl_lahir" value="{{ date('Y-m-d', strtotime(Auth::user()->pegawai->tgl_lahir)) }}" required id="" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="lable">Tempat lahir</label>
                                    <input type="text" name="tempat_lahir" required value="{{ Auth::user()->pegawai->tempat_lahir }}" id="" class="form-control">

                                </div>
                                <div class="mb-2">
                                    <label for="" class="lable">Pendidikan</label>
                                    <input type="text" name="pendidikan" value="{{ Auth::user()->pegawai->pendidikan }}" required id="" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="lable">Email</label>
                                    <input type="email" name="email" id="" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="lable">Telp</label>
                                    <input type="text" name="hp" value="{{ Auth::user()->pegawai->hp }}" required id="" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="lable">Foto</label>
                                    <input type="file" name="foto" id="" class="form-control">
                                    <span class="text-success" style="font-size: 13px">Info: Kosongkan apabila tidak ingin merubah foto</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{-- @if ($edit->status == 'dosen')
                    <a href="{{ url('/pegawai/'.$edit->id.'/ubahRole') }}" class="btn btn-yellow">
                                @if ($edit->user->hasRole('operator'))
                                Batasi Akses
                                @else
                                Berikan Akses Operator
                                @endif
                                </a>
                                @endif --}}
                                <button type="submit" class="btn  btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
        @endif
    </div>

    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('/dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('/dist/js/demo.min.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @stack('footer')
</body>
</html>
