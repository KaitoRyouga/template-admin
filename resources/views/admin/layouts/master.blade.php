<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    @include('admin.layouts.head')
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Volgh –  Bootstrap 4 Responsive Application Admin panel Theme Ui Kit & Premium Dashboard Design Modern Flat HTML Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="analytics dashboard, bootstrap 4 web app admin template, bootstrap admin panel, bootstrap admin template, bootstrap dashboard, bootstrap panel, Application dashboard design, dashboard design template, dashboard jquery clean html, dashboard template theme, dashboard responsive ui, html admin backend template ui kit, html flat dashboard template, it admin dashboard ui, premium modern html template">

</head>

<body class="app sidebar-mini dark-mode default dark-menu">
    <div class="page">
        <div class="page-main">
            @include('admin.layouts.app-sidebar')
            @include('admin.layouts.mobile-header')
            <div class="app-content">
                <div class="side-app">
                    <div class="page-header">
                        @yield('page-header')
                    </div>
                    @yield('content')
                    @include('admin.layouts.sidebar')
                </div>
            </div>
            @if (Session::has('success'))
                <div class="message_notify">
                    <div class="show_notify alert alert-primary alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                        <div class="progress_notify">
                            <div class="progress_notify_percent">{{ Session::get('success') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="message_notify">
                    <div class="show_notify alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                        <div class="progress_notify">
                            <div class="progress_notify_percent">{{ Session::get('error') }}</div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="message_notify">
                    <div class="show_notify alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                        <div class="progress_notify">
                            @foreach ($errors->all() as $error)
                                <div class="progress_notify_percent">{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            @include('admin.layouts.footer-scripts')
            @yield('js')
</body>

</html>
