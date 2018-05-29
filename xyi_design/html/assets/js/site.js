$(function(){
	navshow();
	mouse_init();
	$(window).scroll(function(){
        logo_ani();
    });
	check_size();
	slide();
	mouse_index_m();
	//water_flow();
	window.onresize=function(){
		check_size();
		slide();
		if ($(window).width()>625){
			water_flow();
		}
		else{
		}
	}
	if ($(window).width()>625){
		water_flow();
	}
	else{
	}
});

//---------------------   WATER_FLOW   --------------------//
function water_flow(){
	$('article.index #container').imagesLoaded(function(){
		$('article.index #container').masonry({
			itemSelector: '.item',
			//columnWidth: ".grid-sizer",
			columnWidth: 300,
			animated: true,
			//gutterWidth: 20,
			isFitWidth: true,
            // isAnimated: Modernizr.csstransitions,
            // singleMode: true,
        });
	});
	if ($(window).width()<640){
		$('article.index #container > ul > li:first-child').addClass("grid-sizer");
		$('article.index #container').masonry({
			columnWidth: ".grid-sizer"
		});
	}
	else{
		$('article.index #container > ul > li:first-child').removeClass("grid-sizer");
	}
	
	$('article.members #container').imagesLoaded(function(){
		$('article.members #container').masonry({
			itemSelector: '.item',
			// columnWidth: 200,
			animated: true,
			gutterWidth: 40,
			isFitWidth: true,
        });
	});
}
//---------------   works_pic_top  -----------//
function check_size(){
	$('.item.year').imagesLoaded(function(){
		var insh = $('.item.year').height();
		var y_ma = $('.item.year').css('margin-bottom');
		var work2_h = parseInt(insh)+parseInt(y_ma);
		if($('html, body').width()>=626 && $('html, body').width()<=1184){
			$('article.work .part .item:nth-child(2)').css("top",work2_h);
		}else{
			$("article.work .part .item:nth-child(2)").removeAttr('style');
		}
	});

	$('article.index .item').imagesLoaded(function(){
		var in_1 = $('article.index .item.w2:nth-child(2)').height();
		var in_1_ma = $('article.index .item.w2:nth-child(2)').css('margin-bottom');
		var in_2_h = $('article.index .item.w1:nth-child(3)').height();
		var in_2_ma = $('article.index .item.w1:nth-child(3)').css('margin-bottom');
		var p_h = parseInt(in_1)+parseInt(in_1_ma)+parseInt(in_2_h)+parseInt(in_2_ma)+136;
		if($('html, body').width()<625){
			$('article.index .item.w1.c:nth-last-of-type(2)').css("top",p_h);
		}else{
			$("article.index .item.w1.c:nth-last-of-type(2)").removeAttr('style');
		}
	});
};
//--------------   SLIDE_SHOW   --------------//
function slide(){
	var fotorama_height = 198;
	var thumb_w = 100;
	var thumb_h = 100;
	var nav_change = 'thumbs';
	if ($(window).width()<626){
		fotorama_height = '100%';
		nav_change = 'dots';
	}else if ($(window).width()>=626 && $(window).width()<=895){
		thumb_w = 80;
		thumb_h = 80;
	}else{
		fotorama_height = 198;
		thumb_w = 100;
		thumb_h = 100;
		nav_change = 'thumbs';
	};
	$('.work_in .fotorama').fotorama({
		width: '100%',
		ratio: '1020/680',
		minwidth: 300,
		maxwidth: 1020,
		minheight: fotorama_height,
		maxheight:'100%',
		nav: nav_change,
		thumbwidth: thumb_w,
		thumbheight: thumb_h,
		thumbborderwidth:0,
		thumbmargin:2,
		loop: false,
		fit: 'contain',
		easing: "swing",
		transitionduration: 2000,
		autoplay: false,
		arrows: true,
		swipe: true,
		click: false,
		spinner: {
			lines: 11,
			length: 10,
			width: 6,
			radius: 20,
			color: 'rgba(0, 0, 0, .75)'
		}
	});
	$('.press_in .fotorama').fotorama({
		width: '100%',
		ratio: '1020/680',
		minwidth: 300,
		maxwidth: 1020,
		minheight: fotorama_height,
		maxheight:'100%',
		nav: 'dots',
		loop: false,
		fit: 'contain',
		easing: "swing",
		transitionduration: 2000,
		autoplay: false,
		arrows: true,
		swipe: true,
		click: false,
		spinner: {
			lines: 11,
			length: 10,
			width: 6,
			radius: 20,
			color: 'rgba(0, 0, 0, .75)'
		}
	});
	$('article.press_in .fotorama__nav__frame').each(function(){
		var page = "00" + $(this).index();
		var words = page.substr(page.length-2,2);
		$(this).html(words);
	});
	$('.fotorama').on('fotorama:showend ',function (e, fotorama, extra) {
		$(".count.m").html($('.fotorama__nav__frame.fotorama__active').index() + ' / ' + $('.fotorama__nav__frame').length);
	});
}
//------------   index_nav_scroll  -------------//
function logo_ani(page_top){
	var h1 = $('body').height();
	var h2 = $(window).height();
	var hh = h1-h2;
	var x_h = $('div.x').height();
	var page_top = $(window).scrollTop();
	//console.log(page_top);
	if (hh>300) {
		set_scroll_animate()
	}
		// if (page_top>100){
		// 	$('nav.c').stop().animate({'padding-top':'25px'});
		// 	$('div.x').stop().animate({'margin-top':'0px'});
		// 	$('div.y').stop().animate({'margin-top':-x_h});
		// 	$('div.i').stop().animate({'margin-top':-x_h});
		// };
		// if (page_top<100){
		// 	$('nav.c').stop().animate({'padding-top':'120px'});
		// 	$('div.x').stop().animate({'margin-top':'80px'});
		// 	$('div.y').stop().animate({'margin-top':'40px'});
		// 	$('div.i').stop().animate({'margin-top':'40px'});
		// };
	
};
function set_scroll_animate(){
	var x_h = $('div.x').height();
	$('header.index_h nav.c').scrollAnimate({
		startScroll: 0,
		endScroll: 433,
		cssProperty: 'padding-top',
		before: 120,
		after: 25
	})
	$('header.index_h').scrollAnimate({
		startScroll: 0,
		endScroll: 433,
		cssProperty: 'height',
		before: 180,
		after: 100
	})
	$('div.x').scrollAnimate({
		startScroll: 0,
		endScroll: 433,
		cssProperty: 'margin-top',
		before: 80,
		after: 0
	})
	$('div.y').scrollAnimate({
		startScroll: 0,
		endScroll: 433,
		cssProperty: 'margin-top',
		before: 40,
		after: -x_h
	})
	$('div.i').scrollAnimate({
		startScroll: 0,
		endScroll: 433,
		cssProperty: 'margin-top',
		before: 40,
		after: -x_h
	})

};
//----------------   mouse  ------------------//
// function mouse_index(){
// 	$('article.index li.i_w').mouseenter(function () {
// 		$(this).find("img").stop().animate({'margin-top':'-180px'},350,"swing");
// 		$(this).find(".hover").show().stop().animate({'bottom':'0px'},350,"swing");
// 	}).mouseleave(function () {
// 		$(this).find("img").stop().animate({'margin-top':'0px'},350,"swing");
// 		$(this).find(".hover").stop().animate({'bottom':'-180px'},350,"swing",function(){$(this).hide();});
// 	});
// 	$('article.index li.i_p').mouseenter(function () {
// 		$(this).find("img").stop().animate({'margin-top':'-180px'},350,"swing");
// 		$(this).find(".hover").show().stop().animate({'top':'0px'},350,"swing");
// 	}).mouseleave(function () {
// 		$(this).find("img").stop().animate({'margin-top':'0px'},350,"swing");
// 		$(this).find(".hover").stop().animate({'top':'180px'},350,"swing",function(){$(this).hide();});
// 	});
// 	$('article.index li.i_a').mouseenter(function () {
// 		$(this).find("img").stop().animate({'margin-left':'-300px'},350,"swing");
// 		$(this).find(".hover").show().stop().animate({'right':'0px'},350,"swing");
// 	}).mouseleave(function () {
// 		$(this).find("img").stop().animate({'margin-left':'0px'},350,"swing");
// 		$(this).find(".hover").stop().animate({'right':'-300px'},350,"swing",function(){$(this).hide();});
// 	});
// };
function mouse_index_m(){
	$('article.index li.i_w').mouseenter(function () {
		$(this).find(".hover").fadeIn(750);
	}).mouseleave(function () {
		$(this).find(".hover").fadeOut(750);
	});
	$('article.index li.i_p').mouseenter(function () {
		$(this).find(".hover").fadeIn(750);
	}).mouseleave(function () {
		$(this).find(".hover").fadeOut(750);
	});
	$('article.index li.i_a').mouseenter(function () {
		$(this).find(".hover").fadeIn(750);
	}).mouseleave(function () {
		$(this).find(".hover").fadeOut(750);
	});
};
function mouse_init(){
	$('article.work li').mouseenter(function () {
		var w_pic = $(this).find(".hover h1");
		TweenMax.to(w_pic, 1, {opacity:1});
		$(this).find(".hover").fadeIn(750);
	}).mouseleave(function () {
		var w_pic = $(this).find(".hover h1");
		TweenMax.to(w_pic, 1, {opacity:0});
		$(this).find(".hover").fadeOut(750);
	});

	$('article.press .book > div').mouseenter(function () {
		$(this).find(".hover_info").fadeIn(650);
	}).mouseleave(function () {
		$(this).find(".hover_info").fadeOut(650);
	});

	$('article.awards .pic').mouseenter(function () {
		$(this).find(".hover").fadeIn(650);
	}).mouseleave(function () {
		$(this).find(".hover").fadeOut(650);
	});

	$('.footer a').mouseenter(function () {
		$(this).find("img:last-child").fadeIn(350);
	}).mouseleave(function () {
		$(this).find("img:last-child").fadeOut(350);
	});

	$('footer > a').mouseenter(function () {
		$(this).find("img:last-child").fadeIn(350);
	}).mouseleave(function () {
		$(this).find("img:last-child").fadeOut(350);
	});
};

//----------------   mobile  -----------------//
function navshow(){

	var body = $('body'),
  	nav_show = $('.nav_show'),
  	closeMask = $('#closeMask'),
  	nav_btn  = $('.nav_btn'),
  	currentScroll;
  	$('.nav_btn').click(function(){
  		currentScroll = $(window).scrollTop();
  		if(body.hasClass('menu-open')){
  			closeMenu();
  		}else{
  			openMenu();
  		}
  	});
  
  	closeMask.click(function(){
  		event.preventDefault();
  		if(body.hasClass('menu-open')){
  			closeMenu();
  		}else{
  			closeMenu();
  		}
  	});

  	$('header .nav_btn2').click(function(){
  		$(".nav_work > div:first-child").toggle();
  	});
  	// $('footer .nav_btn2').click(function(){
  	// 	$("footer div.m ul").toggle();
  	// });
  	$('.m_more').click(function(){
  		$(".work_in .info").toggle();
  		$("#closeMask_in").show();
  	});
  	//-------- WORK_IN --------//
  	$('#closeMask_in').click(function(){
  		$(this).hide();
  		$(this).prev().hide();
  	});
  	function openMenu() {
  		var mainWidth = $(document).outerWidth();
  		var menuHeight = $('.nav_show').outerHeight();
  		$('html,body').css({"height":menuHeight,"overflow-y":"hidden"});
  		$('body').addClass('menu-open');
  		$('.nav_show').css("right","0px").show();
  		$('#closeMask').show().css({"width":mainWidth - 140, "right":"140px"});
  		$('.wrapper').scrollTop(currentScroll);
  	};
  	function closeMenu() {
  		$('html,body').css({"height":'auto',"overflow-y":"auto"});
  		$('body').removeClass('menu-open');
  		$('#closeMask').hide().css({"left":"0","right":"none"});
  		$(window).scrollTop(currentScroll);
  		$('.nav_show').css("right","-140px").hide();
  	};
}
