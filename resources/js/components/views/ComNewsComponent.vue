<template>
<div>
	<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-8">
              <h4 class="card-title" style="padding: 10px 0px;">Company News</h4>
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

            <div v-for="m in arrayNews" :key="`card-${m.id}`" class="media mb-4">
							<img class="d-flex align-self-start rounded mr-3" :src="m.image" alt="Generic placeholder image" width="96" height="64">
							<div class="media-body">
								<h5 class="mt-0 font-16">{{ m.headline }}</h5>
								<p>{{ m.summary }}</p>
							</div>
						</div>

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

export default {
	data() {
		return {
			arrayNews:[],
			symbol:'',
      textSearch:"",
      api_symbol:"",
      loading:false
		}
	},

	methods: {
		search() {

			var date = new Date();
			var firstDay = new Date(date.getFullYear(), (date.getMonth() + 1), 1);
			var lastDay = new Date(date.getFullYear(), (date.getMonth() + 1) + 1, 0);
			var m = date.getMonth() + 1;
			var fd = firstDay.getDate();
			var ld = lastDay.getDate();
			NProgress.start();
      this.clear();
      this.loading = true;

      // General news
			finnhubClient.companyNews(this.textSearch.toUpperCase(), date.getFullYear()+'-'+m.toString().padStart(2, 0)+'-'+fd.toString().padStart(2, 0), date.getFullYear()+'-'+m.toString().padStart(2, 0)+'-'+ld.toString().padStart(2, 0), (error, data, response) => {
				this.loading = false;
        NProgress.done();
        this.symbol = data.symbol;
        this.api_symbol = this.textSearch.toUpperCase();
    		this.arrayNews = data;
			});
		},

		clear() {
      this.symbol = '';
    }
	},

	mounted(){
		this.textSearch = API_SYMBOL;
    this.api_symbol = API_SYMBOL;
    this.search();
	}
}
</script>