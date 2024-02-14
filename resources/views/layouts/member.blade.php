<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('meta::manager', [
        'title' => config('app.name', 'Laravel'),
        'description' =>
            'Visit the Sabong worldcup websites to immerse yourself in a comprehensive online community dedicated to Sabong enthusiasts. Discover a wealth of resources including gamecock breeding tips, training techniques, match analysis, and discussions on various aspects of the sport. Engage with fellow enthusiasts through forums, chat rooms, and social media platforms to share your experiences and stay connected with the Sabong community worldwide.',
        'image' => asset('dist/assets/images/photo-1595398062934-a522dd6dd39d.jpeg'),
        'keywords' =>
            'sabong world cup.net login, sabong world cup.com, sabong world cup 2023, sabong world cup.net, sww4, sabong world cup 2024 com login, sabong world cup live, sabongworld cup, sabong world cup login, sabong world cup register, sww4 live login, sabong ww4.net, sabong world wide, world cup sabong, sabong world cup live 2023, sabong world cup.net live, sworld cup3.net login, sabong world cup net login, www.sabong world cup.net, sworld cup4, sww sabong, sabongww4, www sabong, sabong world cup live register, sabong world cup, sabongworldcup, sabong worldcup',
    ])


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }} ">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }} ">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }} ">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }} ">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }} ">


    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



    {{-- SCRIPTS JS --}}
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/r-2.5.0/datatables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/r-2.5.0/datatables.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/push.js@1.0.12/bin/push.min.js"></script>



</head>




<style>
    /* .content-wrapper {
        background-image: url({{ "'" . asset('uploads/bg.png') . "'" }});
        background-repeat: no-repeat;
        background-size: cover;
    } */

    .content-wrapper {


        /* background-image: url('{{ asset('uploads/bg2.jpg') }}'); */
        background-image: linear-gradient(to right bottom,
                rgba(16, 14, 14, 0.8),
                rgba(11, 29, 31, 0.8)),
            url('{{ asset('uploads/bg2.jpg') }}');
        background-size: cover;
        background-position: top;



        background-repeat: no-repeat;
        background-size: cover;

    }
</style>


<style type="text/css">
    @font-face {
        font-family: OptimusPrinceps;
        src: url('{{ public_path('fonts/OptimusPrinceps.tff') }}');
    }
</style>




<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li> --}}
                {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">



                <!-- Notifications Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullsasdcreen" href="/home" role="button">
                        <i class="fas fa-home"></i> <span style="color: orange">HOME</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" data-widget="fullsasdcreen" href="/list-cashout" role="button">
                        <small style="font-size: 9px; color: red; font-weight: 700">WITHDRAW HISTORY</small>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" data-widget="fullsasdcreen" href="/list-cashins" role="button">
                         <small style="font-size: 9px; color: red; font-weight: 700">CREDIT HISTORY</small>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-dark-indigo">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ asset('uploads/large.png') }}" alt="SABONG PILIPINAS"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SABONG PILIPINAS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('uploads/2x2x2.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>


                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="/home" class="nav-link{{ request()->is('home') ? ' active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>

                                <p>
                                    HOME
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/list-games" class="nav-link{{ request()->is('list-games') ? ' active' : '' }}">
                                <i class="nav-icon fas fa-list"></i>

                                <p>
                                    LIST OF GAMES
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/list-cashins"
                                class="nav-link{{ request()->is('list-cashins') ? ' active' : '' }}">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    CASHIN HISTORY
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/list-cashout"
                                class="nav-link{{ request()->is('list-cashout') ? ' active' : '' }}">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    CASHOUT HISTORY
                                </p>
                            </a>
                        </li>

                          <li class="nav-item">
                            <a href="/deactivated"
                                class="nav-link{{ request()->is('deactivated') ? ' active' : '' }}" >
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>
                                   DEACTIVATED ACCOUNTS
                                </p>
                            </a>
                        </li>

                        @if (auth()->user() && auth()->user()->role == 1)
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        ADMINISTRATOR
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/create-sites"
                                            class="nav-link{{ request()->is('create-sites') ? ' active' : '' }}">
                                            <i class="far fas fa-check-double nav-icon"></i>
                                            <p>ADD LEGIT SITES</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/cashout-create"
                                            class="nav-link{{ request()->is('cashout-create') ? ' active' : '' }}">
                                            <i class="far fas fa-check-double nav-icon"></i>
                                            <p>POST CASHOUTS</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="/mop"
                                            class="nav-link{{ request()->is('mop') ? ' active' : '' }}">
                                            <i class="far fas fa-check-double nav-icon"></i>
                                            <p>MOP</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/activate"
                                            class="nav-link{{ request()->is('activate') ? ' active' : '' }}">
                                            <i class="far fas fa-check-double nav-icon"></i>
                                            <p>APPROVAL PLAYERS</p>
                                        </a>
                                    </li>



                                </ul>
                            </li>

                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        ADMIN PROCESS
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">


                                    <li class="nav-item">
                                        <a href="/co-list"
                                            class="nav-link{{ request()->is('co-list') ? ' active' : '' }}">
                                            <i class=" nav-icon fas fa-check-double"></i>
                                            <p>CASHOUTS</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/ci-list"
                                            class="nav-link{{ request()->is('ci-list') ? ' active' : '' }}">
                                            <i class=" nav-icon fas fa-check-double"></i>
                                            <p>CASHINS</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endif

                        <hr>


                        <a class="btn btn-danger btn-sm btn-block" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>



                        <br>

                        @if (auth()->user()->role == 1)
                            <button class="btn btn-warning btn-xs permiso  btn-block mb-1">ALLOW
                                NOTIFICATION</button>
                        @endif



                    </ul>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->


        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Sabong Pilipinas</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> --}}
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @if (auth()->user() && auth()->user()->role == 1 && request()->is('home'))
                        @include('box')
                    @endif

                    @yield('content')


                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020-2024 <a href="#">SABONG PHIL</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>






        <img id="preview" src="" alt=""
            style="width: 15%; position: fixed; bottom: 0; right: 0; margin: 2em;">






        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->





    @if ($role = auth()->user()->role == 1)
        <script>
            function onGranted() {
                alert("Permission Granted");
            }

            function onDenied() {
                alert("Permission Denied");
            }

            $('.permiso').on('click', function() {
                Push.Permission.request(onGranted, onDenied);
            });


            // FOR NOTIFICATION

            // CASHIN NOTIFICATION
            const cashinsession = parseInt(sessionStorage.getItem('cashin'));

            if (cashinsession > 0) {
                // Value is greater than 0
            } else {
                // Value is 0 or not set
                sessionStorage.setItem('cashin', 0);
            }

            // CASHOUT  NOTIFICATION
            const cashoutsession = parseInt(sessionStorage.getItem('cashout'));

            if (cashinsession > 0) {
                // Value is greater than 0
            } else {
                // Value is 0 or not set
                sessionStorage.setItem('cashout', 0);
            }



            function makeAjaxRequest() {
                $.ajax({
                    url: '/cashin-notification',
                    method: 'GET',
                    success: function(responseData) {
                        // Process the response data as needed


                        const cashin = sessionStorage.getItem('cashin');



                        // console.log(cashin)
                        // console.log(responseData);

                        if (parseInt(cashin) === parseInt(responseData)) {
                            console.log(0)
                        } else {
                            sessionStorage.setItem('cashin', parseInt(responseData));

                            // DITO ILALAGAY ANG PUSHJS
                            Push.create("NEW CASHIN REQUEST", {
                                body: "Boss pa cashin po please!!!",
                                icon: "{{ asset('uploads/1706851309_SBPHIL.png') }}",
                                timeout: 4000,
                                onClick: function() {
                                    window.focus();
                                    window.location.href = '/ci-list';
                                    this.close();

                                }
                            });
                        }

                    }
                });
            }

            // Make the initial AJAX request
            // makeAjaxRequest();
            // Make an AJAX request every 10 seconds
            setInterval(makeAjaxRequest, 4000);



            function makeAjaxRequest2() {
                $.ajax({
                    url: '/cashout-notification',
                    method: 'GET',
                    success: function(responseData) {
                        // Process the response data as needed

                        const cashout = sessionStorage.getItem('cashout');



                        // console.log(cashin)
                        // console.log(responseData);

                        if (parseInt(cashout) === parseInt(responseData)) {
                            console.log(0)
                        } else {
                            sessionStorage.setItem('cashout', parseInt(responseData));

                            // DITO ILALAGAY ANG PUSHJS
                            Push.create("NEW CASHOUT REQUEST", {
                                body: "Boss pa cashout po please!!!",
                                icon: "{{ asset('uploads/1706851309_SBPHIL.png') }}",
                                timeout: 4000,
                                onClick: function() {
                                    window.focus();
                                    window.location.href = '/co-list';
                                    this.close();

                                }
                            });
                        }

                    }
                });
            }

            // Make the initial AJAX request
            // makeAjaxRequest2();
            // Make an AJAX request every 10 seconds
            setInterval(makeAjaxRequest2, 4000);
        </script>
    @endif



    <script>
        $('.summernote').summernote({
            height: 150
        });




        $('.process').on('click', function() {
            var idd = $(this).attr('data-id');
            $('.hiddenID').val(idd)

        });

        $('.copyclipboard').on('click', function() {
            var username = $(this).attr('data-username');
            var amount = $(this).attr('data-amount');
            var bankname = $(this).attr('data-bankname');
            var accountno = $(this).attr('data-accountno');
            var fullname = $(this).attr('data-fullname');

            // alert(username)
            // alert(amount)
            // alert(bankname)
            // alert(accountno)
            // alert(fullname)

            output = "USERNAME: " + username + "\nAMOUNT: " + amount + "\n" + bankname + ": " + accountno +
                "\nNAME: " + fullname + "\n"


            copyToClipboard(output);
            Swal.fire({
                title: "COPIED",
                text: "You copy the information\n" + output,
                icon: "success"
            });


        });

        function copyToClipboard(text) {
            var tempInput = document.createElement("textarea");
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            console.log("Text copied to clipboard: " + text);
        }

        document.body.classList.add('sidebar-mini', 'layout-fixed', 'dark-mode');


        $('.example').DataTable({
            responsive: true,
            ordering: false
        });
    </script>




</body>

</html>
