<template>
	<div class="container mb-3">
	    <div class="row justify-content-lg-center">
	        <div class="col-lg-10">
	            <div class="card">
	                <div class="card-body">
	                    <textarea rows="5" class="form-control" v-model="content" placeholder="What is on your mind?"></textarea>
	                    <br>
	                    <button class="btn btn-outline-success pull-right" :disabled="not_working" @click="create_post()">
	                    	Create a post
	                    </button>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</template>

<script>
export default {

	data () {
		return {
			content: '',
			not_working: true
		}
	},
	methods: {
		create_post () {

			axios.post('/api/post/create', {content: this.content})
				.then(res => {
					this.content = ''
					noty('Your post has been published')
					this.$store.commit('ADD_POST', res.data)
				})
		}
	},
	watch: {
		content() {
			if (this.content.length > 0) {
				this.not_working = false
			} else {
				this.not_working = true
			}
		}
	}
}
</script>
