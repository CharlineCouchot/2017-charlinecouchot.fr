/**
 *
 * Gulpfile setup
 *
 * @since 1.0.0
 * @authors Charline Couchot
 * @package CC2017
 */


// Configuration du projet
var autoprefixer = require('autoprefixer'),
    browserSync = require('browser-sync'),
    gulp = require('gulp'),
    cmq = require('gulp-group-css-media-queries'),
    concat = require('gulp-concat'),
    filter = require('gulp-filter'),
    imagemin = require('gulp-imagemin'),
    jshint = require('gulp-jshint'),
    newer = require('gulp-newer'),
    notify = require('gulp-notify'),
    postcss = require('gulp-postcss'),
    rename = require('gulp-rename'),
    rimraf = require('gulp-rimraf'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    minifycss = require('gulp-uglifycss');

// BROWSER SYNC
gulp.task('browser-sync', function () {
    var files = [
        '**/*.php',
        '**/*.{png,jpg,gif}'
    ];
    browserSync.init(files, {
        watchTask: true,
        open: 'external',
        host: 'local.charlinecouchot.fr',
        proxy: 'local.charlinecouchot.fr',
        port: 3000,
        injectChanges: true,
        ghostMode: false,
        notify: {
          styles:[
              "display: none",
              "padding: 15px",
              "font-family: sans-serif",
              "position: fixed",
              "font-size: 0.9em",
              "z-index: 9999",
              "bottom: 0px",
              "right: 0px",
              "border-bottom-left-radius: 5px",
              "background-color: #1B2032",
              "margin: 0",
              "color: white",
              "text-align: center"
          ]
      }
    });
});

// SASS PROCESS
gulp.task('css', function () {
    var processors = [
  		autoprefixer,
  	];
    return gulp.src('./assets/css/*.scss')
        .pipe(sourcemaps.init())
  			.pipe(sass().on('error', sass.logError))
  			.pipe(sourcemaps.write({includeContent: false}))
  			.pipe(sourcemaps.init({loadMaps: true}))
  			.pipe(postcss(processors))
  			.pipe(sourcemaps.write('.'))
  			.pipe(gulp.dest('./'))
  			.pipe(filter('**/*.css')) // Filtering stream to only css files
  			.pipe(cmq()) // Combines Media Queries
  			.pipe(browserSync.reload({stream:true})) // Inject Styles when style file is created
  			.pipe(rename({ suffix: '.min' }))
  			.pipe(minifycss({
  				maxLineLen: 80
  			}))
  			.pipe(gulp.dest('./'))
  			.pipe(browserSync.reload({stream:true})) // Inject Styles when min style file is created
  			.pipe(notify({ message: 'Styles task complete', onLast: true }))
});

gulp.task('js-hint',function(){
  return gulp.src('./assets/js/custom.js')
    .pipe(jshint('./.jshintrc'))
    .pipe(jshint.reporter('default'));
});

gulp.task('js',function(){
  return gulp.src(['./assets/js/plugins/*.js', './assets/js/ajax.js', './assets/js/custom.js'])
    .pipe(jshint('./.jshintrc'))
    .pipe(jshint.reporter('default'))
    .pipe(sourcemaps.init())
    .pipe(concat('scripts.js'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./assets/js'))
		.pipe(rename( {
			basename: "scripts",
			suffix: '.min'
		}))
		.pipe(uglify())
		.pipe(gulp.dest('./assets/js/'))
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
gulp.task('default', ['css', 'js-hint', 'js', 'images', 'browser-sync'], function () {
    gulp.watch('./assets/img/**/*', ['images']);
    gulp.watch('./assets/css/**/*.scss', ['css']);
    gulp.watch('./assets/js/**/*.js', ['js']);

});
