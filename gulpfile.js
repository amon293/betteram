const elixir = require('laravel-elixir');

gulp.task('semantic', require('./resources/assets/semantic/tasks/build'));

elixir(function (mix) {
    mix.sass('app.scss')
        .copy('./node_modules/jquery/dist/jquery.min.js', 'public/js')
        .webpack('App.js', 'public/js/app.js')
        .copy('./node_modules/jquery/dist/jquery.min.js', 'public/js')
        .task('semantic');
});
