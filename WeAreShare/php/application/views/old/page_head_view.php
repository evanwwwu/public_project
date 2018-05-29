
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?PHP echo @$meta['title']?></title>
<meta name="title" content="<?PHP echo @$meta['title']?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?PHP echo (isset($meta['brief']))?$meta['brief']:''?>">
<meta name="author" content="<?PHP echo (isset($meta['author']))?$meta['author']:''?>" />
<meta name="keywords" content="<?PHP echo (isset($meta['keyword']))?$meta['keyword']:''?>" />
<meta name="Copyright" content="" />
<meta property="og:title" content="<?PHP echo (isset($meta['title']))?$meta['title'].'- We Are Sharing':"We Are Sharing"; ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?PHP echo (isset($meta['url']))?$meta['url']:""; ?>" />
<meta property="og:description" content="<?PHP echo (isset($meta['brief']))?$meta['brief']:''?>" />
<meta property="og:image" content="<?PHP echo (isset($meta['cover_img']))?SITE_URL.'upload/'.$meta['cover_img']:''?>" />
<meta property="og:site_name" content="<?PHP echo SITE_TITLE?>" />
<meta property="wb:webmaster" content="6eb21a0f6588f5ed" />
<link rel="apple-touch-icon" href="icon/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png" />
<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png" />
<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png" />
<link rel="icon" href="<?PHP echo SITE_URL?>assets/old/images/icon.ico?0245" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="<?PHP echo SITE_URL?>assets/old/css/normalize.css">
<link rel="stylesheet" href="<?PHP echo SITE_URL?>assets/old/css/style.css">
<link rel="stylesheet" href="<?PHP echo SITE_URL?>assets/old/css/fotorama.css"> 
<link rel="stylesheet" href="<?PHP echo SITE_URL?>assets/old/css/mycss.css">
<link rel="stylesheet" href="<?PHP echo SITE_URL?>assets/old/css/bootstrap-datepicker3.min.css">
<script src="https://www.youtube.com/player_api" type="text/javascript"></script>

    <!--[if lt IE 10]>
    <script src="js/vendor/html5shiv.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46196464-1', 'wearesharing.com');
  ga('send', 'pageview');

  </script>
  <script src="<?PHP echo SITE_URL?>assets/old/js/vendor/modernizr-2.6.2.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?PHP echo SITE_URL?>assets/old/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
  <script src="<?PHP echo SITE_URL?>assets/old/js/bootstrap.min.js"></script> 
  <script src="<?PHP echo SITE_URL?>assets/old/js/vendor/jquery.easing.js"></script>
  <script src="<?PHP echo SITE_URL?>assets/old/js/fotorama.js"></script>
  <script src="<?PHP echo SITE_URL?>assets/old/js/magnific.js"></script>
  <script src="<?PHP echo SITE_URL?>assets/old/js/country_codes.js"></script>
  <script src="<?PHP echo SITE_URL?>assets/old/js/jquery.form.js"></script>
  <script src="<?PHP echo SITE_URL?>assets/old/js/tw_city.js"></script>
  <script src="<?PHP echo SITE_URL?>assets/old/js/china_city.js"></script>
  <script type="text/javascript" src="http://connect.facebook.net/zh_TW/all.js"></script>
  <script src="<?PHP echo SITE_URL?>assets/old/js/bootstrap-datepicker.min.js"></script>
  <script src="<?PHP echo SITE_URL?>assets/old/js/bootstrap-datepicker.zh-TW.min.js"></script>
  <!--<script type='text/javascript' src='<?PHP echo SITE_URL?>assets/old/js/jQuery.tubeplayer.min.js'></script>-->

  <style>
  .marginAnimate{overflow:hidden;}
  #infscr-loading{text-align:center;padding-top:50px;}
  .banner img{max-width:100%; max-height:250px;}
  </style>