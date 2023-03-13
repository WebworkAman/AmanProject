const mix = require('laravel-mix');
const path = require('path');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js/app.js').react()
   .js('resources/js/home.jsx', 'public/js/home.js').react()
   .js('resources/js/page1.jsx', 'public/js/page1.js').react()
   .js('resources/js/search.jsx','public/js/search.js').react()
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/css/home.scss', 'public/css')
   .sass('resources/css/content.scss', 'public/css')
   .sass('resources/css/log.scss', 'public/css')
   .sass('resources/css/register.scss', 'public/css')
   .sass('resources/css/FAQ.scss', 'public/css')
   .sass('resources/css/admin.scss', 'public/css');
