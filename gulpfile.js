var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
 'jquery': './node_modules/jquery/',
 'bootstrap': './resources/assets/vendor/bootstrap-sass-official/assets/',
 'icheck': './resources/assets/vendor/iCheck/',
 'datepicker': './resources/assets/vendor/bootstrap-datepicker/dist/',
 'select2': './resources/assets/vendor/select2/',
 'select2bootstrap': './resources/assets/vendor/select2-bootstrap-css/',
}

elixir(function (mix) {
 mix.sass('style.scss', 'public/css/', {includePaths: [paths.bootstrap + 'stylesheets/']})
     .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
     .copy(paths.jquery + 'dist/jquery.min.map', 'public/js/jquery.min.map')
     .copy(paths.select2 + 'select2.png', 'public/css')
     .copy(paths.select2 + 'select2x2.png', 'public/css')
     .copy(paths.icheck + 'skins/square/blue.png', 'public/css')
     .copy(paths.icheck + 'skins/square/blue@2x.png', 'public/css')
     .scripts([
      paths.jquery + 'dist/jquery.min.js',
      paths.bootstrap + 'javascripts/bootstrap.min.js',
      paths.datepicker + 'js/bootstrap-datepicker.min.js',
      paths.icheck + 'icheck.min.js',
      paths.select2 + 'select2.js',
      './resources/assets/scripts/script.js'
     ], 'public/js/app.js', './')
     .styles([
      'public/css/style.css',
      paths.select2 + 'select2.css',
      paths.select2bootstrap + 'select2-bootstrap.css',
      paths.datepicker + 'css/bootstrap-datepicker3.standalone.min.css',
      paths.icheck + 'skins/square/blue.css',
     ], 'public/css/all.css', './');
});
