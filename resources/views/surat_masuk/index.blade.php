@extends('master.dashboard.app')
@section('judul', 'Surat Masuk')
@section('content')
@include('alert_error')
<div class="pb-2">
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNotification">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Data Surat Masuk
        </button>
    </div>
</div>
<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Nomor Surat</th>
                            <th class="border-0">Tgl Surat</th>
                            <th class="border-0">Asal Surat</th>
                            <th class="border-0">Deskripsi</th>
                            <th class="border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $no => $item)
                        <tr>
                            <td valign="top">{{ ++$no }}</td>
                            <td valign="top">{{ $item->nomor }}</td>
                            <td valign="top">{{ date('d-m-y', strtotime($item->tgl_surat)) }}</td>
                            <td valign="top">{{ $item->asal }}</td>
                            <td valign="middle" width="30%">{{ $item->deskripsi }}</td>
                            <td valign="top" align="center">
                                <a href="{{ url('/surat_masuk/'.$item->id) }}" class="badge bg-secondary">Lihat</a>
                            </td>
                        </tr>
                        @empty
                        <tr class="">
                            <td colspan="6" align="center"><strong>Data Template Belum di tambahkan</strong></td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Button Modal -->
    {{-- <button type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal"
            data-bs-target="#modalNotification">Notification</button> --}}
    <!-- Modal Content -->
    <div class="modal fade" id="modalNotification" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah Surat Masuk</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/surat_masuk/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="lable">Nomor</label>
                            <input type="text" name="nomor" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="lable">Tanggal Surat Masuk</label>
                            <input type="date" value="{{ date('Y-m-d') }}" name="tgl_surat" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="lable">Asal Surat</label>
                            <input type="text" name="asal" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="lable">Deskripsi</label>
                            <textarea name="deskripsi" id="" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="lable">File</label>
                            <input type="file" name="file" id="" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ! Edit --}}
    {{-- @forelse($data as $edit)
        <div class="modal fade" id="edit{{ $edit->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTitleNotify">Ubah Data </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/fakultas/update/'.$edit->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="" class="lable">Nama Tempalte</label>
                        <input type="text" name="name" id="" value="{{ $edit->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="lable">Persyaratan</label>
                        <textarea name="requirement" id="" class="form-control" cols="30" rows="10">{{ $edit->requirement }}</textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@empty

@endforelse --}}

{{-- ! delete --}}
{{-- @forelse($data as $delete)
        <div class="modal fade" id="delete{{ $delete->id }}" tabindex="-1" role="dialog"
aria-labelledby="modalTitleNotify" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <p class="modal-title" id="modalTitleNotify">Ubah Data </p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <center>
                <h5>Yakin ingin menghapus data ini?
                </h5>
            </center>
            <form action="{{ url('/template/delete/'.$delete->id) }}" method="POST">
                @csrf
                @method('delete')
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
</div>
@empty

@endforelse --}}
</div>
@endsection
