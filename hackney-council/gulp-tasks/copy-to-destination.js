'use strict'

const gulp = require('gulp')
const configPaths = require('../config/paths.json')
const postcss = require('gulp-postcss')
const autoprefixer = require('autoprefixer')
const filter = require('gulp-filter')

const scssFiles = filter([configPaths.src + '**/*.scss'], { restore: true })

gulp.task('copy-files', () => {
  return gulp.src([
    configPaths.src + '**/*'
  ])
    .pipe(scssFiles)
    .pipe(postcss([
      autoprefixer
    ], { syntax: require('postcss-scss') }))
    .pipe(scssFiles.restore)
    .pipe(gulp.dest(configPaths.dist))
})
