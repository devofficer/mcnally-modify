<template>
	<div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Market Global News</h4>
						<div v-for="m in arrayMarketNews" :key="`card-${m.id}`" class="media mb-4">
							<img class="d-flex align-self-start rounded mr-3" :src="m.image" alt="Generic placeholder image" width="96" height="64" v-if="m.summary">
							<div class="media-body" v-if="m.summary">
								<h5 class="mt-0 font-16">{{ m.headline }}</h5>
								<p>{{ m.summary }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--end row-->
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
			arrayMarketNews:[]
		}
	},

	methods: {
		getMarketNews() {
      		// General news
			finnhubClient.generalNews("general", {}, (error, data, response) => {
    			this.arrayMarketNews = data;
			});
		}
	},

	created(){
		this.getMarketNews();
	}
}
</script>