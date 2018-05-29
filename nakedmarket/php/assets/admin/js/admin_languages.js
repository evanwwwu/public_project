;
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