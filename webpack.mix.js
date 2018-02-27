let mix = require('laravel-mix')
require('laravel-mix-purgecss')

mix.js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css')
  // .browserSync({
  //   proxy: 'social-network.oo'
  // })
  // .extract([
  //   'axios',
  //   'bootstrap',
  //   'highlight.js',
  //   'jquery',
  //   'laravel-echo',
  //   'lodash',
  //   'marked',
  //   'noty',
  //   'popper.js',
  //   'raven-js',
  //   'socket.io-client',
  //   'vue',
  //   'vuex',
  //   'vue-instantsearch',
  // ])
  .options({
    extractVueStyles: true,
  })
  .purgeCss()
