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
        <a class="dropdown-item" href="{{ url('/rumpun') }}">
            Data Rumpun
        </a>
        <a class="dropdown-item" href="{{ url('/jenis') }}">
            Data Jenis
        </a>
        <a class="dropdown-item" href="{{ url('/kurikulum') }}">
            Data Kurikulum
        </a>
        <a class="dropdown-item" href="{{ url('/cpmk') }}">
            Data Pembelajaran (CPMK)
        </a>
    </div>
</li>
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
