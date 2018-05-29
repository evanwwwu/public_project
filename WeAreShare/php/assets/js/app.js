var winWidth = $(window).outerWidth();
var winHeight = $(window).outerHeight();
var headerH = $('.header').outerHeight();

var indexSlider, indexVideoSlider, articleRecommendSlider, articleVideoSlider,articleVideoThumbSlider;

function windowResizeHandle() {
    $(window).on('resize', function () {
        // console.log('resize');
        winWidth = $(window).outerWidth();
        winHeight = $(window).outerHeight();
        headerH = $('.header').outerHeight();
        // console.log(winHeight, headerH);
        $('.index__slider').find('li').css({
            'height': winHeight - headerH
        });
        $('.article__slider').find('.slider__cover').css({
            'height': winHeight - headerH
        })
        // set article video thumb slide width
        if($('.article__video').length > 0){
            var articleVideoWidth = $('.video-slider').width();
            var liWidth = articleVideoWidth / 5;
            console.log(articleVideoWidth,liWidth);
            $('.article__video').find('.thumb li').css({
                'width': liWidth
            })
        }
        
    })
}

function indexSlide() {
    if ($('.index__slider')) {
        $('.index__slider').find('li').css({
            'height': winHeight - headerH
        })
        indexSlider = $('.index__slider').find('ul').bxSlider({
            mode: 'fade',
            pager: false,
            controls: true,
            auto: true,
            autoStart: true,
            preloadImages: 'all',
            onSliderLoad: function (currentIndex) {
                $(".index__slider").addClass('is-loaded');
                $('.index__slider').find('li').eq(currentIndex).addClass('is-current');
            },
            onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                $('.index__slider').find('li').removeClass('is-current');
                $('.index__slider').find('li').eq(currentSlideHtmlObject).addClass('is-current');
            }
        });
    }
}

function indexVideoSlide() {
    if ($('.index__video')) {
        indexVideoSlider = $('.index__video .list').find('ol').bxSlider({
            pager: false,
            controls: false,
            infiniteLoop: false,
            onSliderLoad: function (currentIndex) {
                var currentVideoImage = $('.index__video').find('li').eq(currentIndex).find('.cover > img').attr('src');
                $('.index__video').find('.background').css({
                    'background-image': 'url(' + currentVideoImage + ')',
                });

                $('.index__video').find('.thumb li').eq(currentIndex).addClass('is-current');

                videoThumb();
            },
            onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                var currentVideoImage = $('.index__video').find('li').eq(currentSlideHtmlObject).find('.cover > img').attr('src');
                $('.index__video').find('.background').css({
                    'background-image': 'url(' + currentVideoImage + ')',
                });
                $('.index__video').find('.thumb li').removeClass('is-current');
                $('.index__video').find('.thumb li').eq(currentSlideHtmlObject).addClass('is-current');
                $('.index__video').find('.iframe').each(function () {
                    $(this).empty();
                })
            }
        });
        function videoThumb() {
            // console.log('aaa');
            $('.index__video').find('.thumb li').on('click', function () {
                var eq = $(this).index();
                indexVideoSlider.goToSlide(eq);
                // $('.index__video').find('.iframe').each(function() {
                //     $(this).empty();
                // })
            })
        }
    }
}

function articleSlider() {
    /* image slide */
    if ($('.article__slider')) {
        $('.article__slider').find('.slider__cover').css({
            'height': winHeight - headerH + 15
        })
        $('.article__slider').find('ul').bxSlider({
            pager: false,
            minSlides: 3,
            maxSlides: 8,
            slideWidth: 70,
            slideMargin: 5,
            infiniteLoop: false,
            onSliderLoad: function (currentIndex) {
                console.log('on loaded');
            },
            onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                console.log('on slide');
            }
        })
    }
        /* video slide */
    if ($('.article__video')) {
        articleVideoSlider = $('.article__video').find('.slider').bxSlider({
            pager: false,
            infiniteLoop: false,
            onSliderLoad: function (currentIndex) {
                $('.article__video').find('.thumb li').eq(currentIndex).addClass('is-current');
                videoThumb();
            },
            onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                var currentVideoImage = $('.index__video').find('li').eq(currentSlideHtmlObject).find('.cover > img').attr('src');
                console.log(currentSlideHtmlObject);
                if(currentSlideHtmlObject > 4) {
                    console.log('next');
                    articleVideoThumbSlider.goToNextSlide();
                } else {
                    articleVideoThumbSlider.goToPrevSlide();
                }
                $('.article__video').find('.thumb li').removeClass('is-current');
                $('.article__video').find('.thumb li').eq(currentSlideHtmlObject).addClass('is-current');
                $('.article__video').find('.iframe').each(function () {
                    $(this).empty();
                })
            }
        })

        articleVideoThumbSlider = $('.article__video').find('.thumbSlider').bxSlider({
            pager: false,
            infiniteLoop: false,
            controls: false,
            touchEnabled: false,
            slideWidth: 5000,
            minSlides: 5,
            maxSlides: 5,
            responsive: false,
            onSliderLoad: function (currentIndex) {
                // var slide_count = articleVideoThumbSlider.getSlideCount();
                var slide_count = $('.article__video').find('.thumbSlider li').length;
                // console.log(slide_count);
                if(slide_count < 5){
                    var videoWidth = $('.video-slider').width();
                    var liWidth = videoWidth / 5;
                    $('.article__video').find('.thumb li').css({
                        'width': liWidth
                    })
                }
            },
            onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {

            }
        })
        function videoThumb() {
            // console.log('aaa');
            $('.article__video').find('.thumb li').on('click', function () {
                var eq = $(this).index();
                articleVideoSlider.goToSlide(eq);
                // $('.article__video').find('.iframe').each(function () {
                //     $(this).empty();
                // })
            })
        }
    }
}

function articleRecommendHandler() {
    /* recommend slide */
    // console.log(winWidth);
    if ($('.article__recommend')) {
        var sliderNum, slideWidth, slideMargin;
        if (winWidth < 768) {
            slideNum = 1;
            slideWidth = 767;
            slideMargin = 10;
        } else {
            slideNum = 3;
            slideWidth = 223;
            slideMargin = 30;
        }
        // console.log(slideNum, slideWidth);
        articleRecommendSlider = $('.article__recommend').find('.slider').bxSlider({
            pager: false,
            minSlides: slideNum,
            maxSlides: slideNum,
            slideWidth: slideWidth,
            slideMargin: slideMargin,
            onSliderLoad: function (currentIndex) {
                console.log('on loaded');
            },
            onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                console.log('on slide');
            }
        })
    }
}

function menuToggle() {
    $('.menu-toggle').on('click', function () {
        $('body').toggleClass('menu-open');
    })
}


function tabFunction() {
    var _showTab = 0;
    var $defaultLi = $('.tabs li').eq(_showTab).addClass('is-current');
    $($defaultLi.find('a').attr('href')).siblings().hide();
    $('.tabs').find('li').on('click', function () {
        var $this = $(this),
            _clickTab = $this.find('a').attr('href');
        $this.addClass('is-current').siblings('.is-current').removeClass('is-current');
        $(_clickTab).stop(false, true).fadeIn().siblings().hide();
        return false;
    }).find('a').focus(function () {
        this.blur();
    })
}

function videoHandler() {
    var currentURL = window.location.pathname;

    // index video
    if ($('.index__video')) {
        $('.index__video').find('a').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var em = $(this).find('.iframe');
            appendVideo(url, em);
        })
    }

    // article page
    if ($('.article__video')) {
        $('.article__video').find('a').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var em = $(this).find('.iframe');
            appendVideo(url, em);
        })
    }

    // video page
    if ($('.video__top') || $('.video__list')) {
        $('.video__top').on('click', 'a', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var em = $(this).find('.iframe');
            appendVideo(url, em);
        });

        $('.video__list').find('li').on('click', 'a', function (e) {
            e.preventDefault();
            $(".iframe").empty();
            var url = $(this).attr('href');
            $('.popup__video').addClass('is-open');
            history.pushState(url, '', url);
            loadVideo(url);
            $('body').css({
                'overflow': 'hidden'
            })
        });
    }

    function appendVideo(url, em) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                var $content = $(data).find('iframe');
                em.append($content);
            }
        })
    }

    function loadVideo(url) {
        // load video 
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                var $content = $(data).find('iframe');
                $('.popup__video').find('.iframe').append($content).fadeIn(700);
            }
        })
    }

    $('.popup__video').find('.close-button').on('click', function () {
        $('.popup__video').find('.iframe').empty();
        $('.popup').removeClass('is-open');
        history.replaceState(null, '', currentURL);
        $('body').attr('style', '');
    })
}

function copyright(url) {
    var width = 800;
    var height = 600;
    var left = parseInt((screen.availWidth / 2) - (width / 2));
    var top = parseInt((screen.availHeight / 2) - (height / 2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    window.open(url, "隱私權聲明", windowFeatures);
}

function articlePopup() {
    if ($('.article')) {
        var slider;
        $('.article__slider').find('.slider__cover').on('click', function () {
            $('.popup').addClass('is-open');
            startSlide();
        });
        // $('.popup__article').imagesLoaded()
        //     .done(function (instance) {
        //         console.log('all images successfully loaded');
        //     });
        $('.article__slider').find('.slider__thumb li').on('click', function () {
            var eq = $(this).index();
            $('.popup').addClass('is-open');
            startSlide(eq);
            // slider = $('.popup__article').find('.image-slider').bxSlider({
            //     pager: false,
            //     controls: false,
            //     startSlide: eq,
            //     onSliderLoad: function (currentIndex) {
            //         var _this = this;
            //         $('.popup__article').find('.currentNum').html(_this.getCurrentSlide() + 1);
            //         $('.popup__article').find('.totalNum').html(_this.getSlideCount());
            //         $('body').css({
            //             'overflow': 'hidden'
            //         })
            //     },
            //     onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
            //         var _this = this;
            //         $('.popup__article').find('.currentNum').html(_this.getCurrentSlide() + 1);
            //     }
            // })
            // slider.goToSlide(eq);
        });

        function startSlide(eq) {
            $('body').css({
                'overflow': 'hidden'
            })
            // image slide
            slider = $('.popup__article__slider').find('ul').bxSlider({
                // pager: false,
                startSlide: eq,
                pagerCustom: '#popupThumb',
                onSliderLoad: function (currentIndex) {
                    var _this = this;
                    // // console.log(slider.getCurrentSlide() + 1);
                    // // console.log(slider.getSlideCount());
                    $('.popup__article').find('.currentNum').html(_this.getCurrentSlide() + 1);
                    $('.popup__article').find('.totalNum').html(_this.getSlideCount());

                },
                onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                    var _this = this;
                    $('.popup__article').find('.currentNum').html(_this.getCurrentSlide() + 1);
                }
            })
        }
        $('.popup__article').find('.close-button').on('click', function () {
            $('.popup__article').find('.iframe').empty();
            $('.popup').removeClass('is-open');
            $('body').attr('style', '');
            slider.destroySlider();
        })
    }
}

function goTop() {
    var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
    $('.goTop').click(function () {
        $body.animate({
            scrollTop: 0
        }, 700, 'easeInOutCirc');
        return false;
    });
}
//evan
function load_more() {
    $("body").addClass("load-open");
    $(".button__more").click(function (e) {
        e.preventDefault();
        if ($("body").hasClass("load-open")) {
            $("body").removeClass("load-open");
            var btn = $(this);
            var url = $(this).attr("href");
            var add_ele = $(this).data("elename");
            var start = $(this).data("start");
            $("body").attr("data-href", url);
            $("body").attr("data-elename", add_ele);
            // $(this).remove();
            var ele = $(add_ele);
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    btn.attr("href", data.url);
                    if ($("body").hasClass("index")) {
                        ele.after($(data.html));
                    }
                    else {
                        ele.find("li:last-of-type").after($(data.html));                        
                    }
                    $("body").addClass("load-open");
                },
                dataType: 'json'
            });
        }    
    });
    // window.addEventListener('scroll', function (e) {
    //     if ($("body").hasClass("index") || $("body").hasClass("list")) {
    //         if ($("body").hasClass("load-open")) {
    //             if (($(document).height() * 0.9) - $(window).height() <= $(window).scrollTop()) {
    //                 $("body").removeClass("load-open");
    //                 var url = $("body").data("href");
    //                 var ele = $($("body").data("elename"));
    //                 $.ajax({
    //                     url: url,
    //                     type: 'GET',
    //                     success: function (data) {
    //                         $("body").data("href", data.url)
    //                         ele.append($(data.html));
    //                         $("body").addClass("load-open");
    //                     },
    //                     dataType: 'json'
    //                 });
    //             }
    //         }
    //     }
    // });
}
function social_share() {
    $(".shareMedia").find("ol li a").click(function () {
        var url = document.URL;
        var width = 780;
        var height = 300;
        var left = parseInt((screen.availWidth / 2) - (width / 2));
        var top = parseInt((screen.availHeight / 2) - (height / 2));
        var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
        var get_class = $(this).attr("class");
        var shareURL = "";
        switch (get_class) {
            case "facebook":
                shareURL = "https://www.facebook.com/sharer.php?u=" + url;
                break;
            case "twitter":
                shareURL = "http://twitter.com/share?url=" + url;
                break;
            case "google":
                shareURL = "https://plus.google.com/share?url=" + url;
                break;
            case "pinterest":
                shareURL = "http://pinterest.com/pin/create/button/?url=" + url;
                break;
        }
        window.open(shareURL, "", windowFeatures);
        console.log(shareURL);
    });
}
function subscribe_set() {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    $("#subscribe").ajaxForm({
        beforeSubmit: function (arr, $form, options) {
            if (!re.test($form.find("[name=email]").val())) {
                alert("請輸入正確信箱!!");
                return false;
            }
        },
        success: function (result) {
            alert(result.info);
             $('#myform').clearForm();
        },
        dataType: "json"
    });
}

function toggleSearch() {
    $('.header').find('.search').on('click', function() {
        $('.search__form').toggleClass('is-open');
    })
}

function photoPopup() {
    if($('.popup__photo')){
        var photo = $('.popup__photo').find('.photo');
        $('.photo__list').find('li').on('click', 'a', function(e) {
            $('body').css({
                'overflow': 'hidden'
            })
            e.preventDefault();
            $('.popup__photo').addClass('is-open');
            $('body')
            var photoSrc = $(this).find('img').attr('src');
            var img = '<img src="'+ photoSrc +'"/>';
            photo.css('background-image', 'url('+ photoSrc +')').append(img);

        })
        $('.popup__photo').find('.close-button').on('click', function () {
            $('.popup').removeClass('is-open');
            photo.attr('style', '').empty();
            $('body').attr('style', '');
        })
    }
}

function register_fb() {
    // 判斷是否已經有FB的login session 如果以登入 可以跳過登入的步驟進行下一步
    url = $(this).data("url");
    // FB.getLoginStatus(function (response) { 
    //     console.log(response);
    // });
    FB.login(function (response) {
        if (response.status === 'connected') {
            FB.api('/me', function (response) {
                if (response.email == null) {
                    alert('請開放您社群帳號的隱私權設定進行註冊，或者直接輸入您慣用的eMail帳號進行註冊，謝謝。');
                    // location.reload();
                }

                $.post(url, 'email=' + response.email + '&fbid=' + response.id, '', 'script');
            });
        } else {
            // FB.login(function (response) {
            //     if (response.authResponse) {
            //         FB.api('/me', function (response) {
            //             if (response.email == null) {
            //                 alert('請開放您社群帳號的隱私權設定進行註冊，或者直接輸入您慣用的eMail帳號進行註冊，謝謝。');
            //                 // location.reload();
            //             }
            //             $.post(url, 'email=' + response.email + '&fbid=' + response.id, '', 'script');
            //         });
            //     } 
            // }, { scope: 'email,user_likes' });
        }
    }, {
            scope: 'public_profile,email'
        });
}

function signup_set() {
    $('.header').find('.login').on('click', function () {
        var url = $(this).data("url");
        $.get(url, function (html) {
            html = $(html);
            $("body").append(html);
            $('.popup__login').toggleClass('is-open');
            $("body").addClass("is-open");
            pop_set(html);
        }, "html");
    });

    var pop_set = function (obj) {
        $('.popup__login').find('.close-button').on('click', function () {
            $('.popup').removeClass('is-open');
            $("body").removeClass("is-open");
            $(".popup").remove();
        });
        $('.popup__login').find(".signup-btn").click(function () {
            $(".main-div").find(">div:not(.signup-div)").hide();
            $(".main-div").find(".signup-div").show();
        });
        $('.popup__login').find(".login-btn").click(function () {
            $(".main-div").find(">div:not(.login-div)").hide();
            $(".main-div").find(".login-div").show();
        });
        $('.popup__login').find(".getpass-btn").click(function () {
            $(".main-div").find(">div:not(.getpass-div)").hide();
            $(".main-div").find(".getpass-div").show();
        });
        $(".popup__login").find(".fb-btn").unbind().bind("click", register_fb);
        obj.find('form.login-form').ajaxForm({
            beforeSubmit: function () {},
            dataType: 'script'
        });

        $('form#profile ').ajaxForm({
            beforeSubmit: function () {
                var pwd = $('#profile input[name="pwd"]').val();
                var pwd2 = $('#profile input[name="pwd2"]').val();
                var last_name = $('#profile input[name="last_name"]').val();
                var first_name = $('#profile input[name="first_name"]').val();
                var birth = $('#profile select[name="birth_y"]').val() + '-' + $('#profile select[name="birth_m"]').val() + '-' + $('#profile select[name="birth_d"]').val();
                var epaper = $('#profile input[name="epaper"]:checked');
                var agree = $('#profile input[name="agree"]:checked');
                if (pwd == '') {
                    alert('請輸入密碼');
                    return false;
                }
                if (pwd != pwd2) {
                    alert('請確認兩次密碼都相同');
                    return false;
                }
                if (last_name == '') {
                    alert('請輸入姓名');
                    return false
                }
                if (first_name == '') {
                    alert('請輸入姓名');
                    return false
                }
                if (agree.length == 0) {
                    alert("請同意東西雜誌網路會員條款與隱私聲明");
                    return false;
                }
            },
            success: function (result) {
                if (result.status != "error") {
                    $(".main-div").find(">div").hide();
                    $(".main-div").find(".success-div .title").text(result.title);
                    $(".main-div").find(".success-div .info").text(result.info);
                    $(".main-div").find(".success-div").fadeIn(300);
                }
                else {
                    alert(result.info);
                }
            },
            dataType:"json"
        });
        $("form#forgotPass").ajaxForm({
            beforeSubmit: function () {
                var email = $("#forgotPass input[name=email]").val();
                if (email === "") {
                    alert("請輸入電子信箱");
                    $("#forgotPass input").focus();
                    return false;
                }
                var t = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            
                if (!t.test(email)) {
                    alert("電子信箱格式錯誤");
                    $("#forgotPass input").focus();
                    $("#forgotPass input").select();
                    return false;
                }
            },
            success: function (result) {
                if (result.status != "error") {
                    $(".main-div").find(">div").hide();
                    $(".main-div").find(".success-div .title").text(result.title);
                    $(".main-div").find(".success-div .info").text(result.info);
                    $(".main-div").find(".success-div").fadeIn(300);
                }
                else {
                    alert(result.info);
                }
            },
            dataType: 'json'
        });
        var birth_y = $('.birth select[name="birth_y"]');
        var birth_m = $('.birth select[name="birth_m"]');
        var birth_d = $('.birth select[name="birth_d"]');
        birth_y.empty();
        var d = new Date();
        for (i = d.getFullYear(); i > 1900; i--) {
            birth_y.append('<option value="' + i + '">' + i + '</option>');
        }
        for (i = 1; i <= 12; i++) {
            birth_m.append('<option value="' + i + '">' + i + '</option>');
        }
        for (i = 1; i <= 31; i++) {
            birth_d.append('<option value="' + i + '">' + i + '</option>');
        }
        var country = obj.find('.address select[name="country"]');
        country.bind('change', function () {
            if ($(this).children(':selected').val() == 'TW') {
                obj.find('.address select[name="province"]')
                    .empty()
                    .append('<option value="">省份</option>')
                    .attr('disabled', true)
                    .css('opacity', 0.5);
                var city = obj.find('.address select[name="city"]');
                var area = obj.find('.address select[name="area"]');
                city.empty().append('<option value="">縣市</option>').removeAttr('disabled').css('opacity', 1);
                for (i = 0; i < tw_city.length; i++) {
                    city.append('<option value="' + tw_city[i] + '">' + tw_city[i] + '</option>')
                }
                city.unbind().bind('change', function () {
                    area.empty().append('<option value="">地區</option>').removeAttr('disabled').css('opacity', 1);
                    var city_index = $(this)[0].selectedIndex;
                    var start = cityarea_account[city_index - 1] + 1;
                    var end = cityarea_account[city_index];
                    for (i = start; i <= end; i++) {
                        area.append('<option value="' + cityarea[i] + '">' + cityarea[i] + '</option>')
                    }
                }).trigger('change');

            } else if ($(this).children(':selected').val() == 'CN') {
                var province = obj.find('.address select[name="province"]');
                var city = obj.find('.address select[name="city"]');
                var area = obj.find('.address select[name="area"]');
                province.empty().append('<option value="">省份</option>').removeAttr('disabled').css('opacity', 1);
                city.empty().append('<option value="">縣市</option>').removeAttr('disabled').css('opacity', 1);
                area.empty().append('<option value="">地區</option>').removeAttr('disabled').css('opacity', 1);
                for (i = 0; i < _CityList.length; i++) {
                    province.append('<option value="' + _CityList[i].name + '">' + _CityList[i].name + '</option>')
                }
                province.unbind().bind('change', function () {
                    var province_index = $(this)[0].selectedIndex - 1;
                    city.empty().append('<option value="">縣市</option>').removeAttr('disabled').css('opacity', 1);
                    area.empty().append('<option value="">地區</option>').removeAttr('disabled').css('opacity', 1);
                    if (province_index >= 0) {
                        var p_city = _CityList[province_index].city;
                        for (i = 0; i < p_city.length; i++) {
                            city.append('<option value="' + p_city[i].name + '">' + p_city[i].name + '</option>')
                        }
                        city.unbind().bind('change', function () {
                            var city_index = $(this)[0].selectedIndex - 1;
                            area.empty().append('<option value="">地區</option>').removeAttr('disabled').css('opacity', 1);
                            if (city_index >= 0) {

                                var p_area = _CityList[province_index].city[city_index].area;
                                for (i = 0; i < p_area.length; i++) {
                                    area.append('<option value="' + p_area[i].name + '">' + p_area[i].name + '</option>')
                                }
                            }
                        }).trigger('change');
                    }
                });
            } else {
                obj.find('.address select[name="province"]')
                    .empty()
                    .append('<option value="">省份</option>')
                    .attr('disabled', true)
                    .css('opacity', 0.5);
                obj.find('.address select[name="city"]')
                    .empty()
                    .append('<option value="">縣市</option>')
                    .attr('disabled', true)
                    .css('opacity', 0.5);
                obj.find('.address select[name="area"]')
                    .empty()
                    .append('<option value="">地區</option>')
                    .attr('disabled', true)
                    .css('opacity', 0.5);
            }
        }).trigger('change');
    }
}

function init() {
    windowResizeHandle();
    menuToggle();
    indexSlide();
    indexVideoSlide();
    tabFunction();
    articleSlider();
    // articleVideoSlider();
    articleRecommendHandler();
    videoHandler();
    articlePopup();
    load_more();
    goTop();
    toggleSearch();
    photoPopup();
    social_share();
    subscribe_set();
    signup_set();
}
    window.fbAsyncInit = function() {
        FB.init({
            appId: '1430709557144046',
            xfbml: true,
            version: 'v2.3'
        });
    // FB.AppEvents.logPageView();
  };

  (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

$(function () {
    $.fn.imgLoad = function (callback) {
        return this.each(function () {
            if (callback) {
                if (this.complete || /*for IE 10-*/ $(this).height() > 0) {
                    callback.apply(this);
                }
                else {
                    $(this).on('load', function () {
                        callback.apply(this);
                    });
                }
            }
        });
    };
    init();
});