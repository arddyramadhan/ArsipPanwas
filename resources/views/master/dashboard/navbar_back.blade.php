<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                            </span>
                            <span class="nav-link-title">
                                Halaman Utama
                            </span>
                        </a>
                    </li>
                    {{-- !admin --}}
                    @if (Auth::user()->hasRole('admin'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                    <path d="M4 6v6a8 3 0 0 0 16 0v-6" />
                                    <path d="M4 12v6a8 3 0 0 0 16 0v-6" />
                                </svg>

                            </span>
                            <span class="nav-link-title">
                                Manajemen data
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/profil_lulusan') }}">
                                Manajemen Parameter
                            </a>
                            <a class="dropdown-item" href="{{ url('/jurusan') }}">
                                Manajemen Jurusan
                            </a>
                            {{-- <a class="dropdown-item" href="{{ url('/program_studi') }}">
                                Manajemen Program Studi
                            </a> --}}
                            <a class="dropdown-item" href="{{ url('/pegawai') }}">
                                Manajemen user
                            </a>
                            <a class="dropdown-item" href="{{ url('/pegawai_fakultas') }}">
                                Manajemen Jabatan
                            </a>
                            {{-- <a style="border-top: 1px solid rgb(207, 207, 207)" class="dropdown-item" href="{{ url('/fakultas/1/show') }}">
                            Pengaturan Fakultas
                            </a> --}}
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/fakultas/1/show') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Pengaturan Fakultas
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard/sinkron') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-stackoverflow" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 17v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-1" />
                                    <path d="M8 16h8" />
                                    <path d="M8.322 12.582l7.956 .836" />
                                    <path d="M8.787 9.168l7.826 1.664" />
                                    <path d="M10.096 5.764l7.608 2.472" />
                                </svg>

                            </span>
                            <span class="nav-link-title">
                                Sinkronisasi Dosen 
                            </span>
                        </a>
                    </li>
                    @endif
                    {{-- ! operator + dosen --}}
                    @if (Auth::user()->hasRole('operator'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                    <path d="M4 6v6a8 3 0 0 0 16 0v-6" />
                                    <path d="M4 12v6a8 3 0 0 0 16 0v-6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Master Data
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            {{-- <a class="dropdown-item" href="{{ url('/program_studi') }}">
                                Data Program Studi
                            </a>
                            <a class="dropdown-item" href="{{ url('/pegawai_jurusan') }}">
                                Data Jabatan
                            </a> --}}
                            <a class="dropdown-item" href="{{ url('/rumpun') }}">
                                Data Rumpun
                            </a>
                            <a class="dropdown-item" href="{{ url('/jenis') }}">
                                Data Jenis
                            </a>
                            <a class="dropdown-item" href="{{ url('/kurikulum') }}">
                                Data Kurikulum
                            </a>
                            {{-- <a class="dropdown-item" href="{{ url('/capaian_lulusan') }}">
                                Data Capaian Lulusan
                            </a> --}}
                            {{-- <a class="dropdown-item" href="{{ url('/profil_jurusan') }}">
                                Data Profil Lulusan Jurusan
                            </a> --}}
                            {{-- <a class="dropdown-item" href="{{ url('/profil_prodi') }}">
                                Data Profil Lulusan Prodi
                            </a> --}}
                            <a class="dropdown-item" href="{{ url('/cpmk') }}">
                                Data CPMK
                            </a>
                            {{-- <a style="border-top: 1px solid rgb(207, 207, 207)" class="dropdown-item" href="{{ url('/fakultas/1/show') }}">
                            Pengaturan Fakultas
                            </a> --}}
                        </div>
                    </li>
                    {{-- <li class="nav-item  {{ Request::segment(1) == 'matakuliah' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/matakuliah') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18" />
                                    <line x1="13" y1="8" x2="15" y2="8" />
                                    <line x1="13" y1="12" x2="15" y2="12" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Matakuliah
                            </span>
                        </a>
                    </li> --}}
                    @endif
                    @if (Auth::user()->hasRole('dosen') || Auth::user()->hasRole('operator'))
                    @if (Auth::user()->pegawai->status == 'dosen')
                    <li class="nav-item  {{ Request::segment(1) == 'matakuliah' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/matakuliah') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18" />
                                    <line x1="13" y1="8" x2="15" y2="8" />
                                    <line x1="13" y1="12" x2="15" y2="12" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Matakuliah
                            </span>
                        </a>
                    </li>
                    <li class="nav-item  {{ Request::segment(1) == 'rps' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/rps') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <line x1="3" y1="6" x2="3" y2="19" />
                                    <line x1="12" y1="6" x2="12" y2="19" />
                                    <line x1="21" y1="6" x2="21" y2="19" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                R P S
                            </span>
                        </a>
                    </li>
                    @endif
                    @endif
                    @if (Auth::user()->hasRole('operator'))
                    {{-- <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/jurusan/'.Auth::user()->pegawai->jurusan_id.'/show') }}">
                            
                            <span class="nav-link-title">
                                Pengaturan Jurusan
                            </span>
                        </a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ Auth::user()->pegawai->jurusan->nama }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/program_studi') }}">
                                Program Studi
                            </a>
                            <a class="dropdown-item" href="{{ url('/pegawai_jurusan') }}">
                                Jabatan
                            </a>
                            <a class="dropdown-item" href="{{ url('/capaian_lulusan') }}">
                                Capaian Lulusan
                            </a>
                            {{-- <a class="dropdown-item" href="{{ url('/profil_jurusan') }}">
                            Profil Lulusan Jurusan
                            </a> --}}
                            <a class="dropdown-item" href="{{ url('/profil_prodi') }}">
                                Profil Lulusan Prodi
                            </a>
                            <a class="dropdown-item" href="{{ url('/jurusan/'.Auth::user()->pegawai->jurusan_id.'/show') }}">
                                Pengaturan
                            </a>
                        </div>
                    </li>
                    @endif
                </ul>
                {{-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                <form action="." method="get">
                <div class="input-icon">
                    <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                    </span>
                    <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                </div>
                </form>
            </div> --}}
            </div>
        </div>
    </div>
</div>
