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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/choices.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.sass('resources/sass/admin.scss', 'public/css');

mix.copyDirectory('resources/images', 'public/images');
mix.copyDirectory('resources/fonts', 'public/fonts');

mix.browserSync('http://public.volunteer.localhost/');

if (mix.inProduction()) {
  mix.version();
}
