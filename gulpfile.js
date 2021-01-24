// Gulp configuration

// modules
const gulp = require('gulp')
const newer = require('gulp-newer')
const del = require('del')
const imagemin = require('gulp-imagemin')
const svgmin = require('gulp-svgmin')
const noop = require('gulp-noop')

const concat = require('gulp-concat')
const deporder = require('gulp-deporder')
const rename = require('gulp-rename')
const terser = require('gulp-terser')
const stripdebug = require('gulp-strip-debug')
const sourcemaps = require('gulp-sourcemaps')

const sass = require('gulp-sass')
const postcss = require('gulp-postcss')
const assets = require('postcss-assets')
const cssnano = require('cssnano')

// folders
const src = 'assets/'
const build = 'static/'

// Clean
function clean () {
  return del(build + 'main.css', build + 'main.min.css', build + 'main.js', build + 'main.min.js')
}
exports.clean = clean

// Image processing
function images () {
  const out = build + 'images/'
  return gulp.src(src + 'images/**/*')
    .pipe(newer(out))
    .pipe(imagemin({ optimizationLevel: 5 }))
    .pipe(gulp.dest(out))
}
exports.images = images

// SVG processing
function svg () {
  const out = build + 'images/'
  return gulp.src(src + 'images/*.svg')
    .pipe(svgmin())
    .pipe(gulp.dest(out))
}
exports.svg = svg

const scripts = [
  src + 'js/lib/*',
  src + 'js/main.js'
]

// JavaScript processing
function js () {
  return gulp.src(scripts)
    .pipe(sourcemaps.init())
    .pipe(deporder())
    .pipe(concat('main.js'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(build))
}
exports.js = js

function jsBuild () {
  return gulp.src(scripts)
    .pipe(deporder())
    .pipe(concat('main.min.js'))
    .pipe(stripdebug())
    .pipe(terser())
    .pipe(gulp.dest(build))
}
exports.jsBuild = jsBuild

function css () {
  return gulp.src(src + 'scss/main.scss')
    .pipe(sourcemaps ? sourcemaps.init() : noop())
    .pipe(sass({
      outputStyle: 'nested',
      imagePath: 'images/',
      precision: 3,
      errLogToConsole: true
    }).on('error', sass.logError))
    .pipe(postcss([
      assets({ loadPaths: ['images/'] }),
      cssnano
    ]))
    .pipe(rename('main.min.css'))
    .pipe(gulp.dest(build))
    .pipe(rename('main.css'))
    .pipe(sourcemaps ? sourcemaps.write() : noop())
    .pipe(gulp.dest(build))
}
exports.css = gulp.series(css)

// build task
exports.build = gulp.parallel(exports.clean, exports.images, exports.svg, exports.css, exports.js, exports.jsBuild)

// watch for file changes
function watch (done) {
  // image changes
  gulp.watch(src + 'images/**/*', images, svg)
  // css changes
  gulp.watch(src + 'scss/**/*', css)
  // js changes
  gulp.watch(src + 'js/**/*', js, jsBuild)
  done()
}
exports.watch = watch

// default task
exports.default = gulp.series(exports.build, exports.watch)
