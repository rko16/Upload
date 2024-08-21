<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png"/>
<!-- ------------------------------------- -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- ------------------------------------- -->
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
     <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css') }}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <!-- End Layout styles -->
<!-- ---------------------------------------------- -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
<!-- ---------------------------------------------- -->
    <!-- jquery validation js cdn start -->
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/jquery.validate.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/additional-methods.js"></script>
    <!-- jquery validation js cdn end -->
<!-- ----------------------------------------------- -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
<!-- ----------------------------------------------- -->
  </head>
  <body>
    <div class="container-scroller">
      @include('layouts.admins.header')
      <div class="container-fluid page-body-wrapper">
        @include('layouts.admins.sidebar')
        <div class="main-panel">
          @yield('content')
          <!-- jquery validation script start -->
          <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                  var alerts = document.querySelectorAll('.alert');
                    alerts.forEach(function(alert) {
                        setTimeout(function() {
                            alert.style.transition = 'opacity 0.5s ease';
                            alert.style.opacity = '0';
                            setTimeout(function() {
                                alert.remove();
                            }, 200);
                        }, 2000);
                    });
                });

                jQuery(function($) {
                    var validator = $('#form').validate({
                        rules: {
                            name: {
                                required: true
                            },
                            state_id: {
                                required: true
                            },
                            city_id:{
                              required:true
                            },
                            sizeinft:{
                              required:true
                            },
                            sizeinmtr:{
                              required:true
                            },
                            email:{
                              required:true
                            },
                            pswd:{
                              required:true
                            },
                            image:{
                              required:true
                            },
                            first_name:{
                              required:true
                            },
                            message:{
                              required:true
                            },
                            subject:{
                              required:true
                            },
                            question:{
                              required:true,
                            },
                            answer:{
                              required:true
                            },
                        },
                        messages: {
                            name: {
                                required: 'This field is required.'
                            },
                            state_id: {
                                required: 'Please select.'
                            },
                            city_id:{
                              required:'Please select.'
                            },
                            sizeinft:{
                              required:'This field is required.'
                            },
                            sizeinmtr:{
                              required:'This field is required.'
                            },
                            email:{
                              required:'E-mail id is required.'
                            },
                            pswd:{
                              required:'Password is required.'
                            },
                            image:{
                              required:'Image is required.'
                            },
                            first_name:{
                              required:'This field is required.'
                            },
                            message:{
                              required:'This field is required.'
                            },
                            subject:{
                              required:'This field is required.'
                            },
                            question:{
                              required:'Question is required.',
                            },
                            answer:{
                              required:'Answer is required.'
                            },
                        },
                        errorElement: 'div',
                        errorPlacement: function(error, element) {
                            error.appendTo(element.parent().find('.errorTxt'));
                        }
                    });
                });
          </script>
          <!-- jquery validation script end -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center">© Copyright 2024, All Rights Reserved by Roofsol Homes</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script> -->
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/demo_1/dashboard.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
