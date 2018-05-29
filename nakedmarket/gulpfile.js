// 宣告 gulp 物件
var gulp = require('gulp'),
del = require('del'),
watch = require('gulp-watch'),
notify = require('gulp-notify'),
concat = require('gulp-concat'),
runsequence = require('gulp-run-sequence'),
//
uncss = require('gulp-uncss'),
minifyCss = require('gulp-minify-css');
sourcemaps = require('gulp-sourcemaps'),
vendor = require('gulp-concat-vendor'),
uglify = require('gulp-uglify'),
imagemin = require('gulp-imagemin'),
Path = require("path"),
connect = require('gulp-connect'),
browserSync = require('browser-sync').create();

var path_name = "html";

// chrome plugin glup-devtools
module.exports = gulp;

// 顯示錯誤資訊
function swallowError (error) {
  // If you want details of the error in the console
  console.log(error.toString());
  this.emit('end');
}


// // 宣告 normalize 路徑
// var path = {
//   normalize: "bower_components/normalize-css/normalize.css",
// };

// livereload server
gulp.task('connect', function() { 
  connect.server({
    root: path_name,
    port:9527,
    livereload:{
      port:5566
    }
    });
  });


// browser-sync
// gulp.task('bro-sync', ['slim','css','js'], function() {
//   browserSync.init({
//     server: "./html"
//     });
//   gulp.watch("./src/sass/**/*.scss", ['css']);
//   gulp.watch("./src/slim/**/*.slim", ['slim']);
//   gulp.watch("./src/js/*.js", ['js']);
//   });

// 編譯 slim
gulp.task('slim', function(){
  slim = require('gulp-slim');
  return gulp.src(['src/slim/*.slim', '!src/slim/partials/*'])
  .pipe(slim({
    pretty: true,
      include: true, // 啟動 gulp-slim include 功能選項
      options: 'include_dirs=["src/slim/partials/","src/slim/components/"]' // 指定 slim partial 資料夾
      }))
  .on('error', swallowError)
  .pipe(gulp.dest('./'+path_name))
  .pipe(connect.reload());
  });

// scss compass
gulp.task('css', function() {
  var compass = require('gulp-compass');
    // expanded = 一般，每行CSS皆會斷行
    // nested = 有縮進，較好閱讀
    // compact = 簡潔格式，匯出來的ＣＳＳ檔案大小比上面兩個還小。
    // compressed = 壓縮過的CSS，所有設定都以一行來進行排列。
    gulp.src(['src/sass/**/*.scss'])
    .pipe(compass({
      style: 'compressed',
      comments: true,
      sass: "src/sass",
      css: path_name + '/assets/css',
      image: path_name + '/assets/images',
      font: path_name + '/assets/css/fonts',
      require: ['ceaser-easing'],
      time: true
      }))
    .on('error', swallowError)
    .pipe(notify("Created: <%= file.relative %>!"))
    .pipe(connect.reload());
    });

gulp.task('styles', function() {
    //font檔複製
    gulp.src('src/fonts/**/*.{otf,eot,svg,ttf,woff,woff2}')
    .pipe(gulp.dest(path_name + '/assets/css/fonts'))
    .pipe(connect.reload());
    });

// 壓縮圖片
gulp.task('imagemin', function(){
  gulp.src('src/images/*.{png,jpg,gif,ico}')
  .pipe(imagemin())
  .pipe(gulp.dest('./'+path_name+'/assets/images'))
  .pipe(connect.reload());
  gulp.src('src/images/*.svg')
  .pipe(gulp.dest('./'+path_name+'/assets/images'))
  .pipe(connect.reload());
  });

// 編譯 js
gulp.task('js', function(){
  return gulp.src('src/js/*.js')
    .pipe(uglify()) // uglify js
    .on('error', swallowError)
    .pipe(gulp.dest(path_name+'/assets/js'))
    .pipe(connect.reload());
    });

// 產生 vendor js
// 注意！這邊是有使用 bower 的情況下用
gulp.task('vendor-scripts', function() {
  // gulp.src('bower_components/**/**/*.min.js')
  gulp.src('src/vendor/*.js')
  .pipe(vendor('vendor.js'))
  .pipe(gulp.dest('./'+path_name+'/assets/js'));
  });
// 產生 plugin js 
gulp.task('plugin-scripts', function() {
  gulp.src('src/plugin/*.js')
  .pipe(vendor('plugin.js'))
  .pipe(gulp.dest('./html/assets/js'));
  });

// 監聽檔案
gulp.task('watch', function(){
  gulp.watch('src/slim/**/*.slim', ['slim']);
  gulp.watch('src/fonts/**/*.{otf,eot,svg,ttf,woff,woff2}', ['styles']);
  gulp.watch('src/sass/**/*.scss', ['css']);
  gulp.watch('src/js/*.js', ['js']);
  gulp.watch('src/images/*.{png,jpg,gif,svg,ico}', ['imagemin']);
  });

// 預設啟動 gulp
gulp.task('default', function(cd){
  runsequence( ['connect', 'slim', 'styles','css','plugin-scripts' ,'js', 'vendor-scripts', 'imagemin'], 'watch',cd);
  });


gulp.task('clean:develop', function(cd) {
  return del([
    path_name,
    '.sass-cache'
    ], cd);
  });

gulp.task('css_php', function() {
  var compass = require('gulp-compass');
    // expanded = 一般，每行CSS皆會斷行
    // nested = 有縮進，較好閱讀
    // compact = 簡潔格式，匯出來的ＣＳＳ檔案大小比上面兩個還小。
    // compressed = 壓縮過的CSS，所有設定都以一行來進行排列。
    gulp.src(['src/sass/**/*.scss'])
    .pipe(compass({
      style: 'compressed',
      comments: true,
      sourcemap:true,
      sass: "src/sass",
      css: 'php/assets/css',
      image: 'php/assets/images',
      font: 'php/assets/css/fonts',
      require: ['ceaser-easing'],
      time: true
      }))
    .on('error', swallowError)
    .pipe(notify("Created: <%= file.relative %>!"))
    .pipe(connect.reload());
    });
gulp.task('styles_php', function() {
    //font檔複製
    gulp.src('src/fonts/**/*.{otf,eot,svg,ttf,woff,woff2}')
    .pipe(gulp.dest('php/assets/css/fonts'))
    .pipe(connect.reload());
    });



// 壓縮圖片
gulp.task('imagemin_php', function(){
  gulp.src('src/images/*.{png,jpg,gif,ico}')
  .pipe(imagemin())
  .pipe(gulp.dest('./php/assets/images'))
  .pipe(connect.reload());
  gulp.src('src/images/*.svg')
  .pipe(gulp.dest('./php/assets/images'))
  .pipe(connect.reload());
  });

// 編譯 js
gulp.task('js_php', function(){
  return gulp.src('src/js/*.js')
    .on('error', swallowError)
    .pipe(vendor('site.js'))
    .pipe(uglify()) // uglify js
    .pipe(gulp.dest('php/assets/js'))
    .pipe(connect.reload());
    });

// 產生 vendor js
// 注意！這邊是有使用 bower 的情況下用
gulp.task('vendor-scripts_php', function() {
  // gulp.src('bower_components/**/**/*.min.js')
  return gulp.src('src/vendor/*.js')
    // .pipe(uglify()) // uglify js
    .pipe(vendor('vendor.js'))
    .pipe(gulp.dest('php/assets/js'));
    });
// 產生 plugin js 
gulp.task('plugin-scripts_php', function() {
 return  gulp.src('src/plugin/*.js')
    // .pipe(uglify()) // uglify js
    .pipe(vendor('plugin.js'))
    .pipe(gulp.dest('php/assets/js'));
    });


gulp.task('watch_php', function(){
  gulp.watch('src/sass/**/*.scss', ['css_php']);
  gulp.watch('src/js/*.js', ['js_php']);
  gulp.watch('src/images/*.{png,jpg,gif,svg,ico}', ['imagemin_php']);
  gulp.watch('src/fonts/**/*.{otf,eot,svg,ttf,woff,woff2}',['styles_php']);
  });

gulp.task('php', ['imagemin_php','styles_php','css_php','plugin-scripts_php' ,'js_php', 'vendor-scripts_php', 'watch_php']);
