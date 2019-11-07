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

mix.scripts([
    'resources/vendor/jquery/jquery.min.js',
    'resources/vendor/bootstrap/js/bootstrap.min.js',
    'resources/vendor/DataTables/datatables.min.js',
    'resources/vendor/DataTables/datatableConfig.js',
], 'public/js/app.js');

mix.styles([
    'resources/vendor/css/login.css',
    'resources/vendor/bootstrap/css/bootstrap.min.css',
    'resources/sass/app.scss',
], 'public/css/app.css');