var scrollbar_w;
var window_w, window_h;

// var window_w=$(window).width(),
// 	window_h= $(window).height();

var site = {
	init:function(){
		site.detect_scrollbar();
		window_w=$(window).width()+scrollbar_w; 
		window_h= $(window).height();

		site.video_set();
		site.loading_set();
		site.scrolltop_click();

		if (window_w > 1024){
			site.search_show();
		}
		else if(window_w <= 1024){
			site.m_menu_set();
		}
		else{}

		$(window).resize(function(){
			window_w = $(window).width()+scrollbar_w;
			window_h = $(window).height();

			// site.video_set();
			site.video_size();
			site.hoverSet();
			site.empHSet();
			site.tagsHSet();

			if (window_w > 1024){
			}
			else if(window_w <= 1024){
				site.m_menu_set();
			}
			else{}
		});

		// $(window).scroll(function() {
			site.index_header();
		// });
	},
	index_header:function(){
		$('.for_header.index').css('top',window_h);
		var scroll_T = $(window).scrollTop();
		// var header_top = $('.main.index > .wrap').offset().top;
		$(window).scroll(function() {
			scroll_T = $(window).scrollTop();
			console.log(window_h+"//"+scroll_T);
			if (scroll_T >= window_h) {
				$('.for_header.index').addClass('fix').removeAttr('style');
			}
			else{
				$('.for_header.index').removeClass('fix').css('top',window_h);
			}
		});
	},
	detect_scrollbar:function(){
		// Create the measurement node
		var scrollDiv = document.createElement("div");
		scrollDiv.className = "scrollbar-measure";
		document.body.appendChild(scrollDiv);
		// Get the scrollbar width
		var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
		scrollbar_w = scrollbarWidth;
		//console.warn(scrollbarWidth); 
		// Delete the DIV 
		document.body.removeChild(scrollDiv);
	},
	scrolltop_click:function(){
		$(".scrolltop").click(function() {
			$("html,body").animate({
				scrollTop: 0
			}, 900);
			return false;
        });
	},
	loading_set:function(){
		var img_count = 0;
		var imgs = $("section img");
		var progress = $(".count_down span");
		var allimg_count = imgs.length;
		var percentageW,margin,allnumber;
		if (allimg_count >= 1) {
			imgs.each(function(){
				$(this).imagesLoaded(function(){
					img_count++;
					percentageW = (img_count/allimg_count)*100;
					allnumber = Math.floor(percentageW);
					margin = percentageW/2;
					progress.text(String(allnumber));
					$('.load_light').animate({
						width:percentageW+'%',
						'margin-left':-margin+'%',
						'margin-top':-margin+'%'
					},200);
					if(img_count == allimg_count) _startUp();
				});
			});
		}
		else {
			_startUp();
		}
		function _startUp(){
			if ($('#player').length >0) {
				setTimeout(function(){
					$('.loader_part').fadeOut(1000);	
					// console.log('trrr');
				},1500);
			}
			else {
				$('.loader_part').fadeOut(1000);
			}
			site.empHSet();
			site.hoverSet();
			site.tagsHSet();
		}

	},
	empHSet:function(){
		var imgH = $('.emp_movie').height(),
		sloganH = $('.emp_movie .slogan').height(),
		sloganM = (imgH-sloganH)/2;
		console.log(imgH);
		$('.emp_movie .slogan').css('margin-top',sloganM);
	},
	tagsHSet:function(){
		$('.world').each(function(){
			var world_h = $(this).find('img').height();
			$(this).find(".content").height(world_h);
		});
	},
	hoverSet:function(){
		if ($('.article_block').length>=1) {
			$('.article_block').each(function(){
				var b_h = $(this).find('.block').height();
				$(this).find('.hover').height(b_h);
				console.log(b_h);
			});
		};
	},
	video_set:function(){
		// 2. This code loads the IFrame Player API code asynchronously.
		var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		// 3. This function creates an <iframe> (and YouTube player)
  		//    after the API code downloads
		var player;
		window.onYouTubeIframeAPIReady = function() {
			player = new YT.Player('player', {
				height: '100%',
				width: '100%',
				videoId: 'MImx_ruN2NI',
				playerVars: {
					'rel': 0,
					'controls': 0,           
					'showinfo': 0,
					'autoplay':1,
					'loop': 1,
					'playlist':'MImx_ruN2NI'
          		},
				events: {
					'onReady': onPlayerReady
					// 'onStateChange': onPlayerStateChange
				}
			});
		}
		function onPlayerReady(event) {
			site.video_size();
			event.target.playVideo();
		}
	},
	video_size:function(){
		var img_w = 1280;
		var img_h = 720;
		var img_ratio = img_w / img_h;
		var win_w = $(window).width();
		var win_h = $(window).height();
		var win_ratio = win_w / win_h;
		var target_w;
		var target_h;
		if (win_ratio > 1) {
			target_h = win_h;
			target_w = target_h * img_ratio
			if (target_w < win_w) {
				target_w = win_w;
				target_h = target_w / img_ratio
			}
			$('#player').css({ 'width': target_w, 'height': target_h, 'margin-top': (0 - target_h * 0.5), 'margin-left': (0 - target_w * 0.5) })
		}
		else {
			target_w = win_w;
			target_h = target_w / img_ratio
			if (target_h < win_h) {
				target_h = win_h;
				target_w = target_h * img_ratio
			}
			$('#player').css({ 'width': target_w, 'height': target_h, 'margin-top': (0 - target_h * 0.5), 'margin-left': (0 - target_w * 0.5) })
		}
		$('.welcome').height(win_h);
	},
	m_menu_set:function(){
        $('.menu_icon').click(function(e) {
            e.preventDefault();
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).parent().parent().find('.right_part').removeClass('active');
                $(this).parents().find('section').removeClass('active');
                $('body').removeAttr('style');
            } else {
                $(this).addClass('active');
                $(this).parent().parent().find('.right_part').addClass('active');
                $(this).parents().find('section').addClass('active');
                $('body').css('overflow-y','hidden');
            }
        });
	},
	search_show:function(){
		$(".heder_part .search").click(function(e){
            e.preventDefault();
            if ($(".search_pop").hasClass('active')) {
                $(".search_pop").removeClass('active');
            } else {
                $(".search_pop").addClass('active');
            }
		});
		$(".heder_part .search_part .close").click(function(e){
            e.preventDefault();
            if ($(".search_pop").hasClass('active')) {
                $(".search_pop").removeClass('active');
            }
		});
	}
}

$(function(){
	site.init();
});