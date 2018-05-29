;
/*
 * 購物車
 * include: jqeury.min.js,
 * 2015/02/15
 */
(function($) {
    $.fn.MyshoppingCar = function() {
        var _defaultSettings = {
            item: 'aaa', //商品區塊
            ajax_path: 'aaa', //執行session路徑
            add_button: 'add_btn', //增加鈕
            num_button: null, //數量選項
        	car_content:'car_detail',//放置購物車區塊
        };
        var _settings = $.extend(_defaultSettings, settings);
        return this.each(function(inx){
            
        });
    }
});
