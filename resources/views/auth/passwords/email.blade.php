<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Mcnally|ResetPass</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets_front/img/favicon.ico" type="image/x-icon">
    <meta name="description" content="A robust suite of app and landing page templates by Medium Rare">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500" rel="stylesheet">
    <link href="/assets_front/css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets_front/css/entypo.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets_front/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://s3.amazonaws.com/icomoon.io/114779/Socicon/style.css?u8vidh">
  </head>

  <body>

    <div class="navbar-container">
    </div>
    <div class="main-container">
      <section class="fullwidth-split">
        <div class="container-fluid">
          <div class="row no-gutters height-100 justify-content-center">
            <div class="col-12 col-lg-6 fullwidth-split-image bg-dark d-flex justify-content-center align-items-center">
              <img alt="Image" src="/assets/images/ResetPass.jpg" class="bg-image position-absolute opacity-30" />
              <div class="col-12 col-sm-8 col-lg-9 text-center pt-5 pb-5">
                <img alt="Image" src="/assets_front/img/McnallyLogoWhite.png" width="153" height="45" class="mb-4 logo-lg" />
                <span class="h3 mb-5">A robust suite of components developed for private investors</span>

                <div class="card text-left">
                  <div class="card-body">
                    <div class="media">
                      <img alt="Image" src="/assets_front/img/check4.png" class="avatar" />
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
                  <h1 class="h2 mb-2">Reset password</h1>
                  <span>Enter email address to reset password</span>
                </div>
                <form class="mb-4" method="POST" action="{{ route('password.email') }}">
                  @csrf
                  <div class="form-group">
                    <label for="signup-email">Email Address</label>
                    <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" @if(old('email')) value="{{ old('email') }}" @endif id="signup-email" placeholder="Email Address" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" value="agree" name="agree-terms" id="check-agree" checked="">
                      <label class="custom-control-label text-small" for="check-agree">I agree to the <a href="/terms">Terms &amp; Conditions</a>
                      </label>
                    </div>
                  </div>
                  <div class="text-center mt-4">
                    <button type="submit" class="btn btn-lg btn-success">Reset password</button>
                  </div>
                </form>
                <div class="text-center">
                  <span class="text-small">Already have an account? <a href="/login">Log in here</a>
                  </span>
                </div>
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