@extends('layouts.landing-page')
@section('content')
<div class="main-container">
        <section class="bg-dark space-lg slide-bg" data-jarallax data-speed="0.2">
            <img alt="Image" src="/assets_front/img/graphic-bg-clouds-2.png" class="bg-image" />
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-md-6 col-lg-5 section-intro">
                        <h1 class="display-3">Smart financial research</h1>
                        <span class="lead">
                            Mcnally is an Indian investment service that allows to earn money in multinationals’ shares through specialized financial reports for each individual investor.
                        </span>
                    </div>
                    <!--end of col-->
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="card">
                            <div class="card-body">
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
                                        <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Chose a password" required="" maxlength="30" minlength="8">
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
                        </div>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!--end of section-->
      <div class="tradingview-widget-container"> <div class="tradingview-widget-container__widget"></div> <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text"></span></a></div> <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async> { "symbols": [ { "title": "BTC/USD", "proName": "BITFINEX:BTCUSD" }, { "proName": "OANDA:SPX500USD", "title": "S&P 500" }, { "description": "BSE Sensex 500", "proName": "BSE:BSE500" }, { "title": "Shangai Composite", "proName": "INDEX:XLY0" }, { "title": "Nikkei 225", "proName": "INDEX:NKY" }, { "title": "EUR/USD", "proName": "FX_IDC:EURUSD" }, { "description": "USD/INR ₹", "proName": "OANDA:USDINR" }, { "title": "ETH/USD", "proName": "BITFINEX:ETHUSD" }, { "description": "10 Years rate EEUU", "proName": "FRED:DGS10" }, { "proName": "OANDA:NAS100USD", "title": "Nasdaq 100" }, { "description": "TATA Motors", "proName": "BSE:TATAMOTORS" }, { "description": "ICICI BANK LTD", "proName": "BSE:ICICIBANK" }, { "description": "ACC LTD", "proName": "BSE:ACC" }, { "description": "BHEL LTD", "proName": "BSE:BHEL" }, { "description": "DLF Universal Limited", "proName": "BSE:DLF" }, { "description": "GRASIM INDUSTRIES", "proName": "BSE:GRASIM" }, { "description": "HDFC Bank LTD", "proName": "BSE:HDFCBANK" }, { "description": "HERO MOTOCORP LTD", "proName": "BSE:HEROMOTOCO" }, { "description": "HINDALCO INDUSTRIES LTD", "proName": "BSE:HINDALCO" }, { "description": "HINDUSTAN LEVER LTD", "proName": "BSE:HINDUNILVR" }, { "description": "ITC LTD", "proName": "BSE:ITC" }, { "description": "LARSEN & TOUBRO", "proName": "BSE:LT" }, { "description": "Mahindra & Mahindra Limited", "proName": "BSE:M_M" }, { "description": "MARUTI SUZUKI INDIA LTD", "proName": "BSE:MARUTI" }, { "description": "NIIT Technologies LTD", "proName": "BSE:NIITTECH" }, { "description": "NTPC LTD", "proName": "BSE:NTPC" }, { "description": "ONGC", "proName": "BSE:ONGC" }, { "description": "RELIANCE INDUSTRIES", "proName": "BSE:RELIANCE" }, { "description": "STATE BANK OF INDIA", "proName": "BSE:SBIN" }, { "description": "Tata Consultancy Services", "proName": "BSE:TCS" }, { "description": "TATA STEEL LTD", "proName": "BSE:TATASTEEL" }, { "description": "WIPRO LTD", "proName": "BSE:WIPRO" }, { "description": "ESCORTS LTD", "proName": "BSE:ESCORTS" }, { "description": "AVANTI FEEDS LIMITED", "proName": "BSE:AVANTI" }, { "description": "NETFLIX", "proName": "NASDAQ:NFLX" }, { "description": "TESLA ", "proName": "NASDAQ:TSLA" }, { "description": "VISA", "proName": " NYSE:V" }, { "description": "VERIZON", "proName": "NYSE:VZ" }, { "description": "GOLDMAN SACHS", "proName": "NYSE:GS" }, { "description": "ALCOA", "proName": "NYSE:AA" }, { "description": "GDP", "proName": "FRED:GDP" }, { "description": "NIKE", "proName": "NYSE:NKE" }, { "description": "Dell", "proName": "NYSE:DELL" }, { "description": "FedEx", "proName": "NYSE:FDX" }, { "description": "Kraft Heinz", "proName": "NASDAQ:KHC" }, { "description": "Under Amour", "proName": "NYSE:UAA" }, { "description": "APPLE", "proName": "NASDAQ:AAPL" }, { "description": "ALPHABET", "proName": "NASDAQ:GOOGL" }, { "description": "Comcast", "proName": "NASDAQ:CMCSA" }, { "description": "General Motors", "proName": "NYSE:GE" }, { "description": "Walgreens", "proName": "NASDAQ:WBA" }, { "description": "JP Morgan Chase", "proName": "NYSE:JPM" }, { "description": "Metlife", "proName": "NYSE:MET" }, { "description": "Bovespa Index", "proName": "INDEX:BVSP" }, { "description": "DAX INDEX", "proName": "XETR:DAX" }, { "description": "QUALCOMM", "proName": "NASDAQ:QCOM " }, { "description": "ebay", "proName": "NASDAQ:EBAY" }, { "description": "Amazon", "proName": "NASDAQ:AMZN" }, { "description": "AMD", "proName": "NASDAQ:AMD" }, { "description": "Philip Morris", "proName": "NYSE:PM" }, { "description": "Walmart", "proName": "NYSE:WMT" }, { "description": "Pepsico", "proName": "NASDAQ:PEP" }, { "description": "CAC 40", "proName": "INDEX:CAC" }, { "description": "Coca-Cola", "proName": "NYSE:KO" }, { "description": "Russell 2000", "proName": "RUSSELL:RUT" }, { "description": "IBM", "proName": "NYSE:IBM" }, { "description": "PFIZER", "proName": "NYSE:PFE" }, { "description": "AIG", "proName": "NYSE:AIG" }, { "description": "ORACLE", "proName": "NYSE:ORCL" }, { "description": "Kimberly-Clark", "proName": "NYSE:KMB" }, { "description": "CITIGROUP", "proName": "NYSE:C" }, { "description": "WELLS FARGO", "proName": "NYSE:WFC" }, { "description": "Western Union", "proName": "NYSE:WU" }, { "description": "DEERE", "proName": "NYSE:DE" }, { "description": "MCDONALD'S", "proName": "NYSE:MCD" }, { "description": "BANK OF AMERICA", "proName": "NYSE:BAC" }, { "description": "PETROBRAS", "proName": "NYSE:PBR" }, { "description": "TOTAL S.A.", "proName": "NYSE:TOT" }, { "description": "VALERO ENERGY", "proName": "NYSE:VLO" }, { "description": "SHELL", "proName": "NYSE:RDS.A" }, { "description": "EXXON MOBILE", "proName": "NYSE:XOM" }, { "description": "YPF OIL", "proName": "NYSE:YPF" }, { "description": "P&G", "proName": " NYSE:PG" }, { "description": "FACEBOOK", "proName": " NASDAQ:FB" }, { "description": "Twitter", "proName": "NYSE:TWTR" }, { "description": "BOEING", "proName": " NYSE:BA" }, { "description": "Westpac Banking Corp.", "proName": "NYSE:WBK" }, { "description": "VALE S.A.", "proName": "NYSE:VALE" }, { "description": "BANCO DE CHILE", "proName": "NYSE:BCH" }, { "description": "PetroChina", "proName": "NYSE:PTR" }, { "description": "NOKIA", "proName": "NYSE:NOK" }, { "description": "SANOFI SA.", "proName": "NASDAQ:SNY" }, { "description": "Deustche Bank AG", "proName": "NYSE:DB" }, { "description": "SAP AG", "proName": "NYSE:SAP" }, { "description": "Tata Motors", "proName": "NYSE:TTM" }, { "description": "ICICI Bank", "proName": "NYSE:IBN" }, { "description": "HONDA MOTOR", "proName": "NYSE:HMC" }, { "description": "SONY", "proName": "NYSE:SNE" }, { "description": "TOYOTA MOTOR", "proName": "NYSE:TM" }, { "description": "LG", "proName": "NYSE:LPL" }, { "description": "KOREA ELECTRIC CORP.", "proName": "NYSE:KEP" }, { "description": "TENARIS S.A.", "proName": "NYSE:TS" }, { "description": "TERNIUM S.A.", "proName": "NYSE:TX" }, { "description": "Grupo Televisa S.A.", "proName": "NYSE:TV" }, { "description": "CREDIT SUISSE", "proName": "NYSE:CS" }, { "description": "NOVARTIS AG.", "proName": "NYSE:NVS" }, { "description": "UBS AG", "proName": "NYSE:UBS" }, { "description": "BARCLAYS", "proName": "NYSE:BCS" }, { "description": "GSK", "proName": "NYSE:GSK" }, { "description": "HSBC Bank", "proName": "NYSE:HSBC" }, { "description": "Unilever", "proName": "NYSE:UL" } ], "theme": "light", "isTransparent": true, "displayMode": "adaptive", "locale": "en" } </script> </div> <!-- TradingView Widget END -->
        <section id="video">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center text-center section-intro">
                    <div class="col-12 col-md-9 col-lg-8">
                        <span class="title-decorative" data-aos="fade-up" data-aos-delay="10">Meet The Future Investments</span>
                        <h2 class="display-4" data-aos="fade-up" data-aos-delay="100">Introducing a new way to analyze investments</h2>
                        <span class="lead" data-aos="fade-up" data-aos-delay="200">An opportunity to present the main benefits of your investment and set the stage by projecting what is to come</span>

                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->

                <div class="row justify-content-center">
                    <img alt="Image" src="/assets_front/img/GraficoLight2.JPG" class="bg-image" style="
    max-width: 734px;
    display: block;width:100%;
    position: static;border-radius:5px;
">

                    <div class="col-md-8 col-sm-10">


                        <!--end of video cover-->
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
                <div class="row justify-content-center text-center section-outro">
                    <div class="col-lg-4 col-md-5">
                        <h6>India Stock markets and Global equity</h6>
                        <p>BSE Bombay Stock Exchange, NSE International Exchange, NYSE New York Stock Exchange, S&P Global assets and Emerging markets.</p>
                        <a href="/products">View more features &rsaquo;</a>
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!--end of section-->

        <section id="datacenter">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-center text-center section-intro">
                    <div class="col-12 col-md-9 col-lg-8">
                        <span class="title-decorative" data-aos="fade-up" data-aos-delay="10">DATA CENTER</span>
                        <h2 class="display-4" data-aos="fade-up" data-aos-delay="100">Greatly simplified investment workflow</h2>
                        <span class="lead" data-aos="fade-up" data-aos-delay="200">An opportunity to present the main benefits of your investment and make decisions for the next economic and financial scenario</span>
                        <a href="/terminal">The Terminal &rsaquo;</a>

                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->

                <div class="row justify-content-around">

                    <div class="col-md-5 col-7 mb-4">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="content-1" role="tabpanel">
                                <img alt="Image" class="img-fluid w-100" src="/assets/images/VectorDataCenter1.png" />
                            </div>
                            <div class="tab-pane fade" id="content-2" role="tabpanel">
                                <img alt="Image" class="img-fluid w-100" src="/assets/images/VectorDataCenter2.png" />
                            </div>
                            <div class="tab-pane fade" id="content-3" role="tabpanel">
                                <img alt="Image" class="img-fluid w-100" src="/assets/images/VectorDataCenter3.png" />
                            </div>
                        </div>
                    </div>
                    <!--end of col-->
                   <div class="col-lg-5 col-md-8 mb-4">
              <ul class="nav nav-cards" role="tablist">
                <li>
                  <a class="card active" data-toggle="tab" href="#content-1" role="tab" aria-controls="content-1" aria-selected="true">
                    <div class="card-body">
                      <div class="media align-items-center">
                        <div class="step-circle mr-4">1</div>
                        <div class="media-body">
                          <h5>Coca Cola Company</h5>
                          <span>
                            It’s even easier than it sounds, you just need an email address
                          </span>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="card" data-toggle="tab" href="#content-2" role="tab" aria-controls="content-2" aria-selected="false">
                    <div class="card-body">
                      <div class="media align-items-center">
                        <div class="step-circle mr-4">2</div>
                        <div class="media-body">
                          <h5>Apple Inc.</h5>
                          <span>
                            With tons of tutorials and examples, this part is even easier than the last
                          </span>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="card" data-toggle="tab" href="#content-3" role="tab" aria-controls="content-3" aria-selected="false">
                    <div class="card-body">
                      <div class="media align-items-center">
                        <div class="step-circle mr-4">3</div>
                        <div class="media-body">
                          <h5>Microsoft Corp</h5>
                          <span>
                            That was easy, right? Now it’s time to deploy that badboy and let the world know
                          </span>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
                    <!--end of col-->

                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!--end of section-->

        <section id="services" class="bg-white fullwidth-split">
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="col-12 col-sm-5 col-lg-6 order-sm-2 fullwidth-split-image">
                        <img alt="Image" src="/assets_front/img/mercadoIndia.jpg" class="bg-image" />
                    </div>
                    <!--end of col-->
                    <div class="col-12 col-sm-7 col-lg-6 order-sm-1 fullwidth-split-text">
                        <div class="col-12 col-sm-8">
                            <h3 class="h1" data-aos="fade-up">Developed for your convenience</h3>
                            <span class="lead" data-aos="fade-up">Fuss-free and simple to use</span>
                            <hr class="short" />
                            <ul class="feature-list feature-list-sm">
                                <li>
                                    <div class="media" data-aos="fade-up">
                                        <i class="icon-hand mr-2"></i>
                                        <div class="media-body">
                                            <h6>Advice on investment</h6>
                                            <p>
                                                We help clients to take advantage of investment opportunities in the stock market, from common shares to bonds. Best investments 2021.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media" data-aos="fade-up">
                                        <i class="icon-layers mr-2"></i>
                                        <div class="media-body">
                                            <h6>Companies Detection</h6>
                                            <p>
                                                We detect companies that trade on the stock market with high growth expectations of the price of shares and their dividends. All this is captured in digital financial reports.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media" data-aos="fade-up">
                                        <i class="icon-laptop mr-2"></i>
                                        <div class="media-body">
                                            <h6>Investment strategies</h6>
                                            <p>
                                                Different types of are combined, mainly shares. Offensive, defensive and conservative strategies are implemented.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!--end of section-->

        <section class="bg-white fullwidth-split">
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="col-12 col-sm-5 col-lg-6 fullwidth-split-image">
                        <img alt="Image" src="/assets_front/img/IndiaMenWork.jpg" class="bg-image" />
                    </div>
                    <!--end of col-->
                    <div class="col-12 col-sm-7 col-lg-6 fullwidth-split-text">
                        <div class="col-12 col-sm-8">
                            <h3 class="h1" data-aos="fade-up">It's everything, all in one place</h3>
                            <span class="lead">Unifying the workflow of your assets management</span>
                            <hr class="short" />
                            <ul class="feature-list feature-list-sm">
                                <li>
                                    <div class="media" data-aos="fade-up">
                                        <i class="icon-folder-images mr-2"></i>
                                        <div class="media-body">
                                            <h6>Investment Porfolios Design</h6>
                                            <p>
                                                One key to success is to design and manage a portfolio, allocating different financial instruments, with opportunities for growth and taking risks to the minimum.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media" data-aos="fade-up">
                                        <i class="icon-open-book mr-2"></i>
                                        <div class="media-body">
                                            <h6>Results In Real Time</h6>
                                            <p>Powerful analytics and accurate data from all global markets, in one comprehensive cloud solution.
                                               Our financial reports in real time will allow you to find out immediately the evolution and results of your investment.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media" data-aos="fade-up">
                                        <i class="icon-credit mr-2"></i>
                                        <div class="media-body">
                                            <h6>Payment Methods</h6>
                                            <p>
                                                Monthly subscription with credit card and Pay Pal. Monthly renewal. Encrypted information and payments. High level encrypted system SSL. Cancel whenever you decide.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!--end of section-->

        <section id="news">
            <div class="container">

                <div class="row justify-content-center text-center section-intro">
                    <div class="col-12 col-md-9 col-lg-8">
                        <span class="title-decorative" data-aos="fade-up" data-aos-delay="10">FINANCE NEWS</span>
                        <h2 class="display-4" data-aos="fade-up" data-aos-delay="100">Market Intelligence, and data analysis</h2>
                        <span class="lead" data-aos="fade-up" data-aos-delay="200">An opportunity to introduce the major benefits of your finance and set the scene for what's to come</span>

                    </div>
                    <!--end of col-->
                </div>
                <div id="div1">
                </div>
                <!--end of row-->
                <div id="divNews" class="row">


                <div class="col-12 col-sm-6 col-md-4"> <div class="card card-lg">  <a href="#">  <img class="card-img-top" src="/assets_front/img/10032.jpg" alt="Toyota" to="" move="" tacoma="" truck="" production="" mexico="" from="" u.s.="">  </a>  <div class="card-body">  <h4 class="card-title">Toyota to move Tacoma truck production to Mexico from U.S.</h4>  <p class="card-text">Last month, Toyota's Guanajuato plant began assembly of the Tacoma</p>  <a href="/blog-single.html?Cod=10032">Read News ›</a>  </div>  </div>  </div><div class="col-12 col-sm-6 col-md-4"> <div class="card card-lg">  <a href="#">  <img class="card-img-top" src="/assets_front/img/10031.jpg" alt="Delta" air="" lines="" inc="" on="" tuesday="" reported="" a="" fourth-quarter="" profit="" that="" beat="" estimates="">  </a>  <div class="card-body">  <h4 class="card-title">Delta Air Lines Inc on Tuesday reported a fourth-quarter profit that beat estimates</h4>  <p class="card-text">Delta has not picked up premium revenues</p>  <a href="/blog-single.html?Cod=10031">Read News ›</a>  </div>  </div>  </div></div>

                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!--end of section-->

        <section class="bg-white">
            <div class="container">
                <div class="row section-intro">
                    <div class="col text-center">
                        <h3 class="h1">Do not wait, register now with a 20% off in the first month...</h3>
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
                <form action="/UserAccount/Register">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input name="firstname" id="firstname" type="text" class="form-control form-control-lg" placeholder="Firstname">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input name="lastname" id="lastname" type="text" class="form-control form-control-lg" placeholder="Lastname">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input name="email" id="email" type="email" class="form-control form-control-lg" placeholder="you@domain.com">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="form-group">
                                <label for="button">&nbsp;</label>
                                <button id="button" type="submit" class="btn btn-lg btn-block btn-success">Sign up for Mcnally</button>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </form>
            </div>
            <!--end of container-->
        </section>
        <!--end of section-->

        <section class="space-xs text-center bg-gradient text-light">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <i class="mr-1 icon-cake"></i>
                        <span class="mr-2">For a limited time, get an exclusive 20% off month introductory offer.</span>
                        <a href="/register" class="text-white">Suscribe now &rsaquo;</a>
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!--end of section-->
        <section id="productos">
            <div class="container">
                <div class="row align-items-center justify-content-between section-intro">
                    <div class="col-12 col-lg-5 text-center text-lg-left section-intro">
                        <span class="title-decorative">Simple Pricing</span>
                        <h3 class="display-4">No hidden fees, please. Equity Investment Strategy.</h3>
                        <span class="lead">
                            Monthly financial reports of Blue Chip, Large Cap, Mid Cap and Small Cap that trade in the BSE
                            Bombay Stock Exchange, NSE International exchange and Global equities. Companies
                            detection: S&P BSE100, S&P BSE 200, S&P BSE 500, S&P BSE Mid Cap, S&P BSE Small
                            Cap, NIGTY 500, NIFTY Midcap 150, and other indices.
                        </span>
                        <a href="/core-fundamental-india">Core Fundamentals India</a> <br>
                        <a href="/globalstocks">Global Stocks Data</a> <br>
                        <a href="/quants">Quants</a>
                    </div>
                    <!--end of col-->
                    <div class="col-12 col-lg-6 row no-gutters card-group">
                        <div class="card pricing card-lg bg-dark col-lg-6">
                            <div class="card-body">
                                <h5>Pro</h5>
                                <span class="display-3">$29</span>
                                <span class="text-small">per user / month</span>
                                <span class="h6">Includes:</span>
                                <ul class="list-unstyled">
                                    <li>
                                        Financial analysis of shares
                                    </li>
                                    <li>
                                        Projections on the growth of shares
                                    </li>
                                    <li>
                                        Low and medium risk investment strategies
                                    </li>
                                    <li>
                                        Macro research
                                    </li>
                                    <li>
                                        Industries research
                                    </li>
                                    <li>
                                        Financial projections to 2 years
                                    </li>

                                    <li>
                                        Recommendations trends
                                    </li>

                                    <li>
                                        Price target
                                    </li>

                                    <li>
                                        EPS Estimates
                                    </li>

                                    <li>
                                        EPS Surprices
                                    </li>

                                    <li>
                                        Revenue Estimate
                                    </li>

                                    <li>
                                        Company News
                                    </li>
                                    
                                    <li>
                                        U.S. Stock Data
                                    </li>

                                    <li>
                                        Developed for the Smart investor
                                    </li>
                                </ul>
                                <a href="/register" class="btn btn-lg btn-success">Sign up now</a>
                            </div>
                        </div>
                        <!--end card-->
                        <div class="card pricing card-lg col-lg-6">
                            <div class="card-body">
                                <h5>Expert</h5>
                                <span class="display-3">$199</span>
                                <span class="text-small">per user / month</span>
                                <span class="h6">Includes:</span>
                                <ul class="list-unstyled">
                                    <li>
                                        Financial analysis of shares
                                    </li>
                                    <li>
                                        Projections on the growth of shares
                                    </li>
                                    <li>
                                        Low, medium and high risk investment strategies
                                    </li>
                                    <li>
                                        Quantitative Portfolio Strategy
                                    </li>
                                    <li>
                                        Focus on operational analysis
                                    </li>
                                    <li>
                                        Macro research
                                    </li>
                                    <li>
                                        Industries research
                                    </li>
                                    <li>
                                        Financial projections to 5 years
                                    </li>
                                    <li>
                                        Analysis of companies of emerging markets
                                    </li>

                                    <li>
                                        Company News
                                    </li>
                                    
                                    <li>
                                        U.S. Stock Data
                                    </li>

                                    <li>
                                        Core Fundamentals Data India
                                    </li>
                                    
                                    <li>
                                        Global Stocks Data
                                    </li>

                                    <li>
                                        Quants
                                    </li>

                                    <li>
                                        Developed for the Smart and Expert investor
                                    </li>
                                </ul>
                                <a href="/register" class="btn btn-lg btn-outline-primary">Sign up now</a>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h4 data-aos="fade-up">Don’t worry, your payments are secure and encrypted with monthly recurring billing</h4>
                        <ul class="list-inline list-inline-large">
                            <li class="list-inline-item" data-aos="fade-up" data-aos-delay="50">
                                <img alt="Image" class="logo" src="/assets_front/img/logo-stripe.png" />
                            </li>

                        </ul>
                    </div>
                    <!--end of col-->
                </div>

            </div>
            <!--end of container-->
        </section>
        <!--end of section-->

@endsection
