@extends('layouts.master-without-nav')

@section('title')
Login
@endsection

@section('body')
<body>
@endsection

@section('content')
    
@endsection

<!doctype html>
<html lang="en">

<head id="head">
    <meta charset="utf-8">
    <title>Mcnally Finance India</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets_front/img/favicon.ico" type="image/x-icon">
    <meta name="description" content="A robust suite of app and landing page templates by Medium Rare">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500" rel="stylesheet">
    <link href="/assets_front/css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets_front/css/entypo.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets_front/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <!--<link rel="stylesheet" href="https://s3.amazonaws.com/icomoon.io/114779/Socicon/style.css?u8vidh">-->

  </head>
  <body>

    <div class="navbar-container">
    </div>
    <div class="main-container">
      <section class="fullwidth-split">
        <div class="container-fluid">
          <div class="row no-gutters height-100 justify-content-center">
            <div class="col-12 col-lg-6 fullwidth-split-image bg-dark d-flex justify-content-center align-items-center">
              <img alt="Image" src="/assets_front/img/LoginLight.jpg" class="bg-image position-absolute opacity-30" />
              <div class="col-12 col-sm-8 col-lg-9 text-center pt-5 pb-5">
                <img alt="Image" src="/assets_front/img/McnallyLogoWhite.png" width="153" height="45" class="mb-4 logo-lg" />
                <span class="h3 mb-5">A robust suite of components developed for private investors</span>

                <div class="card text-left">
                  <div class="card-body">
                    <div class="media">
                      <img alt="Image" src="/assets_front/img/check2.png" class="avatar" />
                      <div class="media-body">
                        <p class="mb-1">
                          “We are convinced that having exclusive financial information and accurate analysis is the key to achieving a successful investment portfolio.”
                        </p>
                        <small>Patricio Nally <br/>CEO & Financial Analyst</small>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!--end of col-->
            </div>
            <!--end of col-->
            <div class="col-12 col-sm-8 col-lg-6 fullwidth-split-text">
              <div class="col-12 col-lg-8 align-self-center">
                <div class="text-center mb-5">
                  <h1 class="h2 mb-2">Get started</h1>
                  <span>Sign up a account to continue</span>
                </div>
                <form action="{{ route('register_step1') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control form-control-lg" name="firstname" id="firstname" placeholder="Firstname" required="" maxlength="30">
                        @error('firstname')
                        <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control form-control-lg" name="lastname" id="lastname" placeholder="Lastname" required="" maxlength="30">
                        @error('lastname')
                        <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter email" required="" maxlength="50">
                        <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                        @error('email')
                        <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Choose a password" required="" maxlength="30" minlength="8">
                        <small id="emailHelp" class="form-text">More than eight characters and combination of upper and lower case letters, numbers and special characters.</small>
                        @error('password')
                        <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="agree" name="agreeterms" id="check-agree" required="">
                            <label class="custom-control-label text-small" for="check-agree">
                                I agree to the <a href="/terms">Terms &amp; Conditions</a>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-success btn-block">Sign up for Mcnally</button>
                </form>
              </div>
              <!--end of col-->
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
      <!--end of section-->
    </div>

    <div class="home-btn d-none d-sm-block">
        <a href="{{url('index')}}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>

    <script type="text/javascript">
        const API_FINNHUB = "{{ env('API_FINNHUB') }}";
    </script>

    <!-- Required vendor scripts (Do not remove) -->
    <script type="text/javascript" src="/assets_front/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets_front/js/popper.min.js"></script>
    <script type="text/javascript" src="/assets_front/js/bootstrap.js"></script>

    <!-- Optional Vendor Scripts (Remove the plugin script here and comment initializer script out of index.js if site does not use that feature) -->

    <!-- AOS (Animate On Scroll - animates elements into view while scrolling down) -->
    <script type="text/javascript" src="/assets_front/js/aos.js"></script>
    <!-- Flatpickr (calendar/date/time picker UI) -->
    <script type="text/javascript" src="/assets_front/js/flatpickr.min.js"></script>
    <!-- Flickity (handles touch enabled carousels and sliders) -->
    <script type="text/javascript" src="/assets_front/js/flickity.pkgd.min.js"></script>
    <!-- jarallax (parallax effect and video backgrounds) -->
    <script type="text/javascript" src="/assets_front/js/jarallax.min.js"></script>
    <script type="text/javascript" src="/assets_front/js/jarallax-video.min.js"></script>
    <script type="text/javascript" src="/assets_front/js/jarallax-element.min.js"></script>
    <!-- ScrollMonitor (manages events for elements scrolling in and out of view) -->
    <script type="text/javascript" src="/assets_front/js/scrollMonitor.js"></script>
    <!-- jQuery smartWizard facilitates steppable wizard content -->
    <script type="text/javascript" src="/assets_front/js/jquery.smartWizard.min.js"></script>
    <!-- Smooth scroll (animation to links in-page)-->
    <script type="text/javascript" src="/assets_front/js/smooth-scroll.polyfills.min.js"></script>
    <!-- Prism (displays formatted code boxes) -->
    <script type="text/javascript" src="/assets_front/js/prism.js"></script>
    <script type="text/javascript" src="/assets_front/js/zoom.min.js"></script>

    <!-- Required theme scripts (Do not remove) -->
    <script type="text/javascript" src="/assets_front/js/theme.js"></script>

  </body>

</html>