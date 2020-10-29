<template>
	<span v-if="number != '0'" id="numberPdf" class="badge badge-pill badge-info float-right">{{ number.padStart(2, '0') }}</span>
</template>

<script>
export default {
	name: 'NumberPdf',
	
	data() {
		return {
			number:'0'
		}
	},

	methods: {
		getListPdf() {
			let self = this;
      		axios.get(APP_URL + '/admin/pdf/notifications')
      		.then(function (response) {
          		self.number = `${response.data.count}`;
          		if (response.data.count > 0) {
          		VueEvent.$emit('pdfNotifications', '');
          		}
      		});
		}
	},

	mounted(){
    setInterval(() => {
      this.getListPdf();
    }, 15000);
  },
}
</script>