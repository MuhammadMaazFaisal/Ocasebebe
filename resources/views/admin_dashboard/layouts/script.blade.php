{{-- <!-- <script src="{{asset('admin_assets/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>  --> --}}
<!-- {{-- <script src="{{asset('admin_assets/assets/js/rating/jquery.barrating.js')}}"></script> -->


<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{asset('admin_assets/assets/js/rating/rating-script.js')}}"></script>
<script src="{{asset('admin_assets/assets/js/owlcarousel/owl.carousel.js')}}"></script>
<!-- <script src="{{asset('admin_assets/assets/js/ecommerce.js')}}"></script> --}} -->
<!-- {{-- <script src="{{asset('admin_assets/assets/js/product-list-custom.js')}}"></script> --}} -->
<script src="{{ asset('admin_assets/assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Data Tables JS -->
<script src="{{ asset('admin_assets/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/datatable/datatables/datatable.custom.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('admin_assets/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('admin_assets/assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('admin_assets/assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/scrollbar/custom.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('admin_assets/assets/js/config.js') }}"></script>
<!-- Plugins JS start-->
<script id="menu" src="{{ asset('admin_assets/assets/js/sidebar-menu.js') }}"></script>

@yield('script')

@if (Route::current()->getName() != 'popover')
    <script src="{{ asset('admin_assets/assets/js/tooltip-init.js') }}"></script>
@endif

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('admin_assets/assets/js/script.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/theme-customizer/customizer.js') }}"></script>

<script src="{{ asset('admin_assets/assets/js/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/dropzone/dropzone-script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('body').on('hidden.bs.modal', '.modal', function() {
        $('.for-pause-video').trigger('pause');
    });
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    // $(document).ready(function() {
    //    $('.ckeditor').ckeditor();
    // });

    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            //  alert(link);
            Swal.fire({
                title: 'Are you sure?',
                text: "To Delete this Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        });
    });
</script>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>


@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}');
        </script>
    @endforeach
@endif
@stack('scripts')
