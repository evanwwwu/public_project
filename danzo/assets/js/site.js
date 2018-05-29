
var w_h = window.innerHeight;
var end = true;
var timeout = 400;
var phone_size=768;
var svg;

function init() {
	if ($(".sitemap")) {
		svg_init();
	}
	news_init();
	mobile_init();
	member_init();
}

function mobile_init(){
	$("header .icon").unbind("click");
	$("header .icon").click(function(){
		$("header").toggleClass("open");
	});
}
function news_init(){
	$(".news_item").unbind("click");
	$(".news_item").click(function(){
		var site_url = $(this).attr("data-url");
		$(this).addClass("active");
		$("html").addClass("popup");
		$.post(site_url,null,function(html){
			$("#popup").html(html);
			$("#popup").addClass("open");
			var pop_close = function(){
				$(".news_item").removeClass("active");
				$("#popup").removeClass("open");
				$("#popup").empty();
				$("html").removeClass("popup");
			};
			$(".close_btn").unbind("click");
			$(".close_btn").on("click",function(e){
				pop_close();
			});
			$("#popup").find(".bg").unbind("click");
			$("#popup").find(".bg").on("click",function(e){
				pop_close();
			});
		},"html");
	});
}

function member_init(){
	$(".members .user").unbind("click");
	$(".members .user").click(function(){
		var site_url = $(this).attr("data-url");
		$("html").addClass("popup");
		$.post(site_url,null,function(html){
			$("#popup").html(html);
			$("#popup").addClass("open");
			var pop_close = function(){
				$("#popup").removeClass("open");
				$("#popup").empty();
				$("html").removeClass("popup");
			};
			$(".close_btn").unbind("click");
			$(".close_btn").on("click",function(e){
				pop_close();
			});
			$("#popup").find(".bg").unbind("click");
			$("#popup").find(".bg").on("click",function(e){
				pop_close();
			});
		},"html");
	});
}
function svg_init() {
	$(".sitemap").imagesLoaded(function() {
		var m_top = (w_h - $(".sitemap").height()) / 2;
		$(".sitemap").css("margin-top", m_top);
		if(is_mobile()){
			$(".hover_obj").attr("class","hover_obj mobile");
		}
		$(".link").click(function() {
			var path = $(this).attr("data-url");
			path = path.replace("_g", "");
			location = path;
		});
		setTimeout(function(){$(".sitemap").addClass("show")},500);
	});
}

function particle(){
	if(end)
	{
		end = false;
		var m = d3.mouse(this);
		svg.select("#lake").append('ellipse')
		.attr('cx', m[0])
		.attr('cy', m[1])
		.attr('rx', 1e-6)
		.attr('ry', 1e-6)
		.style("stroke","#fff")
		.style('stroke-opacity', 0.4)
		.transition()
		.duration(2000)
		.ease(Math.sqrt)
		.attr('rx', 200)
		.attr('ry', 70)
		.style('stroke-opacity', 1e-6)
		.remove();
		setTimeout(function(){
			end = true;
		},timeout);
		d3.event.preventDefault();
	}
}

//new
function is_mobile(){
	var mobiles = new Array
	(
		"midp", "j2me", "avant", "docomo", "novarra", "palmos", "palmsource",
		"240x320", "opwv", "chtml", "pda", "windows ce", "mmp/",
	    "blackberry", "mib/", "symbian", "wireless", "nokia", "hand", //"mobi",
	    "phone", "cdm", "up.b", "audio", "sie-", "sec-", "samsung", "htc",
	    "mot-", "mitsu", "sagem", "sony", "alcatel", "lg", "eric", "vx",
	    "NEC", "philips", "mmm", "xx", "panasonic", "sharp", "wap", "sch",
	    "rover", "pocket", "benq", "java", "pt", "pg", "vox", "amoi",
	    "bird", "compal", "kg", "voda", "sany", "kdd", "dbt", "sendo",
	    "sgh", "gradi", "jb", "dddi", "moto", "iphone", "android",
	    "iPod", "incognito", "webmate", "dream", "cupcake", "webos",
	    "s8000", "bada", "googlebot-mobile","ipad"
	    );
	var ua = navigator.userAgent.toLowerCase();
	var isMobile = false;
	for (var i = 0; i < mobiles.length; i++) {
		if (ua.indexOf(mobiles[i]) > 0) {
			isMobile = true;
			break;
		}
	}
	return isMobile;
}

$(function() {
	init();
	$(window).resize(function() {
		init();
	});	
});