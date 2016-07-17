var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'assets': './resources/assets/',
    'jquery': './node_modules/jquery/',
    'bootstrap': './node_modules/bootstrap-sass/assets/',
    'bootstraphover': './node_modules/bootstrap-hover-dropdown/',
    'fontawesome': './node_modules/font-awesome/',
    'animatecss': './node_modules/animate.css/',
    'datatables': './node_modules/datatables.net/js/',
    'datatablesbs': './node_modules/datatables.net-bs/',
    'datatablesr': './node_modules/datatables.net-responsive/js/',
    'datatablesrbs': './node_modules/datatables.net-responsive-bs/',
    'datatablesro': './node_modules/datatables.net-rowreorder/js/',
    'datatablesrobs': './node_modules/datatables.net-rowreorder-bs/',
}

elixir(function (mix) {
    mix.sass('app.scss', paths.assets + 'css/scss.css', {includePaths: [
        paths.bootstrap + 'stylesheets',
        paths.fontawesome + 'scss'
    ]})

        .styles([
            paths.animatecss + 'animate.css',
            paths.datatablesbs + 'css/dataTables.bootstrap.css',
            paths.datatablesrbs + 'css/responsive.bootstrap.css',
            paths.datatablesrobs + 'css/rowReorder.bootstrap.css',
            paths.assets + 'css/pnotify.custom.css',
            paths.assets + 'css/scss.css',
        ], 'public/css/app.css', './')

        .scripts([
            paths.jquery + "jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            paths.bootstraphover + "bootstrap-hover-dropdown.js",
            paths.datatables + "jquery.dataTables.js",
            paths.datatablesbs + "js/dataTables.bootstrap.js",
            paths.datatablesr + "dataTables.responsive.js",
            paths.datatablesrbs + "js/responsive.bootstrap.js",
            paths.datatablesro + "dataTables.rowReorder.js",
            paths.assets + 'js/pnotify.custom.js',
            "./resources/assets/js/app.js",
        ], 'public/js/app.js', './')

        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap')
        .copy(paths.fontawesome + 'fonts/**', 'public/fonts/fontawesome')
        .version([
            'css/app.css',
            'js/app.js',
        ])
});
