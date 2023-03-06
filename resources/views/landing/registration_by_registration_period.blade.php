@extends('master.landing.app')
@section('content')

<section class="section section-sm pt-7 pt-lg-8 pb-9 pb-lg-9 mb-3">
    <div class="container">
        <h3>{{ $registration_period->name }}</h3>
        <p>{{ $registration_period->template->requirement }}</p>
        <div class="row mb-5">
            <div class="modal-body">
                    <form action="{{ url('/registration/store/'.$registration_period->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @forelse ($registration_period->template->template_list as $no => $list)
                            <div class="form-group mb-4">
                                <label for="" class="lable">coba <span class="badge badge-sm bg-warning">?</span></label>
                                <input type="file" name="file[{{ $list->id }}]" id="" class="form-control">
                            </div>
                        @empty
                            
                        @endforelse
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </div>
        </div>
    </div>
</section>
@endsection
