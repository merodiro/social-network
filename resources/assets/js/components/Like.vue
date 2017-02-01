<template>
    <div>
        <div>
            <span class="text-info pull-right" v-if="post.likes.length>1">{{post.likes.length}} people like this post</span>
            <span class="text-info pull-right" v-if="post.likes.length==1">{{post.likes.length}} person like this post</span>
            <span class="text-info pull-right" v-if="post.likes.length==0">Be the first one to like this post</span>
            <!-- <img v-for="like in post.likes" :src="like.user.avatar" class="avatar-like pull-right"> -->
        </div>
        <!-- <hr v-if="post.likes.length > 0"> -->
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
        mounted() {
           
        },
        props: ['id'],
        data () {
            return {

            }
        },
        computed: {
            auth_user_likes_post () {
                let check_index = this.likers.indexOf(this.$store.state.auth_user.id)
                if (check_index == -1) {
                    return false
                } else {
                    return true
                }
            },
            likers () {
                let likers = []

                this.post.likes.forEach(like => {
                    likers.push(like.user.id)
                })

                return likers
            },
            post () {
                return this.$store.state.posts.find(post => {
                    return post.id === this.id
                })
            }
        }, 
        methods: {
            like() {
                axios.post('/api/like/' + this.id)
                    .then(res => {
                        this.$store.commit('UPDATE_POST_LIKES', {
                            id: this.id,
                            like: res.data
                        })

                        noty({
                            text: 'Your successfully like the post'
                        })
                    })
            },
            unlike() {
                axios.post('/api/unlike/' + this.id)
                    .then(res => {
                        this.$store.commit('UNLIKE_POST', {
                            post_id: this.id,
                            like_id: res.data
                        })

                        noty({
                            text: 'Your successfully unlike the post'
                        })
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