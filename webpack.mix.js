let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css')
  .browserSync({
    proxy: 'social-network.dev'
  })
  // .extract([
  //     'vue',
  //     'vuex',
  //     'bootstrap',
  //     'jquery',
  //     'axios',
  //     'noty',
  //     'highlight.js',
  //     'marked',
  //     'laravel-echo',
  //     'pusher-js',
  //     'raven-js',
  //     'lodash'
  //   ])
  // .autoload({
  //   jquery: ['$', 'window.jQuery', 'jQuery']
  // })