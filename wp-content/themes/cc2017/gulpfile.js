/**
 *
 * Gulpfile setup
 *
 * @since 1.0.0
 * @authors Charline Couchot
 * @package CC2017
 */


// Configuration du projet
var gulp = require('gulp'),
    browserSync = require('browser-sync'),
    autoprefixer = require('gulp-autoprefixer'),
    imagemin = require('gulp-imagemin'),
    newer = require('gulp-newer'),
    concat = require('gulp-concat'),
    jshint = require('gulp-jshint'),
    notify = require('gulp-notify'),
    sass = require('gulp-sass'),
    rimraf = require('gulp-rimraf'),
    sourcemaps = require('gulp-sourcemaps');


// BROWSER SYNC
gulp.task('browser-sync', function () {
    var files = [
        '**/*.php',
        '**/*.{png,jpg,gif}'
    ];
    browserSync.init(files, {
        watchTask: true,
        open: 'external',
        host: 'cc2017.dev',
        proxy: 'cc2017.dev',
        port: 3000,
        injectChanges: true,
        ghostMode: false
    });
});

// SASS PROCESS
gulp.task('css', function () {
    return gulp.src('./assets/css/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer('last 4 version'))
        .pipe(gulp.dest('./'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'))
        .pipe(browserSync.reload({stream:true}))
        .pipe(notify({message: 'Styles task complete',onLast: true}));
});


gulp.task('js',function(){
  return gulp.src(['./assets/js/plugins/*.js', './assets/js/custom.js'])
    .pipe(sourcemaps.init())
    .pipe(concat('scripts.js'))
    .pipe(jshint('./.jshintrc'))
    .pipe(jshint.reporter('default'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./assets/js'))
    .pipe(browserSync.reload({stream:true, once: true}))
    .pipe(notify({message: 'Custom scripts task complete',onLast: true}));
});

// IMAGES
gulp.task('images', function () {
    // Add the newer pipe to pass through newer images only
    return gulp.src(['./assets/img/raw/**/*.{png,jpg,gif}'])
        .pipe(newer('./assets/img/'))
        .pipe(rimraf({force: true}))
        .pipe(imagemin({optimizationLevel: 7,progressive: true,interlaced: true}))
        .pipe(gulp.dest('./assets/img/'))
        .pipe(notify({message: 'Images task complete',onLast: true}));
});




// TÂCHE PAR DEFAUT
gulp.task('default', ['css', 'js', 'images', 'browser-sync'], function () {
    gulp.watch('./assets/img/**/*', ['images']);
    gulp.watch('./assets/css/**/*.scss', ['css']);
    gulp.watch('./assets/js/**/*.js', ['js']);

});