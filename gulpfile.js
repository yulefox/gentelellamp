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
    .sass('allMail.scss')
    .browserify('app.js')
    .copy('resources/assets/js/btnQuery.js', 'public/js/btnQuery.js')
    .copy('resources/assets/js/allMail.js', 'public/js/allMail.js')
    .copy('resources/assets/js/event.js', 'public/js/event.js')
    .version(['public/css/app.css', 'public/js/app.js', 'public/css/roleManager.css',
    	'public/css/allMail.css']);
    // .browserSync({
    // 	port: 8000
    // })
});
