
<!doctype html>
<html lang="en">

<head id="head">
        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180826499-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-180826499-1');
    </script>
    <meta charset="utf-8">
    <title>Mcnally Finance India</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets_front/img/favicon.ico" type="image/x-icon">
    <meta name="description" content="Powerful analytics and accurate data from all global markets, in one comprehensive cloud solution.Focus on Asia/Europe.Big Data Applied to Investments">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500" rel="stylesheet">
    <link href="/assets_front/css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets_front/css/entypo.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets_front/css/theme.css?v=3.25" rel="stylesheet" type="text/css" media="all" />
    <!--<link rel="stylesheet" href="https://s3.amazonaws.com/icomoon.io/114779/Socicon/style.css?u8vidh">-->
    <script src="https://kit.fontawesome.com/cb44653dd4.js" crossorigin="anonymous"></script>


  </head>

  <body>

     <div class="navbar-container">
        <div class="bg-dark navbar-dark" data-sticky="top">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="/">
                        <img alt="McNally" src="/assets_front/img/McnallyLogoWhite.png" width="170" height="50">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="icon-menu h4"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a data-scroll href="#news" class="nav-link">News</a>
                            </li>
                            <li class="nav-item">
                                <a href="/products" class="nav-link">Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="#services" class="nav-link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="/about" class="nav-link">About us</a>
                            </li>
                            <li class="nav-item">
                                <a href="/terminal" class="nav-link">The terminal</a>
                            </li>

                        </ul>

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('login') }}">Go To Panel</a>
                            </li>
                        </ul>

                    </div>
                    <!--end nav collapse-->
                </nav>
            </div>
            <!--end of container-->
        </div>
    </div>

    @yield('content')

    <footer class="bg-gray text-light footer-long">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <img alt="Image" src="/assets_front/img/McnallyLogoWhite.png" class="mb-4" width="170" height="50" />
                    <p class="text-muted">
                        &copy; 2020 McNally OÜ
                        <br />All rights reserved
                        <br />Tallinn, Lõõtsa tn 5-11, 11415
                        <br />
                        <a href="mailto:contact@mcnally.in" target="_blank">
                            <span class="icon-mail"></span> contact@mcnally.in
                        </a>
                    </p>
                    <br />
                    <p style="font-size:x-large;">
                        <a href="https://www.facebook.com/McnallyFinance/" target="_blank"><span class="socicon-facebook"></span></a>
                        <a href="https://www.instagram.com/mcnally_finance/?hl=es-la" target="_blank"><span class="socicon-instagram"></span></a>
                        <a href="https://www.facebook.com/messages/t/McnallyFinance" target="_blank" style="margin-left: 3px;"><i class="fab fa-facebook-messenger" aria-hidden="true" style="
font-size: 28px;
"></i></a>
                    </p>
                </div>
                <!--end of col-->
                <div class="col-12 col-md-9">
                    <span class="h5">A robust suite of components developed for private investors</span>
                    <div class="row no-gutters">
                        <div class="col-6 col-lg-3">
                            <h6>Navigate</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#news">News</a>
                                </li>
                                <li>
                                    <a href="/products">Pricing plans</a>
                                </li>
                                <li>
                                    <a href="#services">Services</a>
                                </li>
                                <li>
                                    <a href="/core-fundamental-india">Fundamentals</a>
                                </li>
                                <li>
                                    <a href="/globalstocks">Global Stocks</a>
                                </li>
                                <li>
                                    <a href="/usmarketdata">U.S. Stock Data</a>
                                </li>
                                <li>
                                    <a href="/quants">Quants</a>
                                </li>
                            </ul>
                        </div>
                        <!--end of col-->
                        <div class="col-6 col-lg-3">
                            <h6>Platform</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="/terminal">The Terminal</a>
                                </li>
                                <li>
                                    <a href="" onclick="event.preventDefault()">Mac OS &amp; iOS</a>
                                </li>
                                <li>
                                    <a href="" onclick="event.preventDefault()">Android &amp; Chrome OS</a>
                                </li>
                                <li>
                                    <a href="" onclick="event.preventDefault()">Windows</a>
                                </li>
                                <li>
                                    <a href="" onclick="event.preventDefault()">Linux</a>
                                </li>
                            </ul>
                        </div>
                        <!--end of col-->
                        <div class="col-6 col-lg-3">
                            <h6>Social</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="https://www.facebook.com/McnallyFinance/">Facebook</a>
                                </li>
                                <li>
                                    <a href="#">Messenger</a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/mcnally_finance/?hl=es-la">Instagram</a>
                                </li>
                                <li>
                                    <a href="#">Tidio</a>
                                </li>
                                <li>
                                    <a href="mailto:contact@mcnally.in">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <!--end of col-->
                        <div class="col-6 col-lg-3">
                            <h6>Company</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="/about">About company</a>
                                </li>
                                <li>
                                    <a href="/faq">Faqs</a>
                                </li>
                                <li>
                                    <a href="/terms">Terms & conditions</a>
                                </li>
                                <li>
                                    <a href="/investment">Investment</a>
                                </li>
                                 <li>
                                    <a href="/growth">India growth</a>
                                </li>
                            </ul>
                        </div>
                        <!--end of col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </footer>
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
<script src="//code.tidio.co/dtf6nhhuznr8cutnn22iao58tifn3oth.js" async></script>
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

<script type="text/javascript">
        const API_FINNHUB = "{{ env('API_FINNHUB') }}";
    </script>

</body>

</html>
