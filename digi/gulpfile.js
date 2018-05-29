// 宣告 gulp 物件
var gulp = require('gulp'),
del = require('del'),
watch = require('gulp-watch'),
notify = require('gulp-notify'),
runsequence = require('gulp-run-sequence'),
connect = require('gulp-connect'),
sourcemaps = require('gulp-sourcemaps'),
imagemin = require('gulp-imagemin'),
changed = require('gulp-changed');

var browserSync = require('browser-sync').create();
//js plugin
var vendor = require('gulp-concat-vendor'),
uglify = require('gulp-uglify');

var out_path = "html/assets/";
var php_out = "php/assets/";
var html_path = "html";
var source_path = "src/";

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
    root: html_path,
    port:9527,
    livereload:{
      port:5566
    }
    });
  });


// browser-sync
gulp.task('bro-sync', ['slim','styles','plugin-scripts' ,'js', 'vendor-scripts', 'imagemin','css','connect'], function() {
  browserSync.init({
    server: html_path
    });
  gulp.watch('src/slim/**/*.slim', ['slim']);
  gulp.watch(source_path+'fonts/**/*.{otf,eot,svg,ttf,woff,woff2}', ['styles']);
  gulp.watch(source_path+'plugin/*.js', ['plugin-scripts']);
  gulp.watch(source_path+'vendor/*.js', ['vendor-scripts']);
  gulp.watch('src/sass/**/*.scss', ['css']);
  gulp.watch(source_path+'js/*.js', ['js']);
  gulp.watch(source_path+'images/*.{png,jpg,gif,svg,ico}', ['imagemin']);
  gulp.watch(html_path+"/*").on("change",browserSync.reload);
  });

//編譯 slim
gulp.task('slim', function(){
  slim = require('gulp-slim');
  return gulp.src(['src/slim/**/*.slim', '!src/slim/partials/*'])
  .pipe(slim({
    pretty: true,
      include: true, // 啟動 gulp-slim include 功能選項
      options: 'include_dirs=["src/slim/partials/","src/slim/components/"]', // 指定 slim partial 資料夾
      }))
  .on('error', swallowError)
  .pipe(gulp.dest(html_path))
  .pipe(connect.reload());
  });

// scss compass
gulp.task('css', function() {
  var compass = require('gulp-compass');
    // expanded = 一般，每行CSS皆會斷行
    // nested = 有縮進，較好閱讀
    // compact = 簡潔格式，匯出來的ＣＳＳ檔案大小比上面兩個還小。
    // compressed = 壓縮過的CSS，所有設定都以一行來進行排列。
    gulp.src([source_path+'/sass/**/*.scss'])
    .pipe(compass({
      style: 'compressed',
      comments: true,
      sass: "src/sass",
      css: out_path + 'css',
      image: out_path + 'images',
      font: out_path + 'fonts',
      require: ['ceaser-easing'],
      //sourcemap:true,
      time: true
      }))
    .on('error', swallowError)
    .pipe(notify("Created: <%= file.relative %>!"))
    .pipe(connect.reload());
    });

gulp.task('css-php', function() {
  var compass = require('gulp-compass');
    // expanded = 一般，每行CSS皆會斷行
    // nested = 有縮進，較好閱讀
    // compact = 簡潔格式，匯出來的ＣＳＳ檔案大小比上面兩個還小。
    // compressed = 壓縮過的CSS，所有設定都以一行來進行排列。
    gulp.src([source_path+'/sass/**/*.scss'])
    .pipe(compass({
      style: 'compressed',
      comments: true,
      sass: "src/sass",
      css: php_out + 'css',
      image: php_out + 'images',
      font: php_out + 'fonts',
      require: ['ceaser-easing'],
      sourcemap:true,
      time: true
      }))
    .on('error', swallowError)
    .pipe(notify("Created: <%= file.relative %>!"))
    .pipe(connect.reload());
    });

gulp.task('css_php', function() {
  var compass = require('gulp-compass');
    // expanded = 一般，每行CSS皆會斷行
    // nested = 有縮進，較好閱讀
    // compact = 簡潔格式，匯出來的ＣＳＳ檔案大小比上面兩個還小。
    // compressed = 壓縮過的CSS，所有設定都以一行來進行排列。
    gulp.src([source_path+'/sass/**/*.scss'])
    .pipe(compass({
      style: 'compressed',
      comments: true,
      sass: "src/sass",
      css: php_out + 'css',
      image: php_out + 'images',
      font: php_out + 'fonts',
      require: ['ceaser-easing'],
      sourcemap:true,
      time: true
      }))
    .on('error', swallowError)
    .pipe(notify("Created: <%= file.relative %>!"))
    .pipe(connect.reload());
    });

gulp.task('styles', function() {
    //font檔複製
    gulp.src(source_path+'fonts/**/*.{otf,eot,svg,ttf,woff,woff2}')
    .pipe(gulp.dest(out_path+'fonts'))
    .pipe(connect.reload());
    }); 

gulp.task('styles-php', function() {
    //font檔複製
    gulp.src(source_path+'fonts/**/*.{otf,eot,svg,ttf,woff,woff2}')
    .pipe(gulp.dest(php_out+'fonts'))
    .pipe(connect.reload());
    }); 
// 壓縮圖片
gulp.task('imagemin', function(){
  var imageminJpegRecompress = require('imagemin-jpeg-recompress');
  var jpgmin = imageminJpegRecompress({
            accurate: true,//高精度模式
            quality: "veryhigh",//图像质量:low, medium, high and veryhigh;
            method: "smallfry",//网格优化:mpe, ssim, ms-ssim and smallfry;
            min: 80,//最低质量
            loops: 0,//循环尝试次数, 默认为6;
            progressive: false,//基线优化
            subsample: "default"//子采样:default, disable;
            }),
  pngmin = imagemin.optipng({
            optimizationLevel:4//Default:3
            }),
  gifmin = imagemin.gifsicle({
            optimizationLevel:1 //Default:1
            }),
  svgmin = imagemin.svgo({
    removeTitle:true,
    removeEmptyAttrs:true,
    cleanupIDs:true
    });
  gulp.src(source_path + 'images/**/*')
  .pipe(changed(out_path + 'images'))
  .pipe(imagemin({
    use: [jpgmin,pngmin,gifmin,svgmin]
    }))
  .pipe(gulp.dest(out_path + 'images'))
  .pipe(connect.reload());
  });

gulp.task('imagemin-php', function(){
  var imageminJpegRecompress = require('imagemin-jpeg-recompress');
  var jpgmin = imageminJpegRecompress({
            accurate: true,//高精度模式
            quality: "veryhigh",//图像质量:low, medium, high and veryhigh;
            method: "smallfry",//网格优化:mpe, ssim, ms-ssim and smallfry;
            min: 80,//最低质量
            loops: 0,//循环尝试次数, 默认为6;
            progressive: false,//基线优化
            subsample: "default"//子采样:default, disable;
            }),
  pngmin = imagemin.optipng({
            optimizationLevel:4//Default:3
            }),
  gifmin = imagemin.gifsicle({
            optimizationLevel:1 //Default:1
            }),
  svgmin = imagemin.svgo({
    removeTitle:true,
    removeEmptyAttrs:true,
    cleanupIDs:true
    });
  gulp.src(source_path + 'images/**/*')
  .pipe(changed(php_out + 'images'))
  .pipe(imagemin({
    use: [jpgmin,pngmin,gifmin,svgmin]
    }))
  .pipe(gulp.dest(php_out + 'images'))
  .pipe(connect.reload());
  });

// 編譯 js
gulp.task('js', function(){
  gulp.src(source_path+'js/*.js')
  //.pipe(sourcemaps.init({loadMaps:true}))
    .pipe(uglify()) // uglify js
    .on('error', swallowError)
 //   .pipe(sourcemaps.write())
    .pipe(gulp.dest(out_path+'js'))
    .pipe(connect.reload());
    });

gulp.task('js-php', function(){
  gulp.src(source_path+'js/*.js')
  .pipe(sourcemaps.init({loadMaps:true}))
    .pipe(uglify()) // uglify js
    .on('error', swallowError)
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(php_out+'js'))
    .pipe(connect.reload());
    });

// 產生 vendor js
// 注意！這邊是有使用 bower 的情況下用
gulp.task('vendor-scripts', function() {
  // gulp.src('bower_components/**/**/*.min.js')
  gulp.src(source_path+'vendor/*.js')
 // .pipe(sourcemaps.init({loadMaps:true}))
  .pipe(vendor('vendor.js'))
 // .pipe(sourcemaps.write())
  .pipe(gulp.dest(out_path+'js'));
  });

gulp.task('vendor-scripts-php', function() {
  // gulp.src('bower_components/**/**/*.min.js')
  gulp.src(source_path+'vendor/*.js')
//  .pipe(sourcemaps.init({loadMaps:true}))
  .pipe(vendor('vendor.js'))
 // .pipe(sourcemaps.write())
  .pipe(gulp.dest(php_out+'js'));
  });


// 產生 plugin js 
gulp.task('plugin-scripts', function() {
  gulp.src(source_path+'plugin/*.js')
//  .pipe(sourcemaps.init({loadMaps:true}))
  .pipe(vendor('plugin.js'))
//  .pipe(sourcemaps.write())
  .pipe(gulp.dest(out_path+'js'));

  gulp.src(source_path+'json/*.json')
  .pipe(gulp.dest(out_path+'json'));
  });

gulp.task('plugin-scripts-php', function() {
  gulp.src(source_path+'plugin/*.js')
  .pipe(sourcemaps.init({loadMaps:true}))
  .pipe(vendor('plugin.js'))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest(php_out+'js'));

  gulp.src(source_path+'json/*.json')
  .pipe(gulp.dest(php_out+'json'));
  });

// 監聽檔案
gulp.task('watch', function(){
  gulp.watch('src/slim/**/*.slim', ['slim']);
  gulp.watch(source_path+'fonts/**/*.{otf,eot,svg,ttf,woff,woff2}', ['styles']);
  gulp.watch(source_path+'plugin/*.js', ['plugin-scripts']);
  gulp.watch(source_path+'vendor/*.js', ['vendor-scripts']);
  gulp.watch('src/sass/**/*.scss', ['css']);
  gulp.watch(source_path+'js/*.js', ['js']);
  gulp.watch(source_path+'images/*.{png,jpg,gif,svg,ico}', ['imagemin']);
  });

gulp.task('watch-php', function(){
 gulp.watch(source_path+'fonts/**/*.{otf,eot,svg,ttf,woff,woff2}', ['styles-php']);
 gulp.watch(source_path+'plugin/*.js', ['plugin-scripts-php']);
 gulp.watch(source_path+'vendor/*.js', ['vendor-scripts-php']);
 gulp.watch('src/sass/**/*.scss', ['css-php']);
 gulp.watch(source_path+'js/*.js', ['js-php']);
 gulp.watch(source_path+'images/*.{png,jpg,gif,svg,ico}', ['imagemin-php']);
 });

// 預設啟動 gulp
gulp.task('default', function(cd){
  runsequence( 'clean:develop',['slim','styles','plugin-scripts' ,'js', 'vendor-scripts', 'imagemin','css','connect'], 'watch',cd);
  });

gulp.task('php', function(cd){
  runsequence(['styles-php','plugin-scripts-php' ,'js-php', 'vendor-scripts-php', 'imagemin-php','css-php'], 'watch-php',cd);
  });


gulp.task('clean:develop', function(cd) {
  return del([
    html_path,
    '.sass-cache'
    ], cd);
  });

gulp.task('clean:php', function(cd) {
  return del([
    php_out,
    '.sass-cache'
    ], cd);
  });