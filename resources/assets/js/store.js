import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    nots: [],
    posts: [],
    auth_user: {}
  },
  getters: {
    all_nots(state) {
      return state.nots
    },
    all_nots_count(state) {
      return state.nots.length
    },
    all_posts(state) {
      return state.posts
    }
  },
  mutations: {
    ADD_NOT(state, not) {
      state.nots.push(not)
    },
    ADD_POST(state, post) {
      state.posts.unshift(post)
    },
    AUTH_USER_DATA(state, user) {
      state.auth_user = user
    },
    UPDATE_POST_LIKES(state, payload) {
      let post = state.posts.find(post => {
        return post.id === payload.id
      })

      post.likes.push(payload.like)
    },
    UNLIKE_POST(state, payload) {
      let post = state.posts.find(post => {
        return post.id === payload.post_id
      })

      let like = post.likes.find(like => {
        return like.id === payload.like_id
      })

      let index = post.likes.indexOf(like)

      post.likes.splice(index, 1)
    }
  },
  actions: {

  }
})
