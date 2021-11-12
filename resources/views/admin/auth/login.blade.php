<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Volgh –  Bootstrap 4 Responsive Application Admin panel Theme Ui Kit & Premium Dashboard Design Modern Flat Laravel Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="dashboard, admin, dashboard template, admin template, laravel, php laravel, laravel bootstrap, laravel admin template, bootstrap laravel, bootstrap in laravel, laravel dashboard template, laravel admin, laravel dashboard, laravel blade template, php admin">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>Login</title>

    <!-- STYLE CSS -->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />

    <link href="{{ asset('backend/assets/css/dataTable.css') }}" rel="stylesheet" />

    <link href="{{ asset('backend/assets/css-dark/dark-style.css') }}" rel="stylesheet" />


    <!--C3 CHARTS CSS -->
    <link href="{{ asset('backend/assets/plugins/charts-c3/c3-chart.css') }}" rel="stylesheet" />

    <!-- P-scroll bar css-->
    <link href="{{ asset('backend/assets/plugins/p-scroll/perfect-scrollbar.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('backend/assets/plugins/icons/icons.css') }}" rel="stylesheet" />

    <link href="{{ asset('backend/assets/plugins/single-page/css/main.css') }}" rel="stylesheet">

    <!-- SIDE-MENU CSS -->
    <link href="{{ asset('backend/assets/css/sidemenu.css') }}" rel="stylesheet" />

    <!-- SIDEBAR CSS -->
    <link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('backend/assets/colors/color1.css') }}" />

    <!-- SWITCHER SKIN CSS -->
    <link href="{{ asset('backend/assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/switcher/demo.css') }}" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</head>

<body class="login-img">

    <!-- Start Switcher -->

    <!-- End Switcher -->

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->

        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="container">
                @if (session('error'))
                 <div class="alert alert-danger alert-dismissible" role="alert">
                    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                    {{ session('error') }}
                  </div>
                @endif
                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto">
                    <div class="text-center">
                        <img src="{{ asset('backend/assets/images/brand/logo.png') }}" class="header-brand-img"
                            alt="">
                    </div>
                </div>
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" action="{{ route('admin.auth.postLogin') }}"
                            method="POST">
                            @csrf
                            <span class="login100-form-title">
                                Login
                            </span>
                            <div class="wrap-input100 validate-input"
                                data-validate="Valid email is required: ex@abc.xyz">
                                <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </span>
                                @if ($errors->get('email'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input class="input100" type="password" name="password" placeholder="Password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                </span>
                                @if ($errors->get('password'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="text-right pt-1">
                                <p class="mb-0"><a href="forgot-password.html"
                                        class="text-primary ml-1">Forgot Password?</a></p>
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('backend/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- CHART-CIRCLE JS -->
    <script src="{{ asset('backend/assets/plugins/circle-progress/circle-progress.min.js') }}"></script>

    <!-- C3.JS CHART JS -->
    <script src="{{ asset('backend/assets/plugins/charts-c3/d3.v5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/charts-c3/c3-chart.js') }}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ asset('backend/assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{ asset('backend/assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('backend/assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('backend/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/p-scroll/pscroll.js') }}"></script>


    <!--CUSTOM JS -->
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

    <!-- Color Change JS -->
    <script src="{{ asset('backend/assets/js/color-change.js') }}"></script>

    <!-- SWITCHER JS -->
    <script src="{{ asset('backend/assets/switcher/js/switcher.js') }}"></script>





</body>

</html>
