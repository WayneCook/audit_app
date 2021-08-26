const mix = require('laravel-mix');
const path = require('path');

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
//  mix.webpackConfig({
//     resolve: {
//         alias: {
//             '@': path.resolve(__dirname, 'resources/js/')
//         }
//     }
// });

mix.alias({
    '@': path.join(__dirname, 'resources/js')
});


    mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').vue();
    mix.browserSync({
        injectChanges: false,
        proxy: 'http://127.0.0.1:8000/'  
    });