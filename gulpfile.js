const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

// Compile Sass
gulp.task('sass', function (done) { // Add 'done' parameter
	return gulp
		.src('resources/sass/**/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(gulp.dest('public/css'))
		.pipe(cleanCSS())
		.pipe(rename({ suffix: '.min' }))
		.pipe(gulp.dest('public/css'))
		.on('end', done); // Signal async completion with 'done'
});

// Watch for changes in Sass files
gulp.task('watch', function () {
	gulp.watch('resources/sass/**/*.scss', gulp.series('sass'));
});

// Default task (run with 'gulp' command)
gulp.task('default', gulp.series('sass', 'watch'));
