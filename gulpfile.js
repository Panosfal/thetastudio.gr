const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const fs = require('fs');
const path = require('path');

// Paths
const paths = {
    scss: './src/scss/**/*.scss',
    js: './src/js/**/*.js',
    cssOutput: './htdocs/wp-content/themes/pfaltsioni/assets/css',
    jsOutput: './htdocs/wp-content/themes/pfaltsioni/assets/js',
};

// Ensure output directories exist
function ensureDirExists(dir) {
    if (!fs.existsSync(dir)) {
        fs.mkdirSync(dir, { recursive: true });
    }
}

// Copy Bootstrap CSS and JS
gulp.task('copy-bootstrap', () => {
    ensureDirExists(paths.cssOutput);
    ensureDirExists(paths.jsOutput);
    return gulp.src([
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        './node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'
    ])
    .pipe(gulp.dest(paths.cssOutput))
    .pipe(gulp.dest(paths.jsOutput));
});

// Copy FontAwesome CSS
gulp.task('copy-fontawesome', () => {
    ensureDirExists(paths.cssOutput);
    return gulp.src('./node_modules/@fortawesome/fontawesome-free/css/all.min.css')
        .pipe(gulp.dest(paths.cssOutput));
});

// Compile SCSS
gulp.task('styles', () => {
    ensureDirExists(paths.cssOutput); // Ensure CSS output directory exists
    return gulp.src(paths.scss)
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())
        .pipe(gulp.dest(paths.cssOutput));
});

// Bundle JS
gulp.task('scripts', () => {
    ensureDirExists(paths.jsOutput);
    return gulp.src(paths.js)
        .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.jsOutput));
});

// Copy Swiper CSS and JS
gulp.task('copy-swiper', () => {
    ensureDirExists(paths.cssOutput);
    ensureDirExists(paths.jsOutput);
    return gulp.src([
        './node_modules/swiper/swiper-bundle.min.css',
        './node_modules/swiper/swiper-bundle.min.js'
    ])
    .pipe(gulp.dest(paths.cssOutput))
    .pipe(gulp.dest(paths.jsOutput));
});

// Watch for Changes
gulp.task('watch', () => {
    gulp.watch(paths.scss, gulp.series('styles'));
    gulp.watch(paths.js, gulp.series('scripts'));
});

// Default Task
gulp.task('default', gulp.parallel('copy-swiper', 'copy-bootstrap', 'copy-fontawesome', 'styles', 'scripts', 'watch'));
