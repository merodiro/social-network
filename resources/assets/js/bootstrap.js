window._ = require('lodash')

window.$ = window.jQuery = require('jquery')

require('bootstrap-sass')

const Noty = require('noty');

Noty.overrideDefaults({
    layout      : 'bottomLeft',
    theme       : 'sunset',
    maxVisible  : 3,
    timeout     : 1500,
    progressBar : true
});

window.noty = function(msg, type = 'success') {
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
  highlight: function (code) {
    return require('highlight.js').highlightAuto(code).value
  },
    sanitize: true    
})

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Pusher = require('pusher-js')

import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'af2cda5d9811828831e0'
})
