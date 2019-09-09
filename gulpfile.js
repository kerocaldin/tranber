const { execSync }      = require('child_process');
const fs                = require('fs');
const gulp              = require('gulp');
const image             = require('gulp-image');
const livereload        = require('gulp-livereload');
const autoprefixer      = require('gulp-autoprefixer');
const sourcemaps        = require('gulp-sourcemaps');
const sass              = require('gulp-sass');
const cleanCss          = require('gulp-clean-css');
const browserify        = require('browserify');
const babelify          = require('babelify');
const vinylSourceStream = require('vinyl-source-stream');

gulp.task('npm', done => {
    let cmd = 'npm install';
    console.log('Running '+cmd);
    let exec = execSync(cmd);
    console.log(exec.toString());
    livereload.reload();
    return done();
});

gulp.task('images', done => {
    return gulp.src('./src/img/**/**')
        .pipe(image({
        // pngquant: true,
        // optipng: false,
        // zopflipng: true,
        // jpegRecompress: false,
        // mozjpeg: true,
        // guetzli: false,
        // gifsicle: true,
        // svgo: true,
        // concurrent: 10,
        // quiet: false			
        }))
        .pipe(gulp.dest('./public/images/'))
        .pipe(livereload());
});

gulp.task('styles', done => {
    return gulp.src('./src/scss/entries/**/**.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cleanCss())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./public/styles/'))
        .pipe(livereload());
});

gulp.task('scripts', done => {
    let input  = [];
    let output = [];
    let src    = './src/js/entries/';
    let dest   = './public/scripts/';

    fs.readdirSync(src).forEach(file => {
        if (!fs.lstatSync(src+file).isDirectory() && file.endsWith('.js')) {
            input.push(src+file);
            output.push(dest+file);
        }
    });

    return browserify({
            entries   : input,
            debug     : true,
            transform : [
                babelify.configure({presets : ['@babel/env']}),
                ['uglifyify', {global : true}],
            ],
        })
        .plugin('factor-bundle', {outputs: output})
        .bundle()
        .pipe(vinylSourceStream('common.js'))
        .pipe(gulp.dest('./public/scripts/'))
        .pipe(livereload());
});

gulp.task('default', gulp.series('npm', gulp.parallel('images', 'styles', 'scripts')));

gulp.task('watch', done => {
    livereload.listen();
    gulp.watch('./package.json', gulp.series('npm'));
    gulp.watch('./src/img/**/**', gulp.series('images'));
    gulp.watch('./src/scss/**/**.scss', gulp.series('styles'));
    gulp.watch('./src/js/**/**.js', gulp.series('scripts'));

    gulp.watch('./public/**/**.php', done => {
        livereload.reload();
        return done();
    });

    return done();
})