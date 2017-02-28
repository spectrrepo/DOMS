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
        "grid.js",
        // "popup.js",
        // "upload.js",
        // "ajax-pagination.js",
        // "ajax-comment.js",
        // "ajax-like.js",
        // "views-slider.js",
        // "ajax-slider.js",
        // "ajax-slider-sort.js",
        // "fancybox.js",
        // "ajax-favorite.js",
        // "news-popup.js",
        // "tag-add.js",
        // "ajax-delete-view.js",
        // "ajax-add-news-profile.js",
        // "ajax-add-soc-link.js",
        // "ajax-pretense.js",
        // "fast-search-tag.js",
        // "popup-description.js",
        // "validation/entering.js",
        // "validation/send-feedback.js",
        // "validation/recovery-pass.js",
        // "validation/registration.js",
        // "about-popup-slider.js",
        // "read-new-comment.js",
        // "common.js"
    ],'public/js/app.js')
       .rollup('assets/filtres/Filtr.js',
               'public/js/all.js')
       .copy('resources/assets/fonts/*.*', 'public/css/fonts/');
});
