<template>
  <div>
    <div>
      <span class="text-info pull-right" v-if="post.likes.length>1">{{post.likes.length}} people like this post</span>
      <span class="text-info pull-right" v-if="post.likes.length==1">{{post.likes.length}} person like this post</span>
      <span class="text-info pull-right" v-if="post.likes.length==0">Be the first one to like this post</span>
    </div>
    <button class="btn btn-primary" v-if="!auth_user_likes_post" @click="like()">
      Like this post
    </button>
    <button class="btn btn-danger" @click="unlike()" v-else>
      Unlike this post
    </button>
  </div>
</template>

<script>
export default {
  props: ['id'],
  computed: {
    auth_user_likes_post() {
      return this.likers.includes(this.$store.state.auth_user.id)
    },
    likers() {
      return this.post.likes.map(like => like.user.id )
    },
    post() {
      return this.$store.state.posts.find(post => {
        return post.id === this.id
      })
    }
  },
  methods: {
    like() {
      axios.post('/api/like/' + this.id).then(res => {
        this.$store.commit('UPDATE_POST_LIKES', {
          id: this.id,
          like: res.data
        })
        noty('Your successfully like the post')
      })
    },
    unlike() {
      axios.post('/api/unlike/' + this.id).then(res => {
        this.$store.commit('UNLIKE_POST', {
          post_id: this.id,
          like_id: res.data
        })
        noty('Your successfully unlike the post')
      })
    }
  }
}
</script>

<style>
.avatar-like {
  border-radius: 50%;
  width: 20px;
}
</style>
