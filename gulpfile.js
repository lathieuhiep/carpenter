const gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    minifyCss = require('gulp-clean-css'),
    concatCss = require('gulp-concat-css'),
    rename = require('gulp-rename');

sass.compiler = require('node-sass');

// Task sass style theme
gulp.task('sass-style-theme', function () {
    return gulp.src('./assets/scss/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'));
});

// Task sass library theme
gulp.task('sass-library-theme', function () {
    return gulp.src('./assets/scss/library.scss')
        .pipe(sass({
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename('library.min.css'))
        .pipe(gulp.dest('./assets/css/'));
});

// Task compress lib js & mini file
gulp.task('compress-js', function () {
    return gulp.src( [
        './node_modules/popper.js/dist/js/popper.js',
        './node_modules/bootstrap/dist/js/bootstrap.js',
        './node_modules/owl.carousel/dist/owl.carousel.js',
    ],  { allowEmpty: true } )
        .pipe(concat('library.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js/'));
});

// Task compress mini css
// gulp.task('compress-css', function () {
//     return gulp.src('/css/library/*.css')
//         .pipe(concatCss("library.min.css"))
//         .pipe(minifyCss({
//             compatibility: 'ie8',
//             level: {1: {specialComments: 0}}
//         }))
//         .pipe(gulp.dest('/css/library/minify'));
// });