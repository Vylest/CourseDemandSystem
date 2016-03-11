var gulp = require('gulp');
var prettify = require('gulp-jsbeautifier');
var concat = require('gulp-concat');
var less = require('gulp-less');
var browserify = require('browserify');
var strictify = require('strictify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');
var watchify = require('gulp-watchify');
var cache = require('gulp-cached');
var through2 = require('through2');

var assets_dir = './resources/assets/';

var vendor_js_files = [
    assets_dir + "js/vendor/jquery.min.js",
    assets_dir + "js/vendor/angular.min.js",
    assets_dir + "js/vendor/ng-resource.min.js",
    assets_dir + "js/vendor/ng-table.js"
];

var angular_js_files = [
    assets_dir + 'js/angular.js'
];

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


// Gulp task definitions
gulp.task('jsbeautify', function() {
    return gulp.src(watch_config.jsbeautify)
        .pipe(prettify(jsbeautifier_options))
        .pipe(gulp.dest(assets_dir + 'js/'));
});

gulp.task('less', function() {
    return gulp.src([assets_dir + 'less/app.less'])
        .pipe(less())
        .pipe(gulp.dest('./public/css'));
});

gulp.task('vendor-scripts', function() {
    return gulp.src(vendor_js_files)
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest('./public/js'));
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

gulp.task('angular', function() {
    return gulp.src(angular_js_files)
        .pipe(concat('angular.js'))
        .pipe(gulp.dest('./public/js'));
});

gulp.task('js', [
    'angular', 'scripts'
]);

gulp.task('default', [
    'less',
    'vendor-scripts',
    'angular',
    'scripts'
]);

gulp.task('watch', function() {
    gulp.watch(watch_config.scripts, { debounceDelay: 1000 }, ['scripts']);
});


