'use strict'

const gulp = require('gulp')
const configPaths = require('../config/paths.json')
const sass = require('gulp-sass')
const plumber = require('gulp-plumber')
const postcss = require('gulp-postcss')
const autoprefixer = require('autoprefixer')
const uglify = require('gulp-uglify')
const eol = require('gulp-eol')
const rename = require('gulp-rename')
const cssnano = require('cssnano')
const webpack = require('webpack-stream')
const named = require('vinyl-named-with-path')

// Compile CSS and JS task --------------
// --------------------------------------

const errorHandler = function (error) {
  // Log the error to the console
  console.error(error.message)

  // Ensure the task we're running exits with an error code
  this.once('finish', () => process.exit(1))
  this.emit('end')
}
// different entry points for both streams below and depending on destination flag
const compileStyleshet = configPaths.src + 'styles/all.scss'

gulp.task('scss:compile', () => {
  const compile = gulp.src(compileStyleshet)
    .pipe(plumber(errorHandler))
    .pipe(sass())
    // minify css add vendor prefixes and normalize to compiled css
    .pipe(postcss([
      autoprefixer,
      cssnano
    ]))
    .pipe(gulp.dest(configPaths.dist))

  return compile
})

// Compile js task for preview ----------
// --------------------------------------
gulp.task('js:compile', () => {
  // for dist/ folder we only want compiled 'all.js' file
  const srcFiles = configPaths.src + 'scripts/index.js'
  return gulp.src([
    srcFiles,
    '!' + configPaths.src + '**/*.test.js'
  ])
    .pipe(named())
    .pipe(webpack({
      mode: 'production',
      output: {
        library: 'HackneyWordpress',
        libraryTarget: 'umd'
      }
    }))
    .pipe(uglify({
      ie8: true
    }))
    .pipe(
      rename({
        basename: 'hackney-wordpress',
        extname: '.min.js'
      })
    )
    .pipe(eol())
    .pipe(gulp.dest(configPaths.dist))
})
