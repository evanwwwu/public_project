var window_w=$(window).width(),
window_h= $(window).height();

var site = {
	init:function(){
		site.index_slide();
		site.skrollr_ani();
		//site.svg_check();
		//site.bg_line_ani();
		site.product_slide();
		site.product_waterflow();
		site.scrolltop_click();
		//site.nicescroll_set();
		if (window_w > 640){
			//site.title_scroll_ani();
			site.index_letter_position();
			//site.forpad_header();
		}
		else if(window_w <= 640){
		}
		else{}
			if(window_w >= 901){
				site.news_title_position();
			}
			else if(window_w <= 900){
				site.m_menu_set();
			}

			$(window).resize(function(){
				window_w = $(window).width();
				window_h = $(window).height();
			//site.skrollr_ani();
			if (window_w > 640){
				//site.title_scroll_ani();
				site.index_letter_position();
				//site.forpad_header();
			}
			else if(window_w <= 640){
			}
			else{}
				if(window_w >= 901){
					site.news_title_position();
				}
				else if(window_w <= 900){
					site.m_menu_set();
					$('.title_bg.news').removeAttr('style');
				}
			});
			
		},
		scrolltop_click:function(){
			$(".scrolltop").click(function() {
				if ($('html').hasClass('skrollr-mobile')) {
					skrollr.init().animateTo(0);
				}
				else {
					$("html,body").animate({
						scrollTop: 0
					}, 900);
					return false;
				}
			});
		},
		forpad_header:function(){
		//if ($('html').hasClass('skrollr-mobile')) {
			if (window_w <= 1024 && window_w >640){
				$('header').addClass('forpad');
			}
			else{
				$('header').removeClass('forpad');
			}
		//}
	},
	m_menu_set:function(){
		$('header .menu_icon').click(function(e) {
			e.preventDefault();
			$('.menu_part').outerHeight(window_h);
			if ($(this).hasClass('active')) {
                // $('.select_part').stop().animate({
                // }, 750, function() {
                //     $(this).hide();
                // });
		$(this).removeClass('active');
		$(this).parent().find('.menu_part').removeClass('active');
		setTimeout(function(){
			$('.menu_part').removeClass('close');
		}, 400);
                //$('html').removeAttr('style');
            } else {
            	$(this).addClass('active');
            	$(this).parent().find('.menu_part').addClass('close');
            	setTimeout(function(){
            		$('.menu_part').addClass('active');
            	}, 10);
                //$('body').css('overflow-y','hidden');
            }
        });
	},
	index_slide:function(){
		$(".index_carousel").owlCarousel({
			slideSpeed : 900,
			paginationSpeed : 900,
			singleItem:true
		});
		$(".designer_intro .slide").owlCarousel({
			slideSpeed : 1500,
			singleItem:true,
			transitionStyle : "fade",
			autoPlay : 4500,
			pagination : false
		});
		$(".product_intro .slide").owlCarousel({
			slideSpeed : 1500,
			singleItem:true,
			transitionStyle : "fade",
			autoPlay : 6500,
			pagination : false,
			 //autoHeight : true
			});
	},
	svg_check:function(){
		if (!Modernizr.svg) {
			$("section").addClass('no-svg');
		}
	},
	index_letter_position:function(){
		if ($('section').hasClass('index')){
			var index_l = $('section.index .wrap.index.clearfix').offset().left;
			$(".letter_part").css("left",index_l);
		}
	},
	bg_line_ani:function(){
		var img_dist2 = {cut:1};
		var loghandle2 = function(event, delta) {
			var o = '', id = event.currentTarget.id;
			o = '#' + id + ':';
			// var num = 0;
			if (delta > 0){
				// num = delta * 5
				o += ' up (' + delta + ')';
				animate = TweenMax.to(img_dist2, 1, {cut:"+=20", roundProps:"cut", onUpdate:updateHandler2, ease:Linear.easeNone});
			}
			else if (delta < 0){
				// num = 0 - delta * 5
				o += ' down (' + delta + ')';
				animate =TweenMax.to(img_dist2, 1, {cut:"-=20", roundProps:"cut", onUpdate:updateHandler2, ease:Linear.easeNone});
			}
		}
		function updateHandler2(){
			var scroll_T = $(window).scrollTop();
			var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();
			if (scroll_T > 0 && scrollBottom > 0){
				$('.word_1d').css("margin-top",img_dist2.cut);
				$('.word_2o').css("margin-top",img_dist2.cut);
				$('.word_3m').css("margin-top",img_dist2.cut);
				$('.word_4o').css("margin-top",img_dist2.cut);
			}
		}
		$('body').mousewheel(function(event, delta) {
			var scroll_T = $(window).scrollTop();
			var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();
			if (scroll_T > 0 && scrollBottom > 0){
				if ($('div').hasClass('letter_part')) {
					loghandle2(event, delta);
				};
			}
		});
	},
	skrollr_ani:function(){
		$(window).load( function() {
			$('body').imagesLoaded( function() {
				skrollr.init({
					forceHeight: false,
					smoothScrolling:true,
					smoothScrollingDuration:500,
					mobileDeceleration:0.01,
					easing: {
						WTF: Math.random,
						inverted: function(p) {
							return 1-p;
						}
					}
				});
			});
		});
	},
	title_scroll_ani_test:function(){
		// make a variable to store the window height.
		var windowHeight = $(window).innerHeight();
		// function to be used to retrieve variable
		function getWindowHeight() {
			return windowHeight;
		}
		// update window height on resize
		$(window).on("resize", function () {
			windowHeight = $(window).innerHeight();
		});				
		// init controller
		controller = new ScrollMagic();
		// build tween
		var tween = TweenMax.fromTo(".title_bg", 1, 
			{"opacity": "1"},
			{"opacity": "0"}
			);
		// build scene
		var scene = new ScrollScene({duration: getWindowHeight})
		.setTween(tween)
		.addTo(controller);
	},
	product_waterflow:function(){
		var lo = false;
		if ($('section div').hasClass('product_list')){
			$('.product_list').imagesLoaded().progress(function(){
            if(!lo){
                lo = true;
                var loading = $('<div id="list_loading"><img style="margin: 0 auto;" src="http://studiodomo.net/assets/images/loading.gif"></div>');
                $('.product_list').append(loading);
            }
        }).done(function () {
				$('.product_list').masonry({
					columnWidth: '.grid-sizer',
					itemSelector: '.item',
					gutter: '.gutter-sizer'
				}).masonry('bindResize');
			});
			// $('.product_list').masonry({
			// 	itemSelector: '.item',
			// 	containerStyle:{position: 'relative'},
			// 	isFitWidth: true,
			// 	animated: true,
			// 	isAnimated: Modernizr.csstransitions,
			// });
}
		//var msnry = $container.data('masonry');
	},
	product_slide:function(){
		var owl = $('.p_carousel');
		$(".p_carousel").owlCarousel({
			slideSpeed : 900,
			paginationSpeed : 900,
			singleItem:true
		});
        // Go to the next item
        $('.control .s_r').click(function() {
        	owl.trigger('owl.next');
        });
        // Go to the previous item
        $('.control .s_l').click(function() {
        	owl.trigger('owl.prev');
        });
    },
    news_title_position:function(){
    	var logo_left = $(".logo").offset().left;
    	console.log(logo_left);
    	$('.title_bg.news').css('left',logo_left);
    }
}

$(function(){
	site.init();
});