<template>
  <div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-8">
              <h4 class="card-title" style="padding: 10px 0px;">Company Profile</h4>
            </div>

            <div class="col-4">
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
          </div>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  <div v-if="name" class="row">
    <div class="col-lg-12">
      <div class="">
        <div class="table-responsive">
          <table class="table project-list-table table-nowrap table-centered table-borderless">
            <tbody>
              <tr>
                <td>
                  <img :src="logo" alt="" class="avatar-sm" style="width: 5rem;height: 5rem;"></td>
                <td>
                  <h5 class="text-truncate font-size-14 text-dark">{{ name }}</h5>
                  <p class="text-muted mb-0">{{ finnhubIndustry }}, <a :href="weburl" target="_blank">WebSite</a></p>

                  <h5 class="text-truncate font-size-14 text-dark" style="margin-top: 15px;">Phone</h5>
                  <p class="text-muted mb-0">{{ phone }}</p>
                </td>
                <td>
                  <h5 class="text-truncate font-size-14">Country</h5>
                  <p class="text-muted mb-0">{{ country }}</p>

                  <h5 class="text-truncate font-size-14" style="margin-top: 15px;">Currency</h5>
                  <p class="text-muted mb-0">{{ currency }}</p>
                </td>
                <td>
                  <h5 class="text-truncate font-size-14">Exchange</h5>
                  <p class="text-muted mb-0">{{ exchange }}</p>

                  <h5 class="text-truncate font-size-14" style="margin-top: 15px;">Ipo</h5>
                  <p class="text-muted mb-0">{{ ipo }}</p>
                </td>
                <td>
                  <h5 class="text-truncate font-size-14">Market Capitalization</h5>
                  <p class="text-muted mb-0">{{ marketCapitalization }}</p>

                  <h5 class="text-truncate font-size-14" style="margin-top: 15px;">ShareOutstanding</h5>
                  <p class="text-muted mb-0">{{ shareOutstanding }}</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end row -->

  <div class="row">
    <div v-if="loading" class="col-lg-12 text-center">
      <div class="alert alert-info"><i class="bx bx-loader bx-spin font-size-18 align-middle mr-2"></i> Loading</div>
    </div>
    <div v-if="!name && !loading" class="col-lg-12 text-center">
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
      country:"",
      currency:"",
      exchange:"",
      ipo:"",
      marketCapitalization:0,
      name:"",
      phone:"",
      shareOutstanding:0,
      ticker:"",
      weburl:"",
      logo:"",
      finnhubIndustry:"",
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

      finnhubClient.companyProfile2({'symbol': this.textSearch.toUpperCase()}, (error, data, response) => {
        this.country = data.country;
        this.currency = data.currency;
        this.exchange = data.exchange;
        this.ipo = data.ipo;
        this.marketCapitalization = data.marketCapitalization;
        this.name = data.name;
        this.phone = data.phone;
        this.shareOutstanding = data.shareOutstanding;
        this.ticker = data.ticker;
        this.weburl = data.weburl;
        this.logo = data.logo;
        this.finnhubIndustry = data.finnhubIndustry;

        this.api_symbol = this.textSearch.toUpperCase();

        this.loading = false;
        NProgress.done();
      });
    },

    clear() {
      this.country='';
      this.currency='';
      this.exchange='';
      this.ipo='';
      this.marketCapitalization='';
      this.name='';
      this.phone='';
      this.shareOutstanding='';
      this.ticker='';
      this.weburl='';
      this.logo='';
      this.finnhubIndustry='';
    }
  },

  mounted() {
    this.textSearch = API_SYMBOL;
    this.api_symbol = API_SYMBOL;

    this.search();
  },
}
</script>