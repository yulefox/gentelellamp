var elixir = require('laravel-elixir');
var gulp = require("gulp");

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

elixir(function(mix) {
    mix.sass('app.scss')
    .sass('roleManager.scss')
    .browserify('app.js')
    .copy('resources/assets/js/btnQuery.js', 'public/js/btnQuery.js')
    .version(['public/css/app.css', 'public/js/app.js', 'public/css/roleManager.css']);
    // .browserSync({
    // 	port: 8000
    // })
});
