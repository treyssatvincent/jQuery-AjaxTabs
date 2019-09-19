'use strict';

const gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    uglify = require('gulp-uglify'),

    src = './lib/jquery.ajaxtabs.js',
    dest = './dist/';

function minifyJs() {
    console.log('minify');
    return gulp.src(src)
        .pipe(plumber())
        .pipe(uglify())
        .pipe(gulp.dest(dest));
}

gulp.task('default', minifyJs);