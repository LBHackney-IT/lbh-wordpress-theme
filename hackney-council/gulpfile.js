'use strict'

const paths = require('./config/paths.json')
const gulp = require('gulp')
const taskListing = require('gulp-task-listing')

// Gulp sub-tasks
require('./gulp-tasks/clean.js')
require('./gulp-tasks/lint.js')
require('./gulp-tasks/compile-assets.js')
require('./gulp-tasks/watch.js')
require('./gulp-tasks/zip.js')

// new tasks
require('./gulp-tasks/copy-to-destination.js')

// Umbrella scripts tasks for preview ---
// Runs js lint and compilation
// --------------------------------------
gulp.task('scripts', gulp.series(
  'js:compile'
))

// Umbrella styles tasks for preview ----
// Runs js lint and compilation
// --------------------------------------
gulp.task('styles', gulp.series(
  'scss:lint',
  'scss:compile'
))

// Copy assets task ----------------------
// Copies assets to taskArguments.destination (public)
// --------------------------------------
gulp.task('copy:assets', () => {
  return gulp.src(paths.src + 'assets/**/*')
    .pipe(gulp.dest(paths.dist + '/assets/'))
})

// All test combined --------------------
// Runs js, scss and accessibility tests
// --------------------------------------
gulp.task('test', gulp.series(
  'scss:lint',
  'scss:compile'
))

// Copy assets task for local & heroku --
// Copies files to
// taskArguments.destination (public)
// --------------------------------------
gulp.task('copy-assets', gulp.series(
  'styles',
  'scripts'
))

// Dev task -----------------------------
// Runs a sequence of task on start
// --------------------------------------
gulp.task('dev', gulp.series(
  'clean',
  'copy-assets'
))

gulp.task('zip', gulp.series(
  'default'
))

gulp.task('build:dist', gulp.series(
  'clean',
  'copy-assets',
  'copy:assets',
  'zip'
))

// Default task -------------------------
// Lists out available tasks.
// --------------------------------------
gulp.task('default', taskListing)
