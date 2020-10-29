<template>
<div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-8">
              <h4 class="card-title" style="padding: 10px 0px;">Price Target</h4>
            </div>

            <div class="col-4">
              <form class="app-search d-none d-lg-block" style="padding: 0px" @submit.prevent="search()">
                <div class="position-relative">
                  <!--<div class="row">
                    <div class="col-3">
                      <h4 class="card-title" style="padding: 10px 0px;">{{ api_symbol }}</h4>
                    </div>
                    <div class="col-9">
                      <input v-model="textSearch" type="text" placeholder="Search Stocks..." required="required" class="form-control" style="border-radius: 5px; padding-left: 20px;">
                    </div>
                  </div>-->
                </div>
              </form>
            </div>

            <div class="col-12" v-if="symbol">
              <div class="card">
                <div class="card-body" style="padding: 0px;margin-top: 1rem;">
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th>Symbol</th>
                        <th>Target High</th>
                        <th>Target Low</th>
                        <th>Target Mean</th>
                        <th>Target Median</th>
                        <th>Last Updated</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ symbol }}</td>
                        <td>{{ targetHigh }}</td>
                        <td>{{ targetLow }}</td>
                        <td>{{ targetMean }}</td>
                        <td>{{ targetMedian }}</td>
                        <td>{{ lastUpdated }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> <!-- end col -->

          </div>
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

var moment = require('moment');

export default {
  data() {
    return {
      symbol:'',
      targetHigh:'',
      targetLow:'',
      targetMean:'',
      targetMedian:'',
      lastUpdated:'',
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

      finnhubClient.priceTarget(this.textSearch.toUpperCase(), (error, data, response) => {
        this.loading = false;
        NProgress.done();
        this.symbol = data.symbol;
        this.targetHigh = data.targetHigh;
        this.targetLow = data.targetLow;
        this.targetMean = data.targetMean;
        this.targetMedian = data.targetMedian;
        this.lastUpdated = moment(data.lastUpdated).isValid() ? data.lastUpdated : "--";
        this.api_symbol = this.textSearch.toUpperCase();
      });
 
    },

    clear() {
      this.symbol = '';
      this.targetHigh = '';
      this.targetLow = '';
      this.targetMean = '';
      this.targetMedian = '';
      this.lastUpdated = '';
    }
  },

  mounted() {
    this.textSearch = API_SYMBOL;
    this.api_symbol = API_SYMBOL;
    this.search();
  },

}
</script>