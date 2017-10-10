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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


//Browser sync
mix.browserSync({
    host: 'localhost',
    port: 3000,
    proxy: 'http://192.168.33.10:80/',
    files: [
        'public/js/*.js',
        'public/css/*.css',
        'resources/views/**/*',
        'routes/**/*'
    ]
});