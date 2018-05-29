<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?PHP echo $page_title?></title>
    <link rel="stylesheet" href="<?PHP echo ADMIN_URL?>assets/old/css/normalize.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_URL?>assets/old/css/baby-blue.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_URL?>assets/old/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_URL?>assets/old/css/font-awesome/css/font-awesome-ie7.css">
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/jquery-1.7.2.min.js"></script>
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/jquery.form.js"></script>
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/jquery-ui-1.8.16.custom.min.js"></script>
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/jquery.fileupload.js"></script>
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/ckeditor/ckeditor.js"></script>
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/ckeditor/adapters/jquery.js"></script>
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/jquery.autosize.js"></script>
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/jquery-ui-timepicker-addon.js"></script>

    <script>
    var change = 0;
    $(function(){
       var menu = document.getElementById('menu'),
       menuLink = document.getElementById('menuLink'),
       layout = document.getElementById('layout'),

       toggleClass = function (element, className) {
        var classes = element.className.split(/\s+/),
        length = classes.length,
        i = 0;

        for(; i < length; i++) {
          if (classes[i] === className) {
            classes.splice(i, 1);
            break;
        }
    }
        // The className is not found
        if (length === classes.length) {
            classes.push(className);
        }

        element.className = classes.join(' ');
    };

    menuLink.onclick = function (e) {
        e.preventDefault();
        var active = 'active';
        toggleClass(layout, active);
        toggleClass(menu, active);
    };
    $('input').bind('input',function(){
        change = 1;
    });
    $('input').bind('change',function(){
        change = 1;
    });
    $('textarea').bind('input',function(){
        change = 1;
    });
    $('select').bind('change',function(){
        change = 1;
    });
    $(window).bind("beforeunload",function(event){
        console.log(change);
        if(change==1){   
        var message = "你還沒有完成你的編即，就這樣離開嗎??";
        event.returnValue = message;
        return message;
        }
    });
})
</script>
</head>