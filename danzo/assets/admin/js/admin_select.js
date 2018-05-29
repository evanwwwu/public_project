;
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
