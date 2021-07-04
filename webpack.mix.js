let mix = require('laravel-mix');

mix.copyDirectory('resources/assets/favicons', 'public/images/favicons')
	.js('resources/assets/js/app.js', 'public/js/app.js')
	.sass('resources/assets/css/app.scss', 'public/css/app.css');

if (mix.inProduction()) {
	mix.version();
}
if (!mix.inProduction()) {
	mix.sourceMaps();
}
