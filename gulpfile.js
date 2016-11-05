const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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
    mix.sass('app.scss')
    	.sass('./node_modules/bulma/bulma.sass')
    	.sass('./node_modules/font-awesome/scss/font-awesome.scss')
    	.copy('node_modules/bootstrap-sass/assets/fonts', 'public/fonts') // copy over fonts folders to public
		.copy('node_modules/font-awesome/fonts', 'public/fonts') // copy over fonts folders to public
		.webpack('delete.js')
    	.webpack('app.js');
});
