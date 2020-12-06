const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/alphine.js', 'public/js')
    .js('resources/js/lightbox.js', 'public/js')
    .styles(['resources/css/home/home.css'], 'public/css/home.css')
    .styles(['resources/css/admin/admin.css'], 'public/css/admin.css')
    .sass('resources/sass/lightbox.sass', 'public/css');

