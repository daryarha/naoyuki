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
    .styles(['resources/css/bootstrap.min.css',
    'resources/css/typeaheadjs.css',
    'resources/css/style.css',
    'resources/fa/css/all.css',
    'resources/css/dataTables.bootstrap4.min.css',
    'resources/css/print.min.css'],
    'public/css/all.css')
    .scripts([
    'resources/js/feather.min.js',
    'resources/js/jquery-3.3.1.min.js',
    'resources/js/bootstrap.min.js',
    'resources/js/typeahead.bundle.min.js',
    'resources/fa/js/all.js',
    'resources/js/Chart.bundle.min.js',
    'resources/js/jquery.dataTables.min.js',
    'resources/js/dataTables.bootstrap4.min.js',
    'resources/js/print.min.js',
    'resources/js/main.js'],
    'public/js/all.js');
