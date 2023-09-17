<!-- BEGIN VENDOR JS-->
<script src="{{ asset('back/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->


<script src="{{ asset('back/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/vendors/js/tables/datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/vendors/js/tables/jszip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/vendors/js/tables/pdfmake.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/vendors/js/tables/vfs_fonts.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/vendors/js/tables/buttons.html5.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/vendors/js/tables/buttons.print.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/vendors/js/tables/buttons.colVis.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('back/plugins/niceselect/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('back/plugins/nestable/nestable.js') }}"></script>



<script src="{{ asset('back/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/vendors/js/extensions/sweetalert.min.js') }}"></script>
<!-- END PAGE VENDOR JS-->
<script src="{{ asset('back/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/js/scripts/extensions/toastr.min.js') }}"></script>
<!-- BEGIN STACK JS-->
<script src="{{ asset('back/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/js/core/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/js/scripts/customizer.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/js/scripts/forms/checkbox-radio.js') }}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
@if (Route::has('blog.create', 'blog.edit'))
<script src="{{ asset('back/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js') }}" type="text/javascript"></script>
@endif
<!-- END PAGE LEVEL JS-->

<script src="{{ asset('back/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('back/js/custom.js') }}"></script>
<script src="{{ asset('back/plugins/nestable/nesteble_custom.js') }}"></script>

@method('custom_js')

@stack('db_js')

@if(Session::has('success'))
<script>
    swal("Good job!", "{{ Session::get('success') }}", "success");
</script>
@endif


@if(Session::has('error'))
<script>
    swal("Sorry!", "{{ Session::get('error') }}", "warning");
</script>
@endif

@stack('menu_js')