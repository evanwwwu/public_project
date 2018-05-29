
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
function weibo_share()
{
    var width = 800;
    var height = 300;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    myWindow = window.open(" http://service.weibo.com/share/share.php?url="+location.href,"Facebook Share",windowFeatures);
}