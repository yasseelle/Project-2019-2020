var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    rimraf = require('gulp-rimraf'),
    gutil = require('gulp-util'),
    watch = require('gulp-watch');


gulp.task('remove-styles', function() {
  return gulp.src('css/*.min.css', { read: false })
    .pipe(rimraf({ force: true }));
});

gulp.task('front-styles',['remove-styles'], function() {
  return sass('css/scss/style.scss', { style: 'nested' })
    .pipe(autoprefixer('last 2 version'))    
    .pipe(gulp.dest('css'))
    .pipe(notify({ message: 'WPLMS Modern Styles task complete' }));
});

gulp.task('styles',['front-styles'], function() {
  return gulp.src(['css/*.css'])    
    .pipe(concat('wplms_modern.css'))
    .pipe(minifycss())    
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('css'))
    .pipe(notify({ message: 'Concatenation task complete' }));
});

gulp.task('remove-scripts', function() {
  return gulp.src('js/*.min.js', { read: false })
    .pipe(rimraf({ force: true }));
});

gulp.task('scripts',['remove-scripts'], function() {
  return gulp.src(['bower_components/parsleyjs/dist/parsley.js','js/*.js'])
    .pipe(concat('wplms_modern.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify().on('error', gutil.log))
    .pipe(gulp.dest('js'))
    .pipe(notify({ message: 'WPLMS Modern Scripts task complete' }));
});


gulp.task('front', ['styles','scripts']);