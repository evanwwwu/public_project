function fb_login(){FB.api("/me",function(t){$.post("/beta/ajax/fb_login",{member:JSON.stringify(t)},function(){},"script"),console.log(JSON.stringify(t))})}window.fbAsyncInit=function(){FB.init({appId:"812873042177520",cookie:!0,xfbml:!0,status:!0,version:"v2.6"})},function(t,i,e){var n,a=t.getElementsByTagName(i)[0];t.getElementById(e)||(n=t.createElement(i),n.id=e,n.src="//connect.facebook.net/en_US/sdk.js",a.parentNode.insertBefore(n,a))}(document,"script","facebook-jssdk"),$(function(){$(".fb_login").click(function(){FB.getLoginStatus(function(t){t.authResponse?fb_login():FB.login(function(t){"connected"===t.status&&fb_login()},{scope:"email"})})})});var site_url=$("#sitejs").data("site");$(function(){function t(){return!!(navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPad/i)||navigator.userAgent.match(/iPod/i)||navigator.userAgent.match(/BlackBerry/i)||navigator.userAgent.match(/Windows Phone/i))}function e(t){if(""!=t){var i=/^[^@^\s]+@[^\.@^\s]+(\.[^\.@^\s]+)+$/;return!!t.match(i)}return!1}var n={init:function(){this.scroll_set(),this.mobile_btn(),this.resize_set(),this.fitler_set(),this.top_btn(),this.faq_set(),this.product_set(),this.classes_set(),this.article_set(),this.recipes_set(),this.member_set(),this.cart_set(),this.step_set(),this.window_loading()},scroll_set:function(){window.innerWidth>=1024&&($(".page_index").length>0&&$("html,body").css("overflow","hidden"),t()||$.stellar({responsive:!0,horizontalScrolling:!1})),$(document).on("mousewheel",function(t){var i=t.originalEvent.wheelDelta;i<0&&$("body.page_index").addClass("remove_intro")}),$(document).on("touchstart",function(t){var i=t.originalEvent.touches[0].pageY;$(document).on("touchmove",function(t){currentY=t.originalEvent.touches[0].pageY;var e=currentY-i;e<0&&$("body.page_index").addClass("remove_intro")})}),$(".page_index .warp").one("otransitionend oTransitionEnd msTransitionEnd transitionend",function(t){$("body").removeClass("remove_intro").removeClass("page_index"),$("html,body").css("overflow","auto")})},mobile_btn:function(){$(".main_menu .close").click(function(){$("body").removeClass("menu_open")}),$(".sub_item .sub_close").click(function(){$("body").removeClass("sub_open"),$("header>.sub_item").removeClass("open")}),$(".sub_option a").on("click",function(t){return t.preventDefault(),load_url=$(this).attr("href"),$("header>.sub_item").removeClass("open"),$("header>.sub_item."+load_url).addClass("open"),$("body").addClass("sub_open"),!1}),$(".sub_item .sub_close").click(function(){$("body").removeClass("sub_open")}),$(".select_btn").click(function(){$(".type_select").toggleClass("open"),$(".type_select").find("ul").stop().slideToggle(300)})},resize_set:function(){$(window).on("resize",function(){window.innerWidth>=1024?($(".m_icon").off("click"),$(".mobile_logo").off("click"),$(".mobile_logo").on("click",function(){$("body").toggleClass("menu_open")}),$("header .menu_btn").click(function(){$("body").removeClass("sub_open"),$("header>.sub_item").removeClass("open")})):($("body").removeClass("sub_open"),$(".mobile_logo").off("click"),$(".m_icon").off("click"),$(".m_icon").on("click",function(){$("body").addClass("menu_open")})),cart=$("#cart_list");var t=0;t+=cart.find(".c_head").height(),t+=cart.find(".c_content .bottom_div").height(),cart.find(".all_list").height(cart.height()-t)}).trigger("resize")},top_btn:function(){$("#up_btn").click(function(){$("html,body").animate({scrollTop:0},"500")})},faq_set:function(){var t=$(".faq_items");t.find(".item").each(function(i){var e=$(this);e.find(".qtitle").click(function(){i!=t.find(".item").index($(".open"))?(t.find(".item.open .answer").slideUp(300),t.find(".item").removeClass("open"),e.addClass("open"),e.find(".answer").slideDown(300)):(t.find(".item.open .answer").slideUp(300),t.find(".item").removeClass("open"))})})},product_set:function(){$(".products .items>.item>a").each(function(){$(this).click(function(t){if(t.preventDefault(),$(this).attr("disabled"))return!1;$(this).attr("disabled",!0);var i=$(this).data("id"),e=$(this).attr("href"),a=window.location.href.split("?"),o=n.get_url(),s="?row="+i;if(o.length>0)for($i=0;$i<=o.length/2;$i++)"row"!=o[$i]&&(s+="&"+o[$i]+"="+o[o[$i]]);window.history.replaceState({},"filter",a[0]+s),item=$(this).parent(),item.parent().find(".item").removeClass("active"),$(".products .items>.item").find(".detail").length>0?$(".products .items>.item").find(".detail").stop().slideUp(500,function(){$(".products .items>.item").find(".detail").remove(),item.addClass("active"),console.log(321),$.get(e,function(t){item.find(">a").removeAttr("disabled"),item.append(t),n.detail_set(),item.find(".detail").css({"margin-left":-(item.offset().left-$(".products .items").offset().left)}),item.find(".detail").stop().slideDown(500)},"html")}):(item.addClass("active"),$.get(e,function(t){item.find(">a").removeAttr("disabled"),item.append(t),n.detail_set(),item.find(".detail").css({"margin-left":-(item.offset().left-$(".products .items").offset().left)}),item.find(".detail").stop().slideDown(500)},"html"))})});var t=n.get_url();t.indexOf("row")!=-1&&$(".row_"+t.row).find(">a").click()},detail_set:function(){var t=$(".detail");$(".detail_close").click(function(){$(this).parents(".detail").slideUp(500,function(){$(this).parents(".item").removeClass("active"),$(this).remove();var t=n.get_url(),i="",e=[],a=window.location.href.split("?");if(t.length>0){for(i="?",$i=0;$i<=t.length/2;$i++)"row"!=t[$i]&&e.push(t[$i]+"="+t[t[$i]]);$.each(e,function(t,e){0!=t&&(i+="&"),i+=e})}window.history.replaceState({},"filter",a[0]+i)})}),t.find("input[name=qty]").change(function(){$(this).val()>t.data("count")&&(alert("此產品數量最多為"+t.data("count")),$(this).val(0))}),ifd=$(".info_btn"),ifd.find(".btn").click(function(){ifd.toggleClass("if_open"),ifd.find(".info").stop().slideToggle(300)}),$(".attest_btn").click(function(){var t=$(this).data("img");window.open(t,"_blank")}),t.find(".add_cart:not(.over)").click(function(){var i=t.find(".pic>img").attr("src"),e=t.data("pid")+"-"+t.data("mid"),a=t.find("input[name=qty]").val(),o=t.find(".title .t1").text().replace(/ /g,""),s={};s.type="ingredients",s.img=i,s.unit=t.find(".price").data("unit"),s.unit_text=t.find(".price").data("unittext"),s.price_text=t.find(".price").text(),s.name_t2=t.find(".title .t2").text().replace(/ /g,""),s.ship_type=t.find(".price").data("ship");var l=t.find(".price").data("price")/s.unit;a>=s.unit?n.cart_add(e,a,l,o,s):alert("請輸入大於等於 "+s.unit+s.unit_text+" 的數量")})},article_set:function(){var t=$(".main_content");t.find("input[name=qty]").change(function(){$(this).val()>t.data("count")&&(alert("此產品數量最多為"+t.data("count")),$(this).val(0))}),t.find(".add_cart:not(.over)").click(function(){var i=$(".main_img_pic>img").attr("src"),e=t.data("pid")+"-"+t.data("mid"),a=t.find("input[name=qty]").val(),o=t.find(".detail_title .t1").text(),s={};s.type="articles",s.img=i,s.unit=t.find(".price").data("unit"),s.unit_text=t.find(".price").data("unittext"),s.price_text=t.find(".price").text(),s.name_t2=t.find(".detail_title .t2").text(),s.ship_type=t.find(".price").data("ship");var l=t.find(".price").data("price")/s.unit;a>=s.unit?(n.cart_add(e,a,l,o,s),console.log(i)):alert("請輸入大於等於 "+s.unit+s.unit_text+" 的數量")})},recipes_set:function(){},classes_set:function(){$(".up_form .select").on("click",".placeholder",function(){var t=$(this).closest(".select");t.hasClass("is-open")?t.removeClass("is-open"):(t.addClass("is-open"),$(".select.is-open").not(t).removeClass("is-open"))}).on("click","ul>li",function(){var t=$(this).closest(".select");t.removeClass("is-open").find(".placeholder").text($(this).text()),t.find("input[type=hidden]").attr("value",$(this).attr("data-value"))}),$(".up_form").submit(function(){return""==$("input[name=date_id]").val()?(alert("請選擇日期!"),!1):""==$("input[name=username]").val()?(alert("請輸入姓名!"),!1):""==$("input[name=phone]").val()?(alert("請輸入電話!"),!1):e($("input[name=email]").val())?void 0:(alert("請輸入正確電子信箱!"),!1)})},member_set:function(){var t=$(".member_edit");t.find(".edit_btn").click(function(){t.find(".all_data>.defaul_div").slideUp(200,function(){t.find(".all_data>.edit_div").slideDown(200)}),$(this).fadeOut(400)}),t.find(".edit_div>.edit_close").click(function(){t.find(".all_data>.edit_div").slideUp(200,function(){t.find(".all_data>.defaul_div").slideDown(200)}),t.find(".edit_btn").fadeIn(400)}),$(".more_div").find(".more_btn").click(function(){$(this).parent().find(">ul").stop().slideToggle(500),$(this).toggleClass("open")}),$("#member_signup").ajaxForm({beforeSubmit:function(t,i,n){return e(i.find("input[name=email]").val())?""==i.find("input[name=password]").val()||i.find("input[name=password]").val()!=i.find("input[name=password2]").val()?(alert("請確認密碼正確相同!"),!1):void 0:(alert("請輸入正確電子信箱!"),!1)},dataType:"script"}),$("#member_login").ajaxForm({beforeSubmit:function(t,i,n){return e(i.find("input[name=email]").val())?""==i.find("input[name=password]").val()?(alert("請輸入密碼!"),!1):void 0:(alert("請輸入正確電子信箱!"),!1)},dataType:"script"}),$("#edit_form").ajaxForm({beforeSubmit:function(t,i,n){return e(i.find("input[name=email]").val())?""==i.find("input[name=username]").val()?(alert("請輸入姓名!"),!1):""==i.find("input[name=phone]").val()?(alert("請輸入家用電話!"),!1):""==i.find("input[name=mobile]").val()?(alert("請輸入手機號碼!"),!1):""==i.find("input[name=password]").val()||i.find("input[name=password]").val()!=i.find("input[name=password2]").val()?(alert("請確認密碼正確相同!"),!1):""==i.find("input[name=address]").val()?(alert("請輸入寄送地址!"),!1):void 0:(alert("請輸入正確電子信箱!"),!1)},dataType:"script"}),$("#getpass").ajaxForm({beforeSubmit:function(t,i,n){if(!e(i.find("input[name=email]").val()))return alert("請輸入正確電子信箱!"),!1},dataType:"script"})},cart_set:function(){$(".cart_icon").click(function(){$("body").addClass("cart_open")}),cart=$("#cart_list"),cart.find(".c_colse").click(function(){$("body").removeClass("cart_open")}),n.cart_del()},fitler_set:function(){$(".type_select ul>li").each(function(i){$(this).find("a").click(function(i){i.preventDefault(),$(".detail_close").length>0&&$(".detail_close").click(),$(".type_select ul>li").removeClass("active");var e=$(this).parent().attr("filter-id");$(this).parent().addClass("active");var a=window.location.href.split("?"),o=n.get_url(),s="?filter="+e;if(o.length>0)for($i=0;$i<=o.length/2;$i++)"filter"!=o[$i]&&(s+="&"+o[$i]+"="+o[o[$i]]);window.history.replaceState({},"filter",a[0]+s),t(),window.innerWidth<768&&($(".type_select").find(".selected_p").text($(this).find("p").text()),$(".type_select").removeClass("open"),$(".type_select").find("ul").stop().slideUp(300))})});var t=function(){$(".items .item").each(function(){var t=$(this).data("filter"),i=$(".type_select ul li.active").attr("filter-id");t==i?$(this).fadeIn(300):$(this).fadeOut(300)})};t()},step_set:function(){$(".pay_step .item .i_del").click(function(){if(confirm("確認刪除?"))var t=$(this).parents("li");var i=t.attr("rowid");$.post(site_url+"shop/del_item",{rowid:i},function(e){t.remove(),$("#cart_list li[rowid="+i+"]").remove();var n=parseInt($("#cart_list .c_head .c").html())-1,a=parseInt($("#cart_list .total_price .n").html())-e.price,o=0==e.ship?"免運":e.ship;$("#cart_list .c_head .c").html(n),$("#cart_list .total_price .n").html(a),$(".pay_step .totle_price .n").html("$"+e.total),$(".ship_div .ship_type").html(e.ship_type),$(".ship_div .ship_price").html(o)},"json")}),$("#step_form").submit(function(){return e($("#step_form").find("input[name=email]").val())?""==$("#step_form").find("input[name=username]").val()?(alert("請輸入姓名!"),!1):""==$("#step_form").find("input[name=phone]").val()?(alert("請輸入家用電話!"),!1):""==$("#step_form").find("input[name=mobile]").val()?(alert("請輸入手機號碼!"),!1):""==$("#step_form").find("input[name=address]").val()?(alert("請輸入寄送地址!"),!1):void 0:(alert("請輸入正確電子信箱!"),!1)})},window_loading:function(){function t(){$("#loading_part").fadeOut(400)}var i=0,e=$("body img"),n=$("#activeBorder");allimg_count=e.length;var a=0;allimg_count>=1?e.each(function(){$(this).imagesLoaded(function(){i++,a=Math.floor(i/allimg_count*360),$("#prec").text(String(Math.floor(a/360*100))+"%"),i==allimg_count&&t(),a<=180?n.css("background-image","linear-gradient("+(90+a)+"deg, transparent 50%, #fff 50%),linear-gradient(90deg, #fff 50%, transparent 50%)"):n.css("background-image","linear-gradient("+(a-90)+"deg, transparent 50%, #fff 50%),linear-gradient(90deg, #fff 50%, transparent 50%)")})}):t()},get_url:function(){var t,e,n=location.search,a=[];if(n.indexOf("?")!=-1){var o=n.split("?");for(t=o[1].split("&"),i=0;i<t.length;i++)e=t[i].split("="),a.push(e[0]),a[e[0]]=e[1]}return a},cart_add:function(t,i,e,a,o){$.post(site_url+"shop/add2cart",{id:t,qty:i,price:e,name:a,option:JSON.stringify(o)},function(t){$(".cart_icon").addClass("on"),$("#cart_list .all_list ul").html(t.view),$("#cart_list .c_head .c").html(t.total),$("#cart_list .total_price .n").html(t.price),n.cart_del(),window.innerWidth>=1024?$(".ec_div .cart_icon").click():$(".mobile_logo .cart_icon").click()},"json")},cart_del:function(){$("#cart_list").find(".i_del").click(function(){if(confirm("確認刪除?"))var t=$(this).parents("li");var i=t.attr("rowid");$.post(site_url+"shop/del_item",{rowid:i},function(i){t.remove();var e=parseInt($("#cart_list .c_head .c").html())-1,n=parseInt($("#cart_list .total_price .n").html())-i.price;$("#cart_list .c_head .c").html(e),$("#cart_list .total_price .n").html(n),$("#cart_list .all_list li").length<=0&&$(".cart_icon").removeClass("on")},"json")})}};n.init()});