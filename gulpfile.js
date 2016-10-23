var gulp = require('gulp'),
    webpack = require('webpack-stream'),
    copy = require('gulp-copy'),
    sass = require('gulp-sass');

gulp.task('semantic', require('./resources/assets/semantic/tasks/build'));

gulp.task('copy-vendors', function () {
    return gulp.src(
        [
            './node_modules/jquery/dist/jquery.min.js',
        ])
        .pipe(copy('./public/js', {prefix: 3}));
})

gulp.task('sass', function () {
    return gulp.src('./resources/assets/sass/app.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('./public/css'));
});

gulp.task('app', function () {
    return gulp
        .src('./resources/assets/typescript/**/*.ts')
        .pipe(webpack({
            watch: false,
            entry: {
                app: './resources/assets/typescript/App.ts',
                "pages/fuel": './resources/assets/typescript/plugins/FuelChart.ts',
            },
            output: {
                filename: '[name].js'
            },
            resolve: {
                extensions: ['', '.webpack.js', '.web.js', '.ts', '.tsx', '.js']
            },
            module: {
                loaders: [
                    {test: /\.tsx?$/, loader: 'ts-loader'}
                ]
            }
        }))
        .pipe(gulp.dest('./public/js'));
});

gulp.task('default', ['app', 'sass', 'copy-vendors', 'semantic']);
