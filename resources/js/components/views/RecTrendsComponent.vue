<template>
<div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-8">
              <h4 class="card-title" style="padding: 10px 0px;">Recomendation Trends</h4>
            </div>

            <div class="col-12 col-md-6 col-lg-6 col-xl-4">
              <form class="app-search d-none d-lg-block" style="padding: 0px" @submit.prevent="search()">
                <div class="position-relative">
                  <div class="row">
                    <div class="col-3">
                      <h4 class="card-title" style="padding: 10px 0px;">{{ api_symbol }}</h4>
                    </div>
                    <div class="col-9">
                      <input v-model="textSearch" type="text" placeholder="Search Stocks..." required="required" class="form-control" style="border-radius: 5px; padding-left: 20px;">
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <div class="col-12" v-if="arrayRecTrends.length">
              <div class="card">
                <div class="card-body" style="padding: 0px;margin-top: 1rem;">
                  <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                        <tr>
                          <th>Symbol</th>
                          <th>Strong Buy</th>
                          <th>Buy</th>
                          <th>Hold</th>
                          <th>Sell</th>
                          <th>Strong Sell</th>
                          <th>Period</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(r, i) in arrayRecTrends" :key="i">
                          <td>{{ r.symbol }}</td>
                          <td>{{ r.strongBuy }}</td>
                          <td>{{ r.buy }}</td>
                          <td>{{ r.hold }}</td>
                          <td>{{ r.sell }}</td>
                          <td>{{ r.strongSell }}</td>
                          <td>{{ r.period }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> <!-- end col -->

          </div>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  <div class="row" id="containerChart" style="display: none;">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div id="column-charts" dir="ltr"></div>
        </div>
      </div>
    </div> 
    <!-- end col -->
  </div>
  <!-- end row -->

  <div class="row">
    <div v-if="loading" class="col-lg-12 text-center">
      <div class="alert alert-info"><i class="bx bx-loader bx-spin font-size-18 align-middle mr-2"></i> Loading</div>
    </div>
    <div v-if="!arrayRecTrends.length && !loading" class="col-lg-12 text-center">
      <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> No Data</div>
    </div>
  </div>

</div>
</template>

<script>
const finnhub = require('finnhub');
const api_key = finnhub.ApiClient.instance.authentications['api_key'];
api_key.apiKey = API_FINNHUB // Replace this
const finnhubClient = new finnhub.DefaultApi()

export default {
  data() {
    return {
      arrayRecTrends:[],
      textSearch:"",
      api_symbol:"",
      loading:false
    }
  },

  methods: {
    search() {
      NProgress.start();
      this.clear();
      this.loading = true;

      finnhubClient.recommendationTrends(this.textSearch.toUpperCase(), (error, data, response) => {
        this.loading = false;
        NProgress.done();

        if (!data.length) {

          this.arrayRecTrends = [];
          return;

        } else {

          this.arrayRecTrends = data;
          this.api_symbol = this.textSearch.toUpperCase();

          // column charts
          $('#containerChart').prop('style', '');

          var arrayChart = [];
          this.arrayRecTrends.some(function(el, i) {
            arrayChart.push(el);
            return i === 11;
          });
          arrayChart.reverse();

          var arrayStrongBuy = [];
          var arrayBuy = [];
          var arrayhold = [];
          var arraysell = [];
          var arraystrongSell = [];
          var arrayperiod = [];

          arrayChart.some(function(el, i) {
            arrayStrongBuy.push(el.strongBuy);
            arrayBuy.push(el.buy);
            arrayhold.push(el.hold);
            arraysell.push(el.sell);
            arraystrongSell.push(el.strongSell);
            arrayperiod.push(el.period);
            return i === 11;
          });

          var columnChartWidth = $("#column-charts").width();
          var container = document.getElementById('column-charts');
          var data = {
            categories: arrayperiod,
            series: [
            {
              name: 'StrongBuy',
              data: arrayStrongBuy
            },
            {
              name: 'Buy',
              data: arrayBuy
            },
            {
              name: 'Hold',
              data: arrayhold
            },
            {
              name: 'Sell',
              data: arraysell
            },
            {
              name: 'StrongSell',
              data: arraystrongSell
            },
            ]
          };
          var options = {
            chart: {
              width: columnChartWidth,
              height: 380,
              title: 'Monthly Revenue',
              format: '1'
            },
            yAxis: {
              title: 'Analysts',
              min: 0,
              max: 25
            },
            xAxis: {
              title: 'Month'
            },
            legend: {
              align: 'top'
            }
          };
          var theme = {
            chart: {
              background: {
                color: '#fff',
                opacity: 0
              }
            },
            title: {
              color: '#8791af'
            },
            xAxis: {
              title: {
                color: '#8791af'
              },
              label: {
                color: '#8791af'
              },
              tickColor: '#8791af'
            },
            yAxis: {
              title: {
                color: '#8791af'
              },
              label: {
                color: '#8791af'
              },
              tickColor: '#8791af'
            },
            plot: {
              lineColor: 'rgba(166, 176, 207, 0.1)'
            },
            legend: {
              label: {
                color: '#8791af'
              }
            },
            series: {
              colors: ['#34c38f', '#556ee6', '#f46a6a', '#156ee6', '#f41a6a']
            }
          }; // For apply theme

          tui.chart.registerTheme('myTheme', theme);
          options.theme = 'myTheme';
          var columnChart = tui.chart.columnChart(container, data, options);
          $(window).resize(function () {
            columnChartWidth = $("#column-charts").width();
            columnChart.resize({
              width: width,
              height: 350
            });
          });

          $('.tui-chart-chartExportMenu-area').click();

        }

      });
    },

    clear() {
      this.arrayRecTrends = [];
      $('#column-charts').text('');
      $('#containerChart').prop('style', 'display:none');
    }
  },

  mounted() {
    let tui = document.createElement('script');
    tui.setAttribute('src', '/assets/libs/tui-chart/tui-chart.min.js');
    document.head.appendChild(tui);

    this.textSearch = API_SYMBOL;
    this.api_symbol = API_SYMBOL;

    this.search();
  },
}
</script>