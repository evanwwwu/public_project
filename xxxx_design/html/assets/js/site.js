$(function(){
  mouse_init();
  navshow();
  var fotorama_height = 198;
  if ($(window).width()<640){
    fotorama_height = '100%';
  }
$('.work_in .fotorama').fotorama({
    width: '100%',
    ratio: '1080/715',
    minwidth: 300,
    maxwidth: 1080,
    minheight: fotorama_height,
    maxheight:'100%',
    nav: 'dots',
    loop: false,
    fit: 'contain',
    easing: "swing",
    transitionduration: 2000,
    autoplay: 7000,
    arrows: true,
    swipe: true,
    click: false,
    spinner: {
      lines: 11,
      length: 10,
      width: 6,
      radius: 20,
      color: 'rgba(0, 0, 0, .75)'
    }
});
$('.fotorama__nav__frame').each(function(){
  var page = "00" + $(this).index();
  var words = page.substr(page.length-2,2);
  $(this).html(words);
});
$('.fotorama').on('fotorama:showend ',function (e, fotorama, extra) {
    $(".count.m").html($('.fotorama__nav__frame.fotorama__active').index() + ' / ' + $('.fotorama__nav__frame').length);
});

});

//----------------   mouse  ------------------//
function mouse_init(){

  $('.fotorama__arr--prev').click(function(){
        //alert(123);
    $(this).parents().find(".info").hide();
  });
  $('.fotorama__arr--next').click(function(){
    $(this).parents().find(".info").hide();
  });
  $('.index div').mouseenter(function () {
    var pic = $(this).find("img");
    TweenMax.to(pic, 1, {opacity:0.783,scale:1.05});
  }).mouseleave(function () {
   var pic = $(this).find("img");
    TweenMax.to(pic, 1, {opacity:1,scale:1});
  });
  $('article.work li').mouseenter(function () {
    var pic2 = $(this).find("img");
    TweenMax.to(pic2, 1, {opacity:0.85,scale:1.03});
    $(this).find("h1").stop().fadeIn(750);
  }).mouseleave(function () {
   var pic2 = $(this).find("img");
    TweenMax.to(pic2, 1, {opacity:1,scale:1});
    $(this).find("h1").stop().fadeOut(750);
  });
  $('.book > div').mouseenter(function () {
    $(this).find(".hover_info").stop().fadeIn(750);
  }).mouseleave(function () {
    $(this).find(".hover_info").stop().fadeOut(750);
  });
  //   $('.circle_hover').mouseenter(function () {
  //   $(this).stop().animate({opacity:1},750);
  // }).mouseleave(function () {
  //   // $(this).removeClass("animated fadeIn").addClass("animated fadeOut");;
  //   $(this).stop().animate({opacity:0},750);
  // });
  $('.award .detail p > span').mouseenter(function () {
    $(this).parent().parent().prev().find(".circle_hover img").attr('src',"assets/images/awards_hover2.jpg");
    $(this).parent().parent().prev().find(".circle_hover").stop().animate({opacity:1},750);
  }).mouseleave(function () {
    $(this).parent().parent().prev().find(".circle_hover").stop().animate({opacity:0},750);
  });
  // $('.award .circle_hover').mouseenter(function () {
  //   $(this).removeClass("animated fadeOut").addClass("animated fadeIn");
  // }).mouseleave(function () {
  //   $(this).removeClass("animated fadeIn").addClass("animated fadeOut");;
  // });
}
//----------------   mobile  -----------------//
function navshow(){

	var body = $('body'),
  nav_show = $('.nav_show'),
  closeMask = $('#closeMask'),
  nav_btn  = $('.nav_btn'),
  currentScroll;
  $('.nav_btn').click(function(){
    currentScroll = $(window).scrollTop();
    if(body.hasClass('menu-open')){
      closeMenu();
    }else{
      openMenu();
    }
  });
  
  closeMask.click(function(){
    event.preventDefault();
    if(body.hasClass('menu-open')){
      closeMenu();
    }else{
      closeMenu();
    }
  });
  $('header .nav_btn2').click(function(){
    $(".nav_work").toggle();
  });
  $('footer .nav_btn2').click(function(){
    $("footer div.m ul").toggle();
  });
    $('.work_less').click(function(){
    $(".work_in .info").toggle();
  });
    $('.work_more').click(function(){
    $(".work_in .info").toggle();
    $("#closeMask_in").show();
  });
          //-------- WORK_IN --------//
          $('#closeMask_in').click(function(){
            $(this).hide();
            $(this).prev().hide();
          });
  function openMenu() {
    var mainWidth = $(document).outerWidth();
    var menuHeight = $('.nav_show').outerHeight();
      $('html,body').css({"height":menuHeight,"overflow-y":"hidden"});
      $('body').addClass('menu-open');
      $('.nav_show').css("right","0px").show();
      $('#closeMask').show().css({"width":mainWidth - 160, "right":"160px"});
      $('.wrapper').scrollTop(currentScroll);
}
function closeMenu() {
  $('html,body').css({"height":'auto',"overflow-y":"auto"});
  $('body').removeClass('menu-open');
  $('#closeMask').hide().css({"left":"0","right":"none"});
  $(window).scrollTop(currentScroll);
      $('.nav_show').css("right","-160px").hide();
    }
  }

//----------------   POPUP  ------------------//
var url ='';
function get_item(id){
  switch(id){
    case 1:
    url="work_in.html";
    $('#load_page').load(url).show();
    break;
    case 2:
    url="press_in.html";
    $('#load_page').load(url).show();
    break;
  }
  $('html, body').css('overflow','hidden');
  $("#load_page").animate({scrollTop:0});
  
}
function close_popup(){
  $('#load_page').hide();
  $('html, body').css('overflow-y','auto');
}
