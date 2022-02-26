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

mix.copy('resources/js/app.js', 'public/js')
    .copy('resources/js/awesome/*', 'public/js/awesome')
    .copy('resources/plugins/js/*', 'public/js')
    .copy('resources/plugins/js/pages/*', 'public/js/pages')
    .copy('resources/plugins/jquery/*', 'public/plugins/jquery')
    .copy('resources/plugins/bootstrap/js/*', 'public/plugins/bootstrap/js')
    .copy('resources/plugins/popper/*', 'public/plugins/poper')
    .copy('resources/plugins/popper/esm/*', 'public/plugins/poper/esm')
    .copy('resources/plugins/popper/umd/*', 'public/plugins/poper/umd')
    .copy('resources/plugins/fontawesome-free/css/*', 'public/plugins/fontawesome-free/css')
    .copy('resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css', 'public/plugins/icheck-bootstrap/')
    .copy('resources/img/*', 'public/img')

    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/css/*', 'public/css')
    .copy('resources/css/awesome/*', 'public/css/awesome')
    .copy('resources/css/alt/*.css', 'public/css')
// plugins/fontawesome-free/webfonts/fa-solid-900.woff2

;
