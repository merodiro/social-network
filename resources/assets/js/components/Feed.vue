<template>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<div class="panel panel-default" v-for="post in posts">
					<div class="panel-heading">
						<img :src="post.user.avatar" class="avatar-feed">
						<a :href="'/profile/'+post.user.slug">{{ post.user.name }}</a>
						<span class="pull-right">{{ post.created_at }}</span>
					</div>
					<div class="panel-body">
						<p class="text-center">
							{{ post.content }}
						</p>
					</div>
					<div class="panel-footer">
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
	data () {
		return {

		}
	},
	components: {
		Like
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