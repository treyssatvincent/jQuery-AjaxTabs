'use strict';

const gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),

    src = './lib/jquery.ajaxtabs.js',
    dest = './dist/';

function check() {
    return gulp.src(src)
        .pipe(jshint())
        .pipe(jshint.reporter(stylish))
        .pipe(jshint.reporter('fail'))
}

function minifyJs() {
    return gulp.src(src)
        .pipe(plumber())
        .pipe(uglify())
        .pipe(gulp.dest(dest));
}

gulp.task('check', check);
gulp.task('default', gulp.series(check, minifyJs));