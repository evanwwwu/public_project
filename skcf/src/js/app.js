(function() {
    var main = {
        menuToggle: function() {
            $('.menuToggle').on('click', function() {
                if ($(this).hasClass('is-active')) {
                    $(this).removeClass('is-active');
                    $('nav').removeClass('is-open');
                } else {
                    console.log('click');
                    $(this).addClass('is-active');
                    $('nav').addClass('is-open');
                }
            });
        },
        index_slide: function() {
            $(".banners").bxSlider({
                mode: 'fade',
                auto: false,
                autoControls: false,
                pause: 4000,
                nextText: '<img src="assets/images/silde_arr_right.png">',
                prevText: '<img src="assets/images/silde_arr_left.png">',
            });
        },
        index_more: function() {
            var fac = $(".facility");
            var more_list = fac.find(".more_list");
            var imgs = fac.find(".items");
            var dot = fac.find(".c_dot");
            imgs.find(".image").eq(0).addClass("active");
            more_list.find("li").eq(0).addClass("active");
            dot.find(".dot").eq(0).addClass("active");
            more_list.find("li").each(function(inx) {
                $(this).click(function() {
                    if (inx != more_list.find("li").index(more_list.find("li.active"))) {
                        more_list.find("li").removeClass("active");
                        imgs.find(".image").removeClass("active");
                        dot.find(".dot").removeClass("active");
                        more_list.find("li").eq(inx).addClass('active');
                        imgs.find(".image").eq(inx).addClass('active');
                        dot.find(".dot").eq(inx).addClass('active');
                    }
                });
            });
        },
        init: function() {
            var m_left = $("nav ul.left");
            var m_right = $("nav ul.right");
            m_left.css("width", "auto");
            m_right.css("width", "auto");
            if (m_left.width() > m_right.width()) {
                m_right.width(m_left.width());
            } else {
                m_left.width(m_right.width());
            }
        },
        event_init: function() {
            var og = $("nav .logo").offset().top;
            $(window).scroll(function() {
                if ($(window).scrollTop() > og) {
                    $("header").addClass("fixed");
                } else {
                    $("header").removeClass("fixed");
                }
            });
            $("nav .lan_btn").click(function() {
                $(this).find("ol").slideToggle();
                $(this).toggleClass("open");
            });
        },
        news_in: function() {
            var news = $(".news_in");
            if (window.innerWidth < 768) {
                news.find(".other .news_list").bxSlider({
                    mode: 'horizontal',
                    controls: false
                });
            }
            $(".in02 .left_img").bxSlider({
                mode: 'horizontal',
                controls: true,
                nextText: '<img src="assets/images/silde_arr_right.png">',
                prevText: '<img src="assets/images/silde_arr_left.png">',
            });
        }
    }

    $(function() {
        main.menuToggle();
        main.index_slide();
        main.index_more();
        main.event_init();
        main.init();
        main.news_in();
        $(window).resize(function() {
            main.init();

        });
    });

})();
