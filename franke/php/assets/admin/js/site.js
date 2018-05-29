var uploaded = 0;
var img_url = "http://127.0.0.1/www/franke/";
var edit_view = {
    init: function() {
        edit_view.menu_click();
        $('.date_ui').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
        $("textarea").autosize();
    },
    menu_click: function() {
        var menu = document.getElementById('menu'),
        menuLink = document.getElementById('menuLink'),
        layout = document.getElementById('layout'),
        toggleClass = function(element, className) {
            var classes = element.className.split(/\s+/),
            length = classes.length,
            i = 0;
            for (; i < length; i++) {
                if (classes[i] === className) {
                    classes.splice(i, 1);
                    break;
                }
            }
                // The className is not found
                if (length === classes.length) {
                    classes.push(className);
                }
                element.className = classes.join(' ');
            };

            menuLink.onclick = function(e) {
                e.preventDefault();
                var active = 'active';
                toggleClass(layout, active);
                toggleClass(menu, active);
            };
        },
        ckedit: function(obj, css,width) {
            width = width || "1180";
            var today = new Date();
            var config = new Object();
            config.toolbar = 'Basic';
        //跨網域
        // config.filebrowserImageUploadUrl = img_url + 'accounts/ckupload/upload/&backurl='+img_url + 'accounts/cktool';
        config.filebrowserImageUploadUrl = img_url + 'admin/accounts/ckupload/upload/';
        config.extraPlugins = 'stylesheetparser';
        config.extraPlugins = 'mediaembed';
        // config.extraPlugins = 'autogrow';
        config.contentsCss = css;
        config.stylesSet = [];
        config.height = 500;
        config.autoGrow_onStartup = true;
        config.toolbar_Basic = [
        ['Source'],
        ['Format'],
        ['Bold', 'Italic', 'Underline', 'FontSize'],
        ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'],
        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
        ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Link', 'Unlink'],
        ['TextColor', 'BGColor'],
        ["Maximize"],
        ['Image', 'MediaEmbed', 'Table', 'HorizontalRule', 'SpecialChar']
        ];
        $(obj).ckeditor(function() {}, config);
    },
    cover_img: function(addr, obj, min, max, ratio) {
        var jcrop_api;
        var obj_id = obj;
        var obj = $("#" + obj);
        obj.find('input[type=file]').fileupload({
            change: function(e, data) {
                obj.find('.cover_loading').html('<i class="icon-spinner icon-spin"></i>');
            },
            beforeSend: function(e, data) {
                data.formData = {
                    brand_id: $("select[name=brand_id] option:selected").val()
                };
            },
            url: addr + '/upload/' + obj_id + '_img',
            sequentialUploads: true,
            dataType: 'json',
            done: function(e, data) {
                var json = data.result;
                if (!json.error) {
                    edit_view.showimg(json.file, obj, min, max, ratio);
                    var site_width = json.image_width;
                    edit_view.save_img(addr, obj_id, site_width);
                    obj.find('.cover_loading').empty();
                } else {
                    alert(json.error);
                }
            },
            dropZone: null
        });
    },
    save_img: function(addr, obj_id, site_width) {
        var obj = $("#" + obj_id);
        $("#save_img").unbind('click').bind('click', function() {
            var brand_id = $("select[name=brand_id] option:selected").val();
            var d = $("#crop_val").val() + "&file=" + $("#file_val").val() + "&brand_id=" + brand_id;
            var img_ratio = site_width / $(".jcrop-holder").width();
            var post_add = addr + "/crop?ra=" + img_ratio;
            switch (obj_id) {
                default: post_add = addr + "/crop/?ra=" + img_ratio;
                break;
            }
            if (obj)
                $.post(post_add, d, function(data) {
                    if (!data.error) {
                        // console.log(obj);
                        var ht = '<br><img src="' + img_url + 'upload/' + data.file + '" style="border:1px solid #cccccc"><a href="javascript:void(0)" onclick="edit_view.delete_img($(this))"><i class="icon-trash"></i>DELETE</a><br><br><input type="hidden" name="' + obj_id + '_img" value="' + data.file + '">';
                        obj.find(".cover_preview").html(ht);
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
    $("#img_crop").hide();
    $('#img_crop img').attr("src", "");
    $("#file_val").val();
    jcrop_api.destroy();
    $("#crop_site").attr("style", "max-width:none;");
});
},
cover_img2: function(addr, obj, min, max, ratio) {
    var jcrop_api;
    var obj_id = obj;
    var obj = $("#" + obj);
    obj.find('input[type=file]').fileupload({
        change: function(e, data) {
            obj.find('.cover_loading').html('<i class="icon-spinner icon-spin"></i>');
        },
        beforeSend: function(e, data) {
            data.formData = {
                brand_id: $("select[name=brand_id] option:selected").val()
            };
        },
        url: addr + '/upload/' + obj_id + '_img',
        sequentialUploads: true,
        dataType: 'json',
        done: function(e, data) {
            var json = data.result;
            if (!json.error) {
                edit_view.showimg(json.file, obj, min, max, ratio);
                var site_width = json.image_width;
                edit_view.save_img2(addr, obj_id, site_width);
                obj.find('.cover_loading').empty();
            } else {
                alert(json.error);
            }
        },
        dropZone: null
    });
},
save_img2: function(addr, obj_id, site_width) {
    var obj = $("#" + obj_id);
    $("#save_img").unbind('click').bind('click', function() {
        var brand_id = $("select[name=brand_id] option:selected").val();
        var d = $("#crop_val").val() + "&file=" + $("#file_val").val() + "&brand_id=" + brand_id;
        var img_ratio = site_width / $(".jcrop-holder").width();
        var post_add = addr + "/crop2?ra=" + img_ratio;
        switch (obj_id) {
            default: post_add = addr + "/crop2/?ra=" + img_ratio;
            break;
        }
        if (obj)
            $.post(post_add, d, function(data) {
                if (!data.error) {
                        // console.log(obj);
                        var ht = '<br><img src="' + img_url + 'upload/' + data.file + '" style="border:1px solid #cccccc"><a href="javascript:void(0)" onclick="edit_view.delete_img($(this))"><i class="icon-trash"></i>DELETE</a><br><br><input type="hidden" name="' + obj_id + '_img" value="' + data.file + '">';
                        obj.find(".cover_preview").html(ht);
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
    $("#img_crop").hide();
    $('#img_crop img').attr("src", "");
    $("#file_val").val();
    jcrop_api.destroy();
    $("#crop_site").attr("style", "max-width:none;");
});
},
showimg: function(file, obj, min, max, ratio) {
    $("#img_crop").show();
    $('#img_crop img').attr("src", img_url + "upload/" + file);
    $("#file_val").val(file);
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
        if (min != '') {
            jcrop_api.setOptions({
                minSize: min,
                setSelect: [min[0], min[1], 0, 0]
            });
        }
        if (max != '') {
            jcrop_api.setOptions({
                maxSize: max
            });
        }
        if (ratio != '') {
            jcrop_api.setOptions({
                aspectRatio: ratio
            });
            jcrop_api.setSelect([0,0,$('#img_crop img').width(),$('#img_crop img').height()/ratio]);
        }
        else{
            jcrop_api.setSelect([0,0,$('#img_crop img').width(),$('#img_crop img').height()]);
        }
    });

    function showCoords(c) {
        var c_val = "width=" + c.w + "&height=" + c.h + "&x=" + c.x + "&y=" + c.y;
        $("#crop_val").val(c_val);
    }
},
delete_img: function(obj) {
    if (!confirm('刪除?')) return;
    var target = obj.parent();
    target.empty();
},
gallery_img: function(addr, obj) {
    var obj_id = obj;
    var obj = $("#" + obj_id);
    obj.find('input[type=file]').fileupload({
        change: function(e, data) {
            $.each(data.files, function(index, file) {
                obj.find('.gallery').append('<div id="' + obj_id + '_temp_' + (uploaded + index) + '" class="gallery_img"><div class="loading"><i class="icon-spinner icon-spin"></i><br><span></span></div></div>');
            })
        },
        beforeSend: function(e, data) {
            data.formData = {
                brand_id: $("select[name=brand_id] option:selected").val()
            };
        },
        url: addr + "/gallery_upload/" + obj_id + "_file",
        sequentialUploads: true,
        dataType: 'json',
        done: function(e, data) {
            $('#' + obj_id + '_temp_' + uploaded).html('<img src="' + img_url + 'upload/' + data.result.file + '" style=""><br><a href="javascript:void(0)" onclick="edit_view.delete_img_gallery($(this))"><i class="icon-trash"></i>DELETE</a><input type="hidden" name="' + obj_id + '_img[]" value="' + data.result.file + '">');
            uploaded++;
        },
        dropZone: null,
        progress: function(e, data) {
            $.each(data.files, function(index, file) {
                    //console.log(file.name);
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#' + obj_id + '_temp_' + uploaded).find('span').html(progress + "%")
                });
        }
    });
edit_view.gallery_sort(obj);
},
gallery_sort: function(obj) {
    obj.find('.gallery').sortable({
        placeholder: "sortable-placeholder"
    });
},
delete_img_gallery: function(obj) {
    if (!confirm('確定刪除?')) return;
    var target = obj.parent();
    target.remove();
},
form_set: function(obj, addr, beforesubmit) {
    edit_view.init();
    obj.ajaxForm({
        forceSync: true,
        beforeSubmit: beforesubmit,
        url: addr,
        type: 'post',
        dataType: 'script'
    });
}
}

///////list_view //////////


var list_view = {
    init: function() {

    },
    publish: function(obj, addr) {
        var q = "id=" + obj.attr('value');
        if (obj.prop("checked")) {
            q += "&publish=1"
        } else {
            q += "&publish=0"
        }
        $.post(addr, q, null, 'script');
    },
    del: function(id, addr) {
        if (!confirm('確認刪除?')) return;
        $.post(addr, 'id=' + id, null, 'script');
    },
    sort: function(addr) {
        $('tbody').sortable({
            handle: ".icon-move",
            items: "tr:not(.top)",
            placeholder: "sortable-placeholder",
            start: function(event, ui) {
                $('.sortable-placeholder').append('<td colspan="20">&nbsp;</td>')
            },
            stop: function(event, ui) {
                var q = '';
                $('.icon-move').each(function(index, element) {
                    q += '&id[]=' + $(this).attr('value');
                });
                $.post(addr, q)
            }
        });
    }
}
    ///個別專案需求
    var project = {
    }
