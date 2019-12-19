'use strict'

const gulp = require('gulp')
const del = require('del')
const configPaths = require('../config/paths.json')

// Clean task for a specified folder --------------------
// Removes all old files, except for package.json
// and README in all package
// ------------------------------------------------------

gulp.task('clean', () => {
  const destination = configPaths.dist

  return del([
    `${destination}/**/*`
  ])
})
