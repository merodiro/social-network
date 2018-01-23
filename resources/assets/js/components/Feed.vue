<template>
	<div class="container">
		<div class="row justify-content-lg-center">
			<div class="col-lg-10">
				<div class="card mb-3" v-for="post in posts" :key="post.id">
					<div class="card-header">
						<img :src="post.user.avatar" class="avatar-feed">
						<a :href="'/profile/'+post.user.slug">{{ post.user.name }}</a>
						<span class="pull-right">{{ post.created_at }}</span>
					</div>
					<div class="card-body">
						<p v-html="marked(post.content)"></p>
					</div>
					<div class="card-footer">
						<like :id="post.id"></like>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Like from './Like.vue';
export default {
	components: {
		Like,
	},
	mounted () {
		this.get_feed()
	},
	methods: {
		get_feed() {
			axios.get('/api/feed')
				.then(res => {
					res.data.forEach(post => {
						this.$store.commit('ADD_POST', post)
					})
				})
		},
		marked(value) {
			return marked(value)
		}
	},
	computed: {
		posts() {
			return this.$store.getters.all_posts
		}
	}
}
</script>

<style>
	.avatar-feed {
		border-radius: 50%;
		width: 40px;
	}
</style>