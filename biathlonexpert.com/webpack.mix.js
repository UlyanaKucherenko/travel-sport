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

 mix.webpackConfig({
    resolve: {
      alias: {
          '@': path.resolve('resources/assets/'),
          '#': path.resolve('')
      }
  },
//   output: {
    //   filename: '[name].js',
    //   chunkFilename: 'js/chunks/[name].js'
//   }
});

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/main.scss', 'public/css');
