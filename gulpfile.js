const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss', 'public/css/app.css')
      //  .coffee() /*TODO*/
      .scripts([
        "jquery.min.js",
        "uikit.min.js",
        "owl.carousel.js",
        "grid.js",
        "popup.js",
        "upload.js"
    ],'public/js/app.js')
       .copy('resources/assets/fonts/*.*', 'public/css/fonts/');
});
