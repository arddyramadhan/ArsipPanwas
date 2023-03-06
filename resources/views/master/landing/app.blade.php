<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Bawaslu</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Volt - Free Bootstrap 5 Admin Dashboard">
<meta name="author" content="Themesberg">
<!-- Sweet Alert -->
<link type="text/css" href="{{ asset('/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{ asset('/vendor/notyf/notyf.min.css') }}" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{ asset('/css/volt.css') }}" rel="stylesheet">
@stack('link')

</head>

<body>
    <header class="header-global">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary pt-4 navbar-dark">
        <div class="container position-relative">
            <div class="navbar-collapse collapse me-auto" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.html">
                                <img src="./assets/img/brand/light.svg" alt="Volt logo">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                {{-- <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item me-2">
                        <span class="nav-link"> {{ Auth::user()!=null ? 'Hi, ' : '' }} {{ Auth::user()->student->fullname ?? '' }} </span>
                    </li>
                    <li class="nav-item me-2">
                        <a href="{{ url('/') }}" class="nav-link"> 
                            Home</a>
                    </li>
                    <li class="nav-item me-2">
                        <a href="{{ url('registration_period/index_landing') }}" class="nav-link">Periode Pendaftaran</a>
                    </li>
                    
                    @if ((Auth::check() == true) && Auth::user()->hasRole('student'))
                        <li class="nav-item me-2">
                            @if (Auth::user()->student->registration->count() > 0)
                                @if (Auth::user()->student->registration->count() > 1)
                                    <a href="{{ url('/registration/byStudent') }}" class="nav-link">Daftar Pengajuan</a>
                                @else
                                    <a href="{{ url('/registration_file/byRegistration/'.Auth::user()->student->registration->first()->id) }}" class="nav-link">Pemasukan Berkas</a>
                                @endif
                                    
                            @endif
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="./pages/examples/lock.html" class="nav-link">Persyaratan</a>
                    </li>
                </ul> --}}
            </div>
            <div class="d-flex align-items-center ms-auto">
                {{-- <a href="{{ route('register') }}" class="btn btn-outline-white d-inline-flex align-items-center me-md-3">
                    Registrasi
                </a> --}}
                @if ((Auth::check() == 1) && Auth::user()->hasRole('student') )
                    <a class="btn btn-outline-white d-inline-flex align-items-center me-md-3" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endif
                @if ((Auth::check() == 1) && (Auth::user()->hasRole('student') != 'student') )
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-white d-inline-flex align-items-center me-md-3">
                        <i class="fa-solid fa-right-to-bracket"></i> &nbsp; Dashboard 
                    </a>
                @endif
                @if (Auth::check() != 1)
                    <a href="{{ route('login') }}" class="btn btn-outline-white d-inline-flex align-items-center me-md-3">
                        <i class="fa-solid fa-right-to-bracket"></i> &nbsp; Login 
                    </a>
                @endif
                
                
            </div>
        </div>
    </nav>
</header>
    <main>
    @yield('content')
    </main>
    <footer class="footer py-6 bg-gray-800 text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="navbar-brand-dark mb-4" height="35" src="./assets/img/brand/light.svg" alt="Logo light">
                <p>Volt is a Premium Bootstrap 5 Admin Dashboard bringing together beautiful UI/UX design and functional elements.</p>
                <ul class="social-buttons mb-5 mb-lg-0">
                    <li>
                        <a href="https://twitter.com/themesberg" aria-label="twitter social link" class="icon-white me-2">
                            <span class="fab fa-twitter"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/themesberg/" class="icon-white me-2" aria-label="facebook social link">
                            <span class="fab fa-facebook"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/themesberg" aria-label="github social link" class="icon-white me-2">
                            <span class="fab fa-github"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://dribbble.com/themesberg" class="icon-white" aria-label="dribbble social link" >
                            <span class="fab fa-dribbble"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-5 mb-lg-0">
                <span class="h5">Themesberg</span>
                <ul class="links-vertical mt-2">
                    <li><a target="_blank" href="https://themesberg.com/blog">Blog</a></li>
                    <li><a target="_blank" href="https://themesberg.com/products">Products</a></li>
                    <li><a target="_blank" href="https://themesberg.com/about">About Us</a></li>
                    <li><a target="_blank" href="https://themesberg.com/contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-5 mb-lg-0">
                <span class="h5">Other</span>
                <ul class="links-vertical mt-2">
                    <li><a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/getting-started/quick-start/" target="_blank">Docs
                            <span class="badge badge-sm bg-secondary text-dark ms-2">v1.4</span></a></li>
                    <li><a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/getting-started/changelog/" target="_blank">Changelog</a></li>
                    <li><a target="_blank" href="https://themesberg.com/licensing">License</a>
                    </li>
                    <li><a target="_blank" href="https://themesberg.com/contact">Support</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 mb-5 mb-lg-0">
                <span class="h5 mb-3 d-block">Subscribe</span>
                <form action="#">
                    <div class="form-row mb-2">
                        <div class="col-12">
                            <input type="email" class="form-control mb-2" placeholder="example@company.com" name="email" aria-label="Subscribe form" required>
                        </div>
                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-secondary" data-loading-text="Sending">
                                <span>Subscribe</span>
                            </button>
                        </div>
                    </div>
                </form>
                <p class="text-muted font-small m-0">We’ll never share your details. See our <a class="text-white" href="#">Privacy Policy</a></p>
            </div>
        </div>
        <hr class="bg-gray-700 my-5">
        <div class="row">
            <div class="col mb-md-0">
                <a href="https://themesberg.com" target="_blank" class="d-flex justify-content-center">
                    <img src="./assets/img/themesberg-logo-alt.svg" height="35" class="mb-4" alt="Themesberg Logo">
                </a>
            <div class="d-flex text-center justify-content-center align-items-center" role="contentinfo">
                <p class="fw-normal font-small mb-0">Copyright © Themesberg 2019-<span class="current-year">2021</span>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- Core -->
<script src="{{ asset('/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Vendor JS -->
<script src="{{ asset('/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

<!-- Slider -->
<script src="{{ asset('/vendor/nouislider/distribute/nouislider.min.js') }}"></script>

<!-- Smooth scroll -->
<script src="{{ asset('/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

<!-- Charts -->
<script src="{{ asset('/vendor/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>

<!-- Datepicker -->
<script src="{{ asset('/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

<!-- Sweet Alerts 2 -->
<script src="{{ asset('/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="{{ asset('/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

<!-- Notyf -->
<script src="{{ asset('/vendor/notyf/notyf.min.js') }}"></script>

<!-- Simplebar -->
<script src="{{ asset('/vendor/simplebar/dist/simplebar.min.js') }}"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="{{ asset('/assets/js/volt.js') }}"></script>
@stack('js')
</body>

</html>