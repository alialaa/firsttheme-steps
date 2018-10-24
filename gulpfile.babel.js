import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';

const PRODUCTION = yargs.argv.prod;

const paths = {
	styles: {
		src: ['src/assets/scss/bundle.scss','src/assets/scss/admin.scss'],
		dest: 'dist/assets/css'
	},
	images: {
		src: 'src/assets/images/**/*.{jpg,jpeg,png,svg,gif}',
		dest: 'dist/assets/images'
	},
	other: {
		src: ['src/assets/**/*','!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
		dest: 'dist/assets'
	}
}

export const styles = (done) => {
	return gulp.src(paths.styles.src)
		.pipe(gulpif(!PRODUCTION, sourcemaps.init()))
		.pipe(sass().on('error',sass.logError))
		.pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
		.pipe(gulpif(!PRODUCTION, sourcemaps.write()))
		.pipe(gulp.dest(paths.styles.dest));
}

export const images = () => {
	return gulp.src(paths.images.src)
		.pipe(gulpif(PRODUCTION, imagemin()))
		.pipe(gulp.dest(paths.images.dest));
}

export const watch = () => {
	gulp.watch('src/assets/scss/**/*.scss', styles);
} 


export const copy = () => {
	return gulp.src(paths.other.src)
		.pipe(gulp.dest(paths.other.dest));
}
//export default hello;