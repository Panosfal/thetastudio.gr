const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

// Paths
const paths = {
    scss: './src/scss/**/*.scss',
    js: './src/js/**/*.js',
    cssOutput: './htdocs/wp-content/themes/pfaltsioni/assets/css',
    jsOutput: './htdocs/wp-content/themes/pfaltsioni/assets/js',
};

// Copy Bootstrap CSS and JS
gulp.task('copy-bootstrap', () => {
    return gulp.src([
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        './node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'
    ])
    .pipe(gulp.dest(paths.cssOutput))
    .pipe(gulp.dest(paths.jsOutput));
});

// Copy FontAwesome CSS
gulp.task('copy-fontawesome', () => {
    return gulp.src('./node_modules/@fortawesome/fontawesome-free/css/all.min.css')
        .pipe(gulp.dest(paths.cssOutput));
});

// Compile SCSS
gulp.task('styles', () => {
    return gulp.src(paths.scss)
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())
        .pipe(gulp.dest(paths.cssOutput));
});

// Bundle JS
gulp.task('scripts', () => {
    return gulp.src(paths.js)
        .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.jsOutput));
});

// Copy Swiper CSS and JS
gulp.task('copy-swiper', () => {
    return gulp.src([
        './node_modules/swiper/swiper-bundle.min.css',
        './node_modules/swiper/swiper-bundle.min.js'
    ])
    .pipe(gulp.dest(paths.cssOutput))
    .pipe(gulp.dest(paths.jsOutput));
});

// Add Swiper to default task
// gulp.task('default', gulp.parallel('copy-swiper', 'styles', 'scripts', 'watch'));

// Watch for Changes
gulp.task('watch', () => {
    gulp.watch(paths.scss, gulp.series('styles'));
    gulp.watch(paths.js, gulp.series('scripts'));
});

// Default Task
gulp.task('default', gulp.parallel( 'copy-swiper', 'copy-bootstrap', 'copy-fontawesome', 'styles', 'scripts', 'watch'));
