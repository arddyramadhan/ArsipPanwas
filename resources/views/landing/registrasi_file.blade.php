@extends('master.landing.app')
@section('content')
@push('link')
    <style>
        ul.timeline-3 {
            list-style-type: none;
            position: relative;
        }

        ul.timeline-3:before {
            content: " ";
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        ul.timeline-3>li {
            margin: 20px 0;
            padding-left: 20px;
        }

        ul.timeline-3>li:before {
            content: " ";
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #22c0e8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }

    </style>
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
@endpush

<section class="section section-sm pt-7   mb-3">
    @if ($registration->registration_period->template->template_list->count() == $registration->registration_file->count())
    <div class="row px-6">
        <button class="btn btn-secondary col-md-12" data-bs-toggle="modal" data-bs-target="#tracking">Tracking Berkas</button>
    </div>
    @endif
    <div class="row p-5">
        @forelse ($registration->registration_period->template->template_list as $list)
            <div class="col-md-4 mb-5">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $list->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('/registration_file/store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="template_list_id" value="{{ $list->id }}" id="" class="form-control">
                            <input type="hidden" name="registration_id" value="{{ $registration->id }}" id="" class="form-control">
                            <input type="file" name="file" id="" class="form-control">
                        </div>
                </div>
                <div class="card-footer d-flex justify-content-{{ $registration->registration_file->where('template_list_id', $list->id)->count() == 1 ? 'between' : 'end'}}">
                    @if ($registration->registration_file->where('template_list_id', $list->id)->count() == 1)
                        <button type="button" class="btn btn-sm btn-primary">lihat</button>
                    @endif
                    <button type="submit" class="btn btn-sm btn-secondary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
            
        @endforelse
    </div>
</section>

{{-- ! Edit --}}

<div class="modal fade" id="tracking" tabindex="-1" role="dialog"
aria-labelledby="modalTitleNotify" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTitleNotify">Persyaratan Registrasi </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h4 style="margin-left: 1.2rem;">Latest News</h4>
                <ul class="timeline-3">
                    <li>
                        <span class="text-info">Registrasi</span>
                        <span class="float-end text-info">{{ $registration->created_at->diffForHumans() }}</span>
                        <p class="mt-2">Melakukan pendaftaran untuk pengajuan <b>{{ $registration->registration_period->template->name }}</b> </p>
                    </li>
                    @if ($registration->seen_at != null)
                        <li>
                        <span class="text-info">Dilihat</span>
                        <span class="float-end text-info">{{
                        \Carbon\Carbon::parse($registration->seen_at)->diffForHumans() ?? '' }}</span>
                        <p class="mt-2">Sedang dalam proses pemeriksaan berkas oleh petugas</p>
                    </li>
                    @endif
                    {{-- @forelse ($registration->registration_file->where('seen_at', '!=' ,null) as $file) --}}
                    @forelse ($registration->registration_file as $file)
                        <li class="">
                            <span class="text-info">{{ $file->template_list->name }} </span>
                            <span class="float-end text-info">{{ $registration->updated_at->diffForHumans() }}</span>
                            <p class="mt-2 {{ $file->rejected_at != null ? 'alert alert-danger' : '' }} ">{{ ucwords($file->reason) }} </p>
                        </li>
                    @empty
                    @endforelse
                </ul>
           {{-- <div class="row">
                <div class="col-md-6 offset-md-3">
                    
                </div>
            </div> --}}
        </div>
        <div class="modal-footer">
            <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-sm btn-secondary">Tutup</button>
        </div>
    </div>
</div>
</div>
@endsection
