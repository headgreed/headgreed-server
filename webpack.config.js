// ref:
// https://github.com/vuejs/laravel-elixir-vue-2
// https://laracasts.com/discuss/channels/elixir/laravel-53-with-vue-2-module-not-found-error-cant-resolve-scss
// https://github.com/hedefalk/atom-vue/issues/5
module.exports = {
    vue: {
        loaders: {
            // scss: 'vue-style!css!sass' // 也可
            scss: 'vue-style-loader!css-loader!sass-loader'
        }
    }
}
