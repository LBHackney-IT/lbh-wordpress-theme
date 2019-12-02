'use strict'

const configPaths = require('../config/paths.json')
const gulp = require('gulp')
const rename = require('gulp-rename')
const del = require('del')
const vinylPaths = require('vinyl-paths')

// Update assets' versions ----------
// ----------------------------------
gulp.task('update-assets-version', () => {
  return gulp.src([
    configPaths.dist + '/hackney-wordpress.min.css',
    configPaths.dist + '/hackney-wordpress-ie8.min.css',
    configPaths.dist + '/hackney-wordpress.min.js'
  ])
    .pipe(vinylPaths(del))
    .pipe(rename(obj => {
        obj.basename = obj.basename.replace(/(hackney-wordpress.*)(?=\.min)/g, '$1-' + pkg.version)
        return obj
      })
    )
    .pipe(gulp.dest(configPaths.dist))
})
