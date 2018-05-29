/* 標籤滑動感測
 * include: jqeury.min.js
 * 2015/06/918
 */
;
(function($) {
    $.fn.navscroll = function(settings) {
        var _defaultset = {
            easing: "linear",
            sec: 500,
            url_hash: false, //IE9 +
            head_hight: 0 //px
        }
        var wait = false;
        var anchor = [];
        var _settings = $.extend(_defaultset, settings);

        var animate_scroll = function(scrolltop) {
            $('html, body').stop().animate({
                scrollTop: scrolltop - _settings.head_hight
            }, _settings.sec, _settings.linear);
        }
        var scroll_event = function($ele) {
            $(window).on("scroll", function() {
                wait = true;
                for (var x = 0; x < anchor.length; x++) {
                    var anchor_id = anchor[x].anchor;
                    if ($(window).scrollTop() >= $(document).find("[data-anchor=" + anchor_id + "]").offset().top - _settings.head_hight && $(window).scrollTop() < $(document).find("[data-anchor=" + anchor_id + "]").offset().top + $(document).find("[data-anchor=" + anchor_id + "]").height() - _settings.head_hight) {
                        if ($ele.children(".on").data("nav") != anchor[x].anchor) {
                            // location.hash = anchor[x].anchor;
                            $ele.children().removeClass("on");
                            $ele.children().eq(x).addClass("on");
                        }
                        break;
                    }
                    if (x == anchor.length - 1) {
                        $ele.children().removeClass("on");
                    }
                }
                wait = false;
            });
        }
        if (_settings.url_hash) {
            var hash = location.hash.replace("#", "");
            if ("onhashchange" in window) {
                $(window).bind('hashchange', function(e) {
                    e.preventDefault();
                    hash = location.hash.replace("#", "")
                    if (!wait) {
                        animate_scroll($(document).find("[data-anchor=" + hash + "]").offset().top);
                    }
                    return false;
                });
            }
            if (hash != "" && $(document).find("[data-anchor=" + hash + "]").length > 0) {
                animate_scroll($(document).find("[data-anchor=" + hash + "]").offset().top);
            }
        }
        return this.each(function(idx) {
            var main_obj = $(this);
            var child = $(this).children();
            child.each(function(inx) {
                var anchor_id = $(this).data("nav");
                if(anchor_id !== undefined && anchor_id!=""){
                $(this).click(function() {
                    wait = true;
                    var div_top = ($(document).find("[data-anchor=" + anchor_id + "]").length > 0) ? $(document).find("[data-anchor=" + anchor_id + "]").offset().top : 0;

                    // location.hash = anchor_id;
                    $('html, body').stop().animate({
                        scrollTop: div_top - _settings.head_hight
                    }, _settings.sec, _settings.linear, function() {
                        wait = false;
                    });
                });
                obj_data = {
                    anchor: anchor_id,
                    // top: div_top - _settings.head_hight,
                    // bottom: div_top  - _settings.head_hight + $(document).find("[data-anchor="+anchor_id+"]").height()
                }
                anchor.push(obj_data);
              }
            });
            scroll_event($(this));
        });
    }
})(jQuery);

$(function() {
    var mobile = "tuf";
    var main = {
        init: function() {
            this.warp_size();
            this.mobile_menu();
            this.scroll_animate();
            this.contorl_btn();
            this.bios_control();
            this.brighten_set();
            if ($(window).width() > 768) {
                if (isFlashSupported()) {
                    $(".ddr_main").find(".main").css({
                        "visibility": "hidden"
                    });
                } else {
                    $(".ddr_main").find("object").hide();
                }
            }
            $("#b2top").click(function() {
                $('html, body').stop().animate({
                    scrollTop: 0
                });
            });
            $(".videolink").asus_video($("#" + mobile + "-warp"));
            $("#overview-aside-nav ul").navscroll({
                sec: 1000,
                url_hash: false,
                head_hight: 60
            });
            $("#" + mobile + "-main .mainnav").navscroll({
                sec: 1000,
                url_hash: false,
                head_hight: 60
            });
            $("#" + mobile + "-control .control_bar").css({
                "top": $("#" + mobile + "-control .mainwarp .on .con_detail").height() + 120 + ((690 - $("#" + mobile + "-control .mainwarp .on .con_detail").height()) / 2)
            });
             $('#colorpicker1').farbtastic({ callback: '#color1', width: 190 });
        },
        resize: function() {
            this.warp_size();
            this.mobile_menu();
            $("#" + mobile + "-control .control_bar").css({
                "top": $("#" + mobile + "-control .mainwarp .on .con_detail").height() + 120 + ((690 - $("#" + mobile + "-control .mainwarp .on .con_detail").height()) / 2)
            });
        },
        brighten_set:function(){
          var brighten = $(".brighten");
          brighten.find(".i_btn").click(function(){
            if (!$(this).hasClass("on")) {
              brighten.find(".i_btn").removeClass("on");
              $(this).addClass("on");
              var status = $(this).data("status");
              $("#color1").attr("class","");
              $("#color1").addClass("status_"+status);
            }
          });
        },
        warp_size: function() {
            $("#" + mobile + "-warp").css({
                width: $(window).width(),
                "margin-left": ($("#special-sectionOverview, #sectionOverview").width() - $(window).width()) / 2
            });
            // $("#z170-ddr4").find(".bg").css({"padding-top":$("#z170-ddr4 .dtxt").height()});
        },
        mobile_menu: function() {
            if ($(window).width() <= 768) {
                $(window).scroll(function() {
                    if ($(window).width() <= 768) {
                        var ws = $(window).scrollTop();
                        var mt = $("#" + mobile + "-warp").offset().top;
                        if (ws > mt) {
                            $("#" + mobile + "-main").css({
                                position: "fixed",
                                top: $("#overview-top-nav").height()
                            });
                        } else {
                            $("#" + mobile + "-main").css({
                                position: "relative",
                                top: 0
                            });
                        }
                    }
                });
                $(".mobile_nav>.m_btn").unbind("click");
                $(".mobile_nav>.m_btn").click(function() {
                    $(".mainnav").slideToggle();
                });
                $(".mainnav>.znav").unbind("click");
                $(".mainnav>.znav").click(function() {
                    $(".mainnav").slideToggle();
                });
            } else {
                $("#" + mobile + "-main").removeAttr("style");
                $(".mainnav").show();
            }
        },
        contorl_btn: function() {
            var citem = $(".cs>.citem");
            var cdetail = $(".details>.c_detail");
            citem.each(function(inx) {
                $(this).click(function() {
                    clear_cl(inx);
                    check_inx();
                });
            });
            var is = $(".details");
            is.find(".arr_pre").click(function() {
                var ix = is.find(".c_detail").index(is.find(".c_detail.on"));
                console.log(ix);
                clear_cl(ix - 1);
                check_inx();
            });
            is.find(".arr_next").click(function() {
                var ix = is.find(".c_detail").index(is.find(".c_detail.on"));
                console.log(ix);
                clear_cl(ix + 1);
                check_inx();
            });
            check_inx = function() {
                var ix = is.find(".c_detail").index(is.find(".c_detail.on"));
                if ($(window).width() > 768 || 1) {
                    if (ix == 0) {
                        is.find(".arr_pre").hide();
                    } else {
                        is.find(".arr_pre").show();
                    }
                    if (ix == 5) {
                        is.find(".arr_next").hide();
                    } else {
                        is.find(".arr_next").show();
                    }
                }
            }
            clear_cl = function(inx) {
                citem.removeClass("on");
                cdetail.removeClass("on");
                citem.eq(inx).addClass("on");
                cdetail.eq(inx).addClass("on");
            }
        },
        scroll_animate: function() {
            $(window).scroll(function() {
                var w = window.innerHeight;
                var anim_lan = $(".anim").length;
                for (var x = 0; x < anim_lan; x++) {
                    if ($(window).scrollTop() > $(".anim").eq(x).offset().top - (w / 4)) {
                        $(".anim").eq(x).addClass('on');
                        if ($(".anim").eq(x).find(".kgs").length > 0) {
                            if (!$(".knum").is(".move")) {
                                $(".knum").addClass("move").countTo({
                                    form: 0,
                                    to: 10,
                                    speed: 1000
                                });
                            }
                        }
                    }
                }
            });
        },
        bios_control: function() {
            var pd = 25;
            var win_w = $(window).width();
            var s_content = $(".listshow");
            if (win_w > 768) {
                $(".bios_list").width($(window).width() / 2);
                s_content.width(($(".bios_list").width() + pd * 2) * 4);
                $(".controlbar").slider({
                    min: 1,
                    max: 99,
                    value: 50,
                    animate: true,
                    stop: function(event, ui) {
                        var sbar = $(this);
                        var inx = (Math.ceil(ui.value / 33));
                        switch (inx) {
                            case 1:
                                var sval = 1;
                                break;
                            case 2:
                                var sval = 49;
                                break;
                            case 3:
                                var sval = 99;
                                break;
                        }
                        $(this).find(".ui-slider-handle").animate({
                            "left": sval + "%"
                        }, 500, function() {
                            change_list(inx, Math.ceil(sbar.data("old") / 33));
                            sbar.slider("value", sval);
                            sbar.data("old", sval);
                        });
                    }
                }).data("old", 49);
                $('.listshow').css({
                    "margin-left": -($('.listshow').width() - win_w) / 2
                });
            } else {
                $(".bios_list").width($(window).width() - (pd * 2));
                $('.listshow').width(($(".bios_list").width() + pd * 2) * 4);
                $(".controlbar").slider({
                    min: 1,
                    max: 100,
                    value: 1,
                    animate: true,
                    stop: function(event, ui) {
                        var sbar = $(this);
                        var inx = (Math.ceil(ui.value / 25));
                        switch (inx) {
                            case 1:
                                var sval = 1;
                                break;
                            case 2:
                                var sval = 33;
                                break;
                            case 3:
                                var sval = 66;
                                break;
                            case 4:
                                var sval = 100;
                                break;
                        }
                        $(this).find(".ui-slider-handle").animate({
                            "left": sval + "%"
                        }, 500, function() {
                            change_list(inx, Math.ceil(sbar.data("old") / 25));
                            sbar.slider("value", sval);
                            sbar.data("old", sval);
                        });
                    }
                }).data("old", 1);
                $(".bios_list").removeClass("active");
                $(".bios_list").eq(0).addClass("active");
            }
            var change_list = function(value, old) {
                $(".bios_list").removeClass('active');
                $(".bios_list").eq(value - 1).addClass("active");
                $(".bios_list").eq(value).addClass("active");
                $(".listshow").animate({
                    "margin-left": "+=" + (old - value) * ($(".bios_list").width() + pd * 2)
                });
            }
        }
    }

    function isFlashSupported() {
        if (window.ActiveXObject) {
            try {
                if (new ActiveXObject('ShockwaveFlash.ShockwaveFlash'))
                    return true;
            } catch (e) {}
        }

        return navigator.plugins['Shockwave Flash'] ? true : false;
    }
    main.init();
    $(window).resize(function() {
        main.resize();
        // location.reload();
    });

    	var minWidth = 1020,
    		maxWidth = 1400,
    		win = $(window),
    		sw = $(this).width();

    	win.on( 'resize.hackBootstrap', function() {
    		//var w = Math.max( minWidth, Math.min( maxWidth, $(this).width() ) );
    		sw = win.width();

    		var	w = sw;//App.responsive ? sw : Math.max( minWidth, sw );

    		//console.log( w );
    		$( '#mWrap' ).css( {
    			'margin-left'	: ( $( '#special-sectionOverview, #sectionOverview' ).width() - w ) / 2,
    			'width'			: w
    		});

    		avoidBleedScroll();

    		// Avoid incident horizontal scroll
    		$( 'html' ).css( 'overflow-x', sw > minWidth?'hidden':'' );
    	})
    	.trigger( 'resize.hackBootstrap' );

    	if( $.scrollTo ) {
    		win.on( 'scroll.hackBootstrap', function() {
    			if( sw > minWidth )
    			avoidBleedScroll();
    		});
    	}

    	avoidBleedScroll();

    	function avoidBleedScroll() {
    		win.scrollTop(0,{duration:0,axis:'x'});
    	}



    	if( !/asus\.com/.test( window.location.hostname ) ) { // remove '/' in img path to preview webpage correctly in local
    		$( '#mWrap img' ).each( function() {
    			var src = $( this ).attr( 'src' );
    			if( src.indexOf( '/' ) == 0 )
    				$( this ).attr( 'src' , src.slice( 1 ) );
    		});
    	}

});
