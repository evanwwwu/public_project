
function twi_share(url)
{
    if(typeof(url)=="undefined")
    {
        url = window.location.href;
    }
    var width = 800;
    var height = 300;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    myWindow = window.open("https://twitter.com/share?url="+encodeURI(url),"Twitter Share",windowFeatures);
    myWindow.focus();    
}
function fb_share(url)
{
    if(typeof(url)=="undefined")
    {
        url = location.href;
    }
    var width = 800;
    var height = 300;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    myWindow = window.open("https://www.facebook.com/sharer/sharer.php?u="+url,"Facebook Share",windowFeatures);
    myWindow.focus();
}
function weibo_share(url)
{
    if(typeof(url)=="undefined")
    {
        url = location.href;
    }
    var width = 800;
    var height = 300;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    myWindow = window.open("http://service.weibo.com/share/share.php?url="+location.href,"Weibo Share",windowFeatures);
}

function google_share(url)
{
    if(typeof(url)=="undefined")
    {
        url = location.href;
    }
    var width = 800;
    var height = 300;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    myWindow = window.open("https://plus.google.com/share?url="+location.href,"Google+ Share",windowFeatures);
}


function lang_change(lan){
    var tlan = ["/en","/tw"];
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