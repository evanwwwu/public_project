require 'ceaser-easing' 
#new ceaser;
require 'compass/import-once/activate'
# Require any additional compass plugins here.

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "css"
sass_dir = "sass"
images_dir = "images"
fonts_dir = "css/fonts"
javascripts_dir = "javascripts"
# You can select your preferred output style here (can be overridden via the command line):
output_style = :compact
# expanded = 一般，每行CSS皆會斷行
# nested = 有縮進，較好閱讀
# compact = 簡潔格式，匯出來的ＣＳＳ檔案大小比上面兩個還小。
# compressed = 壓縮過的CSS，所有設定都以一行來進行排列。

# To enable relative paths to assets via compass helper functions. Uncomment:
relative_assets = true;

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = false;
Encoding.default_external = 'utf-8';

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass
