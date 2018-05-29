;
/*
 * List頁編輯
 * include: jqeury.min.js
 * 2015/03/14
 */
 (function($) {
    $.fn.Mylistedit = function(settings) {
        var _defaultSettings = {
            main_obj:"main_obj",
            default_data:"default_data", //預設資料
            edit_btn:"edit_btn", //編輯按鈕
            remove_btn:"remove_btn",  //刪除按鈕
            add_btn:"",
            save_url:"", //儲存位置
            del_url:"", //刪除位置
            main_ele:"",
            surecce: function() {} //送出前執行
        };

        var _settings = $.extend(_defaultSettings, settings);
        return this.each(function(idx) {

            var edit_div = $('<div class="edit_div"></div>')
            ,main_obj = $("."+_settings.main_obj)
            ,data_key = main_obj.attr("data-key")
            ,input_div = $('<input name="key" type="hidden" value="'+data_key+'">')
            ,save_btn = $('<a class="pure-button notice">儲存</a>')
            ,close_btn = $('<a class="pure-button">取消</a>');
            edit_div.append(input_div);
            var hide = main_obj.attr("data-hide").split(",");
            var hide_data = main_obj.attr("data-hidedata").split(",");
            var _close = function(){
                main_obj.find("."+_settings.default_data).show();
                main_obj.find(edit_div).hide();
            }
            var _save_fu = function(){
                var json;
                var val_inx = 0;
                main_obj.find(edit_div).find("input").each(function(ix,obj){
                    var name = $(obj).attr("name"),
                    val = $(obj).val();
                    if(ix!=0){
                        json += ',"'+name+'":"'+val+'"';
                    }
                    else{
                        json = '"'+name+'":"'+val+'"';
                    }
                    if($(obj).attr("type")=="text"){
                        main_obj.find("."+_settings.default_data).eq(val_inx).html(val);
                        val_inx++;
                    }
                });
                json = "{"+json+"}";
                json = jQuery.parseJSON(json);
                $.post(_settings.save_url,json,function(){
                    _settings.surecce;
                },'script');
                _close();
            }
            var _edit_fu = function(){
                main_obj.find("."+_settings.default_data).hide();
                main_obj.find(edit_div).show();
            }
            var _remove_fu = function(){
                if (!confirm('刪除?')) return;
                $.post(_settings.del_url+data_key,null,function(){
                    main_obj.remove();
                },"script");
            }
            main_obj.find("."+_settings.edit_btn).click(function(e){
                e.preventDefault();
                _edit_fu();
            });

            main_obj.find("."+_settings.remove_btn).click(function(e){
                e.preventDefault();
                _remove_fu();
            });

            save_btn.click(function(){_save_fu()});
            close_btn.click(function(){_close();});

            $.each(hide,function(x,col){
                edit_div.append('<input name="'+col+'" type="hidden" value="'+hide_data[x]+'">');
            });
            $.each(main_obj.find("."+_settings.default_data),function(inx,obj){
                obj = $(obj);
                var title = obj.attr("data-title")
                ,col = obj.attr("data-col")
                ,val = obj.html();
                title = (title==""||title ==undefined)?"":title+":";
                edit_div.append(title+'<input name="'+col+'" type="text" value="'+val+'">');
            });

            edit_div.append(save_btn).append(close_btn).hide();
            main_obj.append(edit_div);
        });
}
})(jQuery);