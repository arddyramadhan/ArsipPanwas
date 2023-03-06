@extends('master.dashboard.app')
@section('judul', 'List Template')
@section('content')
<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <table class="table-borderles" width="100%">
                <tr>
                    <td width="15%">Nama Template</td>
                    <th>:</th>
                    <th>{{ $template->name }}</th>
                </tr>
                <tr>
                    <td>Persyaratan</td>
                    <th>:</th>
                    <th>{{ $template->requirement }}</th>
                </tr>
            </table>
        </div>
    </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class=" mb-2">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalNotification">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                            </path>
                        </svg>
                        List Template
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Nama List</th>
                            <th class="border-0">Keterangan</th>
                            <th class="border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($template->template_list as $no => $item)
                            <tr>
                                <td valign="middle">{{ ++$no }}</td>
                                <td valign="middle">{{ $item->name }}</td>
                                <td valign="middle">{{ $item->description }}</td>
                                <td valign="middle" align="center">
                                    <a href="{{ url('/template/'.$item->id) }}"
                                        class="badge bg-secondary">Lihat</a>
                                    <a data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"
                                        class="badge bg-success">Edit</a>
                                    <a data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}"
                                        class="badge bg-danger">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td colspan="4" align="center"><strong>Data Template Belum di tambahkan</strong></td>
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
    <div class="modal fade" id="modalNotification" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Tambah list</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/template_list/store') }}" method="POST">
                        @csrf
                        <input type="text" name="template_id" value="{{ $template->id }}" hidden id=""
                            class="form-control">
                        <div class="form-group">
                            <label for="" class="lable">Nama List</label>
                            <input type="text" name="name" id="" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="" class="lable">Keterangan</label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ! Edit --}}
    @forelse($template->template_list as $edit)
        <div class="modal fade" id="edit{{ $edit->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalTitleNotify" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="modalTitleNotify">Ubah Data </p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/template_list/update/'.$edit->id) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="" class="lable">Nama Tempalte</label>
                                <input type="text" name="name" id="" value="{{ $edit->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="lable">Keterangan</label>
                                <textarea name="description" id="" class="form-control" cols="30"
                                    rows="10">{{ $edit->description }}</textarea>
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

    @endforelse

    {{-- ! delete --}}
    @forelse($template->template_list as $delete)
        <div class="modal fade" id="delete{{ $delete->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalTitleNotify" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="modalTitleNotify">Konfiramsi </p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <h5>Yakin ingin menghapus data ini?
                            </h5>
                        </center>
                        <form action="{{ url('/template_list/delete/'.$delete->id) }}"
                            method="POST">
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

    @endforelse
</div>
@endsection
