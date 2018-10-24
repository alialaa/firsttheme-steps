import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';

const PRODUCTION = yargs.argv.prod;

export const styles = (done) => {
	return gulp.src('src/assets/scss/bundle.scss')
		.pipe(sass().on('error',sass.logError))
		.pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
		.pipe(gulp.dest('dist/assets/css'));
}

//export default hello;