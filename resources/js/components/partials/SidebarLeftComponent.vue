<template>
  <div id="vue-partial-sidebarleft">   

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

               <li class="menu-title"> </li>
                    <li>
                        <router-link :to="{ name: 'com-research' }" class=" waves-effect">
                            <i class="bx bx-layout"></i>
                            <span>Companies Researchs</span>
                            <number-pdf />
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'inv-news' }" class=" waves-effect" aria-expanded="false">
                            <i class="bx bx-calendar"></i>
                            <span>Investments News</span>
                            <number-news />
                        </router-link>
                    </li>

                    <li class="menu-title">USA API</li>
                      <li>
                    <a href="index#" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span><span style="font-size:10px"> (Quandl)</span>
                    </a>
                    </li>
                    <li>
                        <router-link :to="{ name: 'top-market-news' }" class=" waves-effect" aria-expanded="false">
                            <i class="bx bx-layout"></i>
                            <span>Top Market News</span>
                        </router-link>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-store"></i>
                            <span>Stock details</span><span style="font-size:10px"> (fhub)</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                          <li>
                            <router-link :to="{ name: 'com-profile' }">
                                Company Profile
                            </router-link>
                          <li>
                          <li>
                            <router-link :to="{ name: 'bas-financials' }">
                                Basic Financials
                            </router-link>
                          <li>
                            <router-link :to="{ name: 'rec-trends' }">
                                Recommendation Trends
                            </router-link>
                          </li>
                          <li>
                            <router-link :to="{ name: 'price-tar' }">
                                Price Target
                            </router-link>
                          </li>
                          <li>
                            <router-link :to="{ name: 'eps-surprice' }">
                                EPS Surprice
                            </router-link>
                          </li>

                          <li>
                            <router-link :to="{ name: 'com-news' }">
                                Company News
                            </router-link>
                          </li>
                        </ul>
                     </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-bitcoin"></i>
                        <span>Fundamentals India</span><span style="font-size:10px"> (Quandl)</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/cfi-metrics">Core Metrics</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->

    </div>    
    <a href="/logout" class="btn btn-success" style="width: 100%;background: #222736;border: none;margin-top: -53px;position: absolute;z-index: 9999999999;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bx bx-power-off font-size-16 align-middle mr-1"></i>LOGOUT
    </a>
</div>
<!-- Left Sidebar End -->


  </div>
</template>
<script>
import NumberNews from './NumberNews.vue'
import NumberPdf from './NumberPdf.vue'

export default {
    components : {
        NumberNews,
        NumberPdf
    }
}
</script>
