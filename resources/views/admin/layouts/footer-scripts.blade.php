  <!-- BACK-TO-TOP -->
  <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
  <!-- JQUERY JS -->
  <script src="{{ asset('backend/assets/js/jquery-3.4.1.min.js') }}"></script>
  <!-- BOOTSTRAP JS -->
  <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
  <!-- SPARKLINE JS-->
  <script src="{{ asset('backend/assets/js/jquery.sparkline.min.js') }}"></script>
  <!-- CHART-CIRCLE JS -->
  <script src="{{ asset('backend/assets/js/circle-progress.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
  <!-- RATING STAR JS-->
  <script src="{{ asset('backend/assets/plugins/rating/jquery.rating-stars.js') }}"></script>
  <!-- C3.JS CHART JS -->
  <script src="{{ asset('backend/assets/plugins/charts-c3/d3.v5.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/charts-c3/c3-chart.js') }}"></script>
  <!-- INPUT MASK JS-->
  <script src="{{ asset('backend/assets/plugins/input-mask/jquery.mask.min.js') }}"></script>
  <!-- SIDE-MENU JS-->
  <script src="{{ asset('backend/assets/plugins/sidemenu/sidemenu.js') }}"></script>
  <!-- CUSTOM SCROLLBAR JS-->
  <script src="{{ asset('backend/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
  @yield('js')
  
  {{-- <script src="{{ asset('adminassets/assets/js/script.js') }}"></script> --}}
  <!-- SIDEBAR JS -->
  {{-- <script src="{{ asset('backend/assets/plugins/sidebar/sidebar.js') }}"></script>
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
  </script> --}}
  <!--CUSTOM JS -->
