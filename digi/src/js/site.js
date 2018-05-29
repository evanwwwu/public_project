$(function() {
    var main = {
        init: function() {
        	this.mobile_set();
            this.index_set();
            this.other_set();
            this.faq_set();
            this.career_set();
        },
        mobile_set:function(){
        	$("header .m_btn").click(function(){
        		$("header").toggleClass("open");
        	});
        	$(".menu_list .sub").click(function(){
        		$(this).toggleClass("open");
        		$(this).find(">ul").stop().slideToggle();
        	});
        },
        index_set:function(){
            $(".news-btn").on("click",function(e){
                e.preventDefault();
                $("html,body").animate({scrollTop:$("#news").offset().top-$("header").height()},'500');
            });
            $('.index .banners').owlCarousel({
                loop:true,
                dots:true,
                lazyLoad:true,
                autoplay:true,
                autoplayTimeout:5000,
                items:1
            });

            var citem =  $(".customers .c-items");
            citem.owlCarousel({
                loop:true,
                dots:false,
                center:true,
                responsive : {
                    0 : {
                        items:1,
                    },
                    420 : {
                        center:false,
                        items:2,
                    },
                    769 : {
                        center:true,
                        items:3,
                    }
                }
            });
            $(".customers .citem-next").click(function(){
                citem.trigger('next.owl.carousel');
            })
            $(".customers .citem-prev").click(function(){
                citem.trigger('prev.owl.carousel');
            });
        },
        other_set:function(){
            var citem =  $(".other .o-items");
            citem.owlCarousel({
                loop:true,
                dots:false,
                center:true,
                responsive : {
                    0 : {
                        items:1,
                    },
                    420 : {
                        center:false,
                        items:2,
                        margin:20
                    }
                }
            });
            $(".other .oth-next").click(function(){
                citem.trigger('next.owl.carousel');
            })
            $(".other .oth-prev").click(function(){
                citem.trigger('prev.owl.carousel');
            });
        },
        faq_set:function(){
            $(".faq-list li").each(function(){
                $(this).click(function(e){
                    if($(e.target).closest(".q").get(0)!=null){
                        if(!$(this).hasClass("on")){
                            $(".faq-list li").removeClass("on");
                            $(".faq-list li").find(".a").slideUp();
                        }
                        $(this).toggleClass("on");
                        $(this).find(".a").stop().slideToggle();
                    }
                })
            });
        },
        career_set:function(){
            $(".job-list .item").each(function(){
                $(this).click(function(e){
                    if($(e.target).closest(".jobtitle").get(0)!=null){
                        if(!$(this).hasClass("on")){
                            $(".job-list .item").removeClass("on");
                            $(".job-list .item").find(".detail").slideUp();
                        }
                        $(this).toggleClass("on");
                        $(this).find(".detail").stop().slideToggle();
                    }
                })
            });
            $(".custom-select").change(function(){
                var val = $(this).find("option:selected").val();
                if(val != ""){
                    $(".job-list .item").each(function(){
                        if($(this).data("type") != val){
                            $(this).fadeOut(300);
                        }else{
                           $(this).fadeIn(300);
                       }
                   });
                }else{
                 $(".job-list .item").fadeIn(300);
             }
         });
        }
    }
    main.init();
});