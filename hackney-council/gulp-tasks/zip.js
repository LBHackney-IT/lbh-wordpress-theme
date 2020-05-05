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
	gulp.src(['**/*', '!src/**/*', '!config/*', '!gulp-tasks/**/*', '!node_modules/**/*','!zips', '!.gitignore','!gulpfile.js', '!package*'])
		.pipe(zip('hackey-council.zip'))
		.pipe(gulp.dest('../'))
);
