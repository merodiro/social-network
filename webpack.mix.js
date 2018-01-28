let mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css')
  // .browserSync({
  // proxy: 'social-network.dev'
  // })
  .extract([
    'axios',
    'bootstrap',
    'highlight.js',
    'jquery/dist/jquery.slim',
    'laravel-echo',
    'lodash',
    'marked',
    'noty',
    'popper.js/dist/umd/popper',
    'raven-js',
    'socket.io-client',
    'vue',
    'vuex',
    'vue-instantsearch',
  ])
  .autoload({
    jquery: ['$', 'window.jQuery', 'jQuery']
  })
  .purgeCss()
