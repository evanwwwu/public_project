function lang_change(lan){
	var tlan = ["/en","/tw","/cn"];
	var referer = location.href;
	console.log(referer);
	for(var x = 0; x<tlan.length;x++){
		if(referer.indexOf(tlan[x])!=-1){
			location = referer.replace(tlan[x],"/"+lan);
			return;
		}
	}
	location = site_url + lan;
}