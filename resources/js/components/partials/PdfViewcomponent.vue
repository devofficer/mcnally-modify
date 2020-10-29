<template>
	<div>
		<pdf
			v-for="i in numPages"
			:key="i"
			:src="src"
			:page="i"
			ref="mypdf"
		></pdf>
	</div>
</template>

<script>
import pdf from 'vue-pdf'
export default {
	components: {
		pdf
	},

	props: ['url'],

	data() {
		return {
			src: this.loadingTask(this.url),
			numPages: undefined,
		}
	},

	methods: {
		loadingTask(url) {
			return pdf.createLoadingTask('/assets/files/pdf/'+url);
		},

		onLoad() {
            panzooom(this.$refs.mypdf);
        }
	},

	mounted() {
		this.src.promise.then(pdf => {
			this.numPages = pdf.numPages;
		});
	}
}

</script>