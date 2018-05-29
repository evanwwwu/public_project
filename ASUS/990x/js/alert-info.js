
(function(){


  $(function() {
    var local = asus ? asus.script.get_local() : "",
        mobileString, localCookiePolicyString;
    $.getJSON('/cookienotice.json', function(data){
      var localString = local.toUpperCase().replace('NEW', '');
      if(data[localString]){
        mobileString = data[localString].mobile;
        localCookiePolicyString = data[localString].desktop;

        localCookiePolicyString = $("body").hasClass("mobile") ? mobileString : localCookiePolicyString;
        showTopBar(localCookiePolicyString);
      }
    });
  });


  function showTopBar(_string){

    if(asus.cookie.get('isReadCookiePolicy')){return}
    var newDom = "<div id='cookie-policy-info'><div class='wrap'>" + _string + "<br> <a class='btn-asus btn-ok'>OK</a> </div><span class='close'>x</span></div>";

    $(newDom).prependTo("body");
    $("body").addClass('show-cookie-policy-info');

    $("#cookie-policy-info")
      .find(".btn-ok")
        .on("click", function(){
          asus.cookie.set('isReadCookiePolicy', '1', tenYearSec);
          $("body").removeClass('show-cookie-policy-info');
          $("#cookie-policy-info").hide();

        }).end()
      .find(".close")
        .on("click", function(){
          $("body").removeClass('show-cookie-policy-info');
        });
    var tenYearSec = 60*60*24*3600;
  }
})();
