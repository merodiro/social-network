window._ = require('lodash')

try {
  window.Popper = require('popper.js/dist/umd/popper')
  window.$ = window.jQuery = require('jquery/dist/jquery.slim')

  require('bootstrap')
} catch (e) {}

const Noty = require('noty')

Noty.overrideDefaults({
  layout: 'bottomLeft',
  theme: 'sunset',
  maxVisible: 3,
  timeout: 1500,
  progressBar: true
})

window.noty = function (msg, type = 'success') {
  new Noty({
    text: msg,
    type: type
  }).show()
}

window.Vue = require('vue')

import Raven from 'raven-js'
import RavenVue from 'raven-js/plugins/vue'

Raven
  .config(process.env.MIX_SENTRY_DSN)
  .addPlugin(RavenVue, Vue)
  .install()


window.marked = require('marked')

marked.setOptions({
  highlight: (code) => {
    return require('highlight.js').highlightAuto(code).value
  },
  sanitize: true
})

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

let token = $('meta[name=csrf-token]').attr('content')

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

import Echo from 'laravel-echo'
window.io = require('socket.io-client')

window.Echo = new Echo({
  broadcaster: 'socket.io',
  host: window.location.hostname + ':6001'
})
