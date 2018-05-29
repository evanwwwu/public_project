// 宣告 gulp 物件
var gulp = require('gulp'),
     gutil = require('gulp-util'),
     watch = require('gulp-watch'),
     slim = require('gulp-slim'),
     postcss = require('gulp-postcss'),
     concat = require('gulp-concat'),
     uncss = require('gulp-uncss'),
     minifyCss = require('gulp-minify-css');
     sourcemaps = require('gulp-sourcemaps'),
     vendor = require('gulp-concat-vendor'),
     uglify = require('gulp-uglify'),
     imagemin = require('gulp-imagemin'),
     Path = require("path"),
     connect = require('gulp-connect'),
     browserSync = require('browser-sync').create();

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
    root: 'dist',
    port:9527,
    livereload:true
  });
});

// browser-sync
// gulp.task('bro-sync', ['slim','css','js'], function() {
//   browserSync.init({
//       server: "./dist"
//   });
//   gulp.watch("./src/postcss/**/*.css", ['css']);
//   gulp.watch("./src/slim/**/*.slim", ['slim']);
//   gulp.watch("./src/js/*.js", ['js']);
// });

// 編譯 slim
gulp.task('slim', function(){
  return gulp.src(['src/slim/*.slim', '!src/slim/partials/*'])
    .pipe(slim({
      pretty: true,
      include: true, // 啟動 gulp-slim include 功能選項
      options: 'include_dirs=["src/slim/partials/","src/slim/components/"]' // 指定 slim partial 資料夾
    }))
    .on('error', swallowError)
    .pipe(gulp.dest('./dist'))
    .pipe(connect.reload());
});

// 編譯 css
gulp.task('css', function () {
  gulp.src(['src/postcss/*.css','!src/postcss/partials/*'])
    .pipe(
      postcss([
        require('autoprefixer')({
          browsers: ['last 2 versions'] // 自動加上 prefix
        }),
        require('postcss-partial-import'), // 引入 partial css 功能
        require('postcss-nested'), // 巢狀功能
        require('postcss-simple-vars'), // 變數功能
        require('postcss-cssnext'), // 新版 css 語法
        require('postcss-mixins'), // 引入 mixin 功能
        require('postcss-math'), //運算
        require('postcss-clearfix'), // 引入 clearfix 功能
      ]) // 編譯 postcss
    )
    .on('error', swallowError)
    .pipe(sourcemaps.init()) // 加入 sourcemap
    .pipe(concat('style.css')) // 合併 css
    .pipe(sourcemaps.write('.')) // 寫入 sourcemap
    // .pipe(uncss({
    //     html: ['./dist/*.html']
    // }))
    .pipe(minifyCss()) // 壓縮 css
    .pipe(gulp.dest('./dist/assets/css')) 
    .pipe(connect.reload());
});

// 壓縮圖片
gulp.task('imagemin', function(){
  gulp.src('src/images/*.{png,jpg,gif,svg,ico}')
    .pipe(imagemin())
    .pipe(gulp.dest('./dist/assets/images'))
    .pipe(connect.reload());
});

// 編譯 js
gulp.task('js', function(){
  return gulp.src('src/js/*.js')
    .pipe(uglify()) // uglify js
    .on('error', swallowError)
    .pipe(gulp.dest('dist/assets/js'))
    .pipe(connect.reload());
});

// 產生 vendor js
// 注意！這邊是有使用 bower 的情況下用
gulp.task('vendor-scripts', function() {
  gulp.src('bower_components/**/**/*.min.js')
  .pipe(vendor('vendor.js'))
  .pipe(gulp.dest('./dist/assets/js'));
});
// 產生 plugin js 
gulp.task('plugin-scripts', function() {
  gulp.src('src/plugin/*.js')
  .pipe(vendor('plugin.js'))
  .pipe(gulp.dest('./dist/assets/js'));
});

// 監聽檔案
gulp.task('watch', function(){
  gulp.watch('src/slim/**/*.slim', ['slim']);
  gulp.watch('src/postcss/**/*.css', ['css']);
  gulp.watch('src/js/*.js', ['js']);
  gulp.watch('src/images/*.{png,jpg,gif,svg,ico}', ['imagemin']);
});

// 預設啟動 gulp
gulp.task('default', ['connect', 'slim', 'css','plugin-scripts' ,'js', 'imagemin', 'watch']);

