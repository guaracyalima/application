let mix = require('laravel-mix');

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
mix.combine([
    'resources/assets/js/lib/tether/tether.min.js',
    'resources/assets/js/lib/bootstrap/bootstrap.min.js',
    'resources/assets/js/plugins.js',
    'resources/assets/js/lib/jqueryui/jquery-ui.min.js',
    'resources/assets/js/lib/lobipanel/lobipanel.min.js',
    'resources/assets/js/lib/match-height/jquery.matchHeight.min.js',

], 'public/assets/js/index.js').version();

mix.js('resources/assets/js/plugins.js', 'public/assets/js');
mix.js('resources/assets/js/app.js', 'public/assets/js');

mix.styles([
    'resources/assets/css/lib/lobipanel/lobipanel.min.css',
    'resources/assets/css/separate/vendor/lobipanel.min.css',
    'resources/assets/css/lib/jqueryui/jquery-ui.min.css',
    'resources/assets/css/separate/pages/widgets.min.css',
    'resources/assets/css/lib/font-awesome/font-awesome.min.css',
    'resources/assets/css/lib/bootstrap/bootstrap.min.css',
    'resources/assets/css/main.css'
], 'public/assets/css/index.css');

mix.copy('resources/assets/fonts/*', 'public/assets/fonts/');

mix.minify('public/assets/css/index.css');
mix.minify('public/assets/js/index.js').version();

mix.styles([
    'resources/assets/css/separate/pages/login.min.css',
    'resources/assets/css/lib/font-awesome/font-awesome.min.css',
    'resources/assets/css/lib/bootstrap/bootstrap.min.css',
    'resources/assets/css/main.css'
], 'public/assets/css/login.css');

mix.combine([
    'resources/assets/js/lib/tether/tether.min.js',
    'resources/assets/js/lib/bootstrap/bootstrap.min.js',
    'resources/assets/js/plugins.js',
    'resources/assets/js/lib/jquery/jquery.min.js'

], 'public/assets/js/login.js').version();

mix.minify('public/assets/css/login.css');
mix.minify('public/assets/ja/login.js');