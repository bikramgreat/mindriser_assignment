
{{--<!-- jQuery 3 -->--}}
{{--<script src="{{'theme_layout/bower_components/jquery/dist/jquery.min.js'}}"></script>--}}
{{--<!-- jQuery UI 1.11.4 -->--}}
{{--<script src="theme_layout/bower_components/jquery-ui/jquery-ui.min.js"></script>--}}
{{--<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->--}}
{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button);--}}
{{--</script>--}}
{{--<!-- Bootstrap 3.3.7 -->--}}
{{--<script src="theme_layout/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>--}}
{{--<!-- Morris.js charts -->--}}
{{--<script src="theme_layout/bower_components/raphael/raphael.min.js"></script>--}}
{{--<script src="theme_layout/bower_components/morris.js/morris.min.js"></script>--}}
{{--<!-- Sparkline -->--}}
{{--<script src="theme_layout/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>--}}
{{--<!-- jvectormap -->--}}
{{--<script src="theme_layout/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>--}}
{{--<script src="theme_layout/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>--}}
{{--<!-- jQuery Knob Chart -->--}}
{{--<script src="theme_layout/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>--}}
{{--<!-- daterangepicker -->--}}
{{--<script src="theme_layout/bower_components/moment/min/moment.min.js"></script>--}}
{{--<script src="theme_layout/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>--}}
{{--<!-- datepicker -->--}}
{{--<script src="theme_layout/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>--}}
{{--<!-- Bootstrap WYSIHTML5 -->--}}
{{--<script src="theme_layout/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>--}}
{{--<!-- Slimscroll -->--}}
{{--<script src="theme_layout/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>--}}
{{--<!-- FastClick -->--}}
{{--<script src="theme_layout/bower_components/fastclick/lib/fastclick.js"></script>--}}
{{--<!-- AdminLTE App -->--}}
{{--<script src="theme_layout/dist/js/adminlte.min.js"></script>--}}
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
{{--<script src="theme_layout/dist/js/pages/dashboard.js"></script>--}}
{{--<!-- AdminLTE for demo purposes -->--}}
{{--<script src="theme_layout/dist/js/demo.js"></script>--}}


<script type="text/javascript">
    var base_url ='{!! url('/') !!}';
    // alert(base_url);


</script>


<script>



</script>

<!-- jQuery -->
<script src="{{url('theme_layout/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('theme_layout/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('theme_layout/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('theme_layout/dist/js/adminlte.min.js')}}"></script>


<!-- SweetAlert2 -->
<script src="{{url('theme_layout/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- Toastr -->
<script src="{{url('theme_layout/plugins/toastr/toastr.min.js')}}"></script>

<!-- bs-custom-file-input -->
<script src="{{url('theme_layout/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        // pageRedirect(true);
        // check_connection(true);
    })

    $(document).click(function () {
        // check_connection(true);
    })


    //time out page redirecting
    function pageRedirect(first) {
        if (first==true)
        {
            setTimeout("pageRedirect(false)", 10000);
        }
        else {
            // alert($(location).attr("href"));
            window.location.replace(base_url+'/logout')
            setTimeout("pageRedirect(false)", 10000);
        }
        //window.location.replace("https://www.tutorialrepublic.com/");
    }


    //// check inter net connection
    function check_connection(first) {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        if(first==true){
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            setTimeout("check_connection(false)", 10000);
        }
        else {
            $.ajax({
                url:$(location).attr("href"),
                timeout: 20000,
                error: function(jqXHR) {
                    if(jqXHR.status==0) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    }
                },
                success: function() {
                    // alert(" your connection is alright!");
                }
            });
            setTimeout("check_connection(false)", 10000);
        }
    }
</script>

@yield('foot-script')