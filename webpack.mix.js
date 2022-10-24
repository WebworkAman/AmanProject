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
    .sass('resources/css/app.scss', 'public/css')
    .sass('resources/css/content.scss', 'public/css')
    .sass('resources/css/register.scss', 'public/css')
    .sass('resources/css/log.scss', 'public/css')
    .copyDirectory('resources/imgs','public/imgs');

// mix.styles([
//     'resources/css/a.css',
//     'resources/css/b.css',
// ],'public/css/abc.min.css')
// .copyDirectory('resources/imgs','public/imgs');     

