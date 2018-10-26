import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import named from 'vinyl-named';
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';


const PRODUCTION = yargs.argv.prod;

const paths = {
	styles: {
		src: ['src/assets/scss/admin.scss'],
		dest: 'dist/assets/css'
	},
	images: {
		src: 'src/assets/images/**/*.{jpg,jpeg,png,svg,gif}',
		dest: 'dist/assets/images'
	},
	scrips: {
		src: ['src/assets/js/admin.js'],
		dest: 'dist/assets/js'
	},
	other: {
		src: ['src/assets/**/*','!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
		dest: 'dist/assets'
	},
	package: {
		src: [
		      "**/*",
		      "!.vscode",
		      "!node_modules{,/**}",
		      "!packaged{,/**}",
		      "!src{,/**}",
		      "!.babelrc",
		      "!.gitignore",
		      "!gulpfile.babel.js",
		      "!package.json",
		      "!package-lock.json"
    	],
		dest: 'packaged'
	}
}


export const clean = () => {
	return del(['dist']);
}

export const styles = (done) => {
	return gulp.src(paths.styles.src)
		.pipe(gulpif(!PRODUCTION, sourcemaps.init()))
		.pipe(sass().on('error',sass.logError))
		.pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
		.pipe(gulpif(!PRODUCTION, sourcemaps.write()))
		.pipe(gulp.dest(paths.styles.dest))
}

export const images = () => {
	return gulp.src(paths.images.src)
		.pipe(gulpif(PRODUCTION, imagemin()))
		.pipe(gulp.dest(paths.images.dest));
}

export const watch = () => {
	gulp.watch('src/assets/scss/**/*.scss', styles);
	gulp.watch('src/assets/js/**/*.js', scripts);
	gulp.watch(paths.images.src, images);
	gulp.watch(paths.other.src, copy);
} 


export const copy = () => {
	return gulp.src(paths.other.src)
		.pipe(gulp.dest(paths.other.dest));
}

export const scripts = () => {
	return gulp.src(paths.scrips.src)
	.pipe(named())
	.pipe(webpack({
		module: {
			rules: [
				{
					test: /\.js$/,
					use: {
						loader: 'babel-loader',
						options: {
							presets: ['@babel/preset-env']
						}
					}
				}
			]
		},
		output: {
			filename: '[name].js'
		},
		externals: {
			jquery: 'jQuery'
		},
		devtool: !PRODUCTION ? 'inline-source-map' : false
	}))
	.pipe(gulpif(PRODUCTION, uglify()))
	.pipe(gulp.dest(paths.scrips.dest));
}

export const compress = () => {
	return gulp.src(paths.package.src)
		.pipe(replace('_pluginname', info.name))
		.pipe(replace('_themename', info.theme))
		.pipe(zip(`${info.theme}-{info.name}.zip`))
		.pipe(gulp.dest(paths.package.dest));
}

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));
export const bundle = gulp.series(build,compress);

export default dev;