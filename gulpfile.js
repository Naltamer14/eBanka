const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.sass('app.scss', 'resources/assets/css');

    mix.styles([
        'libs/select2.css',
        'app.css'
    ]);
    mix.scripts([
        'libs/jquery.js',
        'libs/select2.js',
        'libs/bootstrap.js'
    ], 'public/js/all.js');

    mix.version([
        'public/css/all.css',
        'public/js/all.js'
    ]);

});
