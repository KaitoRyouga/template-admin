        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/images/brand/favicon.ico') }}" />

        <!-- TITLE -->
        <title>Admin</title>

        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
        <!-- JQUERY JS -->
        <script src="{{ asset('backend/assets/js/jquery-3.4.1.min.js') }}"></script>
        <!-- BOOTSTRAP CSS -->
        <link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />

        <link href="{{ asset('backend/assets/css/dataTable.css') }}" rel="stylesheet" />

        <link href="{{ asset('backend/assets/css-dark/dark-style.css') }}" rel="stylesheet" />


        <link href="{{ asset('backend/assets/css/skin-modes.css') }}" rel="stylesheet" />

        <!-- SIDE-MENU CSS -->
        <link href="{{ asset('backend/assets/plugins/sidemenu/sidemenu.css') }}" rel="stylesheet">

        <!--C3.JS CHARTS PLUGIN -->
        <link href="{{ asset('backend/assets/plugins/charts-c3/c3-chart.css') }}" rel="stylesheet" />

        <script src="{{ asset('adminassets/assets/js/script.js') }}"></script>

        @yield('css')

        <!-- CUSTOM SCROLL BAR CSS-->
        <link href="{{ asset('backend/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

        <!--- FONT-ICONS CSS -->
        <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" />

        <!-- SIDEBAR CSS -->
        <link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all"
            href="{{ asset('backend/assets/colors/color1.css') }}" />

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
            crossorigin="anonymous" />

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />

        <script>
            var options = {
                filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/admin/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
                filebrowserBrowseUrl: '/admin/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/admin/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
            };
        </script>

        <style>
            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter,
            .dataTables_wrapper .dataTables_info,
            .dataTables_wrapper .dataTables_processing,
            .dataTables_wrapper .dataTables_paginate {
                color: white;
            }

        </style>

        @include('ckfinder::setup')
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script type="text/javascript" language="JavaScript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
        <script type="text/javascript" language="JavaScript">
            var setupCKFinder = {
                height: 400,
                filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
                filebrowserImageBrowseUrl: '{{ route('ckfinder_browser') . '?type=Images' }}',
                filebrowserFlashBrowseUrl: '{{ route('ckfinder_browser') . '?type=Flash' }}',
                filebrowserUploadUrl: '{{ route('ckfinder_connector') . '?command=QuickUpload&type=Files' }}',
                filebrowserImageUploadUrl: '{{ route('ckfinder_connector') . '?command=QuickUpload&type=Images' }}',
                filebrowserFlashUploadUrl: '{{ route('ckfinder_connector') . '?command=QuickUpload&type=Flash' }}',
                extraPlugins: 'bt_table,btgrid'
            };
            if ($('#ck_1').length) {
                CKEDITOR.replace('ck_1', setupCKFinder);
            }
        </script>
