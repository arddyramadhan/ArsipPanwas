{{-- @if (Request::segment(4) == 'matakuliah') --}}
<div class="container">
    <h2 class="mb-3">Mata kuliah</h2>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card card-sm">
                <div class="card-status-top bg-green"></div>
                <div class="card-body">
                    <h2 class="card-title">Detail Mata kuliah</h2>
                    <div class="mt-1">
                        <div class="row mb-2">
                            <div class="col-md-2">Kode Mata kuliah</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->kode.'-'.$matakuliah->jenjang.'-'.$matakuliah->urutan.'-'.$matakuliah->semester.'-'.$matakuliah->sks }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Nama Mata kuliah</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->nama }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Rumpun Mata kuliah</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->rumpun->nama }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Koordinator RMK</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->pegawai->nama }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Semester</div>
                            <div class="col-md-10 bold">: Semester {{ $matakuliah->semester }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">SKS Matakuliah</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->sks }} SKS</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Bobot SKS Teori</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->teori }} (teori)</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Bobot SKS Praktek</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->praktek }} (praktek)</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Bobot SKS Lapangan</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->lapangan }} (lapangan)</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Jenis Mata kuliah</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->jenis->nama }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Kurikulum</div>
                            <div class="col-md-10 bold">:
                                @forelse ($matakuliah->kurikulum as $no => $item)
                                @php
                                ++$no
                                @endphp
                                {{ $no > 1 ? ' | '.$item->nama : $item->nama }}
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Program Studi</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->program_studi->nama }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Deskripsi</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->deskripsi }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Mata Kuliah Persyaratan</div>
                            <div class="col-md-10 bold">: {{ $matakuliah->mk_persyaratan }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">Pengembang RPS </div>
                            <div class="col-md-10 bold">
                                <ol>
                                    @forelse ($matakuliah->pegawai_rps as $no => $rps)
                                    @php
                                    ++$no
                                    @endphp
                                    <li>
                                        {{ $rps->nama }}
                                    </li>
                                    @empty
                                    @endforelse
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endif --}}
