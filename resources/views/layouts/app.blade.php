<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Boltz : Crypto Admin Template" />
    <meta property="og:title" content="Boltz : Crypto Admin Template" />
    <meta property="og:description" content="Boltz : Crypto Admin Template" />
    <meta property="og:image" content="https://boltz.dexignzone.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Manajemen Inventori - YUNESH COLLECTION</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />

    <link href="{{ asset('') }}assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- Style css -->
    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/select2/css/select2.min.css">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->

    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('home') }}" class="brand-logo">
                <center><img src="{{ asset('assets/images/yclogobaru.png') }}" width="140px"> </center>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="nav-item">
                                <!-- Tambahan opsional untuk konten lainnya -->
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link ai-icon" href="javascript:void(0);" id="logout-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                        height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- JavaScript Logout -->
                <script>
                    document.getElementById('logout-btn').addEventListener('click', function(event) {
                        event.preventDefault(); // Hindari aksi default pada klik tombol
                        document.getElementById('logout-form').submit(); // Kirim form logout
                    });
                </script>

            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <div class="dropdown header-profile">
                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">

                        <div class="header-info">
                            <span class="font-w400 mb-0">Hello,<b>{{ auth()->user()->name }}</b></span>
                        </div>
                    </a>

                </div>
                <ul class="metismenu" id="menu">
                    <li>
                        <a class="ai-icon" href="{{ route('home') }}" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="{{ route('master-barang.index') }}" aria-expanded="false">
                            <i class="flaticon-086-star"></i>
                            <span class="nav-text">Master Barang</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="{{ route('barang-masuk.index') }}" aria-expanded="false">
                            <i class="flaticon-041-graph"></i>
                            <span class="nav-text">Barang Masuk</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="{{ route('barang-keluar.index') }}" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">Barang Keluar</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="{{ route('laporan.index') }}" aria-expanded="false">
                            <i class="flaticon-050-info"></i>
                            <span class="nav-text">Laporan</span>
                        </a>
                    </li>

                    <!-- New "Data Master" menu -->
                    <li class="has-arrow">
                        <a class="ai-icon" href="javascript:void(0)" aria-expanded="false">
                            <i class="flaticon-015-box"></i>
                            <span class="nav-text">Data Master</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('master-supplier.index') }}">Master Supplier</a></li>
                            <li><a href="{{ route('master-merk.index') }}">Master Merk</a></li>
                            <li><a href="{{ route('master-gudang.index') }}">Gudang</a></li>
                        </ul>
                    </li>
                </ul>



            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                @yield('content')

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



        <!--**********************************
            Footer start
        ***********************************-->
        {{-- <div class="footer">

            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://dexignzone.com/"
                        target="_blank">DexignZone</a> 2021</p>
            </div>
        </div> --}}
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('') }}assets/vendor/global/global.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('') }}assets/vendor/apexchart/apexchart.js"></script>
    <script src="{{ asset('') }}assets/vendor/owl-carousel/owl.carousel.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('') }}assets/js/dashboard/dashboard-1.js"></script>

    <script src="{{ asset('') }}assets/js/custom.min.js"></script>
    <script src="{{ asset('') }}assets/js/deznav-init.js"></script>
    <!-- Datatable -->
    <script src="{{ asset('') }}assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}assets/js/plugins-init/datatables.init.js"></script>
    <script src="{{ asset('') }}assets/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('') }}assets/js/plugins-init/select2-init.js"></script>

</body>

</html>
@stack('scripts')
