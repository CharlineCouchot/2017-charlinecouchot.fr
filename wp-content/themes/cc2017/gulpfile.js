//
// Gulpfile setup
//
// @since 1.0.0
// @authors Charline Couchot
// @package CC2017
//

'use strict'

// Definir Gulp et plugins non-gulp
var gulp = require('gulp');
var autoprefixer = require('autoprefixer');
var browserSync = require('browser-sync');

// Inclure les plugins
var plugins = require("gulp-load-plugins")();

// Chemins de configuration
var scssFiles = './assets/css/**/*.scss',
    jsFiles   = './assets/js/**/*.js',
    imgFiles  = './assets/img/raw/**/*.{jpg,gif,png,svg}';

// Chemins de destination
var cssDest  = './',
    scssDest = './assets/css',
    jsDest   = './assets/js',
    imgDest  = './assets/img',
    fontDest  = './assets/fonts';

// BROWSER SYNC
gulp.task('browser-sync', function () {
    var files = [
        '**/*.php',
        '**/*.{png,jpg,gif}'
    ];
    browserSync.init(files, {
        watchTask: true,
        //open: 'external',
        open: false,
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

// GESTION DES DEPENDANCES NPM
gulp.task('dependencies', function() {
  const filterCss = plugins.filter(['**/*.css', '!**/*.min.css', '!**/docs/**/*', '!**/src/**/*', '!**/*demos.css'], {restore: true});
  const filterFont = plugins.filter(['**/*.{eot,woff,ttf,svg}'], {restore: true});

  gulp.src(plugins.npmFiles(), { base:'./node_modules/' })
    .pipe(filterCss)
    .pipe(plugins.rename({dirname: ''}))
    .pipe(gulp.dest(scssDest + '/vendor'))
    .pipe(filterCss.restore)
    .pipe(filterFont)
    .pipe(plugins.rename({dirname: ''}))
    .pipe(gulp.dest(fontDest));

  gulp.src(plugins.npmFiles(), { base:'./node_modules/' })
    .pipe(plugins.filter(['**/*.min.js']))
    .pipe(plugins.rename({dirname: ''}))
    .pipe(gulp.dest(jsDest + '/vendor'));
});

// COMPILATION SASS
gulp.task('css', function () {
  return gulp.src(scssFiles)
    .pipe(plugins.sourcemaps.init())
		.pipe(plugins.sass().on('error', plugins.sass.logError))
		.pipe(plugins.sourcemaps.write({includeContent: false}))
		.pipe(plugins.sourcemaps.init({loadMaps: true}))
		.pipe(plugins.postcss([autoprefixer]))
		.pipe(plugins.sourcemaps.write('.'))
		.pipe(gulp.dest(cssDest))
		.pipe(plugins.filter('**/*.css'))
		.pipe(plugins.groupCssMediaQueries())
		.pipe(browserSync.reload({stream:true})) // Injecter les styles quand le fichier style est créé
		.pipe(plugins.rename({ suffix: '.min' }))
		.pipe(plugins.uglifycss({
			maxLineLen: 80
		}))
		.pipe(gulp.dest(cssDest))
		.pipe(browserSync.reload({stream:true})) // Injecter les styles quand le fichier min est créé
		.pipe(plugins.notify({ message: 'Styles compilés', onLast: true }))
});

// CUSTOM SCRIPTS
gulp.task('js', function() {
  const scriptsFilter = plugins.filter(['scripts.js'], {restore: true});

  return gulp.src(jsFiles)
    .pipe(scriptsFilter)
    .pipe(plugins.jshint('./.jshintrc'))
    .pipe(plugins.jshint.reporter('jshint-stylish'))
    .pipe(scriptsFilter.restore)
    .pipe(plugins.filter(['**/*.js', '!**/ie/*', '!**/scripts.min.js']))
    .pipe(plugins.order([
			'**/vendor/*',
			'**/*'
		]))
		.pipe(plugins.concat('scripts.min.js'))
    //.pipe(plugins.uglify())
    //.on('error', function (err) { plugins.util.log(plugins.util.colors.red('[Error]'), err.toString()); })
		.pipe(gulp.dest(jsDest))
		.pipe(plugins.notify({ message: 'Scripts compilés', onLast: true }));
});

// IMAGES
gulp.task('images', function () {
  // Add the newer pipe to pass through newer images only
  return gulp.src([imgFiles])
    .pipe(plugins.newer('./assets/img/'))
    .pipe(plugins.rimraf({force: true}))
    .pipe(plugins.imagemin({optimizationLevel: 7,progressive: true,interlaced: true}))
    .pipe(gulp.dest(imgDest))
    .pipe(plugins.notify({message: 'Images optimisées',onLast: true}));
});


// TÂCHE PAR DEFAUT
gulp.task('default', ['dependencies', 'css', 'js', 'images', 'browser-sync'], function () {
    gulp.watch('./assets/img/**/*', ['images', browserSync.reload]);
    gulp.watch('./assets/css/**/*.scss', ['css']);
    gulp.watch(['./assets/js/**/*.js', '!./assets/js/scripts.min.js'], ['js', browserSync.reload]);
});
