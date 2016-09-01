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
    .sass('summary.scss')
    .browserify('app.js')
    .copy('resources/assets/js/btnQuery.js', 'public/js/btnQuery.js')
    .copy('resources/assets/js/allMail.js', 'public/js/allMail.js')
    .copy('resources/assets/js/event.js', 'public/js/event.js')
    .copy('resources/assets/js/admin/event/main.js', 'public/js/admin/event/main.js')
    // zq库函数
    .copy('resources/assets/js/admin/adminLib.js', 'public/js/admin/adminLib.js')
    .copy('resources/assets/js/zqLib.js', 'public/js/zqLib.js')
    .version(['public/css/app.css', 'public/js/app.js', 'public/css/roleManager.css',
    	'public/css/allMail.css', 'public/css/summary.css']);
    // .browserSync({
    // 	port: 8000
    // })
});
