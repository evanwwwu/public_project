window.fbAsyncInit = function() {
	FB.init({
		appId      : '812873042177520',
		cookie     : true,  
		xfbml      : true,  
		status     : true, 
		version    : 'v2.6' 
	});
};

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(function(){
	$(".fb_login").click(function(){
		FB.getLoginStatus(function(response) { 
			if (response.authResponse) {
				fb_login();
			}
			else {
				FB.login(function(response) {
					if(response.status === 'connected'){
						fb_login();
					}
				}, {scope: 'email'});
			}
		});
	});
});
function fb_login(){
	FB.api('/me', function(response) {
		$.post("/beta/ajax/fb_login",{
			"member":JSON.stringify(response)
		},function(){

		},"script");
		console.log(JSON.stringify(response));
	});
}