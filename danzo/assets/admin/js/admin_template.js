;
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
                    if (_settings.sample_css != "" && idx == 0) {
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
