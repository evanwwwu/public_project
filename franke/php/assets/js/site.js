	var window_w=$(window).width(),
	window_h= $(window).height();
	
	var site = {
		init:function(){
			site.submenu_set();
			site.slideshow_set();
			site.list_pic_change();
			site.option_set();
			site.product_slideshow_set();
			site.product_info_set();
			site.popup_set();
			site.cart_set();
			site.watter_filter();
			init_addcar();
		//site.choose_box_set();
			// 0512
			site.pri_popup_set();
	},
	submenu_set:function(){
		$('.menu ul li a').each(function(){
			this.onclick = function(){
				if ($(this).hasClass('active')) {
					$(this).removeClass('active');
					$('header .submenu.active').slideUp(900,function(){$(this).removeClass('active');});
				}
				else {
					var sub_find = $(this).attr('class');
					$('.menu ul li a.active').removeClass('active');
					$(this).addClass('active');
					if ($('header .submenu').hasClass('active')) {
						$('header .submenu.active').slideUp(900,function(){
							$(this).removeClass('active');
							$('header').find('.submenu.'+sub_find).addClass('active').slideDown(900);
						});
					}
					else {
						$('header .submenu.active').slideUp(900,function(){$(this).removeClass('active');});
						$('header').find('.submenu.'+sub_find).addClass('active').slideDown(900);
					}

				}
			}
		});
	},
	cart_set:function(){
		$('.cart_btn').click(function(){
			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
				$(this).parents().find('header .cart').removeClass('active');
			}
			else {
				$(this).addClass('active');
				$(this).parents().find('header .cart').addClass('active');
			}
		});
		$('.cart_xx').click(function(){
			$('header .cart.active,.cart_btn.active').removeClass('active');
		});
	},
	slideshow_set:function(){
		var owl = $('.owl-carousel'); 
		$(".owl-carousel").owlCarousel({
			slideSpeed : 1000,
			pagination : false,
			singleItem:true,
			autoPlay : 10000,
			transitionStyle : "fade"
		});
		// Go to the next item
		$('.slidebtn_r').click(function() {
			owl.trigger('owl.next');
		});
		// Go to the previous item
		$('.slidebtn_l').click(function() {
			owl.trigger('owl.prev');
		});
		var owl_pl = $(".owl-carousel-pl");
		if(owl_pl.find("a").length>1){
			owl_pl.owlCarousel({
				slideSpeed : 1000,
				pagination : false,
				singleItem:true,
				autoPlay : 10000,
				transitionStyle : "fade"
			});
			$('.slideshow.pl .slidebtn_r').click(function() {
				owl_pl.trigger('owl.next');
			});
			$('.slideshow.pl .slidebtn_l').click(function() {
				owl_pl.trigger('owl.prev');
			});
		}
		else{
			$('.slideshow.pl .slidebtn').hide();
		}
	},
	option_set:function(){
		$('.option .title').each(function(){
			this.onclick = function(){
				if ($(this).parent().hasClass('active')) {
					$(this).parent().removeClass('active');
					$(this).parent().find('.content').slideDown(700);
				}
				else {
					$(this).parent().addClass('active');
					$(this).parent().find('.content').slideUp(700);
				}
			}
		})
	},
	list_pic_change:function(){
		$('.list .circle_part .circle').each(function(){
			this.onclick = function(){
				var num = $(this).index();
				if ($(this).hasClass('active')) {
				}
				else {
					$(this).parent().parent().parent().find(".circle, .pic img").removeClass('active');
					$(this).addClass('active');
					$(this).parent().parent().parent().find(".pic img").eq(num).addClass('active');
				}
			}
		});
	},
	choose_box_set:function(){

		$(window).bind('scroll',(function(){
			var top = $('body').scrollTop(),
			s_height = $('article.main').outerHeight(),
			s_height_num = parseInt(s_height+20),
			s_top = $('article.main .list').offset().top,
			s_top_num = parseInt(s_top-20);
			//console.log(top+'/'+s_height_num+'/'+s_top+'/'+s_height);
			//$(".option").css('max-height',window_h-40);

			if($(window).scrollTop() > s_top_num && $(window).scrollTop() <= s_height_num) {
				$('.option').css({'position':'fixed','top':'20px','bottom':'auto'});
			}
			else if($(window).scrollTop() > s_height_num) {
				$('.option').css({'position':'absolute','bottom':'0px','top':'auto'});
			}
			else {
				$('.option').removeAttr('style');
				$(".option").css('max-height',window_h-40);
			}
		}));
		$(".option").mCustomScrollbar({
			setHeight:window_h-40,
			theme:"dark-2"
		});

		$('article.main .list').css("min-height",$(".option").height());
		$(".option").find("input[name=filter_option]").click(function(){
			check_obj();
			var site = window.location.href.split("?");
			window.history.replaceState({},'filter',site[0]+"?filter="+options_id.toString());
		});
		$(".option").find(".clearall").click(function(){
			$(".option").find("input[name=filter_option]").prop( "checked",false);
			check_obj();
			var site = window.location.href.split("?");
			window.history.replaceState({},'filter',site[0]);
		})

		var check_obj = function(){
			options_id = [];
			var get_name = [];
			$(".option").find("input[name=filter_option]:checked").each(function(){
				options_id.push($(this).val());
			});
			var products = $('article.main .list').find(".product:not(.ad)");
			if($(".option").find("input[name=filter_option]:checked").length==0){
				$('article.main .list').find(".product.ad").removeClass("hide");
			}
			else{
				$('article.main .list').find(".product.ad").addClass("hide");
			}
			products.each(function(inx,obj){
				var filters = $(obj).data("filter");
				var obj_filter = filters.toString().split(",");
				var is_show = true;
				for(var oid in options_id){ 
					console.log(options_id[oid]);
					if($.inArray(options_id[oid],obj_filter)=="-1"){
						is_show=false;
						break;
					}
				}
				if(is_show){
					$(obj).removeClass("hide");
				}
				else{
					$(obj).addClass("hide");
				}
			});
		};
		check_obj();

	},
	product_slideshow_set:function(){
		var owl = $('.owl-carousel-p'); 
		var owl_popup = $('.popup .owl-carousel-pop');
		var slide_num;
		$(".owl-carousel-pop").owlCarousel({
			slideSpeed : 1000,
			pagination : true,
			singleItem:true,
			transitionStyle : "fade"
		});
		$(".owl-carousel-p").owlCarousel({
			slideSpeed : 1000,
			pagination : true,
			singleItem:true,
			transitionStyle : "fade",
			afterMove: function(){
				var pre = this.prevItem;
				var cur = this.owl.currentItem;
				if (pre > cur) {
					owl_popup.trigger('owl.prev');
				} 
				else if(pre < cur) {
					owl_popup.trigger('owl.next');
				}
				else {
				}
			}
		});
		// Go to the next item
		$('.slidebtn_r').click(function() {
			owl.trigger('owl.next');
		});
		// Go to the previous item
		$('.slidebtn_l').click(function() {
			owl.trigger('owl.prev');
		});
		var part_type = $(".part.ga").find(".type");
		part_type.each(function(inx,pt){
			$(pt).click(function(){
				part_type.removeClass("active");
				$(this).addClass("active");
				owl.trigger("owl.jumpTo",inx);
				owl_popup.trigger("owl.jumpTo",inx);
			})
		})
	},
	product_info_set:function(){
		$('.tab a').each(function(){
			this.onclick = function(){
				if ($(this).hasClass('active')) {
				}
				else {
					var sub_find = $(this).index();
					console.log(sub_find);
					$('.tab a.active,.part.detail .in.active').removeClass('active');
					$(this).addClass('active');
					$('.part.detail .in').eq(sub_find).addClass('active');
				}
			}
		})
	},
	popup_set:function(){
		$('.zoom').click(function(){
			if ($('.popup').hasClass("show")) {
					//0408
					$('html').css('overflow-y', 'auto');
					$('.xx').removeClass('closed').addClass('opened');
					$('.popup').removeClass("show").addClass("notshow");
					if ($('.popup').hasClass("notshow")) {
						setTimeout(function() {
							$('.popup').removeClass("notshow");
							$('.xx').removeClass('opened');
						}, 1000);
					}
				} else {
					$('.xx').removeClass('opened').addClass('closed');
					$('.popup').removeClass("notshow").addClass("show");
					$('html').css('overflow-y', 'hidden');
            			imagesLoaded( '.popup .in', function() {
            				var s_h = $('.popup .slideshow').outerWidth()+49,
            					posi = parseInt((window_h-s_h)/2);
            				if (window_h>s_h) {
	            				$(".popup .in").css("margin-top",posi);
            				};
            			});
				};
			});
		$('.popup .mask,.popup .xx').click(function(){
			//0408
			$('html').css('overflow-y', 'auto');
			$('.xx').removeClass('closed').addClass('opened');
			$('.popup').removeClass("show").addClass("notshow");
			if ($('.popup').hasClass("notshow")) {
				setTimeout(function() {
					$('.popup').removeClass("notshow");
					$('.xx').removeClass('opened');
				}, 1000);
			}
			//0408
			$(".owl-carousel-p").owlCarousel();
			var owl = $(".owl-carousel-p").data('owlCarousel');
			$(".owl-carousel-pop").owlCarousel();
			var owl_pop = $(".owl-carousel-pop").data('owlCarousel');
			var owl_pop_cur = owl_pop.owl.currentItem;
			owl.goTo(owl_pop_cur);
			//console.log(owl_pop_cur);
		});
	},
	watter_filter:function(){
		$('.b6_intro .banner_btn').each(function(){
			this.onclick = function(){
				if ($(this).parent().hasClass('active')) {
					$(this).parent().removeClass('active');
				}
				else {
					$('.b6_intro > div').removeClass('active');
					$(this).parent().addClass('active');
				}
			}
		})
	},
	// 0512
	pri_popup_set:function(){
		$('.private_btn').click(function(){
			if ($('.popup2.private').hasClass("show")) {
					$('html').css('overflow-y', 'auto');
					$('.xx').removeClass('closed').addClass('opened');
					$('.popup2.private').removeClass("show").addClass("notshow");
					if ($('.popup2.private').hasClass("notshow")) {
						setTimeout(function() {
							$('.popup2.private').removeClass("notshow");
							$('.xx').removeClass('opened');
						}, 1000);
					}
				} else {
					$('.xx').removeClass('opened').addClass('closed');
					$('.popup2.private').removeClass("notshow").addClass("show");
					$('html').css('overflow-y', 'hidden');
				};
			});
		$('.popup2.private .mask,.popup2.private .xx').click(function(){
			//0408
			$('html').css('overflow-y', 'auto');
			$('.xx').removeClass('closed').addClass('opened');
			$('.popup2.private').removeClass("show").addClass("notshow");
			if ($('.popup2.private').hasClass("notshow")) {
				setTimeout(function() {
					$('.popup2.private').removeClass("notshow");
					$('.xx').removeClass('opened');
				}, 1000);
			}
		});
	}
}

$(function(){
	site.init();
});

function init_addcar(){
	$(".add_cart").click(function(){
		var error = false;
		var total = 0;
		var url = $(this).attr("data-url");
		var part = [];
		total = parseInt(product.price);
		$(".default_part").find("li").each(function(){
			part.push({p_name:encodeURI($(this).find(".part_name").html()),p_price:0});
		});
		$(".sel_div").each(function(){
			var input = $(this).find("input[type=radio]:checked");
			if(input.length<=0){
				alert("請選擇配件!");
				error = true;
				return false;
			}
			var value = input.val();
			value = $.parseJSON(value);
			part.push({p_name:encodeURI(value.title),p_price:parseInt(value.price)});
			total += parseInt(value.price); 
		});
		if(error){
			return false;
		}
		$(".words").find("input[name=checkbox]:checked").each(function(){
			var value = $(this).val();
			value = $.parseJSON(value);
			part.push({p_name:encodeURI(value.title),p_price:parseInt(value.price)});
			total += parseInt(value.price); 
		});
		var cover_img = $.parseJSON(product.cover_img);
		// console.log(product);
		var data = {id:product.id,name:product.title,main_id:product.main_id,cover_img:cover_img[0],price:total,site_price:product.price,pro_no:product.product_no,option_data:JSON.stringify(part)};
		console.log(data);
		$.post(url,data,function(){
			$("body").animate({
				scrollTop:$(".cart_btn").offset().top-50
			}, 500);

		},"script");
	});
}

function remove_cart(url,id,price,obj){
	if (!confirm('確定刪除?')) return;
	$.post(url+"/"+id,"",null,"script");
	var total = parseInt($(".cart_total_price").eq(0).html());
	total -= parseInt(price);
	console.log(total);
	$(".cart_total_price").html(total)
	$(".cart_product[data-id="+id+"]").remove();
	if($(".mylist_check").length>0){
		$(".mylist_check[data-id="+id+"]").remove();
	}
}