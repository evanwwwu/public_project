<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?PHP echo ASSETS_URL?>css/style.css">
  <link rel="stylesheet" type="text/css" href="<?PHP echo ASSETS_URL?>css/svg.css">
  <link rel="stylesheet" type="text/css" href="<?PHP echo ASSETS_URL?>css/fotorama.css">
  <script type="text/javascript" src="<?PHP echo ASSETS_URL?>js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="<?PHP echo ASSETS_URL?>js/share.js"></script>
  <script type="text/javascript" src="<?PHP echo ASSETS_URL?>js/retina.min.js" data-retina-resize="true"></script>
  <script type="text/javascript" src="<?PHP echo ASSETS_URL?>js/imagesloaded.min.js"></script>
  <script type="text/javascript" src="<?PHP echo ASSETS_URL?>js/d3.min.js"></script>
  <script type="text/javascript" src="<?PHP echo ASSETS_URL?>js/fotorama.js"></script>
  <script type="text/javascript" src="<?PHP echo ASSETS_URL?>js/site.js"></script>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=en"></script>
  <title>Danzo</title>
</head>

<body class="<?PHP echo $page_addr?>">
  <header class="">
    <div class="logo" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>';">
      <img class="pc" src="<?PHP echo ASSETS_URL?>images/logo.png" data-at2x="<?PHP echo ASSETS_URL?>images/logo@2x.png" alt="danzo">
      <img class="mobile" src="<?PHP echo ASSETS_URL?>images/m_logo.png" data-at2x="<?PHP echo ASSETS_URL?>images/m_logo@2x.png" lt="">
    </div>
    <div class="menu">
      <div class="icon">
        <img src="<?PHP echo ASSETS_URL?>images/m_menu.png" alt="">
        <div class="for_open"></div>
      </div>
      <ul>
        <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/about" <?PHP echo (@$page_addr=="about")?'class="active"':''?>>
          <li>
            <img src="<?PHP echo ASSETS_URL?>images/header_about.png" data-no-retina  alt="">
            <div class="option">
              <span class="de">ABOUT</span>
              <div class="for_hover">
                <span class="hover">ABOUT</span>
              </div>
            </div>
          </li>
        </a>
        <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/project" <?PHP echo (@$page_addr=="project")?'class="active"':''?>>
          <li><img src="<?PHP echo ASSETS_URL?>images/header_project.png" data-no-retina  alt="">
            <div class="option">
              <span class="de">PROJECT</span>
              <div class="for_hover">
                <span class="hover">PROJECT</span>
              </div>
            </div>
          </li>
        </a>
        <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/news" <?PHP echo (@$page_addr=="news")?'class="active"':''?>>
          <li><img src="<?PHP echo ASSETS_URL?>images/header_news.png" data-no-retina  alt="">
            <div class="option">
              <span class="de">NEWS</span>
              <div class="for_hover">
                <span class="hover">NEWS</span>
              </div>
            </div>
          </li>
        </a>
        <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/press" <?PHP echo (@$page_addr=="press")?'class="active"':''?>>
          <li><img src="<?PHP echo ASSETS_URL?>images/header_press.png" data-no-retina alt="">
            <div class="option">
              <span class="de">PRESS</span>
              <div class="for_hover">
                <span class="hover">PRESS</span>
              </div>
            </div>
          </li>
        </a>
        <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/shop" <?PHP echo (@$page_addr=="shop")?'class="active"':''?>>
          <li><img src="<?PHP echo ASSETS_URL?>images/header_shop.png" data-no-retina  alt="">
            <div class="option">
              <span class="de">SHOP</span>
              <div class="for_hover">
                <span class="hover">SHOP</span>
              </div>
            </div>
          </li>
        </a>
        <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/contact" <?PHP echo (@$page_addr=="contact")?'class="active"':''?>>
          <li>
            <img src="<?PHP echo ASSETS_URL?>images/header_contact.png" data-no-retina  alt="">
            <div class="option">
              <span class="de">CONTACT</span>
              <div class="for_hover">
                <span class="hover">CONTACT</span>
              </div>
            </div>
          </li>
        </a>
      </ul>
    </div>
  </header>
  <div class="hide_header">
    <div class="f_logo"><div class="height"></div></div>
  </div>
  <?PHP echo @$page_view;?>
  <footer>
    <div class="lang">
      <ul>
       <li class="<?PHP echo ($this->uri->segment(1)=="en")?"lang_en_active":"lang_en"?>"><a href="<?PHP echo SITE_URL?>en">EN</a></li>
       <li class="<?PHP echo ($this->uri->segment(1)=="tw")?"lang_cn_active":"lang_cn"?>"><a href="<?PHP echo SITE_URL?>tw">中</a></li>
     </ul> 
   </div>
   <div class="social">
    <ul>
      <li class="social_fb"><a href="https://www.facebook.com/danzostudio">facebook</a></li>
      <li class="social_twi"><a href="">twitch</a></li>
      <li class="social_ig"><a href="https://instagram.com/danzostudio/">instagram</a></li>
      <li class="social_pi"><a href="https://www.pinterest.com/danzostudio/">pinterest</a></li>
    </ul>
  </div>
</footer>
</body>

</html>
