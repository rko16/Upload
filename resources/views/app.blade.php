<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Roofsol</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png"/>

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('asset2/css/style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    
        <!-- Custom Style -->
        <style>
    /*        .error { color: red; }*/
            .error {
                color: red;
                font-size: 12px;
                display: block !important; /* Ensure visibility */
            }
        </style>

        <!-- Scripts -->
        <!-- Ensure jQuery is loaded first -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>

        <!-- Local JS files -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/selectordie.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript"></script>
        <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/selectordie.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script> -->
        <script type="text/javascript"></script>

        <!-- Initialize WOW.js -->
        <script>
            new WOW().init();
        </script>
        <!-- <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css"/> -->
        <!-- <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script> -->
    </head>


    <body>
        <header class="fixedHeader fixedHeader-home">
            <nav id="navbar-example2" class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="{{route('/')}}"><img src="{{asset('images/roofsol-logo.png')}}"/></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
      
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav flex-nowrap d-flex m-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('/') }}">Home</a>
                            </li>
                
                            <li class="nav-item">
                                <a class="nav-link" href="/#AboutUs">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('services') }}">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#Calculator">Solar Calculator</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#Projects">Our Projects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#Contact">Contact us</a>
                            </li>
                        </ul>
                    </div>
                    @if(auth()->check() && auth()->user()->type == '0')
                    <ul class="navbar-nav ms-auto flex-nowrap d-flex mobile-navbar-nav">
                        <li class="nav-item login-drop dropdown">
                            <a  class="nav-link login-nav dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="login.php"><img src="{{asset('images/user-pic.png')}}"/> <span>{{ auth()->user()->name }}</span> </a> 
                            <ul class="dropdown-menu dropdown-rgt drop-menu" aria-labelledby="navbarDropdown">
                                <!-- <li><a class="dropdown-item" href="{{ route('profile') }}"> My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('myorders') }}"> My Orders</a></li>
                                <li><a class="dropdown-item" href="{{route('myaddresses') }}"> My Addresses</a></li>
                                <li><a class="dropdown-item" href="{{route('mysocialaccounts')}}"> My Social Accounts</a></li>
                                <li><a class="dropdown-item" href="{{route('myenquiries')}}"> My Enquiries</a></li> -->
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"> Logout</a> </li>
                            </ul> 
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav ms-auto flex-nowrap d-flex mobile-navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link login-nav">
                                <a class="text-white" href="{{ route('userloginpage') }}">Login</a>/<a class="text-white" href="{{ route('register') }}">Register</a>
                            </div>
                        </li>     
                    </ul>
                    @endif
                </div>
            </nav>
        </header>
        @yield('content')
        @include('footer')
<!-- Modal -->
        <script>
            $(window).on('scroll', function () {
                if ($(window).scrollTop() >= 100) {
                    $('.fixedHeader').addClass('sticky');
                } else {
                    $('.fixedHeader').removeClass('sticky');
                }
            })
        </script>
    
        <script>
            if( $("#service-carousel").length ) {
            $("#service-carousel").owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
               // navText: ["<span><img src='images/arrow_left.png'></span>", "<span><img src='images/arrow_right.png'></span>"],
                dots:true,
                autoplay: true,
                animateIn: 'fadeIn',
                      animateOut: 'fadeOut',
                responsive:{
                    0:{
                        items: 1
                    },
                    500:{
                        items: 1
                    },
                    600:{
                        items: 1
                    },
                    1000:{
                        items: 1
                    },
                    1200:{
                        items: 1
                    }
                }
            });
        }

        
        </script>
        <script>
            var wow = new WOW( {
                mobile:    false
            });
            wow.init();
        </script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script>
            $(function() {
                $('.daterangePicker').daterangepicker({
                    opens: 'left',
                    locale: { format: 'DD/MM/YYYY' }
                  });
                $('.datePicker').daterangepicker({
                    opens: 'left',
                    locale: { format: 'DD/MM/YYYY' },
                    singleDatePicker: true,
                  });
            });
        </script>
        <script>
        $(function() {
          $('input[name="date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
          }, function(start, end, label) {
            var years = moment().diff(start, 'years');
            //alert("You are " + years + " years old!");
          });
        });
        </script>
        <script>
        jQuery(function($) {
          $('.box-title>a').on('click', function() {
            var $el = $(this),
              textNode = this.lastChild;
            $el.find('span').toggleClass('fa-angle-down fa-angle-up');
            textNode.nodeValue = ' Gimme ' + ($el.hasClass('showFire') ? 'Fire' : 'Water')
            $el.toggleClass('showFire');
          });
        });
            
        //password
        $(".toggle-password").click(function() {

            $(this).toggleClass("bi-eye bi-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
              input.attr("type", "text");
            } else {
              input.attr("type", "password");
            }
        });
            
          //
         // (navneet)
        // On your services page or in general navigation script
        document.querySelectorAll('a.nav-link[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                // Check if the current page is the SPA or not
                if (window.location.pathname !== '/') {
                    // Redirect to the SPA with the hash
                    window.location.href = '/' + this.getAttribute('href');
                } else {
                    // Scroll within the SPA
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
        // alert
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
        </script>
        <script>
        $(document).ready(function() {
          $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
              0: {
                items: 1,
                nav: true
              },
              600: {
                items: 3,
                nav: false
              },
              1000: {
                items: 1,
                nav: true,
                loop: false,
                margin: 20
              }
            }
          })
        })
        </script>
        @if(isset($measurementIddata->measurementId))
        <!-- {{$measurementIddata->measurementId}} -->
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id={{$measurementIddata->measurementId}}"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', '{{$measurementIddata->measurementId}}');
            </script>
        @endif
        
        
         <script>














 $(document).ready(function() {
            $('#resend_otp').click(function() {
                $('#verifyotp1').show();
                $('#resend_otp').h();
                
                startTimer(300);  // Start timer with 5 minutes (300 seconds)
                send();
            });

        });




</script>
    </body>
</html>
