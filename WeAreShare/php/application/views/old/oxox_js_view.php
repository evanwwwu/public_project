  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  var xxx;
  var oxox_site = {
    is_loadmore: false,
    init: function () {
        this.login_step();
        this.set_loadmore();
        this.set_year_change();
        this.set_logo_link();
        this.set_reg_form();
        this.set_pass_form();
        this.set_reg_profile_form();
        this.set_addr_coutry_selected();
        this.set_birthday();
        this.set_edit_profile_form();
        if( document.body.clientWidth >= 640){
        try{
            this.youtube_api();
        }
        catch(e)
        {
        console.log("yp_noload");
    }
        }
    },
    login_step: function () {
        $("#logIn .login a:eq(0)").click(function () {
            $("#logIn").hide();
            $("#register").fadeIn()
        });
        $("#logIn .login a:eq(1)").click(function () {
            $("#logIn").hide();
            $("#forgotPass").fadeIn()
        });

        $('#logIn form').ajaxForm({
            beforeSubmit: function () {
               //console.log(111)
           },
           url: '<?PHP echo SITE_URL?>ajax/login_email',
           type: 'post',
           dataType: 'script'
       });
        $('#logIn .submitBtn').unbind().bind('click', function () {
            $('#logIn form').submit();
        })

        $('img.weibo').css('opacity',0.5)
    },
    logout:function(){
        $.post('<?PHP echo SITE_URL?>ajax/logout','','','script');
    },
    profile: function () {
        $("#overlay").fadeIn();
        $("#editProfile").fadeIn();
    },
    ajax_loading_on: function () {
        $('#overlay').css('z-index', 6)
    },
    ajax_loading_off: function () {
        $('#overlay').css('z-index', 5);
    },
    set_logo_link: function () {
        $('.logo').css('cursor', 'pointer').bind('click', function () {
            location = '<?PHP echo SITE_URL?>';
        })
    },
    set_loadmore: function () {
        $('.loadMore a').bind('click', function () {
            if (oxox_site.is_loadmore == false) {
                oxox_site.is_loadmore = true;
                event.preventDefault();
                var current_posts = $('#current_posts').html();
                var q = '';
                $('li.banner').each(function(){
                    q+='exist_banner[]='+$(this).attr('id')+'&';
                })
                //$.post('<?PHP echo (strlen($this->uri->uri_string())==0)?SITE_URL:SITE_URL . $this->uri->uri_string() . '/'?>more/' + (current_posts), function (data) {
                    $.post('<?PHP echo addslashes($_SERVER['HTTP_REFERER']) . '/'?>more/' + (current_posts),q, function (data) {
                        if ($.trim(data.length) > 0) {
                            $('.post_list ul').append(data);
                            $('#current_posts').html($('.post_list li:not(".banner")').length);
                            oxox_site.is_loadmore = false;
                        } else {
                            $('.loadMore').hide();
                        }
                    });
                }
            })
},
set_year_change: function () {
    $('#mainNav .year .prev').bind('click', function () {
        event.preventDefault();
        var q = 'yy=' + $('#mainNav .year span').html();
        $.post('<?PHP echo SITE_URL?>ajax/event_submenu/prev', q, function (data) {
            $('#mainNav .year span').html(data.yy);
            var ul = $('#mainNav .year').parent().parent()
            ul.find('li:not(":eq(0)")').remove()
            for (var i = 0; i < data.mm.length; i++) {
                if (data.mm[i][1] == 0) {
                    ul.append('<li style="line-height: 36px;padding: 0 10px;font-size: 14px;color:#999">' + data.mm[i][0] + '</li>\n');
                } else {
                    ul.append('<li><a href="<?PHP echo SITE_URL?>event/month/' + data.yy + '-' + padLeft(i + 1, 2) + '">' + data.mm[i][0] + '</a></li>\n');
                }
            }
        }, 'json');
    })

    $('#mainNav .year .next').bind('click', function () {
        event.preventDefault();
        var q = 'yy=' + $('#mainNav .year span').html();
        $.post('<?PHP echo SITE_URL?>ajax/event_submenu/next', q, function (data) {
            $('#mainNav .year span').html(data.yy);
            var ul = $('#mainNav .year').parent().parent()
            ul.find('li:not(":eq(0)")').remove()
            for (var i = 0; i < data.mm.length; i++) {
                var str_month = '00' + i
                str_month = str_month.substr()
                if (data.mm[i][1] == 0) {
                    ul.append('<li style="line-height: 36px;padding: 0 10px;font-size: 14px;color:#999">' + data.mm[i][0] + '</li>\n');
                } else {
                    ul.append('<li><a href="<?PHP echo SITE_URL?>event/month/' + data.yy + '-' + padLeft(i + 1, 2) + '">' + data.mm[i][0] + '</a></li>\n');
                }
            }
        }, 'json');
    })
},set_pass_form: function (){
    $("#forgotPass form").ajaxForm({
        beforeSubmit: function (){
            var email = $("#forgotPass .email").val();
            if(email ===""){
                alert("請輸入電子信箱");
                $("#forgotPass form input").focus();
                return false;
            }
            var t = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (t.test(email) != 1) {
                alert("電子信箱格式錯誤");
                $("#forgotPass form input").focus();
                $("#forgotPass form input").select();
                return false;
            }
        },
        url: '<?PHP echo SITE_URL?>ajax/forgotPass',
        type: 'post',
        dataType: 'script'
    });
    $('#forgotPass .submitBtn').unbind().bind('click', function () {
        $('#forgotPass form').submit();
    })
    
},
set_reg_form: function () {
    $('#register form').ajaxForm({
        beforeSubmit: function () {
            var e = $("#register .email").val();
            if (e === "") {
                alert("請輸入電子信箱");
                $("#register .register input").focus();
                return false;
            }
            var t = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (t.test(e) != 1) {
                alert("電子信箱格式錯誤");
                $("#register .register input").focus();
                $("#register .register input").select();
                return false;
            }
                //oxox_site.ajax_loading_on();
            },
            url: '<?PHP echo SITE_URL?>ajax/register_email',
            type: 'post',
            dataType: 'script'
        });
    $('#register .submitBtn').unbind().bind('click', function () {
        $('#register form').submit();
    })
},
set_reg_profile_form: function () {
    $('#profile form[name="profile"]').ajaxForm({
        beforeSubmit: function () {
            var pwd = $('#profile input[name="pwd"]').val();
            var pwd2 = $('#profile input[name="pwd2"]').val();
            var last_name = $('#profile input[name="last_name"]').val();
            var first_name = $('#profile input[name="first_name"]').val();
            var mobile_country = $('#profile select[name="mobile_country"]').val();
            var mobile = $('#profile input[name="mobile"]').val();
            var zipcode = $('#profile input[name="zipcode"]').val();
            var country = $('#profile select[name="country"]').val();
            var province = $('#profile select[name="province"]').val();
            var city = $('#profile select[name="city"]').val();
            var area = $('#profile select[name="area"]').val();
            var address = $('#profile input[name="address"]').val();
            var gender = $('#profile input[name="gender"]:checked');
            var birth = $('#profile select[name="birth_y"]').val() + '-' + $('#profile select[name="birth_m"]').val() + '-' + $('#profile select[name="birth_d"]').val()
            var edu = $('#profile select[name="edu"]').val();
            var job = $('#profile select[name="job"]').val();
            var epaper = $('#profile input[name="epaper"]:checked');
            var agree = $('#profile input[name="agree"]:checked');
            if (pwd == '') {
                alert('請輸入密碼');
                return false;
            }
            if (pwd != pwd2) {
                alert('請確認兩次密碼都相同');
                return false;
            }
            if (last_name == '') {
                alert('請輸入姓名');
                return false
            }
            if (first_name == '') {
                alert('請輸入姓名');
                return false
            }
            if (agree.length == 0) {
                alert("請同意東西雜誌網路會員條款與隱私聲明");
                return false;
            }
            var q = 'pwd=' + pwd;
            q += '&last_name=' + last_name;
            q += '&first_name=' + first_name;
            q += '&mobile_country=' + mobile_country;
            q += '&mobile=' + mobile;
            q += '&zipcode=' + zipcode;
            q += '&country=' + country;
            q += '&province=' + province;
            q += '&city=' + city;
            q += '&area=' + area;
            q += '&address=' + address;
            q += '&gender=' + gender.val();
            q += '&birth=' + birth;
            q += '&edu=' + edu;
            q += '&job=' + job;
            q += '&epaper=' + (epaper.length ? 1 : 0);
            q += '&email=' + $('#profile .email').html();
            q += '&updata=0';
            $.post('<?PHP echo SITE_URL?>ajax/update_profile/', q, '', 'script');
            return false;
        }
    });
  $('#profile .submitBtn').unbind().bind('click', function () {
    $('#profile form[name="profile"]').submit();
})
},
set_edit_profile_form: function () {
    $('#editProfile form[name="profile"]').ajaxForm({
        beforeSubmit: function () {
            var pwd = $('#editProfile input[name="pwd"]').val();
            var pwd2 = $('#editProfile input[name="pwd2"]').val();
            var last_name = $('#editProfile input[name="last_name"]').val();
            var first_name = $('#editProfile input[name="first_name"]').val();
            var mobile_country = $('#editProfile select[name="mobile_country"]').val();
            var mobile = $('#editProfile input[name="mobile"]').val();
            var zipcode = $('#editProfile input[name="zipcode"]').val();
            var country = $('#editProfile select[name="country"]').val();
            var province = $('#editProfile select[name="province"]').val();
            var city = $('#editProfile select[name="city"]').val();
            var area = $('#editProfile select[name="area"]').val();
            var address = $('#editProfile input[name="address"]').val();
            var gender = $('#editProfile input[name="gender"]:checked');
            var birth = $('#editProfile select[name="birth_y"]').val() + '-' + $('#editProfile select[name="birth_m"]').val() + '-' + $('#editProfile select[name="birth_d"]').val()
            var edu = $('#editProfile select[name="edu"]').val();
            var job = $('#editProfile select[name="job"]').val();
            var epaper = $('#editProfile input[name="epaper"]:checked');
            var agree = $('#editProfile input[name="agree"]:checked');
            if (pwd == '') {
                alert('請輸入密碼');
                return false;
            }
            if (pwd != pwd2) {
                alert('請確認兩次密碼都相同');
                return false;
            }
            if (last_name == '') {
                alert('請輸入姓名');
                return false
            }
            if (first_name == '') {
                alert('請輸入姓名');
                return false
            }
            if (agree.length == 0) {
                alert("請同意東西雜誌網路會員條款與隱私聲明");
                return false;
            }
            var q = 'pwd=' + pwd;
            q += '&last_name=' + last_name;
            q += '&first_name=' + first_name;
            q += '&mobile_country=' + mobile_country;
            q += '&mobile=' + mobile;
            q += '&zipcode=' + zipcode;
            q += '&country=' + country;
            q += '&province=' + province;
            q += '&city=' + city;
            q += '&area=' + area;
            q += '&address=' + address;
            q += '&gender=' + gender.val();
            q += '&birth=' + birth;
            q += '&edu=' + edu;
            q += '&job=' + job;
            q += '&epaper=' + (epaper.length ? 1 : 0);
            q += '&email=' + $('#editProfile .email').html();
            q += '&updata=1';
            $.post('<?PHP echo SITE_URL?>ajax/update_profile/', q, '', 'script');
            return false;
        }
    });
  $('#editProfile .submitBtn').unbind().bind('click', function () {
    $('#editProfile form[name="profile"]').submit();
})
},
set_addr_coutry_selected: function () {
    var country = $('.address select[name="country"]');
    country.bind('change', function () {
        if ($(this).children(':selected').val() == 'TW') {
            oxox_site.set_addr_tw();
        } else if ($(this).children(':selected').val() == 'CN') {
            oxox_site.set_addr_cn();
        } else {
            oxox_site.set_addr();
        }
    }).trigger('change');
},
set_addr_tw: function () {
    $('.address select[name="province"]')
    .empty()
    .append('<option value="">省份</option>')
    .attr('disabled', true)
    .css('opacity', 0.5);
    var city = $('.address select[name="city"]');
    var area = $('.address select[name="area"]');
    city.empty().append('<option value="">縣市</option>').removeAttr('disabled').css('opacity', 1);
    for (i = 0; i < tw_city.length; i++) {
        city.append('<option value="' + tw_city[i] + '">' + tw_city[i] + '</option>')
    }
    city.unbind().bind('change', function () {
        area.empty().append('<option value="">地區</option>').removeAttr('disabled').css('opacity', 1);
        var city_index = $(this)[0].selectedIndex;
        var start = cityarea_account[city_index - 1] + 1;
        var end = cityarea_account[city_index];
        for (i = start; i <= end; i++) {
            area.append('<option value="' + cityarea[i] + '">' + cityarea[i] + '</option>')
        }
    }).trigger('change');
},
set_addr_cn: function () {
    var province = $('.address select[name="province"]');
    var city = $('.address select[name="city"]');
    var area = $('.address select[name="area"]');
    province.empty().append('<option value="">省份</option>').removeAttr('disabled').css('opacity', 1);
    city.empty().append('<option value="">縣市</option>').removeAttr('disabled').css('opacity', 1);
    area.empty().append('<option value="">地區</option>').removeAttr('disabled').css('opacity', 1);
    for (i = 0; i < _CityList.length; i++) {
        province.append('<option value="' + _CityList[i].name + '">' + _CityList[i].name + '</option>')
    }
    province.unbind().bind('change', function () {
        var province_index = $(this)[0].selectedIndex - 1;
        city.empty().append('<option value="">縣市</option>').removeAttr('disabled').css('opacity', 1);
        area.empty().append('<option value="">地區</option>').removeAttr('disabled').css('opacity', 1);
        if (province_index >= 0) {
            var p_city = _CityList[province_index].city;
            for (i = 0; i < p_city.length; i++) {
                city.append('<option value="' + p_city[i].name + '">' + p_city[i].name + '</option>')
            }
            city.unbind().bind('change', function () {
                var city_index = $(this)[0].selectedIndex - 1;
                area.empty().append('<option value="">地區</option>').removeAttr('disabled').css('opacity', 1);
                if (city_index >= 0) {

                    var p_area = _CityList[province_index].city[city_index].area;
                    for (i = 0; i < p_area.length; i++) {
                        area.append('<option value="' + p_area[i].name + '">' + p_area[i].name + '</option>')
                    }
                }
            }).trigger('change');
        }
    })

},
set_addr: function () {
    $('.address select[name="province"]')
    .empty()
    .append('<option value="">省份</option>')
    .attr('disabled', true)
    .css('opacity', 0.5);
    $('.address select[name="city"]')
    .empty()
    .append('<option value="">縣市</option>')
    .attr('disabled', true)
    .css('opacity', 0.5);
    $('.address select[name="area"]')
    .empty()
    .append('<option value="">地區</option>')
    .attr('disabled', true)
    .css('opacity', 0.5);
},
set_birthday: function () {
    var birth_y = $('.birth select[name="birth_y"]');
    var birth_m = $('.birth select[name="birth_m"]');
    var birth_d = $('.birth select[name="birth_d"]');
    birth_y.empty();
    var d = new Date();
    for (i = d.getFullYear(); i > 1900; i--) {
        birth_y.append('<option value="' + i + '">' + i + '</option>');
    }
    for (i = 1; i <= 12; i++) {
        birth_m.append('<option value="' + i + '">' + i + '</option>');
    }
    for (i = 1; i <= 31; i++) {
        birth_d.append('<option value="' + i + '">' + i + '</option>');
    }
},
set_selected:function(){
    $('#editProfile select[name="mobile_country"] option[value="'+member_info.mobile_country+'"]').attr('selected',true);
    $('#editProfile select[name="country"] option[value="'+member_info.country+'"]').attr('selected',true);
    $('#editProfile select[name="country"]').trigger('change');
    $('#editProfile select[name="province"] option[value="'+member_info.province+'"]').attr('selected',true);
    $('#editProfile select[name="city"] option[value="'+member_info.city+'"]').attr('selected',true);
    $('#editProfile select[name="city"]').trigger('change');
    $('#editProfile select[name="area"] option[value="'+member_info.area+'"]').attr('selected',true);
    $('#editProfile input[value="'+member_info.gender+'"]').attr("checked",true);
    var birth = member_info.birth.split("-");
    $('#editProfile .birth select[name="birth_y"]').val(birth[0]);
    $('#editProfile .birth select[name="birth_m"]').val(birth[1]);
    $('#editProfile .birth select[name="birth_d"]').val(birth[2]);
},
show_ad:function(img_index){
    $('.ad_div').remove();
    for(i=0; i < we_ad.length; i++){
        if (we_ad[i].position==img_index && we_ad[i].closed==0){
            oxox_site.create_ad_div(i);
            oxox_site.ad_viewed(i);
            return;
        }
    }
},

create_ad_div:function(ad_index){
    var ad_div = $('<div class="ad_div">\
        <div class="ad_back"></div>\
        <div class="ad_img"></div>\
        </div>');
    $('.fotorama__wrap').css('z-index',0).before(ad_div);
    var w = $('.fotorama__stage').css('width');
    var h = $('.fotorama__stage').css('height');
    ad_div.css({'position':'absolute','width':w,'height':h,'visibility':'visible','z-index':'1','margin-left':'50px','max-width':'95%'}).css('width','-=100');
    $('.ad_back').css({'background-color':'#000000','opacity':0.7,'height':'100%'});
    $('.ad_img').css({'position':'absolute','top':0,'margin':0,'padding':0,'width':'100%','height':'100%'});
    $('.ad_img').html('<table height="100%" border="0" align="center" style="max-width:100%;"><tr><td align="center" valign="middle" style="border:0;padding:0;" style="max-width:100%;"><div style="position:relative; width:auto;"><a href="<?PHP echo SITE_URL . 'adclick?url='?>'+we_ad[ad_index].link+'&ad='+we_ad[ad_index].id+'" target="_blank"><img src="<?PHP echo SITE_URL . 'upload/'?>'+we_ad[ad_index].img_title+'" style="max-width:100%;" border="0"></a><div style="width: 30px;height: 30px;background-image: url(<?PHP echo SITE_URL?>assets/old/images/icon_ui_components.png);background-position: 0 -152px;position: absolute;top: -15px;right: -15px; cursor:pointer" onclick="oxox_site.remove_ad_div('+ad_index+')"></div></div></td></tr></table>');
},
remove_ad_div:function(ad_index){
    we_ad[ad_index].closed = 1;
    $('.ad_div').remove();
},
ad_viewed:function(ad_index){
    if (we_ad[ad_index].viewed==1) return;
    we_ad[ad_index].viewed = 1;
    $.post('<?PHP echo SITE_URL;?>ajax/ad_viewed?ad='+we_ad[ad_index].id);
},
youtube_api:function(){
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  $("iframe").attr("id","video");
  var src = $("#video").attr("src");
  $("#video").attr("src",src+"?enablejsapi=1&wmode=opaque");

  iframeWindow = top.frames['video'];
  iframeWindow.onload = function(){
      xxx = new YT.Player('video', {
        events: {
          'onReady':function(){
           xxx.setVolume(0);
           $('.adCloseBtn').click(function(){
            $('.openToggle').show();
            $('.marginAnimate').animate({
              height: '0'
          },700,'easeInOutCirc',function(){
              $('.marginAnimate a').css('height','0');
              xxx.stopVideo();
          });
            $(this).fadeOut(700);
            return false;
        });
       },
       'onStateChange': function(data){
          console.log(data.data);
          if(data.data=='0'){
            $('.adCloseBtn').click();
        }
    }
}
}); 
  }

}
};

$(function () {
    oxox_site.init();
    FB.init({
        appId: '165842922937',
        status: true,
        cookie: true,
        xfbml: true,
        channelURL: '', //
        oauth: true
    });

    /*$('.fotorama').fotorama({
        click:false
    });
    $('.fotorama').on('fotorama:fullscreenenter', function (e, fotorama, extra) {
        //$('.fotorama__stage').bind('click',function(){$('body').trigger($.Event("keydown", { keyCode: 27 }));})
        var close_bg = $('<div class="fotorama__close_bg" style="postion:absolute; width:100%; height:100%; background-color:#eee"></div>');
        $('.fotorama__stage__shaft.fotorama__grab').on('click.prevent',function(){
           //console.log('111')
        })
    });
    $('.fotorama').on('fotorama:fullscreenexit', function (e, fotorama, extra) {
        //$('.fotorama__stage').unbind('click');
    });

    $('.fotorama').on(
      'fotorama:ready ' +
      'fotorama:load ' +
      'fotorama:error ' +
      'fotorama:show ' +
      'fotorama:showend ' +
      'fotorama:fullscreenenter ' +
      'fotorama:fullscreenexit ' +
      'fotorama:loadvideo ' +
      'fotorama:unloadvideo ' +
      'fotorama:startautoplay ' +
      'fotorama:stopautoplay', function (e, fotorama, extra) {
      console.log(e);
  });*/
  $('.fotorama').on('fotorama:showend ',function (e, fotorama, extra) {
    oxox_site.show_ad(fotorama.activeIndex);
});
  $('.fotorama').on('fotorama:show ',function (e, fotorama, extra) {
    oxox_site.show_ad(fotorama.activeIndex);
});
  $('.fotorama').on('fotorama:fullscreenenter ',function (e, fotorama, extra) {
    oxox_site.show_ad(fotorama.activeIndex);
});
  $('.fotorama').on('fotorama:fullscreenexit ',function (e, fotorama, extra) {
    $('.ad_div').remove();
    setTimeout(function(){oxox_site.show_ad(fotorama.activeIndex);},100);
});

})

  function padLeft(str, lenght) {
    if (str.length >= length)
        return str;
    else
        return padLeft("0" + str, length);
}

function isDate(dateval) {
    var arr = new Array();

    if (dateval.indexOf("-") != -1) {
        arr = dateval.toString().split("-");
    } else if (dateval.indexOf("/") != -1) {
        arr = dateval.toString().split("/");
    } else {
        return false;
    }

    //yyyy-mm-dd || yyyy/mm/dd
    if (arr[0].length == 4) {
        var date = new Date(arr[0], arr[1] - 1, arr[2]);
        if (date.getFullYear() == arr[0] && date.getMonth() == arr[1] - 1 && date.getDate() == arr[2]) {
            return true;
        }
    }
    //dd-mm-yyyy || dd/mm/yyyy
    if (arr[2].length == 4) {
        var date = new Date(arr[2], arr[1] - 1, arr[0]);
        if (date.getFullYear() == arr[2] && date.getMonth() == arr[1] - 1 && date.getDate() == arr[0]) {
            return true;
        }
    }
    //mm-dd-yyyy || mm/dd/yyyy
    if (arr[2].length == 4) {
        var date = new Date(arr[2], arr[0] - 1, arr[1]);
        if (date.getFullYear() == arr[2] && date.getMonth() == arr[0] - 1 && date.getDate() == arr[1]) {
            return true;
        }
    }

    return false;
}

function search_term() {
    var text = '';
    $("input[name='key']").each(function(){
        if (text==''){
            if ($(this).val()!=""){
                text = $(this).val();
            }
        }
    })
    if (text == "") {
        return false;
    } else {
        return true;
    }
}

function register_fb() {
    // 判斷是否已經有FB的login session 如果以登入 可以跳過登入的步驟進行下一步

    FB.getLoginStatus(function (response) {
        if (response.authResponse) {
            FB.api('/me', function (response) {
                //console.log(response);
                if(response.email==null){
                    alert('請開放您社群帳號的隱私權設定進行註冊，或者直接輸入您慣用的eMail帳號進行註冊，謝謝。');
                    location.reload();
                }
                $.post('<?PHP echo SITE_URL?>ajax/register_fb', 'email=' + response.email + '&fbid=' + response.id, '', 'script');
            });
        } else {
            FB.login(function (response) {
                if (response.authResponse) {
                    FB.api('/me', function (response) {
                        facebookLogin();
                        if(response.email==null){
                            alert('請開放您社群帳號的隱私權設定進行註冊，或者直接輸入您慣用的eMail帳號進行註冊，謝謝。');
                            location.reload();
                        }
                //console.log(response.email);
                $.post('<?PHP echo SITE_URL?>ajax/register_fb', 'email=' + response.email + '&fbid=' + response.id, '', 'script');
            });
                } else {
                    //console.log(response);
                    //alert('!authResponse');
                }
            }, {scope: 'email,user_likes'});
        }
    })
}

function facebookLogout() //登出的動作
{
    FB.logout();
    //location.reload();
}

function facebookLogin() //登入的動作
{
    //其中的scope後面接的是權限，可以用","接很多的權限
    var loginUrl = "http://www.facebook.com/dialog/oauth/?" +
    "scope=email&" +
    "client_id=1430709557144046&" +
    "redirect_uri=" + document.location.href + "&"
    //window.open(loginUrl);
}

function register_weibo(response) {
    return;
    WB2.login(function () {
        WB2.anyWhere(function (W) {
            W.parseCMD("/account/get_uid.json", function (r1, s1) {
                //console.log(r1.uid);
                //$.post('<?PHP echo SITE_URL?>ajax/register_weibo','wbid='+r1.uid,'','script');
            }, {}, {
                method: 'get'
            });

            //W.parseCMD("/account/profile/email.json",function(r, s) { console.log(r); },{},{method:'get'});
        });
    })
}

function login_fb() {
    FB.getLoginStatus(function (response) {
        if (response.authResponse) {
            FB.api('/me', function (response) {
                //console.log(response);
                if(response.email==null){
                    alert('請開放您社群帳號的隱私權設定進行註冊，或者直接輸入您慣用的EMAIL帳號進行註冊，謝謝。');
                    location.reload();
                }
                $.post('<?PHP echo SITE_URL?>ajax/login_fb', 'email=' + response.email + '&fbid=' + response.id, '', 'script');
            });
        } else {
            FB.login(function (response) {
                if (response.authResponse) {
                    FB.api('/me', function (response) {
                        $.post('<?PHP echo SITE_URL?>ajax/login_fb', 'email=' + response.email + '&fbid=' + response.id, '', 'script');
                    });
                } else {
                    //console.log(response);
                    //alert('!authResponse');
                }
            }, {
                scope: 'email'
            });
        }
    })
}
function copyright(obj){
    var width = 800;
    var height = 600;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    window.open("<?PHP echo SITE_URL?>copyright","隱私權聲明",windowFeatures);
}

function slide_show_banner($id){

}