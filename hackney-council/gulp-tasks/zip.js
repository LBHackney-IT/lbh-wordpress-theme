'use strict'

const gulp = require('gulp')
const del = require('del')
const configPaths = require('../config/paths.json')
const zip = require('gulp-zip');



// Zip task --------------------
// Zips all old files, except for package.json
// and README in all package
// ------------------------------------------------------

gulp.task('default', () =>
	gulp.src([
		'*.php',
		'*.css',
		'dist/*', 
		'img/**/*',
		'js/**/*',
		'languages/**/*',
		'screenshot.png'
		], { "base" : "." })
		.pipe(zip('hackney-council.zip'))
		.pipe(gulp.dest('../'))
);
