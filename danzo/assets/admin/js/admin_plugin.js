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
 * 語系Tab
 * include: jqeury.min.js, jqeury-ui.min.js
 * 2015/01/30
 */
(function($) {
    $.fn.mylanguagesTab = function(settings) {
        var _defaultSettings = {
            path_url: 'aaa', //各語系內容資料路徑
            languages: [], //語系陣列
            surecce: function() {} //內容完成執行
        };

        var _settings = $.extend(_defaultSettings, settings);

        return this.each(function(idx) {
            var tab_div = $('<div class="languagesTab_' + idx + '"></div>'),
                ul = $("<ul></ul>"),
                edit_tab = "",
                callback = 0;
            $.each(_settings.languages, function(inx, lan) {
                ul.append('<li><a href="#_' + lan + '">&nbsp;&nbsp;&nbsp;' + lan.toUpperCase() + '&nbsp;&nbsp;&nbsp;</a></li>');
                edit_tab += '<div id="_' + lan + '" class="languageTab"></br></br><i class="icon-spinner icon-spin"></i></div>';
            });
            tab_div.append(ul).append($(edit_tab)).tabs();

            $.each(_settings.languages, function(inx, lan) {
                $.get(_settings.path_url + lan, function(data) {
                    callback++;
                    $("#_" + lan).append(data);
                    tab_div.tabs("refresh");
                    if (callback == _settings.languages.length) {
                        _settings.surecce();
                        $('.languagesTab_' + idx + '').find(".icon-spinner").remove();
                    }
                }, "html");

            });
            $(this).append(tab_div);
        });
    }
})(jQuery);
/*
 * 模板引入
 * include: jqeury.min.js, jqeury-ui.min.js,CKEDITOR,autosize.js
 * 2015/01/30
 */
(function($) {
    $.fn.myTemplate = function(methodOrOptions) {

        /*
         * init:設定
         * save: 轉換資料為json , arr: post原資料, columns : 儲存欄位名稱
         */
        var _arguments = arguments;
        return this.each(function(idx) {
            var _defaultSettings = {
                upload_url: '', // 圖片上傳路徑
                view_loader_url: '', // 抓取模版樣式路徑
                template_info: [], //模板樣式
                ckcss: '', // CKEDITOR css 導入
                sample_css: '',
            };
            var methods = {
                'init': function(options) {
                    var _settings = $.extend(_defaultSettings, options);
                    var _add_template = function(btn_instance) {
                        btn_instance.hide();
                        var language_index = btn_instance.parents('.languageTab').index() - 1,
                            template_container = btn_instance.parent().next(),
                            template_selected = btn_instance.parent().find('input[type="radio"]:checked').index('.my_template_toolbar:eq(' + language_index + ') input'),
                            view_id = btn_instance.parent().find('input[type="radio"]:checked').val(),
                            view = _settings.template_info[template_selected].view,
                            section_count = template_container.find('.section').length + 1;

                        $.post(_settings.view_loader_url, 'view_id=' + view_id + '&view=' + view + '&section_idx=' + section_count + '&rand=' + Math.random(), function(data) {
                            var section = $(data);
                            template_container.append(section);
                            _accordion(template_container);
                            _set_template_input(section)
                            btn_instance.show();
                        }, 'html');
                    }
                    var _accordion = function(instance) {
                        if (typeof instance.data("ui-accordion") != "undefined") {
                            instance.accordion("destroy");
                        }
                        instance.accordion({
                            header: "> div > h3",
                            collapsible: true,
                            autoHeight: false,
                            heightStyle: "content",
                            active: instance.find('.section').length - 1,
                            activate: function(event, ui) {
                                $(this).find('.template_text').attr('contenteditable', true);
                            }
                        }).sortable({
                            items: "div.section",
                            axis: "y",
                            handle: 'h3',
                            distance: 20,
                            scroll: false,
                            start: function(event, ui) {
                                var textareaId = ui.item.find('textarea').attr('id');
                                if (typeof textareaId != 'undefined') {
                                    var editorInstance = CKEDITOR.instances[textareaId];
                                    editorInstance.destroy();
                                    CKEDITOR.remove(textareaId);
                                }
                            },
                            stop: function(event, ui) {
                                var textareaId = ui.item.find('textarea').attr('id');
                                if (typeof textareaId != 'undefined') {
                                    //CKEDITOR.replace( textareaId );
                                }
                                _set_template_input(ui.item)
                            }
                        }).disableSelection;
                    }

                    var _set_template_input = function(section) {
                            //設定上傳
                            section.find('.template_img_upload').css('cursor', 'pointer').on('click', function() {
                                var target_img = $(this);
                                target_img.prev().fileupload({
                                        formData: {
                                            width: target_img.width()
                                        },
                                        change: function(e, data) {
                                            $(".icon-spinner").show();
                                            $(this).parent().append($('<i class="icon-spinner icon-spin"></i>'));
                                        },
                                        beforeSend: function(e, data) {},
                                        fileuploadsubmit: function(e, data) {},
                                        url: _settings.upload_url,
                                        sequentialUploads: true,
                                        dataType: 'json',
                                        done: function(e, data) {
                                            var json = data.result;
                                            if (!json.error) {
                                                var file_name = json.file;
                                                target_img.attr('src', json.img_url + json.file)
                                                target_img.prev().prev().val(json.file);
                                            } else {
                                                alert(json.error);
                                            }
                                            $(".icon-spinner.icon-spin").remove();
                                        },
                                        dropZone: null
                                    })
                                    .trigger('click');
                            });

                            //ck
                            var config = new Object();
                            config.toolbar = 'Basic';
                            config.extraPlugins = 'stylesheetparser';
                            config.extraPlugins = 'autogrow';
                            config.contentsCss = _settings.ckcss;
                            config.stylesSet = [];
                            config.autoGrow_minHeight = 300;
                            config.autoGrow_onStartup = true;
                            config.toolbar_Basic = [
                                ['Bold', 'Italic', 'Underline', 'FontSize'],
                                ['Link', 'Unlink'],
                                ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                                ['TextColor', 'BGColor']
                            ];

                            config.fontSize_sizes = '';
                            for (var s = 12; s <= 72; s = s + 1) {
                                var font = s + '/' + s + 'px;'
                                config.fontSize_sizes += font;
                            }
                            section.find('.template_text textarea.ckedit').each(function(cinx, text) {
                                $(text).attr("id", "template_text_" + idx + "_" + cinx);
                                $(text).ckeditor(function() {}, config);
                            });

                            section.find('a.del_template').on('click', function() {
                                if (confirm('確定要刪除樣板？') == false) return false;
                                var section = $(this).parents('.section');
                                //CKEDITOR要一併刪除
                                var textarea = section.find('textarea');
                                textarea.each(function() {
                                    var editorInstance = CKEDITOR.instances[$(this).attr('id')];
                                    editorInstance.destroy();
                                })
                                var template_container = section.parent();
                                section.remove();
                                _accordion(template_container);
                            });
                            $("textarea").autosize();
                        }
                        //設定template選項
                    var default_value = $(this).html();
                    $(this).empty();
                    var template_toolbar = $('<div class="my_template_toolbar"></div>');
                    $(this).append(template_toolbar);
                    for (key = 0; key < _settings.template_info.length; key++) {
                        var checked = '';
                        if (key == 0) checked = 'checked';
                        var input_radio = $('<input type="radio" name="myTemplate_radio_' + idx + '" value="' + _settings.template_info[key].id + '" ' + checked + '>');
                        var img = $('<img src="' + _settings.template_info[key].img + '">');
                        img.click(function() {
                            var inr = template_toolbar.find("img").index($(this));
                            $("input[type=radio][name=myTemplate_radio_" + idx + "][value=" + (inr + 1) + "]").click();
                        });
                        template_toolbar.append(input_radio).append(img);
                    }
                    var btn_add = $('<a class="pure-button">新增樣板</a>');
                    template_toolbar.append('<br>').append('<br>').append(btn_add);
                    if (_settings.sample_css != "" && idx==0) {
                        var style = $('<link href="' + _settings.sample_css + '" rel="stylesheet" type="text/css">');
                        template_toolbar.append(style);
                    }
                    btn_add.on('click', function() {
                        _add_template($(this));
                    })

                    //設定accordion
                    var template_container = $('<div class="my_template_accordion" style="margin:10px 0"></div>');
                    $(this).append(template_container);
                    template_container.append(default_value);
                    _accordion(template_container);
                    _set_template_input(template_container.find('.section'));
                },
                'save': function(arr, columns) {
                    $('.my_template_accordion').each(function(inx) {
                        var arr_content = [];
                        $(this).find('.section').each(function() {
                            var obj = {};

                            obj.view_id = $(this).find('input[name="view_id[]"]').val();

                            var textarea = $(this).find('textarea');
                            var arr_text = [];

                            textarea.each(function(idx) {
                                if (typeof(CKEDITOR.instances[$(this).attr("id")]) != "undefined") {
                                    arr_text[idx] = CKEDITOR.instances[$(this).attr('id')].getData();
                                } else {
                                    arr_text[idx] = $(this).val();
                                }
                                arr_text[idx] = arr_text[idx].replace(/\n/gi, "");
                                //arr_text[idx] = encodeURI(arr_text[idx]);
                            })
                            obj.text = arr_text;

                            var img = $(this).find('input[name="template_img[]"]')
                            var arr_img = [];
                            img.each(function(idx) {
                                arr_img[idx] = $(this).val();
                            })
                            obj.img = arr_img;

                            arr_content.push(obj);
                        });
                        var lan = $(this).parents("div.languageTab").attr("id").replace("_", "");
                        var json = JSON.stringify(arr_content);
                        arr.push({
                            name: columns + lan,
                            value: json
                        });
                    });
                    return arr;
                }
            };


            if (methods[methodOrOptions]) {
                return methods[methodOrOptions].apply(this, Array.prototype.slice.call(_arguments, 1));
            } else if (typeof methodOrOptions === 'object' || !methodOrOptions) {
                return methods.init.apply($(this), _arguments);
            } else {
                $.error(' myTemplate 不存在此方法：' + methodOrOptions);
            }
        });
    }
})(jQuery);
/*
 * 關聯式選擇
 * include: jqeury.min.js,
 * 2015/01/?
 */
(function($) {
    $.fn.myselectoption = function(settings) {
        var _arguments = arguments;
        return this.each(function(inx) {
            var _defaultSettings = {
                default_option: [], //已有的id
                select_path: ['aaa'],
                get_option_path: ["aaa"]
            };
            var _settings = $.extend(_defaultSettings, settings);
            var del_fun = function(del_btn, parent) {
                if (!confirm('確定刪除?')) return;
                var target = del_btn.parent(parent);
                target.remove();
            }
            var val_obj = function(x, data) {
                var sd = $('<div class="set' + x + '_item"></div>'),
                    sinp = $('<input name="set' + x + '_val[]" type="hidden" value="' + data.id + '">'),
                    sa = $('<a href="javascript:void(0)"></a>'),
                    dei = $('<i class="icon-trash"></i>');
                sa.click(function() {
                    del_fun($(this), '.set' + x + '_item');
                });
                sd.append(sinp).append(sa.append(dei)).append(data.showname);
                $("#myset_div" + x).append(sd);
            }

            var newpost = function(url, name, keys, values) {
                var width = 800;
                var height = 600;
                var left = parseInt((screen.availWidth / 2) - (width / 2));
                var top = parseInt((screen.availHeight / 2) - (height / 2));
                var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
                var newWindow = window.open(url, name, windowFeatures);
                newWindow.focus();
                if (!newWindow) {
                    return false;
                }
                var html = "";
                html += "<html><head></head><body><form id='formid' method='post' action='" + url + "'>";
                if (keys && values && (keys.length == values.length)) {
                    for (var i = 0; i < keys.length; i++) {
                        html += "<input type='hidden' name='" + keys[i] + "' value='" + values[i] + "'/>";
                    }
                }
                html += "</form><script type='text/javascript'>document.getElementById(\"formid\").submit()</script></body></html>";
                console.log(html);
                newWindow.document.write(html);
                return newWindow;
            }

            var methods = {
                'init': function() {
                    var no_set = false;
                    var select_btn = $(this);
                    var set_div = $('<div id="myset_div' + inx + '" class="myset"></div>');
                    $(this).data("get_url", _settings.get_option_path[inx]);
                    console.log(_settings.default_option);
                    if (_settings.default_option[inx].length > 0) {
                        no_set = true;
                        $(this).after('<i class="icon-spinner icon-spin s_load_' + inx + '"></i>');
                        $.post(_settings.get_option_path[inx], {
                            "ids": $.parseJSON(JSON.stringify(_settings.default_option[inx]))
                        }, function(result) {
                            console.log(result);
                            $.each(result, function(rinx, obj) {
                                val_obj(inx, obj);
                            });
                            $(".s_load_" + inx).remove();
                            no_set = false;
                        }, "json");
                    }
                    $(this).after(set_div);
                    select_btn.click(function() {
                        if (no_set) return false;
                        var ja = [];
                        $("#myset_div" + inx).find(".set" + inx + "_item>input").each(function(x, input) {
                            // console.log(input.val());
                            ja.push($(input).val());
                        });
                        console.log(JSON.stringify(ja));
                        newpost(_settings.select_path[inx] + "/" + inx, $(this).attr("class"), ["ids"], [JSON.stringify(ja)]);
                    });
                },
                'updata': function(id, get_option_path, set_no, check) {
                    var url = get_option_path;
                    var div = $("#myset_div" + set_no);
                    if (check) {
                        if (div.find(".set" + set_no + "_item>input[value='" + id + "']").length <= 0) {
                            $.ajaxSetup({
                                async: false
                            });
                            $.post(url, {
                                "ids": $.parseJSON(id)
                            }, function(result) {
                                console.log(result);
                                val_obj(set_no, result[0]);
                                $.ajaxSetup({
                                    async: true
                                });
                            }, "json");
                        }
                    } else {
                        $(".set" + set_no + "_item").find("input[value='" + id + "']").parent().remove();
                    }
                }
            }

            if (methods[settings]) {
                return methods[settings].apply(this, Array.prototype.slice.call(_arguments, 1));
            } else if (typeof settings === 'object' || !settings) {
                return methods.init.apply($(this), _arguments);
            } else {
                $.error(' myselectoption 不存在此方法：' + settings);
            }

        });

    }
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
            img_size: [], //圖片resize 尺寸
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
