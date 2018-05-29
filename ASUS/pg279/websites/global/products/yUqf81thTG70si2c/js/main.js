 $(function() {
 	var mobile = "pg279q";
 	var main = {
 		init:function(){
 			$(".videolink").asus_video($("#"+mobile+"-warp"));
 			this.warp_size();
 			this.mobile_menu();
 			this.light_ctr();
 			$("#overview-aside-nav ul").navscroll({
 				sec: 1000,
 				url_hash: false,
 				head_hight:60
 			});
 			$("#"+mobile+"-main .mainnav").navscroll({
 				sec: 1000,
 				url_hash: false,
 				head_hight:60
 			});
 			$("#"+mobile+"-control .control_bar").css({
 				"top":$("#"+mobile+"-control .mainwarp .on .con_detail").height()+120+((690-$("#"+mobile+"-control .mainwarp .on .con_detail").height())/2)
 			});
 		},
 		resize:function(){
 			this.warp_size();
 			this.mobile_menu();
 			$("#"+mobile+"-control .control_bar").css({
 				"top":$("#"+mobile+"-control .mainwarp .on .con_detail").height()+120+((690-$("#"+mobile+"-control .mainwarp .on .con_detail").height())/2)
 			});
 		},
 		warp_size:function(){
 			$("#"+mobile+"-warp").css({
 				width:$(window).width(),
 				"margin-left": ($("#special-sectionOverview, #sectionOverview").width() - $(window).width()) / 2
 			});
 		},
 		mobile_menu:function(){
 			if(window.innerWidth<=768){
 				$(window).scroll(function(){
 					if(window.innerWidth<=768){
 						var ws = $(window).scrollTop();
 						var mt = $("#"+mobile+"-warp").offset().top;
 						if(ws>mt){
 							$("#"+mobile+"-main").css({
 								position: "fixed",
 								top:$("#overview-top-nav").height()
 							});
 						}
 						else{
 							$("#"+mobile+"-main").css({
 								position: "relative",
 								top:0
 							});
 						}
 					}
 				});
 				$("#"+mobile+"-warp .mobile_nav>.m_btn").unbind("click");
 				$("#"+mobile+"-warp .mobile_nav>.m_btn").click(function(){
 					$("#"+mobile+"-warp .mainnav").slideToggle();
 				});
 				$("#"+mobile+"-warp .mainnav>.znav").unbind("click");
 				$("#"+mobile+"-warp .mainnav>.znav").click(function(){
 					$("#"+mobile+"-warp .mainnav").slideToggle();
 				});
 			}
 			else{
 				$("#"+mobile+"-main").removeAttr("style");
 				$("#"+mobile+"-warp .mainnav").show();
 			}
 		},
 		hd_draggable:function(){
 			var scr = $("#"+mobile+"-warp .screen");
 			scr.find(".ctr_line").draggable({
 				axis: "x",
 				containment: "#"+mobile+"-desktop",
 				scroll: false,
 				drag: function( event, ui ) {
 					var cor = ui.position.left;
 					var tw = scr.width();
 					scr.find(".desktop .left").width(50+(cor/tw * 100)+"%");
 				}
 			});
 		},
 		change_box:function(){
 			var box = $("#"+mobile+"-warp .change_box");
 			box.find(".btns .box_btn").each(function(){
 				$(this).click(function(){
 					var inx = box.find(".btns .box_btn").index($(this));
 					box.find(".btns .box_btn").removeClass("on");
 					box.find(".btns .box_btn").eq(inx).addClass("on");
 					box.find(".imgs>img").removeClass("on");
 					box.find(".imgs>img").eq(inx).addClass("on");
 				});
 			});
 		},
 		sildeshow:function(){
 			var lan = 6;
 			var clickstop = true;
 			var sildeshow = $("#"+mobile+"-warp .sildeshow");
 			var btn_w = sildeshow.find(".titles").width();
 			var inx = 2;
 			if(window.innerWidth >　768){
 				var title_w = 112;
 				sildeshow.find(".titles .mask").css({"padding-left":title_w*2,"padding-right":title_w*2});
 			}
 			else{
 				var title_w = 260;
 			}

 			var info_f1 = sildeshow.find(".infos .mask .info").eq(0);
 			var info_f2 = sildeshow.find(".infos .mask .info").eq(1);
 			var info_l1 = sildeshow.find(".infos .mask .info").eq(5);
 			var info_l2= sildeshow.find(".infos .mask .info").eq(4);
 			info_f1.before(info_l2.clone(true)).before(info_l1.clone(true)); 
 			info_l1.after(info_f2.clone(true)).after(info_f1.clone(true)); 

 			var title_f1 = sildeshow.find(".titles .mask .t_btn").eq(0);
 			var title_f2 = sildeshow.find(".titles .mask .t_btn").eq(1);
 			var title_f3 = sildeshow.find(".titles .mask .t_btn").eq(2);
 			var title_l1 = sildeshow.find(".titles .mask .t_btn").eq(5);
 			var title_l2= sildeshow.find(".titles .mask .t_btn").eq(4);
 			var title_l3= sildeshow.find(".titles .mask .t_btn").eq(3);
 			title_f1.before(title_l3.clone(true)).before(title_l2.clone(true)).before(title_l1.clone(true)); 
 			title_l1.after(title_f3.clone(true)).after(title_f2.clone(true)).after(title_f1.clone(true)); 

 			sildeshow.find(".titles .mask").width(title_w*12);
 			sildeshow.find(".titles .mask").css("margin-left",-(inx+3) * title_w);
 			sildeshow.find(".infos .info").width(sildeshow.find(".infos").width());
 			sildeshow.find(".infos .mask").width(sildeshow.find(".infos").width()*10);
 			sildeshow.find(".infos .mask").css("margin-left",-(inx+2) * sildeshow.find(".infos").width());
 			if(window.innerWidth < 768){
 				sildeshow.find(".arr_btn").css({"bottom":sildeshow.find(".infos").height()});
 			}
 			sildeshow.find(".arr_btn .next").click(function(){
 				if(clickstop){
 					clickstop = false;
 					inx = inx + 1;
 					sildeshow.find(".titles .t_btn").removeClass("on");
 					sildeshow.find(".infos .info").removeClass("on");
 					sildeshow.find(".items .item ").removeClass("on");

 					sildeshow.find(".titles .mask").animate({
 						"margin-left":"-="+title_w
 					},500,function(){
 						sildeshow.find(".titles .t_btn").eq(inx+3).addClass("on");
 					});

 					sildeshow.find(".infos .mask").animate({
 						"margin-left":"-="+sildeshow.find(".infos").width()
 					},500,function(){
 						sildeshow.find(".infos .info").eq(inx).addClass("on");
 						clickstop = true;
 						check_btn(inx);
 					});
 					if(inx==6){
 						sildeshow.find(".items .item").eq(0).addClass("on");
 					}else{
 						sildeshow.find(".items .item").eq(inx).addClass("on"); 						
 					}
 				}
 			});

 			sildeshow.find(".arr_btn .pre").click(function(){
 				if(clickstop){
 					clickstop = false;
 					inx = inx - 1;
 					sildeshow.find(".titles .t_btn").removeClass("on");
 					sildeshow.find(".infos .info").removeClass("on");

 					sildeshow.find(".items .item ").removeClass("on");

 					sildeshow.find(".titles .mask").animate({
 						"margin-left":"+="+title_w
 					},500,function(){
 						sildeshow.find(".titles .t_btn").eq(inx+3).addClass("on");
 					});

 					sildeshow.find(".infos .mask").animate({
 						"margin-left":"+="+sildeshow.find(".infos").width()
 					},500,function(){
 						sildeshow.find(".infos .info").eq(inx).addClass("on");
 						clickstop = true;
 						check_btn(inx);
 					});
 					if(inx<0){
 						sildeshow.find(".items .item ").eq(5).addClass("on");
 					}else{
 						sildeshow.find(".items .item ").eq(inx).addClass("on");
 					}
 				}
 			});
 			check_btn = function(inx_c){
 				console.log(inx_c);
 				if(inx_c <0){
 					inx =5;
 					sildeshow.find(".infos .mask").css({"margin-left":-sildeshow.find(".infos").width()*7});
 					sildeshow.find(".titles .mask").css({"margin-left":-title_w*8});
 					sildeshow.find(".titles .t_btn").eq(8).addClass("on");
 				}
 				if(inx_c==6){
 					inx = 0;
 					sildeshow.find(".infos .mask").css({"margin-left":-sildeshow.find(".infos").width() *2});
 					sildeshow.find(".titles .mask").css({"margin-left":-title_w*3});
 					sildeshow.find(".titles .t_btn").eq(3).addClass("on");
 				}
 			}
 		},
 		light_ctr:function(){
 			var light = $("#"+mobile+"-warp .light_ctr");
 			light.find(".ctr .l").click(function(){
 				var inx =light.find(".ctr .l").index($(this));
 				light.find(".ctr .l").removeClass("on");
 				light.find(".pics>img").removeClass("on");
 				light.find(".ctr .l").eq(inx).addClass("on");
 				light.find(".pics>img").eq(inx).addClass("on");
 			});
 		}
 	}
 	main.init();
 	main.hd_draggable();
 	main.change_box();
 	main.sildeshow();
 	setTimeout(function(){$("#"+mobile+"-warp .reel-indicator").wrap('<div class="reel-indicator-bar" />');});
 	$(window).resize(function(){
 		location = location;
 	});
 });

