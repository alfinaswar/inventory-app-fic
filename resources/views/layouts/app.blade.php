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
    <title>Manajemen Inventori</title>

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
            <a href="index.html" class="brand-logo">
                <svg class="logo-abbr" width="54" height="54" viewBox="0 0 54 54" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect class="rect-primary-rect" width="54" height="54" rx="27" fill="#2258BF" />
                    <mask maskUnits="userSpaceOnUse" x="0" y="0" width="54" height="54">
                        <rect width="54" height="54" rx="27" fill="#2258BF" />
                    </mask>
                    <g mask="">
                        <path
                            d="M46.1676 26.5805C46.1217 26.129 45.8612 25.7806 45.4991 25.6835L34.9748 22.8635L42.8655 9.05303C43.0565 8.72265 43.1126 8.31849 43.0178 7.96681C42.9212 7.61451 42.6881 7.35877 42.388 7.27836L31.132 4.26233C30.7287 4.15426 30.2838 4.38142 30.0263 4.82453L14.9917 30.9187C14.8007 31.2491 14.744 31.6556 14.8406 32.0078C14.9329 32.3614 15.1678 32.6176 15.4698 32.6985L21.6719 34.3604L7.46102 59.0235C7.17542 59.5193 7.20173 60.1564 7.52473 60.5342C7.64091 60.6708 7.78346 60.7617 7.93918 60.8034C8.21123 60.8763 8.51961 60.7982 8.77813 60.5688L45.7105 27.791C46.0341 27.5062 46.2127 27.0345 46.1676 26.5805Z"
                            fill="#FFC42C" />
                        <path
                            d="M43.3374 21.0401C43.2915 20.5885 43.0311 20.2402 42.669 20.1431L32.1446 17.3231L40.0354 3.51262C40.2264 3.18225 40.2825 2.77808 40.1877 2.42641C40.091 2.07411 39.858 1.81836 39.5579 1.73796L28.3019 -1.27807C27.8986 -1.38614 27.4536 -1.15898 27.1962 -0.715872L12.1615 25.3783C11.9705 25.7087 11.9138 26.1152 12.0105 26.4674C12.1028 26.821 12.3377 27.0772 12.6397 27.1581L18.8418 28.82L4.63088 53.4831C4.34528 53.9789 4.37159 54.616 4.69459 54.9938C4.81077 55.1304 4.95332 55.2213 5.10904 55.263C5.38109 55.3359 5.68947 55.2578 5.94799 55.0284L42.8804 22.2506C43.204 21.9658 43.3826 21.4941 43.3374 21.0401Z"
                            fill="white" />
                    </g>
                </svg>

                <svg class="brand-title" width="79" height="25" viewBox="0 0 79 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path class="svg-title-path"
                        d="M0.951965 24V1.60001H13.944C15.0533 1.60001 16.056 1.84535 16.952 2.33601C17.8693 2.82668 18.5946 3.50935 19.128 4.38401C19.6826 5.25868 19.96 6.29335 19.96 7.48801C19.96 8.19201 19.8213 8.86401 19.544 9.50401C19.288 10.144 18.9146 10.7093 18.424 11.2C17.9546 11.6907 17.4106 12.0853 16.792 12.384C17.5173 12.6827 18.1573 13.1093 18.712 13.664C19.288 14.2187 19.736 14.8587 20.056 15.584C20.3973 16.3093 20.568 17.088 20.568 17.92C20.568 19.136 20.28 20.2027 19.704 21.12C19.1493 22.0373 18.4026 22.752 17.464 23.264C16.5253 23.7547 15.48 24 14.328 24H0.951965ZM6.32797 19.552H12.92C13.368 19.552 13.7626 19.4453 14.104 19.232C14.4666 19.0187 14.7546 18.7307 14.968 18.368C15.1813 18.0053 15.288 17.6107 15.288 17.184C15.288 16.736 15.1813 16.3413 14.968 16C14.7546 15.6373 14.4666 15.3493 14.104 15.136C13.7626 14.9227 13.368 14.816 12.92 14.816H6.32797V19.552ZM6.32797 10.528H12.376C12.8026 10.528 13.176 10.432 13.496 10.24C13.8373 10.0267 14.104 9.76001 14.296 9.44001C14.488 9.09868 14.584 8.72535 14.584 8.32001C14.584 7.89335 14.488 7.52001 14.296 7.20001C14.104 6.85868 13.8373 6.59201 13.496 6.40001C13.176 6.18668 12.8026 6.08002 12.376 6.08002H6.32797V10.528Z"
                        fill="#2258BF" />
                    <path class="svg-title-path"
                        d="M31.7027 24.384C30.0174 24.384 28.5027 24.0107 27.1587 23.264C25.8147 22.5173 24.748 21.4933 23.9587 20.192C23.1907 18.8907 22.8067 17.4293 22.8067 15.808C22.8067 14.1653 23.1907 12.704 23.9587 11.424C24.748 10.1227 25.8147 9.09868 27.1587 8.35201C28.5027 7.58401 30.0174 7.20001 31.7027 7.20001C33.3881 7.20001 34.892 7.58401 36.2147 8.35201C37.5587 9.09868 38.6147 10.1227 39.3827 11.424C40.1721 12.704 40.5667 14.1653 40.5667 15.808C40.5667 17.4293 40.1721 18.8907 39.3827 20.192C38.6147 21.4933 37.5587 22.5173 36.2147 23.264C34.8707 24.0107 33.3667 24.384 31.7027 24.384ZM31.7027 20.064C32.492 20.064 33.1747 19.872 33.7507 19.488C34.3267 19.104 34.7747 18.592 35.0947 17.952C35.4147 17.312 35.5747 16.5867 35.5747 15.776C35.5747 14.9867 35.4147 14.272 35.0947 13.632C34.7747 12.992 34.3267 12.48 33.7507 12.096C33.1747 11.712 32.492 11.52 31.7027 11.52C30.9134 11.52 30.22 11.712 29.6227 12.096C29.0467 12.48 28.5987 12.992 28.2787 13.632C27.9587 14.272 27.7987 14.9867 27.7987 15.776C27.7987 16.5867 27.9587 17.312 28.2787 17.952C28.5987 18.592 29.0467 19.104 29.6227 19.488C30.22 19.872 30.9134 20.064 31.7027 20.064Z"
                        fill="#2258BF" />
                    <path class="svg-title-path" d="M43.5122 24V0.640015H48.4722V24H43.5122Z" fill="#2258BF" />
                    <path class="svg-title-path"
                        d="M58.1532 24C56.6385 24 55.4545 23.5733 54.6012 22.72C53.7479 21.8453 53.3212 20.672 53.3212 19.2V3.58401H58.3132V18.912C58.3132 19.168 58.3985 19.392 58.5692 19.584C58.7612 19.7547 58.9852 19.84 59.2412 19.84H62.8252V24H58.1532ZM50.6332 11.648V7.58401H62.8252V11.648H50.6332Z"
                        fill="#2258BF" />
                    <path class="svg-title-path"
                        d="M69.408 24C68.4906 24 67.712 23.808 67.072 23.424C66.432 23.04 65.9306 22.528 65.568 21.888C65.2053 21.248 65.024 20.5547 65.024 19.808C65.024 19.0827 65.2053 18.432 65.568 17.856C65.952 17.2587 66.464 16.7573 67.104 16.352L72.96 12.448C73.0666 12.384 73.1413 12.32 73.184 12.256C73.2266 12.1707 73.248 12.1067 73.248 12.064C73.248 11.9573 73.2053 11.872 73.12 11.808C73.0346 11.7227 72.928 11.68 72.8 11.68H65.76L65.728 7.58401H74.528C75.3813 7.58401 76.1173 7.78668 76.736 8.19201C77.376 8.57601 77.8773 9.08801 78.24 9.72801C78.624 10.368 78.816 11.0613 78.816 11.808C78.816 12.512 78.6346 13.1733 78.272 13.792C77.9306 14.3893 77.4613 14.8907 76.864 15.296L71.008 19.136C70.9226 19.2 70.8586 19.264 70.816 19.328C70.7733 19.392 70.752 19.456 70.752 19.52C70.752 19.6267 70.7946 19.7227 70.88 19.808C70.9653 19.872 71.072 19.904 71.2 19.904H78.496V24H69.408Z"
                        fill="#2258BF" />
                </svg>

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

                            </div>
                        </div>
                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link ai-icon" href="javascript:void(0);" data-bs-toggle="dropdown"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                        height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12">
                                        </line>
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
