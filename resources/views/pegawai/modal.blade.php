<div class="modal fade" id="dosen" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ url('/'.$base.'/storeDosen') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah data Dosen</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- @csrf
                    <div class="mb-2">
                        <label for="" class="lable">Nama</label>
                        <input type="text" name="nama" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">NIP</label>
                        <input type="text" name="nip" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">NIDN</label>
                        <input type="text" name="nidn" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option value="" disabled selected>Pilih satu.!</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Alamat</label>
                        <input type="text" name="alamat" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Tanggal lahir</label>
                        <input type="date" name="tgl_lahir" value="{{ date('Y-m-d') }}" required id="" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="" class="lable">Tempat lahir</label>
                    <input type="text" name="tempat_lahir" required id="" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="" class="lable">Pendidikan</label>
                    <input type="text" name="pendidikan" required id="" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="" class="lable">Email</label>
                    <input type="email" name="email" required id="" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="" class="lable">Telp</label>
                    <input type="text" name="hp" required id="" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="" class="lable">Akses</label>
                    <select name="akses" id="" class="form-control">
                        <option value="" disabled selected>Pilih satu.!</option>
                        <option value="dosen">Hanya Dosen</option>
                        <option value="dosen_operator">Dosen + Operator</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="" class="lable">Jurusan</label>
                    <select name="jurusan_id" id="" class="form-control" required>
                        <option value="" disabled selected>Pilih satu.!</option>
                        @forelse ($jurusan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="mb-2">
                    <label for="" class="lable">Username</label>
                    <input type="text" name="username" id="" class="form-control">
                    <span class="text-success" style="font-size: 13px">kosongkan apabila ingin menggunakan NIP sebagai akses Masuk</span>
                </div>
                <div class="mb-2">
                    <label for="" class="lable">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                    <span class="text-success" style="font-size: 13px">kosongkan apabila ingin menggunakan NIP sebagai akses Masuk</span>
                </div>
                <div class="mb-2">
                    <label for="" class="lable">Foto</label>
                    <input type="file" name="foto" required id="" class="form-control">
                </div> --}}
                <center>
                    <h3>Untuk menambahkan data dosen harus melalui menu Sinkronisasi Dosen...!!</h3>
                </center>
        </div>
        <div class="modal-footer">
            {{-- <button type="submit" class="btn  btn-primary">Simpan</button> --}}
        </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="operator" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ url('/'.$base.'/storeOperator') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah data Operator</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-2">
                        <label for="" class="lable">Nama</label>
                        <input type="text" name="nama" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">NIP</label>
                        <input type="text" name="nip" id="" required class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">NIDN</label>
                        <input type="text" name="nidn" id="" required class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control" required>
                            <option value="" disabled selected>Pilih satu.!</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Alamat</label>
                        <input type="text" name="alamat" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Tanggal lahir</label>
                        <input type="date" name="tgl_lahir" required value="{{ date('Y-m-d') }}" id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Tempat lahir</label>
                        <input type="text" name="tempat_lahir" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Pendidikan</label>
                        <input type="text" name="pendidikan" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Telp</label>
                        <input type="text" name="hp" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Email</label>
                        <input type="email" required name="email" id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Username</label>
                        <input type="text" name="username" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Password</label>
                        <input type="password" name="password" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Jurusan</label>
                        <select name="jurusan_id" id="" class="form-control" required>
                            <option value="" disabled selected>Pilih satu.!</option>
                            @forelse ($jurusan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Foto</label>
                        <input type="file" name="foto" required id="" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn  btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ! Lihat --}}
@forelse($data as $lihat)
<div class="modal fade" id="lihat{{ $lihat->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Detail Data {{ $lihat->status == 'dosen' ? 'Dosen' : 'Operator' }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    {{-- <span class="avatar avatar-xl" style="width:50%;heigt:100px;background-image: url({{ $lihat->user->foto != null ? asset($lihat->user->foto) : asset('./static/biro.png') }})"></span> --}}
                    <img height="auto" width="30%" style="border-radius: 5%" src="{{ $lihat->user->foto != null ? asset($lihat->user->foto) : asset('./static/biro.png') }}" alt="">
                    <br>
                    <a href="{{ url('/pegawai/'.$lihat->id.'/reset') }}" class="btn btn-warning mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                        </svg>
                        Reset Akun
                    </a>
                    @if ($lihat->status == 'dosen')
                    <a href="{{ url('/pegawai/'.$lihat->id.'/ubahRole') }}" class="btn btn-info mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-switch-horizontal" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="16 3 20 7 16 11" />
                            <line x1="10" y1="7" x2="20" y2="7" />
                            <polyline points="8 13 4 17 8 21" />
                            <line x1="4" y1="17" x2="13" y2="17" />
                        </svg>
                        @if ($lihat->user->hasRole('operator'))
                        Batasi Akses
                        @else
                        Berikan Akses Operator ({{ $lihat->jurusan->nama }})
                        @endif
                    </a>
                    @endif
                </center>
                <table width="100%" class="mt-4">
                    <tr>
                        <td width="20%">
                            Nama
                        </td>
                        <th width="3%">
                            :
                        </th>
                        <th width="auto">
                            {{ $lihat->nama }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Jenis Kelamin
                        </td>
                        <th>
                            :
                        </th>
                        <th>
                            {{ $lihat->jk == 'P' ? 'Perempuan' : 'Laki-Laki' }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            NIP
                        </td>
                        <th>
                            :
                        </th>
                        <th>
                            {{ $lihat->nip }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            NIDN
                        </td>
                        <th>
                            :
                        </th>
                        <th>
                            {{ $lihat->nidn }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Tempat Lahir
                        </td>
                        <th>
                            :
                        </th>
                        <th>
                            {{ $lihat->tampat_lahir }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Tanggal Lahir
                        </td>
                        <th>
                            :
                        </th>
                        <th>
                            {{ date('d-m-Y', strtotime($lihat->tgl_lahir)) }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Pendidikan
                        </td>
                        <th>
                            :
                        </th>
                        <th>
                            {{ $lihat->pendidikan }}
                        </th>
                    </tr>
                    <tr>
                        <td valign="top">
                            Alamat
                        </td>
                        <th valign="top">
                            :
                        </th>
                        <th>
                            {{ $lihat->alamat }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            No Telepon
                        </td>
                        <th>
                            :
                        </th>
                        <th>
                            {{ $lihat->hp }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Dosen Jurusan
                        </td>
                        <th>
                            :
                        </th>
                        <th>
                            {{ $lihat->jurusan->nama }}
                        </th>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

{{-- ! Edit --}}
@forelse($data as $edit)
<div class="modal fade" id="edit{{ $edit->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Perbaharui Data</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('./'.$base.'/'.$edit->id.'/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="" class="lable">Nama</label>
                        <input type="text" name="nama" value="{{ $edit->nama }}" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">NIP</label>
                        <input type="text" name="nip" value="{{ $edit->nip }}" required id="" class="form-control">

                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">NIDN</label>
                        <input type="text" name="nidn" value="{{ $edit->nidn }}" required id="" class="form-control">

                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option value="" disabled selected>Pilih satu.!</option>
                            <option {{ $edit->jk == 'L' ? 'selected' : '' }} value="L">Laki-laki</option>
                            <option {{ $edit->jk == 'P' ? 'selected' : '' }} value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Alamat</label>
                        <input type="text" name="alamat" value="{{ $edit->alamat }}" required id="" class="form-control">

                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Tanggal lahir</label>
                        <input type="date" name="tgl_lahir" value="{{ date('Y-m-d', strtotime($edit->tgl_lahir)) }}" required id="" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Tempat lahir</label>
                        <input type="text" name="tempat_lahir" required value="{{ $edit->tempat_lahir }}" id="" class="form-control">

                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Pendidikan</label>
                        <input type="text" name="pendidikan" value="{{ $edit->pendidikan }}" required id="" class="form-control">

                    </div>
                    {{-- <div class="mb-2">
                        <label for="" class="lable">Email</label>
                        <input type="email" name="email" value="{{ $edit->user->email }}" required id="" class="form-control">

                    </div> --}}
                    <div class="mb-2">
                        <label for="" class="lable">Telp</label>
                        <input type="text" name="hp" value="{{ $edit->hp }}" required id="" class="form-control">

                    </div>
                    <div class="mb-2">
                        <label for="" class="lable">Jurusan</label>
                        <select name="jurusan_id" id="" class="form-control" required>
                            <option value="" disabled selected>Pilih satu.!</option>
                            @forelse ($jurusan as $item)
                            <option {{ $item->id  == $edit->jurusan_id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                            @endforelse
                        </select>
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
</div>
@empty
@endforelse

{{-- ! delete --}}
@forelse($data as $delete)
<div class="modal fade" id="delete{{ $delete->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Hapus data</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{  url('./'.$base.'/'.$delete->id.'/delete')  }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <center>
                        <h5>Yakin ingin menghapus data ini?
                        </h5>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn  btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse
