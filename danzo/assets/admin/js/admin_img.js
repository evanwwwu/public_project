;
/* CSS : admin_plugin.css*/
/*
 * 封面照上傳
 * include: jqeury.min.js, jquery.Jcrop.js, jquery.fileupload.js
 * 2015/01/30
 */
(function($) {
    $.fn.myCoverUpload = function(settings) {
        var _defaultSettings = {
            img_url: 'aaa', //圖片來源
            upload_url: 'aaa', //上傳路徑
            thumbnail_type: 'origin', //origin:原尺寸上傳 , crop:裁圖功能
            thumbnail_size: [], //圖片resize 尺寸
            crop_min: [0, 0], // crop 最小尺寸
            crop_max: [0, 0], //crop 最大尺寸
            crop_ratio: 1, // crop 比例
            crop_path: "", //crop 上傳路徑
        };
        var _settings = $.extend(_defaultSettings, settings);


        var _show_preivew = function(instance, json) {
            var file_name = json.file;
            var img = $('<img src="' + _settings.img_url + file_name + '" style="border:1px solid #cccccc; max-width:300px">');
            var btn_delete = $('<a href="javascript:void(0)"><i class="icon-trash"></i>DELETE</a>');
            instance.parent().prev().val(file_name);
            btn_delete.on('click', function() {
                instance.parent().find('.myCoverUpload_preview').empty();
                instance.parent().prev().val("");
            })
            instance.parent().find('.myCoverUpload_preview')
                .empty()
                .append('<br>')
                .append(img)
                .append('<br>')
                .append(btn_delete)
                .append('<br>')
                .append('<br>');
        }
        var _crop_init = function(instance, response, idx) {
            var crop_div = $('<div id="img_crop"></div>'),
                crop_clearfix = $('<div class="clearfix"><p id="c_close">x</p></div>'),
                crop_origin = $('<div id="img_site"><img id="crop_site" style="max-width:none;" src=""></div>'),
                crop_input = $('<input type="button" id="save_img" class="pure-button pure-button-primary" value="儲存圖片"><input type="hidden" id="crop_val" name="crop_val" value=""><input type="hidden" id="file_val" name="file_val" value="">');
            crop_div.append(crop_clearfix.append(crop_origin.append(crop_input)));
            $("form").append(crop_div);

            $("#img_crop").show();
            $('#img_crop img').attr("src", _settings.img_url + response.file);
            $("#file_val").val(response.file);
            $("body").animate({
                scrollTop: 0
            });
            $("#crop_site").Jcrop({
                bgFade: true,
                bgOpacity: .2,
                bgColor: 'black',
                onChange: showCoords,
                onSelect: showCoords
            }, function() {
                jcrop_api = this;
                if (_settings.crop_min != '') {
                    jcrop_api.setOptions({
                        minSize: settings.crop_min,
                        setSelect: [_settings.crop_min[0], _settings.crop_min[1], 0, 0]
                    });
                }
                if (_settings.crop_max != '') {
                    jcrop_api.setOptions({
                        maxSize: _settings.crop_max
                    });
                }
                if (_settings.crop_ratio != '') {
                    jcrop_api.setOptions({
                        aspectRatio: _settings.crop_ratio
                    });
                    jcrop_api.setSelect([0, 0, $('#img_crop img').width(), $('#img_crop img').height() / _settings.crop_ratio]);
                } else {
                    jcrop_api.setSelect([0, 0, $('#img_crop img').width(), $('#img_crop img').height()]);
                }
            });

            function showCoords(c) {
                var c_val = "width=" + c.w + "&height=" + c.h + "&x=" + c.x + "&y=" + c.y;
                $("#crop_val").val(c_val);
            }
            var obj = instance;
            $("#save_img").unbind('click').bind('click', function() {
                var brand_id = $("select[name=brand_id] option:selected").val();
                var d = $("#crop_val").val() + "&file=" + $("#file_val").val() + "&thumbnail_size=" + JSON.stringify(_settings.thumbnail_size);
                var img_ratio = response.image_width / $(".jcrop-holder").width();
                var post_add = _settings.crop_path + "?ra=" + img_ratio;
                if (obj)
                    $.post(post_add, d, function(data) {
                        if (!data.error) {
                            _show_preivew(instance, data);
                            $('#c_close').click();
                            $("body").animate({
                                scrollTop: obj.offset().top
                            });
                        } else {
                            alert(data.error);
                        }
                    }, 'json');
            });

            $('#c_close').click(function() {
                $("#img_crop").remove();
            });
        }
        return this.each(function(idx) {
            var container = $('<div class="myCoverUpload_container"></div>'),
                file_input = $('<input name="myCoverUpload_instance_' + idx + '" type="file" placeholder="" class="pure-input">'),
                loading = $('<span class="myCoverUpload_loading"></span>'),
                preview = $('<div class="myCoverUpload_preview"></div>'),
                arr_size = JSON.stringify(_settings.thumbnail_size);
            container.append(file_input).append(loading).append(preview);
            $(this).after(container);
            file_input.fileupload({
                formData: {
                    thumbnail_type: _settings.thumbnail_type,
                    thumbnail_size: arr_size
                },
                change: function(e, data) {
                    $(this).next().html('<i class="icon-spinner icon-spin"></i>');
                },
                beforeSend: function(e, data) {},
                fileuploadsubmit: function(e, data) {},
                url: _settings.upload_url + "myCoverUpload_instance_" + idx,
                sequentialUploads: true,
                dataType: 'json',
                done: function(e, data) {
                    var json = data.result;
                    if (!json.error) {
                        $(this).next().html('');
                        switch (_settings.thumbnail_type) {
                            case 'crop':
                                _crop_init($(this), json, idx)
                                break;
                            default:
                                _show_preivew($(this), json);
                                break;
                        }
                    } else {
                        alert(json.error);
                    }
                },
                dropZone: null
            });

            if ($(this).val()) {
                _show_preivew(file_input, {
                    file: $(this).val()
                })
            }
        });
    };
})(jQuery);


/*
 * Gallery 上傳
 * include:jquery.min.js,
 */
(function($) {
    $.fn.myGallery = function(settings) {
        var _defaultSettings = {
            img_url: 'aaa', //圖片來源
            upload_url: 'aaa', //上傳路徑
            img_size: ["1400x595"]
        };
        var _settings = $.extend(_defaultSettings, settings);


        return this.each(function(idx) {
            var set_gallery_img = function(img_val) {
                var gallery_ele = $('<div class="gallery_img"></div>'),
                    a_ele = $('<a href="javascript:void(0)"><i class="icon-trash"></i>DELETE</a>'),
                    post_ele = $('<input type="hidden" name="gallery_img' + idx + '[]" value="' + img_val + '">');
                a_ele.click(function() {
                    if (!confirm('確定刪除?')) return;
                    $(this).parents(".gallery_img").remove();
                });
                gallery_ele.append("<img src='" + _settings.img_url + img_val + "'>").append(a_ele).append(post_ele);
                return gallery_ele;
            }

            var main = $(this),
                upload_input = $('<input name="gallery_file' + idx + '" maxlength="5" type="file" multiple placeholder="" class="gallery_file' + idx + ' pure-input">'),
                loading = $('<span class="gallery_loading"></span>'),
                arr_size = JSON.stringify(_settings.img_size);
            var gallery_container = $("<div class='img_container'></div>");

            if (main.find("input.default_img")) {
                main.find("input.default_img").each(function(p, img) {
                    gallery_container.append(set_gallery_img($(img).val()));
                });
            }
            main.html("");
            main.append(upload_input).append(loading).append(gallery_container);
            upload_input.fileupload({
                formData: {
                    // thumbnail_type: _settings.thumbnail_type,
                    thumbnail_size: arr_size
                },
                change: function(e, data) {
                    $(this).next().append('<span></span><i class="icon-spinner icon-spin"></i>');
                },
                beforeSend: function(e, data) {

                    data.formData = {
                        //可post
                    };
                },
                url: _settings.upload_url + 'gallery_file' + idx,
                sequentialUploads: true,
                dataType: 'json',
                done: function(e, data) {
                    console.log(data);

                    var json = data.result;
                    if (!json.error) {
                        gallery_container.append(set_gallery_img(json.file));
                    } else {
                        alert(json.error);
                    }
                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    console.log(progress);
                    $(this).next().find("span").html(progress + "%");
                    if (progress == 100) {
                        $(this).next().html("");
                    }
                },
                dropZone: null
            });
            gallery_container.sortable({
                placeholder: "sortable-placeholder"
            });
        });

    }
})(jQuery);
