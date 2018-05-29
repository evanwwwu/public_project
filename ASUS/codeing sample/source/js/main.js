$(function() {
    var mobile = "poseidon";
    var main = {
        init: function() {
            this.warp_size();
            this.mobile_menu();
            this.nivdia_silde();
            this.motion_set();
            this.brighten_set();
            $(".videolink").asus_video($("#" + mobile + "-warp").find(".video-div"));
            $(".videolink2").asus_video($("#" + mobile + "-warp").find("#poseidon-premium"));
            $("#b2top").click(function() {
                $('html, body').stop().animate({
                    scrollTop: 0
                });
            });
            $("#warp-nav ul").navscroll({
                sec: 1000,
                url_hash: false,
                head_hight: 60
            });
            $('#colorpicker1').farbtastic({ callback: '.color-light', width: 190 });
            $(window).resize(function() {
                main.resize();
            });
        },
        resize: function() {
            this.warp_size();
            this.mobile_menu();
        },
        warp_size: function() {
            $("#" + mobile + "-warp").css({
                width: $(window).width(),
                "margin-left": ($("#special-sectionOverview, #sectionOverview").width() - $(window).width()) / 2
            });
        },
        mobile_menu: function() {
            if ($(window).width() <= 768) { 
                $(window).scroll(function() {
                    if ($(window).width() <= 768) {
                        var ws = $(window).scrollTop();
                        var mt = $("#" + mobile + "-warp").offset().top;
                        if (ws > mt) {
                            $("#warp-nav").css({
                                position: "fixed",
                                top: $("#overview-top-nav").height()
                            });
                        } else {
                            $("#warp-nav").css({
                                position: "absolute",
                                top: 0
                            });
                        }
                    }
                });
                $(".mobile_nav>.m_btn").unbind("click");
                $(".mobile_nav>.m_btn").click(function() {
                    $("#warp-nav ul").slideToggle();
                    $("#warp-nav").toggleClass("open");
                });
                $("#warp-nav li b").unbind("click");
                $("#warp-nav li b").click(function() {
                    $("#warp-nav ul").slideToggle();
                    $("#warp-nav").toggleClass("open");
                });
                
            } else {
                $("#warp-nav li b").unbind("click");
                $("#warp-nav").removeAttr("style");
                $("#warp-nav ul").show();
            }
        },
        brighten_set:function(){
          var brighten = $(".btn_list");
          brighten.find(".i_btn").click(function(){
            if (!$(this).hasClass("on")) {
              brighten.find(".i_btn").removeClass("on");
              $(this).addClass("on");
              var status = $(this).data("status");
              $(".color-light").attr("class","color-light");
              $(".color-light").addClass("status_"+status);
          }
      });
      },
      nivdia_silde: function() {
        var nivdia = $(".nivdia-silde");
        var silde =  nivdia.find(".sildes").owlCarousel({ 
            slideSpeed: 460, 
            items:1,
            autoPlay: false
        });
        nivdia.find(".btn-next").click(function(){
         silde.trigger('next.owl.carousel');
     });
        nivdia.find(".btn-prev").click(function(){
         silde.trigger('prev.owl.carousel');
     });
    },
    motion_set: function(){
            ///water 
            var wt = 0.3;
            new TimelineMax({ delay: 2, repeat: -1, repeatDelay: wt })
            .add([
                TweenMax.fromTo("#poseidon-ultimate .gpu .a2", wt, { autoAlpha: 0 }, { autoAlpha: 1 ,ease: Quad.easeInOut }),
                TweenMax.fromTo("#poseidon-ultimate .gpu .a1", wt, { autoAlpha: 1 }, { autoAlpha: 0 ,ease: Quad.easeInOut })
                ])
            .add([
                TweenMax.fromTo("#poseidon-ultimate .gpu .a3", wt, { autoAlpha: 0 }, { autoAlpha: 1 ,ease: Quad.easeInOut }),
                TweenMax.fromTo("#poseidon-ultimate .gpu .a2", wt, { autoAlpha: 1 }, { autoAlpha: 0 ,ease: Quad.easeInOut })
                ])
            .add([
                TweenMax.fromTo("#poseidon-ultimate .gpu .a4", wt, { autoAlpha: 0 }, { autoAlpha: 1,ease: Quad.easeInOut  }),
                TweenMax.fromTo("#poseidon-ultimate .gpu .a3", wt, { autoAlpha: 1 }, { autoAlpha: 0 ,ease: Quad.easeInOut })
                ])
            .add([
                TweenMax.fromTo("#poseidon-ultimate .gpu .a5", wt, { autoAlpha: 0 }, { autoAlpha: 1 ,ease: Quad.easeInOut}),
                TweenMax.fromTo("#poseidon-ultimate .gpu .a4", wt, { autoAlpha: 1 }, { autoAlpha: 0 ,ease: Quad.easeInOut })
                ])
            .add([
                TweenMax.fromTo("#poseidon-ultimate .gpu .a6", wt, { autoAlpha: 0 }, { autoAlpha: 1,ease: Quad.easeInOut  }),
                TweenMax.fromTo("#poseidon-ultimate .gpu .a5", wt, { autoAlpha: 1 }, { autoAlpha: 0 ,ease: Quad.easeInOut })
                ])
            .add([
                TweenMax.fromTo("#poseidon-ultimate .gpu .a7", wt, { autoAlpha: 0 }, { autoAlpha: 1 ,ease: Quad.easeInOut }),
                TweenMax.fromTo("#poseidon-ultimate .gpu .a6", wt, { autoAlpha: 1 }, { autoAlpha: 0 ,ease: Quad.easeInOut })
                ]);
            // .fromTo("#poseidon-ultimate .gpu .a2", wt, { autoAlpha: 0 }, { autoAlpha: 1 }).addLabel("a2","+="+(wt))
            // .fromTo("#poseidon-ultimate .gpu .a1", wt, { autoAlpha: 1 }, { autoAlpha: 0 }, "-="+wt)
            // .fromTo("#poseidon-ultimate .gpu .a3", wt, { autoAlpha: 0 }, { autoAlpha: 1 },"-=.2").addLabel("a3","+="+(wt))
            // .fromTo("#poseidon-ultimate .gpu .a2", wt, { autoAlpha: 1 }, { autoAlpha: 0 }, "a2")
            // .fromTo("#poseidon-ultimate .gpu .a4", wt, { autoAlpha: 0 }, { autoAlpha: 1 }, "-=.2").addLabel("a4","+="+(wt))
            // .fromTo("#poseidon-ultimate .gpu .a3", wt, { autoAlpha: 1 }, { autoAlpha: 0 }, "a3")
            // .fromTo("#poseidon-ultimate .gpu .a5", wt, { autoAlpha: 0 }, { autoAlpha: 1 }, "-=.2").addLabel("a5","+="+(wt))
            // .fromTo("#poseidon-ultimate .gpu .a4", wt, { autoAlpha: 1 }, { autoAlpha: 0 }, "a4")
            // .fromTo("#poseidon-ultimate .gpu .a6", wt, { autoAlpha: 0 }, { autoAlpha: 1 }, "-=.2").addLabel("a6","+="+(wt))
            // .fromTo("#poseidon-ultimate .gpu .a5", wt, { autoAlpha: 1 }, { autoAlpha: 0 }, "a5")
            // .fromTo("#poseidon-ultimate .gpu .a7", wt, { autoAlpha: 0 }, { autoAlpha: 1 }, "-=.2").addLabel("a7","+="+(wt))
            // .fromTo("#poseidon-ultimate .gpu .a6", wt, { autoAlpha: 1 }, { autoAlpha: 0 }, "a6")
            // .fromTo("#poseidon-ultimate .gpu .a1", wt, { autoAlpha: 0 }, { autoAlpha: 1 }, "-=.2")
            // .fromTo("#poseidon-ultimate .gpu .a7", wt, { autoAlpha: 1 }, { autoAlpha: 0 }, "a7");


            new TimelineMax({ delay: 2, repeat: -1, repeatDelay: 0})
            .from("#poseidon-ultimate .gpu .arr",0.1,{autoAlpha:0,ease: Quad.easeOut })
            .add([
                TweenMax.fromTo("#poseidon-ultimate .gpu .cool",wt*2.5,{top:-50,autoAlpha:0},{top:0,autoAlpha:1,ease:Power1.easeInOut}),
                TweenMax.fromTo("#poseidon-ultimate .gpu .hot",wt*2.5,{top:50,autoAlpha:0},{top:-50,autoAlpha:1,ease:Power1.easeInOut})
                ])
            .to("#poseidon-ultimate .gpu .arr",0.5,{autoAlpha:0,ease: Quad.easeInOut });
            //pipes
            var pt = 0.4;
            new TimelineMax({ delay: 2, repeat: -1, repeatDelay: 0 })
            // .from("#poseidon-ultimate .circles",.4,{autoAlpha:0,ease:Quad.easeInOut})
            .add([
                TweenMax.fromTo("#poseidon-ultimate .c1",pt,{scale:0.75,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut}),
                // TweenMax.fromTo("#poseidon-ultimate .c4",pt,{scale:0.75,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut}),
                // TweenMax.fromTo("#poseidon-ultimate .c6",0.3,{scale:1,x:0,autoAlpha:1},{autoAlpha:0,x:-30,scale:0.75,ease: Power1.easeOut})
                ])
            .add([
                TweenMax.fromTo("#poseidon-ultimate .c2",pt,{scale:0.82,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.eseOut}),
                // TweenMax.fromTo("#poseidon-ultimate .c5",pt,{scale:0.82,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut},"-=.2"),
                // TweenMax.fromTo("#poseidon-ultimate .c5",0.5,{scale:1,x:0,autoAlpha:1},{autoAlpha:0,x:-50,scale:0.7,ease: Power1.easeOut},"-=.2")
                ],"-=0.1")
            .add([
                TweenMax.fromTo("#poseidon-ultimate .c3",pt,{scale:0.75,x:-30,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut}),
                // TweenMax.fromTo("#poseidon-ultimate .c6",pt,{scale:0.75,x:-30,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut},"-=.2"),
                // TweenMax.fromTo("#poseidon-ultimate .c4",0.5,{scale:1,x:0,autoAlpha:1},{autoAlpha:0,x:-50,scale:0.75,ease: Power1.easeOut},"-=.2")
                ],"-=0.2")
            .add([
                TweenMax.fromTo("#poseidon-ultimate .c1",pt,{autoAlpha:1},{autoAlpha:0,ease:Power1.easeOut}),
                TweenMax.fromTo("#poseidon-ultimate .c2",pt,{autoAlpha:1},{autoAlpha:0,ease:Power1.easeOut}),
                TweenMax.fromTo("#poseidon-ultimate .c3",pt,{autoAlpha:1},{autoAlpha:0,ease:Power1.easeOut}),
                ],"+=.1")
            .fromTo("#poseidon-ultimate .c4",pt,{scale:0.75,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut},"-=.2")
            .fromTo("#poseidon-ultimate .c5",pt,{scale:0.82,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut},"-=.1")
            .fromTo("#poseidon-ultimate .c6",pt,{scale:0.82,x:-50,autoAlpha:0},{autoAlpha:1,x:0,scale:1,ease:Power1.easeOut},"-=.2")
            .to("#poseidon-ultimate .circles",0.4,{autoAlpha:0,ease:Quad.easeInOut},"+=.1");
            //pin light
            new TimelineMax({ delay: 2, repeat: -1, repeatDelay: 0.5 })
            .from("#poseidon-ultimate .connect .light",0.8,{autoAlpha:0,ease:Quad.easeInOut})
            .to("#poseidon-ultimate .connect .light",0.8,{autoAlpha:0,ease:Quad.easeInOut});
        }

    }
    main.init();
});
