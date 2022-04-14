// webpack.mix.js

let mix = require('laravel-mix');

mix.js('src/require-read-terms.js', 'dist')
    .setPublicPath('dist')
    .version();
