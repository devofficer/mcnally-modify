<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

               <li class="menu-title"> </li>
                    <li>
                    <a href="{{ url('admin/com-research') }}" class=" waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Companies Researchs</span>
                    </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/inv-news') }}" class=" waves-effect" aria-expanded="false">
                            <i class="bx bx-calendar"></i>
                            <span>Investments News</span>
                            <span class="badge badge-pill badge-info float-right">03</span>
                        </a>
                    </li>

                    <li class="menu-title">USA API</li>
                      <li>
                    <a href="index#" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span><span style="font-size:10px"> (Quandl)</span>
                    </a>
                    </li>
                        <li>
                    <a href="{{ url('top-market-news') }}" class=" waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Top Market News</span><span style="font-size:10px"> (fhub)</span>
                    </a>
                    </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Stock details</span><span style="font-size:10px"> (fhub)</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('com-profile') }}">Company Profile</a></li>
                        <li><a href="{{ url('rec-trends') }}">Recommendation Trends</a></li>
                        <li><a href="{{ url('price-tar') }}">Price Target</a></li>
                        <li><a href="{{ url('rev-estimates') }}">Revenue Estimates</a></li>
                        <li><a href="{{ url('eps-est') }}">EPS Estimates</a></li>
                        <li><a href="{{ url('eps-surprice') }}">EPS Surprice</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-bitcoin"></i>
                        <span>Fundamentals India</span><span style="font-size:10px"> (Quandl)</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('cfi-metrics') }}">Core Metrics</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->

    </div>    
    <a href="{{ route('logout') }}" class="btn btn-success" style="width: 100%;background: #222736;border: none;margin-top: -53px;position: absolute;z-index: 9999999999;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bx bx-power-off font-size-16 align-middle mr-1"></i>LOGOUT
    </a>
</div>
<!-- Left Sidebar End -->

