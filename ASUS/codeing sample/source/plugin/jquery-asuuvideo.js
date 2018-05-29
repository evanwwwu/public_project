;
(function($) {
	$.fn.asus_video = function(main_body,callback) {
		var _callback = callback || function(){};
		var video_html = $('<div class="videoplayer" style="display:none;"></div>');
		video_html.append('<div class="videoclose"></div>');
		main_body.append(video_html);
		video_html.find(".videoclose").click(function(){
			video_html.fadeOut(500);
			video_html.find(".player").remove();
		});
		return this.each(function(idx) {
			var video_main = $(this);
			$(this).click(function(e){
				e.preventDefault ();
				_callback();
				var videolink = $(this).attr("href");
				var iframe = $('<iframe class="player" src="'+videolink+'?rel=0&amp;wmode=opaque&amp;autoplay=1&amp;showinfo=0&amp;modestbranding=1" frameborder="0" width="100%" height="100%" allowfullscreen=""></iframe>');
				video_html.append(iframe).fadeIn(500);
			});
		})
	} 
})(jQuery);