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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endpush
<!------ Include the above in your HEAD tag ---------->
@if ($registration->count() <= 1)
    <section class="section section-sm ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4 style="margin-left: 1.2rem;">Latest News</h4>
                <ul class="timeline-3">
                    <li>
                        <span class="text-info">Registrasi</span>
                        <span class="float-end text-info">21 March, 2014</span>
                        <p class="mt-2">Melakukan pendaftaran untuk pengajuan </p>
                    </li>
                    <li>
                        <span class="text-info">21 000 Job Seekers</span>
                        <span class="float-end text-info">4 March, 2014</span>
                        <p class="mt-2">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam
                            pellentesque
                            felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                    </li>
                    <li>
                        <span class="text-info">Awesome Employers</span>
                        <span class="float-end text-info">1 April, 2014</span>
                        <p class="mt-2">Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio,
                            tincidunt
                            vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@else
    so dua
@endif

{{-- ! Edit --}}
{{-- @forelse($data as $edit)
        <div class="modal fade" id="edit{{ $edit->id }}" tabindex="-1" role="dialog"
aria-labelledby="modalTitleNotify" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTitleNotify">Persyaratan Registrasi </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @forelse($edit->template->template_list as $no => $template_list)
                <h6>{{ ++$no }}. {{ $template_list->name }}</h6>
            @empty

            @endforelse
            <form action="{{ url('/registration/store/'.$edit->id) }}" method="POST">
                @csrf
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary">Daftar Sekarang</button>
            </form>
        </div>
    </div>
</div>
</div>
@empty

@endforelse--}}
@endsection
