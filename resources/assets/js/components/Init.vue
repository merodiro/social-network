<template>
	<div>
		
	</div>
</template>

<script>
	export default {
		mounted () {
			this.get_auth_user_data()
		},
		methods: {
			get_auth_user_data() {
				axios.get('/api/user')
					.then(res => {
						this.$store.commit('AUTH_USER_DATA', res.data)
					})
			}
		}
	}
</script>