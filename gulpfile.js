//var elixir = require('laravel-elixir');
var gulp = require('gulp');
var prettify = require('gulp-jsbeautifier');
var concat = require('gulp-concat');
var browserify = require('browserify');
var strictify = require('strictify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');
var watchify = require('gulp-watchify');
var cache = require('gulp-cached');

var assets_dir = './resources/assets/';

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

elixir(function(mix) {
    mix.sass('app.scss');
});

var jsbeautifier_options = {
    mode: 'VERIFY_AND_WRITE',
    js: {
        maxPreserveNewlines: 2
    }
};

var watch_config = {
    less: assets_dir + 'less/app.less',
    jsbeautify: [assets_dir + 'js/**/*.js', '!' + assets_dir + 'js/{vendor,vendor/**}'],
    scripts: assets_dir + 'js/**/*.js'
};

gulp.task('jsbeautify', function() {
    return gulp.src(watch_config.jsbeautify)
        .pipe(prettify(jsbeautifier_options))
        .pipe(gulp.dest(assets_dir + 'js/'));
});

gulp.task('scripts', ['jsbeautify'], function() {
    return gulp.src(assets_dir + 'js/app.js')
        .pipe(cache('scripts'))
        .pipe(through2.obj(function(file, enc, next) {
            browserify(file.path, { debug: true })
                .transform(strictify)
                .transform(babelify)
                .bundle(function(err, res) {
                    if (err) { return next(err); }

                    file.contents = res;
                    next(null, file);
                });
        }))
        .on('error', function(error) {
            console.log(error.stack);
            this.emit('end');
        })
        .pipe(gulp.dest('./public/js'));
});

gulp.task('js', [
    'angular'
]);

gulp.task('default', [
    'scripts'
]);

gulp.task('watch', function() {
    gulp.watch(watch_config.scripts, { debounceDelay: 1000 }, ['scripts']);
});


