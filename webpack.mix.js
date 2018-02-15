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
mix.options({processCssUrls: false});
mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/homepage.js', 'public/js')
    .sass('resources/assets/sass/page/app.scss', 'public/css')
    .sass('resources/assets/sass/page/homepage.scss', 'public/css')
    .sourceMaps();
