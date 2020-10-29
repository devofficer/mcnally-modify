<template>
	<span v-if="number != '0'" id="numberNews" class="badge badge-pill badge-info float-right">{{ number.padStart(2, '0') }}</span>
</template>

<script>
export default {
	name: 'NumberNews',
	
	data() {
		return {
			number:'0'
		}
	},

	methods: {
		getListNews() {
			let self = this;
      axios.get(APP_URL + '/admin/news/notifications')
      .then(function (response) {
          self.number = `${response.data.count}`;
          if (response.data.count > 0) {
          	VueEvent.$emit('newsNotifications', '');
          }
      });
		}
	},

	mounted(){
    setInterval(() => {
      this.getListNews();
    }, 15000);
  },
}
</script>