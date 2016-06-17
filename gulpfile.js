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

// Framework paths
var paths = {
    'jquery': './node_modules/jquery/dist/',
    'bootstrap': './node_modules/bootstrap/dist/',
    'font_awesome': './node_modules/font-awesome/',
    'css': './public/assets/css/',
    'js': './public/assets/js/',
    'fonts': './public/build/assets/fonts/'
}

elixir(function (mix) {
    // Common Styles
    var common_styles = [
        paths.css + 'font-lato.css',
        paths.css + 'font-product-sans.css',
        paths.font_awesome + 'css/font-awesome.css',
        paths.bootstrap + 'css/bootstrap.css',
    ];

    // Common Scripts
    var common_scripts = [
        paths.jquery + 'jquery.js',
        paths.bootstrap + 'js/bootstrap.js',
        paths.js + 'maintainscroll.jquery.js'
    ];

    // Mix guest
    var guest_style = paths.css + 'guest.css';
    var guest_script = paths.js + 'guest.js';
    mix.sass('guest.scss', paths.css)
        .copy(paths.bootstrap + 'fonts/*.*', paths.fonts)
        .copy(paths.font_awesome + 'fonts/*.*', paths.fonts)
        .styles(common_styles.concat([guest_style]), guest_style)
        .scripts(common_scripts, guest_script);

    // Mix dashboard
    var dashboard_style = paths.css + 'dashboard.css';
    var dashboard_script = paths.js + 'dashboard.js';
    mix.sass('dashboard.scss', paths.css)
        .styles(common_styles.concat([dashboard_style]), dashboard_style)
        .scripts(common_scripts, dashboard_script);

    // Mix output versions
    var versions = [guest_style, guest_script, dashboard_style, dashboard_script];
    mix.version(versions);
});
