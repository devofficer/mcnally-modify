<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> Dashboard | McNally</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}"> -->
        <!-- <link rel="shortcut icon" href="/assets_front/img/favicon.ico" type="image/x-icon"> -->
        <link rel="shortcut icon" href="{{ URL::asset('assets_front/img/favicon.ico')}}" type="image/x-icon">
        
        @yield('css')
        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
        <!-- App css -->
        <link href="{{ URL::asset('assets/css/bootstrap-dark.min.css')}}" id="bootstrap-dark" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css" disabled/>
        <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css" disabled/>
        <link href="{{ URL::asset('assets/css/app-dark.min.css')}}" id="app-dark" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-light" rel="stylesheet" type="text/css" disabled/>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/toastr/toastr.min.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}">
        <!-- Summernote css -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}">
    </head>

    <body data-sidebar="dark">
        <div id="preloader">
            <div id="status">
                <div class="spinner-chase">
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                </div>
            </div>
        </div>

        <div id="app">
    		<app></app>
		</div>      

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div id="user_name" style="display: none;">{{ auth()->user()->name }}</div>
        <div id="user_avatar" style="display: none;">{{ auth()->user()->profile->avatar }}</div>

        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>
        <!-- Sweet Alerts js -->
        <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- Sweet alert init js -->
        <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js')}}"></script>

        <!-- plugin js -->
        <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Calendar init -->
        <script src="{{ URL::asset('assets/js/pages/dashboard.init.js')}}"></script>

        <!-- Magnific Popup -->
        <script src="{{ URL::asset('assets/libs/toastr/toastr.min.js')}}"></script>

        <!-- App js -->
        <script type="text/javascript">
            var APP_URL = "{{ url('/') }}";
            const API_FINNHUB = "{{ env('API_FINNHUB') }}";
            const API_SYMBOL = "{{ env('API_SYMBOL') }}";

            var timeStampNow = {{ time() }};

            function linkRouteProfileSettings() {
                document.getElementById('linkProfileSettings').click()
            }

            function linkRouteIndex() {
                document.getElementById('linkIndex').click()
            }

            // Function to add event listener to t
            function load() {
              var el = document.getElementById("linkProfile");
              el.addEventListener("click", linkRouteProfileSettings, false);

              var linkLogo1 = document.getElementById("linkLogo1");
              linkLogo1.addEventListener("click", linkRouteIndex, false);

              var linkLogo2 = document.getElementById("linkLogo2");
              linkLogo2.addEventListener("click", linkRouteIndex, false);
            } 

            document.addEventListener("DOMContentLoaded", load, false);

            $(document).ready(function() {
 
                // Deshabilito la función copiar 
                   $('body').on("copy", function(e) { 
                // Muestro un mensaje que no se puede copiar el contenido 
                    e.preventDefault();
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr['error']("can't copy content");
                });

                // Deshabilito el botón derecho del mouse  
                $('body').mousedown(function(e) {

                // Selecciono el segundo botón (derecho) del mouse '2' 
                    if (e.button == 2) {
                        e.preventDefault();
                        alert('El botón derecho del Mouse esta Deshabilitado !');
                    }
                });

            });
        </script>
        
        <!-- NProgress js -->
        <link href="{{ asset('assets/js/nprogress/nprogress.css') }}" rel="stylesheet" />
        <script src="{{ asset('assets/js/nprogress/nprogress.js') }}"></script>

        <script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

    </body>
</html>