<template>
<div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-6">
              <h4 class="card-title" style="padding: 10px 0px;">Basic Financials</h4>
            </div>

            <div class="col-6">
              <form class="app-search d-none d-lg-block" style="padding: 0px" @submit.prevent="search()">
                <div class="position-relative">
                  <div class="row">
                    <div class="col-3" style="text-align: right;">
                      <h4 class="card-title" style="padding: 10px 0px;">{{ api_symbol }}</h4>
                    </div>
                    <!--<div class="col-4">
                      <select v-model="typeMetric" required="required" class="form-control" style="border-radius: 5px; padding-left: 20px;">
                        <option value="all" selected="">All</option>
                      </select>
                    </div>-->
                    <div class="col-5">
                      <input v-model="textSearch" type="text" placeholder="Search Stocks..." class="form-control" style="border-radius: 5px; padding-left: 20px;">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->


  <div class="row" v-if="viewPrice">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-12">
              <h4 class="card-title" style="padding: 10px 0px;">Price</h4>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="">
                <div class="table-responsive">
                  <table class="table project-list-table table-nowrap table-centered table-borderless">
                    <tbody>
                      <tr>
                        <td>
                          <h5 class="text-truncate font-size-14 text-dark">10DayAverageTradingVolume</h5>
                          <p class="text-muted mb-0">{{ metric["10DayAverageTradingVolume"] }}</p>

                          <h5 class="text-truncate font-size-14 text-dark" style="margin-top: 15px;">13WeekPriceReturnDaily</h5>
                          <p class="text-muted mb-0">{{ metric["13WeekPriceReturnDaily"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">26WeekPriceReturnDaily</h5>
                          <p class="text-muted mb-0">{{ metric["26WeekPriceReturnDaily"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">3MonthAverageTradingVolume</h5>
                          <p class="text-muted mb-0">{{ metric["3MonthAverageTradingVolume"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">52WeekHigh</h5>
                          <p class="text-muted mb-0">{{ metric["52WeekHigh"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">52WeekHighDate</h5>
                          <p class="text-muted mb-0">{{ metric["52WeekHighDate"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">52WeekLow</h5>
                          <p class="text-muted mb-0">{{ metric["52WeekLow"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">52WeekLowDate</h5>
                          <p class="text-muted mb-0">{{ metric["52WeekLowDate"] }}</p>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <h5 class="text-truncate font-size-14">52WeekPriceReturnDaily</h5>
                          <p class="text-muted mb-0">{{ metric["52WeekPriceReturnDaily"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">5DayPriceReturnDaily</h5>
                          <p class="text-muted mb-0">{{ metric["5DayPriceReturnDaily"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14 text-dark">beta</h5>
                          <p class="text-muted mb-0">{{ metric["beta"] }}</p>

                          <h5 class="text-truncate font-size-14 text-dark" style="margin-top: 15px;">marketCapitalization</h5>
                          <p class="text-muted mb-0">{{ metric["marketCapitalization"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">monthToDatePriceReturnDaily</h5>
                          <p class="text-muted mb-0">{{ metric["monthToDatePriceReturnDaily"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">priceRelativeToS&P50013Week</h5>
                          <p class="text-muted mb-0">{{ metric["priceRelativeToS&P50013Week"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">priceRelativeToS&P50026Week</h5>
                          <p class="text-muted mb-0">{{ metric["priceRelativeToS&P50026Week"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">priceRelativeToS&P5004Week</h5>
                          <p class="text-muted mb-0">{{ metric["priceRelativeToS&P5004Week"] }}</p>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <h5 class="text-truncate font-size-14">priceRelativeToS&P50052Week</h5>
                          <p class="text-muted mb-0">{{ metric["priceRelativeToS&P50052Week"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">priceRelativeToS&P500Ytd</h5>
                          <p class="text-muted mb-0">{{ metric["priceRelativeToS&P500Ytd"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">yearToDatePriceReturnDaily</h5>
                          <p class="text-muted mb-0">{{ metric["yearToDatePriceReturnDaily"] }}</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- end row -->

        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  <div class="row" v-if="viewValuation">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-12">
              <h4 class="card-title" style="padding: 10px 0px;">Valuation</h4>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="">
                <div class="table-responsive">
                  <table class="table project-list-table table-nowrap table-centered table-borderless">
                    <tbody>
                      <tr>
                        <td>
                          <h5 class="text-truncate font-size-14 text-dark">currentDividendYieldTTM</h5>
                          <p class="text-muted mb-0">{{ metric["currentDividendYieldTTM"] }}</p>

                          <h5 class="text-truncate font-size-14 text-dark" style="margin-top: 15px;">dividendYield5Y</h5>
                          <p class="text-muted mb-0">{{ metric["dividendYield5Y"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">dividendYieldIndicatedAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["dividendYieldIndicatedAnnual"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">netDebtAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["netDebtAnnual"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">netDebtInterim</h5>
                          <p class="text-muted mb-0">{{ metric["netDebtInterim"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">pbAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["pbAnnual"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">pbQuarterly</h5>
                          <p class="text-muted mb-0">{{ metric["pbQuarterly"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">pcfShareTTM</h5>
                          <p class="text-muted mb-0">{{ metric["pcfShareTTM"] }}</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <h5 class="text-truncate font-size-14">peBasicExclExtraTTM</h5>
                          <p class="text-muted mb-0">{{ metric["peBasicExclExtraTTM"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">peExclExtraAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["peExclExtraAnnual"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14 text-dark">peExclExtraHighTTM</h5>
                          <p class="text-muted mb-0">{{ metric["peExclExtraHighTTM"] }}</p>

                          <h5 class="text-truncate font-size-14 text-dark" style="margin-top: 15px;">peExclExtraTTM</h5>
                          <p class="text-muted mb-0">{{ metric["peExclExtraTTM"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">peExclLowTTM</h5>
                          <p class="text-muted mb-0">{{ metric["peExclLowTTM"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">peInclExtraTTM</h5>
                          <p class="text-muted mb-0">{{ metric["peInclExtraTTM"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">peNormalizedAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["peNormalizedAnnual"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">pfcfShareAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["pfcfShareAnnual"] }}</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <h5 class="text-truncate font-size-14">pfcfShareTTM</h5>
                          <p class="text-muted mb-0">{{ metric["pfcfShareTTM"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">psAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["psAnnual"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">psTTM</h5>
                          <p class="text-muted mb-0">{{ metric["psTTM"] }}</p>
                        </td>
                        <td>
                          <h5 class="text-truncate font-size-14">ptbvAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["ptbvAnnual"] }}</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <h5 class="text-truncate font-size-14">ptbvQuarterly</h5>
                          <p class="text-muted mb-0">{{ metric["ptbvQuarterly"] }}</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- end row -->

        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  <div class="row" v-if="viewMargin">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-12">
              <h4 class="card-title" style="padding: 10px 0px;">Margin</h4>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="">
                <div class="table-responsive">
                  <table class="table project-list-table table-nowrap table-centered table-borderless">
                    <tbody>
                      <tr>
                        <td>
                          <h5 class="text-truncate font-size-14 text-dark">freeOperatingCashFlow/revenue5Y</h5>
                          <p class="text-muted mb-0">{{ metric["freeOperatingCashFlow/revenue5Y"] }}</p>

                          <h5 class="text-truncate font-size-14 text-dark" style="margin-top: 15px;">freeOperatingCashFlow/revenueTTM</h5>
                          <p class="text-muted mb-0">{{ metric["freeOperatingCashFlow/revenueTTM"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">grossMargin5Y</h5>
                          <p class="text-muted mb-0">{{ metric["grossMargin5Y"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">grossMarginAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["grossMarginAnnual"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">grossMarginTTM</h5>
                          <p class="text-muted mb-0">{{ metric["grossMarginTTM"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">netProfitMargin5Y</h5>
                          <p class="text-muted mb-0">{{ metric["netProfitMargin5Y"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">netProfitMarginAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["netProfitMarginAnnual"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">netProfitMarginTTM</h5>
                          <p class="text-muted mb-0">{{ metric["netProfitMarginTTM"] }}</p>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <h5 class="text-truncate font-size-14">operatingMargin5Y</h5>
                          <p class="text-muted mb-0">{{ metric["operatingMargin5Y"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">operatingMarginAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["operatingMarginAnnual"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14 text-dark">operatingMarginTTM</h5>
                          <p class="text-muted mb-0">{{ metric["operatingMarginTTM"] }}</p>

                          <h5 class="text-truncate font-size-14 text-dark" style="margin-top: 15px;">pretaxMargin5Y</h5>
                          <p class="text-muted mb-0">{{ metric["pretaxMargin5Y"] }}</p>
                        </td>

                        <td>
                          <h5 class="text-truncate font-size-14">pretaxMarginAnnual</h5>
                          <p class="text-muted mb-0">{{ metric["pretaxMarginAnnual"] }}</p>

                          <h5 class="text-truncate font-size-14" style="margin-top: 15px;">pretaxMarginTTM</h5>
                          <p class="text-muted mb-0">{{ metric["pretaxMarginTTM"] }}</p>
                        </td>

                        <td>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- end row -->

        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->
          


  <div class="row">
    <div v-if="loading" class="col-lg-12 text-center">
      <div class="alert alert-info"><i class="bx bx-loader bx-spin font-size-18 align-middle mr-2"></i> Loading</div>
    </div>
    <div v-if="!symbol && !loading" class="col-lg-12 text-center">
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
      symbol:'',
      textSearch:"",
      api_symbol:"",
      metric:[],
      typeMetric:'all',
      viewPrice:true,
      viewValuation:true,
      viewMargin:true,
      loading:false
    }
  },

  methods: {
    search() {
      NProgress.start();
      this.clear();
      this.loading = true;

      finnhubClient.companyBasicFinancials(this.textSearch.toUpperCase(), this.typeMetric, (error, data, response) => {
        this.loading = false;
        NProgress.done();
        this.symbol = data.symbol;
        this.metric = data.metric;

        switch (this.typeMetric) {
          case 'price':
            this.viewPrice = true;
            break;

          case 'valuation':
            this.viewValuation = true;
            break;

          case 'margin':
            this.viewMargin = true;
            break;

          case 'all':
            this.viewPrice = true;
            this.viewValuation = true;
            this.viewMargin = true;
            break;
        }

        this.api_symbol = this.textSearch.toUpperCase();
      });
 
    },

    clear() {
      this.symbol = '';
      this.metric = [];
      this.viewPrice = false;
      this.viewValuation = false;
      this.viewMargin = false;
    }
  },

  mounted() {
    this.textSearch = API_SYMBOL;
    this.api_symbol = API_SYMBOL;
    this.search();
  },

}
</script>