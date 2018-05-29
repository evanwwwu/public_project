var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
var site = {
  init : function () {
    // site.loginStep();
    site.mainNavEffect();
    site.naviFixed();
    site.goTop();
    site.showAD();
    site.accordionMenu();
    site.fbMenu();
    site.relatedTab();
    site.popupForm();
    // site.magnificPop();
    site.footer();
  },

  // language: function(){
  //   var windowHeight = $(window).height();
  //   $('body').css({
  //     height: windowHeight,
  //     overflow: 'hidden'
  //   })
  //   $('#langPopup').fadeIn();
  //   $('#overlay').fadeIn();
  //   $('#langPopup a.zh').click(function(){
  //     $('#langPopup').fadeOut();
  //     $('#overlay').fadeOut();
  //     $('body').css({
  //       height: 'auto',
  //       overflow: 'auto'
  //     })
  //     site.indexOnLoad();
  //   })
  // },

  loginStep: function(){
    $('#register .register a').click(function(){
      $('#register').hide();
      $('#logIn').fadeIn();
    });
    $('#register a.submitBtn').click(function(){
      var email = $('#register .email').val();
      if(email === ""){
        alert("請輸入電子信箱");
        $('#register .register input').focus();
        return false;
      }else{
        var emailRegxp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (emailRegxp.test(email) != true){
          alert('電子信箱格式錯誤');
          $('#register .register input').focus();
          $('#register .register input').select();
          return false;
        }else{
          $('#register').hide();
          $('#profile').fadeIn();
        }
      }
    });
    $('#profile .submitBtn').click(function(){
      /* 表格資料判斷程式寫這裡 */

      $('#profile').hide();
      $('#registerSuccess').fadeIn();
    })
  },

  indexOnLoad: function () {
    var isMobile;
    var currentWidth = $(window).width();
    $(window).resize(function() {
      var resizeWidth = $(window).width();
      if( resizeWidth < 640 ){
        isMobile = true;
      }
      else {
        isMobile = false;
      }
    });

    if( currentWidth < 640){
      isMobile = true;
    }
    else{
      isMobile = false;
    }

    if(!isMobile){
      if($('body').hasClass('index')){
        $('.marginAnimate').animate({
          height: '450px'
        },700,'easeInOutCirc').delay(1500).animate({
          height: '0px'
        },700,'easeInOutCirc');
      }
    }
  },

  mainNavEffect: function () {
    var windowWidth = $(window).width();
    if(windowWidth > 640){
      $('#mainNav > ul > li > a').hover(function(){
        if(!$(this).parent('li').hasClass('active')){
          $('#mainNav li.active > a').css({
            backgroundColor: '#ed1c24',
            color:'#fff'
          });
        }
      }, function(){
        $('#mainNav li.active > a').removeAttr('style');
      });
    }
    
  },

  slideBanner : function () {
    var slideLength = $('.swipe-wrap > div').length;
    //console.log(slideLength);
    var slidePos = $('#slidePos');
    for (i=0; i < slideLength; i++){
       slidePos.append("<li><a href='#' onclick='mySwipe.slide("+i+",500); return false;'></a></li>"); 
    }
    $('#slidePos li:first-child').addClass('active');
    var elem = document.getElementById('slideBanner');
    window.mySwipe = Swipe(elem, {
      auto: 4000,
      continuous: true,
      speed: 700,
      callback: function(pos) {
        var i = bullets.length;
        while (i--) {
          bullets[i].className = ' ';
        }
        bullets[pos].className = 'active';
      }
    });
    var bullets = document.getElementById('slidePos').getElementsByTagName('li');
    $('.wordW a').click(function(){
      mySwipe.prev();
      return false;
    });
    $('.wordE a').click(function(){
      mySwipe.next();
      return false;
    });
    // $('.slider').hover(function(){
    //   $('.slideCtl').fadeIn();
    // },function(){
    //   $('.slideCtl').fadeOut();
    // })
  },

  showAD: function(){
    // var currentWidth = $(window).width();
    // var isMobile;
    
    // $(window).resize(function() {
    //   var resizeWidth = $(window).width();
    //   if( resizeWidth < 640 ){
    //     isMobile = true;
    //   }
    //   else {
    //     isMobile = false;
    //   }
    // })

    // if( currentWidth < 640){
    //   isMobile = true;
    // }
    // else{
    //   isMobile = false;
    // }

    // $(window).scroll(function(){
    //   var nowPos = $(document).scrollTop();
    //   if(!isMobile){
    //     if( nowPos < 1 ){
    //       openAD();
    //     }
    //   }
    // })
    

    $('.openToggle').hover(function(){
      $(this).children('a').css('display','block');
    },function(){
      $(this).children('a').css('display','none');
    });

    $('.openToggle a').click(function(){
      var marginHeight = parseInt($('.marginAnimate').css('height'));
      //console.log(marginHeight);
      if( marginHeight === 0 ){
        openAD();
        $('.openToggle').hide();
      }
      
    });

    function openAD() {
      
      $('.marginAnimate').animate({
        height: '450px'
      },700,'easeInOutCirc',function(){
        $('.marginAnimate a').css('height','450');
      });
      $('.adCloseBtn').fadeIn();
      closeAD();
    }

    function closeAD() {
      $('.adCloseBtn').click(function(){
        $('.openToggle').show();
        $('.marginAnimate').animate({
          height: '0'
        },700,'easeInOutCirc',function(){
          $('.marginAnimate a').css('height','0');
        });
        $(this).fadeOut(700);
        return false;
      });
    }

  },

  accordionMenu: function() {
    $('#menu > ul > li').toggleClass('menu-header');
    $('.menu-header > a').click(function(){
      if($(this).next('ul').is(':visible')){
        $(this).next('ul').slideUp("slow");
        $(this).parent().removeClass('open');
      }
      else{
        $('#menu > ul > li > ul').slideUp();
        $('.menu-header').removeClass('open');
        $(this).parent().addClass('open');
        $(this).next("ul").slideToggle();
      }
      return false;
    });
  },

  naviFixed: function(){
    var body     = $('body');
    var currentWidth = $(window).width();
    var isMobile;
    var topNav = $('#topNav');
    //var secNav = $('#secTopNav');
    var mainNav = $('#mainNav');
    var innerWrapper = $('.innerWrapper');
    $(window).resize(function() {
      var resizeWidth = $(window).width();
      if( resizeWidth < 640 ){
        isMobile = true;
      }
      else {
        isMobile = false;
      }
    });

    if( currentWidth < 640){
      isMobile = true;
    }
    else{
      isMobile = false;
    }
    $(window).scroll(function(){
      var mainNavFixed;
      var topNavPos = topNav.offset().top + topNav.height() - 27;
      var mainNavPos = innerWrapper.offset().top - 33 ;
      var currentScroll = $(window).scrollTop();
      //console.log('window scroll = ' + $(window).scrollTop());
      //console.log('mainNavPos = '+mainNavPos);
      //console.log('topNavPos = '+topNavPos);
      if(!isMobile){
        // if($(window).scrollTop() > topNavPos){
        //   secNav.show();
        // }else{
        //   secNav.hide();
        // }
        if($(window).scrollTop() > mainNavPos){
          mainNav.addClass('fixed');
        }else{
          mainNav.removeClass('fixed');
        }
      }else{
        if(currentScroll > 90 ){
          topNav.addClass('small');
        }
        if(!body.hasClass('menu-open') && currentScroll < 90 ){
          if(!body.hasClass('log-open') && currentScroll < 90 ){
            topNav.removeClass('small');
          }
        }
        // if(body.hasClass('menu-open') || body.hasClass('log-open')){
        //   console.log('this: '+ currentScroll);
        //   if( currentScroll > 90){
        //     topNav.addClass('small');
        //   }else{
        //     topNav.removeClass('small');
        //   };
        // };
        // if(!body.hasClass('menu-open') || !body.hasClass('log-open')){
        //   console.log('this: '+ currentScroll);
        //   if( currentScroll > 90){
        //     topNav.addClass('small');
        //   }else{
        //     topNav.removeClass('small');
        //   };
        // }

      }
    });
  },

  fbMenu: function() {
    var body     = $('body'),
        viewport = $('#viewport'),
        menu     = $('#menu'),
        closeMask = $('#closeMask'),
        wrapper  = $('#wrapper'),
        trigger  = $('.trigger'),
        logTrigger = $('.logTrigger'),
        currentScroll;
    trigger.click(function(){
      currentScroll = $(window).scrollTop();
      //console.log(currentScroll);
      if(body.hasClass('menu-open')){
        closeMenu();
      }else{
        openMenu();
      }
      return false;
    });

    logTrigger.click(function(){
      currentScroll = $(window).scrollTop();
      if(body.hasClass('log-open')){
        closeLog();
      }else{
        openLog();
      }
    });

    closeMask.click(function(){
      event.preventDefault();
      if(body.hasClass('menu-open')){
        closeMenu();
      }else{
        closeLog();
      }
    });

    $(window).resize(function() {
      var resizeWidth = $(window).width();
      if($('body').hasClass('menu-open')){
        if(resizeWidth > 640){
          $('.fbMenu').css('display','none');
        }
        if(resizeWidth < 640){
          $('.fbMenu').css('display','block');
        }
      }
    });

    // closeMask.bind('touchmove', function(){
    //   event.preventDefault();
    //   if(body.hasClass('menu-open')){
    //     closeMenu();
    //   }else{
    //     closeLog();
    //   }
    // });

    function openMenu() {
      var mainWidth = $(document).outerWidth();
      var menuHeight = $('#menu').outerHeight();
      var searchHeight = $('#menu .search').outerHeight();
      var topNav = $('#topNav');
      var wrapper = $('#wrapper');
      //wrapper.css('padding-top','0px');
      //topNav.css('position','relative');
      $('.logMenu').hide();
      $('.fbMenu').show();
      $('#closeMask').show().css({"width":mainWidth - 210, "left":"210px"});
      $('body').addClass('menu-open');
      //$('#logMenu').hide();
      // $('#wrapper').animate({
      //     left: "210px"
      // },500,'easeInOutCirc')
      // topNav.animate({
      //   left: "210px"
      // },500,'easeInOutCirc')
      //$("#viewport").css("overflow-y","hidden");
      $("#viewport").css("height",menuHeight);
      $('#wrapper').scrollTop(currentScroll);

      $('#wrapper').css({
        top: -currentScroll
      });
      $('#menu > ul').css('height', menuHeight - searchHeight);
      
    }

    function closeMenu() {
      var topNav = $('#topNav');
      var wrapper = $('#wrapper');
      $('#closeMask').hide().css({"left":"0","right":"none"});
      // $('#wrapper').animate({
      //     left: "0"
      // },500,'easeInOutCirc',function(){
      //     $('#logMenu').show();
      //     $('#wrapper').removeAttr('style');
      // });
      // topNav.animate({
      //   left: "0"
      // },500,'easeInOutCirc')
      
      $('body').removeClass('menu-open');
      //$("#viewport").css("overflow-y","none");
      $("#viewport").css("height",'auto');

      //$('#logMenu').show();
      $('#wrapper').removeAttr('style');
      $(window).scrollTop(currentScroll);
      $('.fbMenu').hide();
      return false;
    }

    function openLog() {
      var mainWidth = $(document).outerWidth();
      var menuHeight = $('#menu').outerHeight();
      var topNav = $('#topNav');
      var wrapper = $('#wrapper');
      //wrapper.css('padding-top','0px');
      //topNav.css('position','relative');
      $('#closeMask').show().css({"width":mainWidth - 210, "right":"210px"});
      $('body').addClass('log-open');
      $('.logMenu').show();
      $('.fbMenu').hide();
      // $('#wrapper').animate({
      //     right: "210px"
      // },500,'easeInOutCirc')
      //$("#viewport").css("overflow-y","hidden");
      $("#viewport").css("height",menuHeight);
      $('#wrapper').scrollTop(currentScroll);
      $('#wrapper').css({
        top: -currentScroll
      });
      return false;
    }

    function closeLog() {
      var topNav = $('#topNav');
      var wrapper = $('#wrapper');
      $('#closeMask').hide().css({"right":"0","left":"none"});
      // $('#wrapper').animate({
      //     right: "1px"
      // },500,'easeInOutCirc',function(){
      //     $('#menu').show();
      //     $('#wrapper').removeAttr('style');
      //     topNav.css('position','fixed');
      //     wrapper.css('padding-top','90px');
      // });
      $('.logMenu').hide();
      $('body').removeClass('log-open');
      $("#viewport").css("height",'auto');
      $('#wrapper').removeAttr('style');
      $(window).scrollTop(currentScroll);
      //$("#viewport").css("overflow-y","none");
      //$("#viewport").css("height",'auto');
      return false;
    }

    

  },

  // changeFontSize: function() {
  //   $('.fontSizeCtl a').click(function(){
  //     // var fontSize = parseInt($('.summary span').css("font-size"));
  //     var fontSize = 100 ;
  //     //var lineHeight = parseInt($('.summary').css("line-height"));
  //     var lineHeight = fontSize * 1.7 + "%";
  //     console.log(fontSize);
  //     if($(this).hasClass('small')){
  //       fontSize = fontSize - 2 + "px";
  //       // $('.summary span').css({'font-size':fontSize,'lineHeight':lineHeight});
  //       $('.summary span').css('cssText','font-size:80% !important;line-height:28px');
  //       $('.content span').css('cssText','font-size:80% !important;line-height:28px');
  //     }
  //     if($(this).hasClass('bigger')){
  //       fontSize = fontSize + 2 + "px";
  //       // $('.summary span').css({'font-size':fontSize,'lineHeight':lineHeight});
  //       // $('.content span').css({'font-size':fontSize,'lineHeight':lineHeight});
  //       ('.summary span').css('cssText','font-size:130% !important;line-height:28px');
  //       $('.content span').css('cssText','font-size:130% !important;line-height:28px');
  //     }
  //     return false;
  //   });
  // },

  changeFontSize: function () {
      $(".fontSizeCtl a").click(function (e) {
        if ($(this).hasClass("small")) {
          $(".postContent p").each(function(){
            var org_font_size = parseInt($(this).css('font-size'));
            var new_size = org_font_size - 2;
            var line_height = Math.ceil(new_size*1.5);
            $(this).css('font-size',new_size);
            $(this).css('line-height',line_height+'px');
          });
          $(".postContent span").each(function(){
            var org_font_size = parseInt($(this).css('font-size'));
            var new_size = org_font_size - 2;
            var line_height = Math.ceil(new_size*1.5);
            $(this).css('font-size',new_size);
            $(this).css('line-height',line_height+'px');
          });
        }
        if ($(this).hasClass("bigger")) {
          $(".postContent p").each(function(){
            var org_font_size = parseInt($(this).css('font-size'));
            var new_size = org_font_size + 2;
            var line_height = Math.ceil(new_size*1.5);
            $(this).css('font-size',new_size);
            $(this).css('line-height',line_height+'px');
          });
          $(".postContent span").each(function(){
            var org_font_size = parseInt($(this).css('font-size'));
            var new_size = org_font_size + 2;
            var line_height = Math.ceil(new_size*1.5);
            $(this).css('font-size',new_size);
            $(this).css('line-height',line_height+'px');
          });
        }
        e.preventDefault();
        return false;
      });
    },

  popupForm: function() {
    $('.signIn').click(function(){
      var windowHeight = $(window).height();
      $('body').css({
        height: windowHeight,
        overflow: 'hidden'
      });
      $('#register').fadeIn();
      $('#overlay').fadeIn();
    });
    $('.logIn').click(function(){
      var windowHeight = $(window).height();
      $('body').css({
        height: windowHeight,
        overflow: 'hidden'
      });
      $('#logIn').fadeIn();
      $('#overlay').fadeIn();
    });
    $('.popupForm .closeBtn').click(function(){
      $('.popupForm').fadeOut();
      $('#overlay').fadeOut();
      $('body').css({
        height: 'auto',
        overflow: 'auto'
      });
    });
  },

  relatedTab: function() {
    $(".tab_content").hide();
      $(".tabs li:first").addClass("selected").show();
      $(".tab_content:first").show();

      $(".tabs li").click(function() {
        $(".tabs li").removeClass("selected");
        $(this).addClass("selected");
        $(".tab_content").hide();
        var activeTab = $(this).find("a").attr("href");
        $(activeTab).fadeIn();
        return false;
      });
  },

  isMobileMode: function() {
    var WindowWidth = $(window).width();
    //console.log(resizeWidth);
    if( WindowWidth < 640 ){
      //console.log('true');
      return(true);
    }
    else {
      //console.log('false');
      return(false);
    }
  },

  isPhone: function() {
    if (/iphone|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase())) {
        return(true);
    }
    else {
        return(false);
    }
  },

  goTop: function(){
    var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
    $('.goTop a').click(function(){
      $body.animate({scrollTop: 0}, 700, 'easeInOutCirc');
      return false;
    });
  },

  getRecommend: function(url){
    this.url = url;
    $.ajax({
      url: this.url,
      type: "GET",
      dataType: "json",
      success: function(jData) {
        //alert("SUCCESS!!!");
        if(site.isMobileMode()){
          var perPage = 4;
        }else{
          var perPage = 3;
        }
        var currentPage = 1;
        var currentData = 0;
        var firstLoad;
        var numOfData = jData.length;
        var totalPage = jData.length / perPage;
        if (perPage < numOfData){
          firstLoad = perPage;
        }else{
          firstLoad = numOfData;
          $('#pager').hide();
        }
        // for (var i = (currentPage - 1) * perPage; i < currentPage * perPage; i++){
        //   $('#recommend ul').append('<li><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
        // }
        $('#pager .prevBtn').addClass('disable');
        for (var i = 0; i < firstLoad; i++){ // first load
          $('#recommend ul').append('<li><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
          currentData += 1;
        }
        //console.log(currentData);
        $('#pager .nextBtn').bind("click", function(){
          $('#pager .prevBtn').removeClass('disable');
          // if( currentPage < totalPage ){
          //   currentPage += 1;
          //   $('#recommend ul li').fadeOut().remove();
          //   for (var i = (currentPage - 1) * perPage; i < currentPage * perPage; i++){
          //     $('#recommend ul').append('<li style="display:none;"><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
          //   }
          //   $('#recommend ul li').fadeIn('slow');
          //   if( currentPage === totalPage){
          //     $(this).addClass('disable');
          //   }
          // }
          // console.log('currentPage= '+currentPage);
          // console.log('totalPage= '+totalPage);
          if ( currentData < numOfData){
            currentPage += 1;
            $('#recommend ul li').fadeOut().remove();
            if( (numOfData - currentData) > perPage){
              var endData = currentData + perPage;
              for( var i = currentData; i < endData; i++){
                $('#recommend ul').append('<li style="display:none;"><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
              }
              currentData = endData;
              // console.log('currentData = '+currentData);
              // console.log('endData = '+endData);
              // console.log('currentPage = '+currentPage);
            }else{
              for( var i = currentData; i < numOfData; i++){
                $('#recommend ul').append('<li style="display:none;"><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
              }
              $(this).addClass('disable');
              currentData = numOfData;
              // console.log('currentData = '+currentData);
              // console.log('endData = '+endData);
              // console.log('currentPage = '+currentPage);
            }
            $('#recommend ul li').fadeIn('slow');
          }
          return false;
        });
        $('#pager .prevBtn').bind("click", function(){
          $('#pager .nextBtn').removeClass('disable');
          if( currentPage > 1 ){
            currentData = (currentPage - 1) * perPage;
            currentPage -= 1;
            $('#recommend ul li').fadeOut().remove();
            for (var i = (currentPage - 1) * perPage; i < currentPage * perPage; i++){
              $('#recommend ul').append('<li style="display:none;"><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
            }
            // console.log('currentData = '+currentData);
            // console.log('currentPage = '+currentPage);
            // //console.log('endData = '+endData);
            $('#recommend ul li').fadeIn('slow');
            if( currentPage === 1){
              $(this).addClass('disable');
            }
          }
          return false;
        });
      },
      
      error: function() {
        $('#recommend ul').remove();
        $('#recommend').append('<p> no information </p>');
      }
    });
  },

  getFamous: function(url){
    this.url = url;
    $.ajax({
      url: this.url,
      type: "GET",
      dataType: "json",
      success: function(jData) {
        //alert("SUCCESS!!!");
        if(site.isMobileMode()){
          var perPage = 4;
        }else{
          var perPage = 3;
        }
        var currentPage = 1;
        var currentData = 0;
        var firstLoad;
        var numOfData = jData.length;
        var totalPage = jData.length / perPage;
        if (perPage < numOfData){
          firstLoad = perPage;
        }else{
          firstLoad = numOfData;
          $('#pager').hide();
        }
        // for (var i = (currentPage - 1) * perPage; i < currentPage * perPage; i++){
        //   $('#famous ul').append('<li><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
        // }
        $('#pager .prevBtn').addClass('disable');
        for (var i = 0; i < firstLoad; i++){ // first load
          $('#famous ul').append('<li><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
          currentData += 1;
        }
        $('#pager .nextBtn').bind("click", function(){
          $('#pager .prevBtn').removeClass('disable');
          // if( currentPage < totalPage ){
          //   currentPage += 1;
          //   $('#famous ul li').fadeOut().remove();
          //   for (var i = (currentPage - 1) * perPage; i < currentPage * perPage; i++){
          //     $('#famous ul').append('<li style="display:none;"><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><p>'+jData[i]["title"]+'</p></a></li>');
          //   }
          //   $('#famous ul li').fadeIn('slow');
          //   if( currentPage === totalPage){
          //     $(this).addClass('disable');
          //   }
          // }
          // console.log('currentPage= '+currentPage);
          // console.log('totalPage= '+totalPage);
          if ( currentData < numOfData){
            currentPage += 1;
            $('#famous ul li').fadeOut().remove();
            if( (numOfData - currentData) > perPage){
              var endData = currentData + perPage;
              for( var i = currentData; i < endData; i++){
                $('#famous ul').append('<li style="display:none;"><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
              }
              currentData = endData;
              // console.log('currentData = '+currentData);
              // console.log('endData = '+endData);
              // console.log('currentPage = '+currentPage);
            }else{
              for( var i = currentData; i < numOfData; i++){
                $('#famous ul').append('<li style="display:none;"><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
              }
              $(this).addClass('disable');
              currentData = numOfData;
              // console.log('currentData = '+currentData);
              // console.log('endData = '+endData);
              // console.log('currentPage = '+currentPage);
            }
            $('#famous ul li').fadeIn('slow');
          }
          return false;
        });
        $('#pager .prevBtn').bind("click", function(){
          $('#pager .nextBtn').removeClass('disable');
          if( currentPage > 1 ){
            currentData = (currentPage - 1) * perPage;
            currentPage -= 1;
            $('#famous ul li').fadeOut().remove();
            for (var i = (currentPage - 1) * perPage; i < currentPage * perPage; i++){
              $('#famous ul').append('<li style="display:none;"><a href="'+jData[i]["url"]+'"><img src="'+jData[i]["img"]+'"/><div class="date">'+jData[i]["date"]+'</div><p>'+jData[i]["title"]+'</p></a></li>');
            }
            // console.log('currentData = '+currentData);
            // console.log('currentPage = '+currentPage);
            // //console.log('endData = '+endData);
            $('#famous ul li').fadeIn('slow');
            if( currentPage === 1){
              $(this).addClass('disable');
            }
          }
          // console.log('currentPage= '+currentPage);
          // console.log('totalPage= '+totalPage);
          return false;
        });
      },
      
      error: function() {
        $('#famous ul').remove();
        $('#famous').append('<p> no information </p>');
      }
    });
  },
  magnificPop: function(){
    $('#related_gallery').magnificPopup({
      delegate: 'a', // child items selector, by clicking on it popup will open
      type: 'image'
      // other options
    });
  },
  footer: function() {
    // $('.indexFooter .view').css('height',"160px");
    $('#footer .openBtn').click(function(){
      // if($('#footer .view').height() === 160){
      //   $('.view').animate({
      //     height: "5px"
      //   }, 700)
      // }else{
      //   $('.view').animate({
      //     height: "160px"
      //   }, 700)
      // }
      if($('#footer').hasClass('footerOpen')){
        $('.view').hide();
        $('#footer').removeClass('footerOpen');
      } else {
        $('.view').show();
        $('#footer').addClass('footerOpen');
      }
      return false;
    });
  }

};


//On DOM READY
$(document).ready(function() {
  site.init();
  // setTimeout(function () {
  //    window.scrollTo(0, 0);
  //    //$('#wrapper').css('position','absolute');
  // }, 100);
});
