const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .react()
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/css/home.scss', 'public/css')
   .sass('resources/css/content.scss', 'public/css')
   .sass('resources/css/log.scss', 'public/css')
   .sass('resources/css/admin.scss', 'public/css');
