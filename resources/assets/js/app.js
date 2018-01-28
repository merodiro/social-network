import './bootstrap'
import store from './store'


Vue.component('friend', require('./components/Friend.vue'))
Vue.component('post', require('./components/Post.vue'))
Vue.component('feed', require('./components/Feed.vue'))
Vue.component('notification', require('./components/Notification.vue'))
Vue.component('unread', require('./components/UnreadNots.vue'))
Vue.component('search', require('./components/Search.vue'))


const app = new Vue({
  el: '#app',
  store
})
