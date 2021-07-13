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
    .postCss('resources/css/profile.css', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/image', 'public/image')
    .js('resources/js/profile.js', 'public/js/')
    .js('resources/js/posts.js', 'public/js')
    .js('resources/js/create-post.js', 'public/js')
    .js('resources/js/update-post.js', 'public/js')
    .js('resources/js/comments.js', 'public/js')
    .sourceMaps();
