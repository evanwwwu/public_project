<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <meta charset="UTF-8">
    <title><?PHP echo @$meta['title']?></title>
    <meta name="title" content="<?PHP echo @$meta['title']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="<?PHP echo (isset($meta['brief']))?$meta['brief']:''?>">
    <meta name="author" content="<?PHP echo (isset($meta['author']))?$meta['author']:''?>" />
    <meta name="keywords" content="<?PHP echo (isset($meta['keyword']))?$meta['keyword']:''?>" />
    <meta property="og:title" content="<?PHP echo (isset($meta['title']))?$meta['title'].' WE PEOPLE':"WE PEOPLE"; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?PHP echo SITE_URL.uri_string();?>" />
    <meta property="og:description" content="<?PHP echo (isset($meta['brief']))?$meta['brief']:''?>" />
    <meta property="og:image" content="<?PHP echo (isset($meta['cover_img']))?IMG_URL.'upload/'.$meta['cover_img']:''?>" />
    <meta property="og:site_name" content="<?PHP echo @$meta['title']?>" />
    <meta property="fb:admin" content="">
    <link rel="apple-touch-icon" href="icon/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png" />
    <link rel="icon" href="<?PHP echo SITE_URL?>assets/images/icon.ico?0245" type="image/x-icon">
    <link rel="stylesheet" media="screen" type="text/css" href="<?PHP echo SITE_URL?>assets/css/style.css"><!--[if lt IE 10]><!-->
    <link rel="stylesheet" media="screen" type="text/css" href="<?PHP echo SITE_URL?>assets/css/ie.css"><!--<![endif]-->
 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46196464-1', 'auto');
  ga('send', 'pageview');

</script>
  </head>
  <body class="<?php echo @$page_type;?> ">
    <div class="header">
      <div class="logo"><a href="<?php echo SITE_URL;?>">We People 東西名人</a></div>
      <div class="search"></div>
      <?PHP if (isset($_SESSION['user_login_id']) and $_SESSION['user_login_id']>0):?>
      <div class="login" data-url="<?php echo SITE_URL;?>ajax/login_pop/1"></div>
      <?php else: ?>
      <div class="login" data-url="<?php echo SITE_URL;?>ajax/login_pop"></div>
      <?php endif; ?>
    </div>
    <div class="search__form">
      <form name="search" method="get" action="<?php echo SITE_URL;?>search">
        <input type="text" name="key" placeholder="搜尋關鍵字">
        <input type="submit" value="搜尋">
      </form>
    </div>
    <div class="menu-toggle"><span></span></div>
    <div class="off-canvas">
      <div class="nav">
        <nav>
          <ol>
            <?php foreach($menus as $menu):?>
              <li class="<?php echo (urldecode(@$menu_selected)==$menu["slug"])?'is-current':'';?>"><a href="<?PHP echo SITE_URL?>article/tag/<?php echo $menu["slug"];?>"><?php echo $menu["en_name"];?></a></li>
            <?php endforeach;?>
            <li><a href="<?php echo SITE_URL;?>video">Video</a></li>
          </ol>
        </nav>
        <div class="socialMedia">
          <div class="title">Follow</div>
          <div class="socialMedia__list">
            <ol>
              <li><a href="https://www.facebook.com/wepeoplemag/?fref=ts" target="_blank" class="facebook">facebook</a></li>
              <li><a href="https://www.youtube.com/channel/UCVlgWt_Ypj9rfYQqQ01sKlQ/featured" target="_blank" class="youtube">youtube</a></li>
            </ol>
          </div>
        </div>
        <div class="footer">
          <ol>
            <li><a href="<?PHP echo SITE_URL?>about/1">關於我們</a></li>
            <li><a href="">廣告合作</a></li>
            <li><a href="">隱私權聲明</a></li>
          </ol>
        </div>
      </div>
    </div>
    <?php echo @$page_view;?>
    <div class="goTop"></div>
    <?php if(@$page_type == "index"):?>
    <div class="subscribe">
      <div class="title">訂閱 WE PEOPLE</div>
      <form id="subscribe" name="subscribe" method="post" action="<?php echo SITE_URL;?>ajax/add_sub">
        <input type="text" name="email" placeholder="請輸入您的電子郵件">
        <input type="submit" value="立即訂閱">
      </form>
    </div>
    <?php endif;?>
    <div id="footer">
      <div class="container">
        <nav>
          <ol>
            <li><a href="<?PHP echo SITE_URL?>about/1">關於我們</a></li>
            <li><a >廣告合作</a></li>
            <li><a >隱私權聲明</a></li>
          </ol>
        </nav>
        <div class="service">
          <ol>
            <li>媒體</li>
            <li>出版</li>
            <li>公關活動</li>
            <li>影像製作</li>
            <li>品牌行銷</li>
            <li>顧問經紀</li>
            <li>策展</li>
          </ol>
        </div>
        <div class="copyright">Copyright © 2017 WE WestEast Global Cultural Creativity Groups All Rights Reserved.</div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script type="text/javascript" src="<?php echo SITE_URL;?>assets/js/plugin.js"></script>
    <script type="text/javascript" src="<?php echo SITE_URL;?>assets/js/app.js"></script>
  </body>
</html>