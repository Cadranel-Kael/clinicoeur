let mix = require('laravel-mix');

mix.ts('resources/ts/main.ts', 'js').sourceMaps()
    .sass('resources/scss/main.scss', 'css').sourceMaps()
    .setPublicPath('public').setResourceRoot('../')
    .browserSync({
        proxy: false,
        server: {
            baseDir: './'
        }
    })
    .options({
    postCss: [
        require('autoprefixer')({
            overrideBrowserslist: ['last 2 versions'],
            cascade: false
        })
    ]
});