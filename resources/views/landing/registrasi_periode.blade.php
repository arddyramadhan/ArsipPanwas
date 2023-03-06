@extends('master.landing.app')
@section('content')
{{-- <section class="section-header overflow-hidden pt-7 pt-lg-8 pb-9 pb-lg-9 mb-3 bg-primary text-white">
    
</section> --}}
{{-- <section class="section section-lg bg-soft pt-0">
    <div class="container">
        <div class="row justify-content-center mb-5 mb-lg-6">
            <div class="col-6 col-md-3 text-center mb-4">
                <div class="icon icon-shape bg-white shadow-lg rounded mb-4">
                    <svg class="icon icon-md text-secondary" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z">
                        </path>
                    </svg>
                </div>
                <h3 class="fw-bolder">21</h3>
                <p class="text-gray">Dashboard Pages</p>
            </div>
            <div class="col-6 col-md-3 text-center mb-4">
                <div class="icon icon-shape bg-white shadow-lg rounded mb-4">
                    <svg class="icon icon-md text-secondary" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z">
                        </path>
                    </svg>
                </div>
                <h3 class="fw-bolder">800+</h3>
                <p class="text-gray">Premium Components</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <div class="icon icon-shape bg-white shadow-lg rounded mb-4">
                    <svg class="icon icon-md text-secondary" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z">
                        </path>
                    </svg>
                </div>
                <h3 class="fw-bolder">Workflow</h3>
                <p class="text-gray">Sass & Gulp</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <div class="icon icon-shape bg-white shadow-lg rounded mb-4">
                    <svg class="icon icon-md text-secondary" aria-hidden="true" focusable="false" data-prefix="fab"
                        data-icon="js-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM243.8 381.4c0 43.6-25.6 63.5-62.9 63.5-33.7 0-53.2-17.4-63.2-38.5l34.3-20.7c6.6 11.7 12.6 21.6 27.1 21.6 13.8 0 22.6-5.4 22.6-26.5V237.7h42.1v143.7zm99.6 63.5c-39.1 0-64.4-18.6-76.7-43l34.3-19.8c9 14.7 20.8 25.6 41.5 25.6 17.4 0 28.6-8.7 28.6-20.8 0-14.4-11.4-19.5-30.7-28l-10.5-4.5c-30.4-12.9-50.5-29.2-50.5-63.5 0-31.6 24.1-55.6 61.6-55.6 26.8 0 46 9.3 59.8 33.7L368 290c-7.2-12.9-15-18-27.1-18-12.3 0-20.1 7.8-20.1 18 0 12.6 7.8 17.7 25.9 25.6l10.5 4.5c35.8 15.3 55.9 31 55.9 66.2 0 37.8-29.8 58.6-69.7 58.6z">
                        </path>
                    </svg>
                </div>
                <h3 class="fw-bolder">Vanilla</h3>
                <p class="text-gray">Javascript</p>
            </div>
        </div>
        <div class="row justify-content-between align-items-center mb-5 mb-lg-7">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 order-lg-2 mb-5 mb-lg-0">
                    <h2 class="h1">Bootstrap 5</h2>
                    <p class="mb-4 lead fw-bold">Latest version of Bootstrap without jQuery</p>
                    <p class="mb-4">Volt is built using the latest version of Bootstrap 5 and we only used Vanilla
                        Javascript for everything including the plugins</p>
                    <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/accordions/"
                        target="_blank" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z">
                            </path>
                        </svg>
                        Getting started
                    </a>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="./assets/img/illustrations/bs5-illustrations.svg" alt="Front pages overview">
                </div>
            </div>
            <div class="col-lg-5 mb-5 mb-lg-0">
                <h2 class="h1 d-flex align-items-center">Kanban Board <span
                        class="ms-3 mb-0 fs-6 badge badge-lg rounded-pill text-gray-800 bg-secondary">Pro</span></h2>
                <p class="mb-4 lead fw-bold">Advanced FullCalendar.js integration</p>
                <p class="mb-4">We created a fully editable calendar where you can add, edit and delete events for your
                    admin dashboard.</p>
                <a href="https://demo.themesberg.com/volt-pro/pages/kanban.html" target="_blank"
                    class="btn btn-secondary d-inline-flex align-items-center me-3">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    Demo
                </a>
                <!-- <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/plugins/kanban/" target="_blank" class="btn btn-outline-primary"><span class="fas fa-book me-2"></span> Guide</a> -->
            </div>
            <div class="col-lg-6">
                <img src="./assets/img/mockup-kanban-presentation.png" alt="Kanban Preview">
            </div>
        </div>
        <div class="row justify-content-between align-items-center mb-5 mb-lg-7">
            <div class="col-lg-5 order-lg-2 mb-5 mb-lg-0">
                <h2 class="h1 d-flex align-items-center">Mapbox <span
                        class="ms-3 mb-0 fs-6 badge badge-lg rounded-pill text-gray-800 bg-secondary">Pro</span></h2>
                <p class="mb-4 lead fw-bold">Markers and cards integration with Leaflet.js</p>
                <p class="mb-4">You can use this map to add markers with custom cards and show them on a map using our
                    custom MapBox integration with Leaflet.js</p>
                <a href="https://demo.themesberg.com/volt-pro/pages/map.html" target="_blank"
                    class="btn btn-secondary d-inline-flex align-items-center me-3">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Demo
                </a>
                <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/plugins/mapbox/" target="_blank"
                    class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Guide
                </a>
            </div>
            <div class="col-lg-6 order-lg-1">
                <img src="./assets/img/mockup-map-presentation.png" alt="MapBox Leaflet.js Custom Integration Mockup">
            </div>
        </div>
        <div class="row justify-content-between align-items-center mb-5 mb-lg-7">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <h2 class="h1 d-flex align-items-center">Calendar <span
                        class="ms-3 mb-0 fs-6 badge badge-lg rounded-pill text-gray-800 bg-secondary">Pro</span></h2>
                <p class="mb-4 lead fw-bold">Advanced FullCalendar.js integration</p>
                <p class="mb-4">We created a fully editable calendar where you can add, edit and delete events for your
                    admin dashboard.</p>
                <a href="https://demo.themesberg.com/volt-pro/pages/calendar.html" target="_blank"
                    class="btn btn-secondary d-inline-flex align-items-center me-3">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Demo
                </a>
                <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/plugins/calendar/" target="_blank"
                    class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Guide
                </a>
            </div>
            <div class="col-lg-6">
                <img src="./assets/img/mockup-calendar-presentation.png" alt="Calendar Preview">
            </div>
        </div>
    </div>
</section> --}}
<section class="section section-sm pt-7 pt-lg-8 pb-9 pb-lg-9 mb-3">
    <div class="container">
        
        <div class="row mb-5">
            @forelse($data as $item)
                <div class="col-md-6 mb-5">
                    <a data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"
                            class="page-preview scale-up-2">
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ $item->name }}</h3>
                            </div>
                            <div class="card-body pb-5">
                                <p>Untuk yang ingin mengajukan berkas pengajuan beasiswa, diharapkan dapat memasukan berkas pada :</p>
                                <table class="table-borderles" width="100%">
                                    <tr>
                                        <td width="40%">Mulai Pemasukan Berkas</td>
                                        <td width="1%">:</td>
                                        <th>{{ date('d F Y', strtotime($item->registration_start)) }}</th>
                                    </tr>
                                    <tr>
                                        <td>Tutup Pemasukan Berkas</td>
                                        <td>:</td>
                                        <th>{{ date('d F Y', strtotime($item->registration_end)) }}</th>
                                    </tr>
                                </table>
                            </div>
                            {{-- <div class="card-footer"></div> --}}
                        </div>
                        <div class="text-center bg-secondary show-on-hover rounded-bottom">
                            <h6 class="m-0 text-center d-inline-flex align-items-center text-dark">Ikuti Selekasi<svg
                                    class="icon icon-xs ms-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z">
                                    </path>
                                    <path
                                        d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z">
                                    </path>
                                </svg></h6>
                        </div>
                    </a>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</section>

{{-- ! Edit --}}
    @forelse($data as $edit)
        <div class="modal fade" id="edit{{ $edit->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalTitleNotify" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleNotify">Persyaratan Registrasi </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @forelse ($edit->template->template_list as $no => $template_list)
                            <h6>{{ ++$no }}. {{ $template_list->name }}</h6>
                        @empty
                            
                        @endforelse
                        <form action="{{ url('/registration/store/'.$edit->id) }}"
                            method="POST">
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

    @endforelse
@endsection
