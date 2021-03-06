const gulp = require('gulp');
const sass = require('gulp-sass')
const uglifycss = require('gulp-uglifycss');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

// Sass compiler
gulp.task('sass', done => {
    gulp.src('src/style/style.scss')
        .pipe(sass())
        .pipe(gulp.dest('src/style'))
        .pipe(gulp.dest('dist/style'));
    done();
})

// CSS minifier
gulp.task('css', done => {
    gulp.src('dist/style/style.css')
        .pipe(uglifycss({
            "uglyComments": true
        }))
        .pipe(gulp.dest('dist/style'));
    done();
})

// JS transpiler
gulp.task('js', done => {
    gulp.src('src/js/main.js')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(gulp.dest('dist/js'));
    done();
})

// JS minifier
gulp.task('js-min', done => {
    gulp.src('dist/js/main.js')
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'));
    done();
})

// Pushy compiler
gulp.task('pushy', done => {
    gulp.src('src/js/pushy/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('src/js/pushy/css'))
        .pipe(gulp.dest('dist/js/pushy/css'));
    done();
})

// Pushy compiler
gulp.task('slick', done => {
    gulp.src('src/js/slick/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('src/js/slick'))
        .pipe(gulp.dest('dist/js/slick'));
    done();
})

// Plugin CSS minifier
gulp.task('plugin-min', done => {
    gulp.src('src/js/pushy/css/*.css')
        .pipe(uglifycss({
            "uglyComments": true
        }))
        .pipe(gulp.dest('dist/js/pushy/css'));
    gulp.src('src/js/slick/*.css')
        .pipe(uglifycss({
            "uglyComments": true
        }))
        .pipe(gulp.dest('dist/js/slick'));
    done();
})

// File watcher that calls the above functions
gulp.task('watch', function() {
    gulp.watch('src/style/**/*.scss', gulp.series('sass'));
    gulp.watch('src/js/main.js', gulp.series('js'));
    gulp.watch('src/js/pushy/scss/*.scss', gulp.series('pushy'));
    gulp.watch('src/js/slick/*.scss', gulp.series('slick'));
})