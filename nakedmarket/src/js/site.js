var site_url = $("#sitejs").data("site");
$(function(){
	var main = {
		init:function(){
			this.scroll_set();
			this.mobile_btn();
			this.resize_set();
			this.fitler_set();
			this.top_btn();
			this.faq_set();
			this.product_set();
			this.classes_set();
			this.article_set();
			this.recipes_set();
			this.member_set();
			this.cart_set();
			this.step_set();
			this.window_loading();
		},
		scroll_set:function(){
			if(window.innerWidth>=1024){
				// console.log(skrollrselect.isMobile());
				if($(".page_index").length > 0){
					$("html,body").css("overflow","hidden");
				}
				// if(!detectmob()){
				// 	skrollr.init({smoothScrolling: true,forceHeight:false});
				// }			
				if(!detectmob()){	
					$.stellar({
						responsive:true,
						horizontalScrolling: false
					});
				}
			}
			$(document).on("mousewheel",function(e){
				var delta = e.originalEvent.wheelDelta;
				if(delta < 0){
					$("body.page_index").addClass("remove_intro");
				}
			});
			$(document).on("touchstart", function(e) {
				var startingY = e.originalEvent.touches[0].pageY;
				$(document).on("touchmove", function(e) {
					currentY = e.originalEvent.touches[0].pageY;
					var delta = currentY - startingY;
					if(delta < 0){
						$("body.page_index").addClass("remove_intro");
					}
				});
			});
			$(".page_index .warp").one('otransitionend oTransitionEnd msTransitionEnd transitionend',function(e) {
				$("body").removeClass("remove_intro").removeClass("page_index");
				$("html,body").css("overflow","auto");
			});
		},
		mobile_btn:function(){
			$(".main_menu .close").click(function(){
				$("body").removeClass("menu_open");
			});
			$(".sub_item .sub_close").click(function(){
				$("body").removeClass("sub_open");
				$("header>.sub_item").removeClass("open");
			});
			$(".sub_option a").on("click",function(e){
				e.preventDefault();
				load_url = $(this).attr("href");
				// $.get(load_url,function(html){
				// 	$("header>.sub_item").html(html);
				// 	$(".sub_item .sub_close").click(function(){
				// 		$("body").removeClass("sub_open");
				// 	});
				// 	$("body").addClass("sub_open");
				// },"html");
				$("header>.sub_item").removeClass("open");
				$("header>.sub_item."+load_url).addClass("open");
				$("body").addClass("sub_open");
				return false;
			});
			
			$(".sub_item .sub_close").click(function(){
				$("body").removeClass("sub_open");
			});
			$(".select_btn").click(function(){
				$(".type_select").toggleClass("open");
				$(".type_select").find("ul").stop().slideToggle(300);
			});
		},
		resize_set:function(){
			$(window).on("resize",function(){
				if(window.innerWidth >= 1024){
					$(".m_icon").off("click");
					$(".mobile_logo").off("click");
					$(".mobile_logo").on("click",function(){
						$("body").toggleClass("menu_open");
					});
					$("header .menu_btn").click(function(){
						$("body").removeClass("sub_open");
						$("header>.sub_item").removeClass("open");
					});
				}
				else{
					$("body").removeClass("sub_open");
					$(".mobile_logo").off("click");
					$(".m_icon").off("click");
					$(".m_icon").on("click",function(){
						$("body").addClass("menu_open");
					});
				}
				cart = $("#cart_list");
				var ch = 0;
				ch += cart.find(".c_head").height();
				ch += cart.find(".c_content .bottom_div").height();
				cart.find(".all_list").height(cart.height() - ch);
			}).trigger("resize");
		},
		top_btn:function(){
			$("#up_btn").click(function(){
				$("html,body").animate({
					scrollTop:0
				},'500');
			});
		},
		faq_set:function(){
			var faq = $(".faq_items");
			faq.find(".item").each(function(inx){
				var item = $(this);
				item.find(".qtitle").click(function(){
					if(inx != faq.find(".item").index($(".open"))){
						faq.find(".item.open .answer").slideUp(300);
						faq.find(".item").removeClass("open");
						item.addClass("open");
						item.find(".answer").slideDown(300);
					}
					else{
						faq.find(".item.open .answer").slideUp(300);
						faq.find(".item").removeClass("open");
					}
				});
			});
		},
		product_set:function(){
			$(".products .items>.item>a").each(function(){
				$(this).click(function(e){
					e.preventDefault();
					if($(this).attr("disabled")){
						return false;
					}
					$(this).attr("disabled",true);
					var mid = $(this).data("id");
					var load_url = $(this).attr("href");
					var site = window.location.href.split("?");
					var geturl = main.get_url();
					var row_url = "?row="+mid;
					if(geturl.length>0){
						for($i=0; $i<=geturl.length/2; $i++){
							if(geturl[$i]!="row"){ 
								row_url += "&"+geturl[$i]+"="+geturl[geturl[$i]];
							}
						}
					}
					window.history.replaceState({},'filter',site[0]+row_url);
					item = $(this).parent();
					item.parent().find(".item").removeClass("active");
					if($(".products .items>.item").find(".detail").length>0){
						$(".products .items>.item").find(".detail").stop().slideUp(500,function(){
							$(".products .items>.item").find(".detail").remove();
							item.addClass("active");
							console.log(321);
							$.get(load_url,function(html){
								item.find(">a").removeAttr("disabled");
								item.append(html);
								main.detail_set();
								item.find(".detail").css({"margin-left":-(item.offset().left - $(".products .items").offset().left)});
								item.find(".detail").stop().slideDown(500);
							},"html");

						});
					}
					else{
						item.addClass("active");
						$.get(load_url,function(html){
								item.find(">a").removeAttr("disabled");
							item.append(html);
							main.detail_set();
							item.find(".detail").css({"margin-left":-(item.offset().left - $(".products .items").offset().left)});
							item.find(".detail").stop().slideDown(500);
						},"html");
						
					}
				});
			});
			var geturl = main.get_url();
			if(geturl.indexOf("row")!=-1){
				$(".row_"+geturl["row"]).find(">a").click();
			}
		},
		detail_set:function(){
			var item_detail = $(".detail");
			$(".detail_close").click(function(){
				$(this).parents(".detail").slideUp(500,function(){
					$(this).parents(".item").removeClass("active");
					$(this).remove();
					var geturl = main.get_url();
					var row_url="";
					var url_arr = [];
					var site = window.location.href.split("?");
					if(geturl.length>0){
						row_url = "?";
						for($i=0; $i<=geturl.length/2; $i++){
							if(geturl[$i]!="row"){ 
								url_arr.push(geturl[$i]+"="+geturl[geturl[$i]]);
							}
						}
						$.each(url_arr,function(inx,value){
							if(inx!=0){
								row_url += "&";
							}
							row_url += value;
						});
					}
					window.history.replaceState({},'filter',site[0]+row_url);
				});
			});
			item_detail.find("input[name=qty]").change(function(){
				if($(this).val() > item_detail.data("count")){
					alert("此產品數量最多為" + item_detail.data("count"));
					$(this).val(0);
				}
			});
			ifd = $(".info_btn");
			ifd.find(".btn").click(function(){
				ifd.toggleClass("if_open");
				ifd.find('.info').stop().slideToggle(300);
			});
			$(".attest_btn").click(function(){
				var url = $(this).data("img");
				window.open(url,"_blank");
			});
			item_detail.find(".add_cart:not(.over)").click(function(){
				var simg = item_detail.find(".pic>img").attr("src");
				var id = item_detail.data("pid")+"-"+item_detail.data("mid");
				var qty = item_detail.find("input[name=qty]").val();
				var name = item_detail.find(".title .t1").text().replace(/ /g,'');
				var option = {};
				option["type"] = "ingredients";
				option["img"] = simg;
				option["unit"] = item_detail.find(".price").data("unit");
				option["unit_text"] = item_detail.find(".price").data("unittext");
				option["price_text"] = item_detail.find(".price").text();
				option["name_t2"] = item_detail.find(".title .t2").text().replace(/ /g,'');
				option["ship_type"] = item_detail.find(".price").data("ship");
				var price = (item_detail.find(".price").data("price")  / option["unit"]);
				if(qty >= option["unit"]){
					main.cart_add(id,qty,price,name,option);
				}
				else{
					alert("請輸入大於等於 "+option["unit"]+option["unit_text"]+" 的數量");
				}
			});
		},
		article_set:function(){
			var main_item = $(".main_content");
			main_item.find("input[name=qty]").change(function(){
				if($(this).val() > main_item.data("count")){
					alert("此產品數量最多為" + main_item.data("count"));
					$(this).val(0);
				}
			});
			main_item.find(".add_cart:not(.over)").click(function(){
				var simg = $(".main_img_pic>img").attr("src");
				var id = main_item.data("pid")+"-"+main_item.data("mid");
				var qty = main_item.find("input[name=qty]").val();
				var name = main_item.find(".detail_title .t1").text();
				var option = {};
				option["type"] = "articles";
				option["img"] = simg;
				option["unit"] = main_item.find(".price").data("unit");
				option["unit_text"] = main_item.find(".price").data("unittext");
				option["price_text"] = main_item.find(".price").text();
				option["name_t2"] = main_item.find(".detail_title .t2").text();
				option["ship_type"] = main_item.find(".price").data("ship");
				var price = main_item.find(".price").data("price")  / option["unit"];
				if(qty >= option["unit"]){
					main.cart_add(id,qty,price,name,option);
					console.log(simg);
				}
				else{
					alert("請輸入大於等於 "+option["unit"]+option["unit_text"]+" 的數量");
				}
			});
		},
		recipes_set:function(){
		},
		classes_set:function(){
			$('.up_form .select').on('click','.placeholder',function(){
				var parent = $(this).closest('.select');
				if ( ! parent.hasClass('is-open')){
					parent.addClass('is-open');
					$('.select.is-open').not(parent).removeClass('is-open');
				}else{
					parent.removeClass('is-open');
				}
			}).on('click','ul>li',function(){
				var parent = $(this).closest('.select');
				parent.removeClass('is-open').find('.placeholder').text( $(this).text() );
				parent.find('input[type=hidden]').attr('value', $(this).attr('data-value') );
			});
			$(".up_form").submit(function(){
				if($("input[name=date_id]").val()==""){
					alert("請選擇日期!");
					return false;
				}
				if($("input[name=username]").val()==""){
					alert("請輸入姓名!");
					return false;
				}
				if($("input[name=phone]").val()==""){
					alert("請輸入電話!");
					return false;
				}
				if(!check_email($("input[name=email]").val())){
					alert("請輸入正確電子信箱!");
					return false;
				}
			});
		},
		member_set:function(){
			var member = $(".member_edit");
			member.find(".edit_btn").click(function(){
				member.find(".all_data>.defaul_div").slideUp(200,function(){
					member.find(".all_data>.edit_div").slideDown(200);
				});
				$(this).fadeOut(400);
			});
			member.find(".edit_div>.edit_close").click(function(){
				member.find(".all_data>.edit_div").slideUp(200,function(){
					member.find(".all_data>.defaul_div").slideDown(200);				
				});
				member.find(".edit_btn").fadeIn(400);	
			});
			$(".more_div").find(".more_btn").click(function(){
				$(this).parent().find(">ul").stop().slideToggle(500);
				$(this).toggleClass("open");
			});

			$("#member_signup").ajaxForm({
				beforeSubmit: function(arr, $form, options) {
					if(!check_email($form.find("input[name=email]").val())){
						alert("請輸入正確電子信箱!");
						return false;
					}
					if($form.find("input[name=password]").val()=="" || $form.find("input[name=password]").val() != $form.find("input[name=password2]").val()){
						alert("請確認密碼正確相同!");
						return false;
					}
				},
				dataType:"script"
			});
			$("#member_login").ajaxForm({
				beforeSubmit: function(arr, $form, options) {
					if(!check_email($form.find("input[name=email]").val())){
						alert("請輸入正確電子信箱!");
						return false;
					}
					if($form.find("input[name=password]").val()==""){
						alert("請輸入密碼!");
						return false;
					}
				},
				dataType:"script"
			});
			$("#edit_form").ajaxForm({
				beforeSubmit: function(arr, $form, options) {
					if(!check_email($form.find("input[name=email]").val())){
						alert("請輸入正確電子信箱!");
						return false;
					}
					if($form.find("input[name=username]").val()==""){
						alert("請輸入姓名!");
						return false;
					}
					if($form.find("input[name=phone]").val()==""){
						alert("請輸入家用電話!");
						return false;
					}
					if($form.find("input[name=mobile]").val()==""){
						alert("請輸入手機號碼!");
						return false;
					}
					if($form.find("input[name=password]").val()=="" || $form.find("input[name=password]").val() != $form.find("input[name=password2]").val()){
						alert("請確認密碼正確相同!");
						return false;
					}
					if($form.find("input[name=address]").val()==""){
						alert("請輸入寄送地址!");
						return false;
					}
				},
				dataType:"script"
			});
			$("#getpass").ajaxForm({
				beforeSubmit: function(arr, $form, options) {
					if(!check_email($form.find("input[name=email]").val())){
						alert("請輸入正確電子信箱!");
						return false;
					}
				},
				dataType:"script"
			});
		},
		cart_set:function(){			
			$(".cart_icon").click(function(){
				$("body").addClass("cart_open");
			});
			cart = $("#cart_list");
			cart.find(".c_colse").click(function(){
				$("body").removeClass("cart_open");
			});
			main.cart_del();
		},
		fitler_set:function(){
			$(".type_select ul>li").each(function(obj){
				$(this).find("a").click(function(e){				
					e.preventDefault();
					if($(".detail_close").length>0){
						$(".detail_close").click();
					}
					$(".type_select ul>li").removeClass("active");
					var filter_id = $(this).parent().attr("filter-id");
					$(this).parent().addClass("active");
					var site = window.location.href.split("?");
					var geturl = main.get_url();
					var filter_url = "?filter="+filter_id;
					if(geturl.length>0){
						for($i=0; $i<=geturl.length/2; $i++){
							if(geturl[$i]!="filter"){ 
								filter_url += "&"+geturl[$i]+"="+geturl[geturl[$i]];
							}
						}
					}
					window.history.replaceState({},'filter',site[0]+filter_url);
					check_obj();
					if(window.innerWidth<768){
						$(".type_select").find(".selected_p").text($(this).find("p").text());
						$(".type_select").removeClass("open");
						$(".type_select").find("ul").stop().slideUp(300);
					}
				});
			});

			var check_obj = function(){
				$(".items .item").each(function(){
					var filter = $(this).data("filter");
					var fid = $(".type_select ul li.active").attr("filter-id");
					if(filter==fid){
						$(this).fadeIn(300);
					}
					else{
						$(this).fadeOut(300);
					}
				});
			};
			check_obj();
		},
		step_set:function(){
			$(".pay_step .item .i_del").click(function(){
				if(confirm("確認刪除?"))
					var item = $(this).parents("li");
				var rowid = item.attr("rowid");
				$.post(site_url+"shop/del_item",{"rowid":rowid},function(data){
					item.remove();
					$("#cart_list li[rowid="+rowid+"]").remove();
					var total_item = parseInt($("#cart_list .c_head .c").html()) - 1;
					var total_price = parseInt($("#cart_list .total_price .n").html()) - data.price;
					var ship = (data.ship==0)?"免運":data.ship;
					$("#cart_list .c_head .c").html(total_item);
					$("#cart_list .total_price .n").html(total_price);
					$(".pay_step .totle_price .n").html("$"+data.total);
					$(".ship_div .ship_type").html(data.ship_type);
					$(".ship_div .ship_price").html(ship);

				},"json");
			});
			$("#step_form").submit(function(){
				if(!check_email($("#step_form").find("input[name=email]").val())){
					alert("請輸入正確電子信箱!");
					return false;
				}
				if($("#step_form").find("input[name=username]").val()==""){
					alert("請輸入姓名!");
					return false;
				}
				if($("#step_form").find("input[name=phone]").val()==""){
					alert("請輸入家用電話!");
					return false;
				}
				if($("#step_form").find("input[name=mobile]").val()==""){
					alert("請輸入手機號碼!");
					return false;
				}
				if($("#step_form").find("input[name=address]").val()==""){
					alert("請輸入寄送地址!");
					return false;
				}
			});
		},
		window_loading:function(){
			var img_count =0;
			var imgs = $("body img");
			var activeBorder = $("#activeBorder");
			allimg_count = imgs.length;
			var num = 0;
			if (allimg_count >= 1) {
				imgs.each(function(){
					$(this).imagesLoaded(function(){						
						img_count++;
						num =  Math.floor((img_count/allimg_count)*360);						
						$("#prec").text(String( Math.floor((num/360)*100))+"%");
						if(img_count == allimg_count) _startUp();						
						if (num<=180){
							activeBorder.css('background-image','linear-gradient(' + (90+num) + 'deg, transparent 50%, #fff 50%),linear-gradient(90deg, #fff 50%, transparent 50%)');
						}
						else{
							activeBorder.css('background-image','linear-gradient(' + (num-90) + 'deg, transparent 50%, #fff 50%),linear-gradient(90deg, #fff 50%, transparent 50%)');
						}
					});
				});
			}
			else{
				_startUp();
			}
			function _startUp(){
				$('#loading_part').fadeOut(400);
			}
		},
		get_url:function(){
			var strUrl = location.search;
			var getPara, ParaVal;
			var aryPara = [];
			if (strUrl.indexOf("?") != -1) {
				var getSearch = strUrl.split("?");
				getPara = getSearch[1].split("&");
				for (i = 0; i < getPara.length; i++) {					
					ParaVal = getPara[i].split("=");
					aryPara.push(ParaVal[0]);
					aryPara[ParaVal[0]] = ParaVal[1];
				}
			}
			return aryPara;
		},
		cart_add:function(id,qty,price,name,option){
			$.post(site_url+'shop/add2cart',
				{"id":id,"qty":qty,"price":price,"name":name,"option":JSON.stringify(option)},
				function(data){
					$(".cart_icon").addClass("on");
					$("#cart_list .all_list ul").html(data.view);
					$("#cart_list .c_head .c").html(data.total);
					$("#cart_list .total_price .n").html(data.price);
					main.cart_del();
					if(window.innerWidth>=1024){
						$(".ec_div .cart_icon").click();
					}
					else{
						$(".mobile_logo .cart_icon").click();
					}
				},"json");
		},
		cart_del:function(){
			$("#cart_list").find(".i_del").click(function(){
				if(confirm("確認刪除?"))
					var item = $(this).parents("li");
				var rowid = item.attr("rowid");
				$.post(site_url+"shop/del_item",{"rowid":rowid},function(data){
					item.remove();
					var total_item = parseInt($("#cart_list .c_head .c").html()) - 1;
					var total_price = parseInt($("#cart_list .total_price .n").html()) - data.price;
					$("#cart_list .c_head .c").html(total_item);
					$("#cart_list .total_price .n").html(total_price);
					if($("#cart_list .all_list li").length<=0){
						$(".cart_icon").removeClass("on");
					}
				},"json");
				
			});
		}
	};
	main.init();
	function detectmob() { 
		if( navigator.userAgent.match(/Android/i)
			|| navigator.userAgent.match(/webOS/i)
			|| navigator.userAgent.match(/iPhone/i)
			|| navigator.userAgent.match(/iPad/i)
			|| navigator.userAgent.match(/iPod/i)
			|| navigator.userAgent.match(/BlackBerry/i)
			|| navigator.userAgent.match(/Windows Phone/i)
			)
		{
			return true;
		}
		else {
			return false;
		}
	}
	function check_email(email){
		if(email!=""){
			var regExp = /^[^@^\s]+@[^\.@^\s]+(\.[^\.@^\s]+)+$/;
			if (email.match(regExp)){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
});