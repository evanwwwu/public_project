$(function(){var a="poseidon",e={init:function(){this.warp_size(),this.mobile_menu(),this.nivdia_silde(),this.motion_set(),this.brighten_set(),$(".videolink").asus_video($("#"+a+"-warp").find(".video-div")),$(".videolink2").asus_video($("#"+a+"-warp").find("#poseidon-premium")),$("#b2top").click(function(){$("html, body").stop().animate({scrollTop:0})}),$("#warp-nav ul").navscroll({sec:1e3,url_hash:!1,head_hight:60}),$("#colorpicker1").farbtastic({callback:".color-light",width:190}),$(window).resize(function(){e.resize()})},resize:function(){this.warp_size(),this.mobile_menu()},warp_size:function(){$("#"+a+"-warp").css({width:$(window).width(),"margin-left":($("#special-sectionOverview, #sectionOverview").width()-$(window).width())/2})},mobile_menu:function(){$(window).width()<=768?($(window).scroll(function(){if($(window).width()<=768){var e=$(window).scrollTop(),o=$("#"+a+"-warp").offset().top;e>o?$("#warp-nav").css({position:"fixed",top:$("#overview-top-nav").height()}):$("#warp-nav").css({position:"absolute",top:0})}}),$(".mobile_nav>.m_btn").unbind("click"),$(".mobile_nav>.m_btn").click(function(){$("#warp-nav ul").slideToggle(),$("#warp-nav").toggleClass("open")}),$("#warp-nav li b").unbind("click"),$("#warp-nav li b").click(function(){$("#warp-nav ul").slideToggle(),$("#warp-nav").toggleClass("open")})):($("#warp-nav li b").unbind("click"),$("#warp-nav").removeAttr("style"),$("#warp-nav ul").show())},brighten_set:function(){var a=$(".btn_list");a.find(".i_btn").click(function(){if(!$(this).hasClass("on")){a.find(".i_btn").removeClass("on"),$(this).addClass("on");var e=$(this).data("status");$(".color-light").attr("class","color-light"),$(".color-light").addClass("status_"+e)}})},nivdia_silde:function(){var a=$(".nivdia-silde"),e=a.find(".sildes").owlCarousel({slideSpeed:460,items:1,autoPlay:!1});a.find(".btn-next").click(function(){e.trigger("next.owl.carousel")}),a.find(".btn-prev").click(function(){e.trigger("prev.owl.carousel")})},motion_set:function(){var a=.3;new TimelineMax({delay:2,repeat:-1,repeatDelay:a}).add([TweenMax.fromTo("#poseidon-ultimate .gpu .a2",a,{autoAlpha:0},{autoAlpha:1,ease:Quad.easeInOut}),TweenMax.fromTo("#poseidon-ultimate .gpu .a1",a,{autoAlpha:1},{autoAlpha:0,ease:Quad.easeInOut})]).add([TweenMax.fromTo("#poseidon-ultimate .gpu .a3",a,{autoAlpha:0},{autoAlpha:1,ease:Quad.easeInOut}),TweenMax.fromTo("#poseidon-ultimate .gpu .a2",a,{autoAlpha:1},{autoAlpha:0,ease:Quad.easeInOut})]).add([TweenMax.fromTo("#poseidon-ultimate .gpu .a4",a,{autoAlpha:0},{autoAlpha:1,ease:Quad.easeInOut}),TweenMax.fromTo("#poseidon-ultimate .gpu .a3",a,{autoAlpha:1},{autoAlpha:0,ease:Quad.easeInOut})]).add([TweenMax.fromTo("#poseidon-ultimate .gpu .a5",a,{autoAlpha:0},{autoAlpha:1,ease:Quad.easeInOut}),TweenMax.fromTo("#poseidon-ultimate .gpu .a4",a,{autoAlpha:1},{autoAlpha:0,ease:Quad.easeInOut})]).add([TweenMax.fromTo("#poseidon-ultimate .gpu .a6",a,{autoAlpha:0},{autoAlpha:1,ease:Quad.easeInOut}),TweenMax.fromTo("#poseidon-ultimate .gpu .a5",a,{autoAlpha:1},{autoAlpha:0,ease:Quad.easeInOut})]).add([TweenMax.fromTo("#poseidon-ultimate .gpu .a7",a,{autoAlpha:0},{autoAlpha:1,ease:Quad.easeInOut}),TweenMax.fromTo("#poseidon-ultimate .gpu .a6",a,{autoAlpha:1},{autoAlpha:0,ease:Quad.easeInOut})]),new TimelineMax({delay:2,repeat:-1,repeatDelay:0}).from("#poseidon-ultimate .gpu .arr",.1,{autoAlpha:0,ease:Quad.easeOut}).add([TweenMax.fromTo("#poseidon-ultimate .gpu .cool",2.5*a,{top:-50,autoAlpha:0},{top:0,autoAlpha:1,ease:Power1.easeInOut}),TweenMax.fromTo("#poseidon-ultimate .gpu .hot",2.5*a,{top:50,autoAlpha:0},{top:-50,autoAlpha:1,ease:Power1.easeInOut})]).to("#poseidon-ultimate .gpu .arr",.5,{autoAlpha:0,ease:Quad.easeInOut});var e=.4;new TimelineMax({delay:2,repeat:-1,repeatDelay:0}).add([TweenMax.fromTo("#poseidon-ultimate .c1",e,{scale:.75,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut})]).add([TweenMax.fromTo("#poseidon-ultimate .c2",e,{scale:.82,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.eseOut})],"-=0.1").add([TweenMax.fromTo("#poseidon-ultimate .c3",e,{scale:.75,x:-30,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut})],"-=0.2").add([TweenMax.fromTo("#poseidon-ultimate .c1",e,{autoAlpha:1},{autoAlpha:0,ease:Power1.easeOut}),TweenMax.fromTo("#poseidon-ultimate .c2",e,{autoAlpha:1},{autoAlpha:0,ease:Power1.easeOut}),TweenMax.fromTo("#poseidon-ultimate .c3",e,{autoAlpha:1},{autoAlpha:0,ease:Power1.easeOut})],"+=.1").fromTo("#poseidon-ultimate .c4",e,{scale:.75,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut},"-=.2").fromTo("#poseidon-ultimate .c5",e,{scale:.82,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut},"-=.1").fromTo("#poseidon-ultimate .c6",e,{scale:.82,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut},"-=.2").to("#poseidon-ultimate .circles",.4,{autoAlpha:0,ease:Quad.easeInOut},"+=.1"),new TimelineMax({delay:2,repeat:-1,repeatDelay:.5}).from("#poseidon-ultimate .connect .light",.8,{autoAlpha:0,ease:Quad.easeInOut}).to("#poseidon-ultimate .connect .light",.8,{autoAlpha:0,ease:Quad.easeInOut})}};e.init()});