<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <title>Naked Market | 裸市集</title>
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport" />
  <meta content="食材,食譜,民生東路" name="keywords" />
  <meta content="我們創立，因為我們認為下廚應該可以更輕鬆簡單，我們相信好東西不應該高昂到變成少數人的權利，我們希望更多人都能使用好食材。所以除了帶來購買的方便性和減少食材的浪費之外，我們更由衷的盼望，當份量減少單價相對降低，大家會幫自己和家人選用更好的產品，也更願意親手嘗試不同的食譜。" name="description" />
  <meta content="Naked Market | 裸市集" property="og:title" />
  <meta content="Naked Market | 裸市集" property="og:site_name" />
  <meta content="http://www.nakedmarket.com.tw/" property="og:url" />
  <meta content="<?PHP echo ASSETS_URL;?>images/main_bg.jpg" property="og:image" />
  <meta content="我們創立，因為我們認為下廚應該可以更輕鬆簡單，我們相信好東西不應該高昂到變成少數人的權利，我們希望更多人都能使用好食材。所以除了帶來購買的方便性和減少食材的浪費之外，我們更由衷的盼望，當份量減少單價相對降低，大家會幫自己和家人選用更好的產品，也更願意親手嘗試不同的食譜。" property="og:description" />
  <link href="<?PHP echo ASSETS_URL;?>images/favicon.png" rel="shortcut icon" type="image/x-icon" />
  <link href="<?PHP echo ASSETS_URL;?>css/style.css" media="screen" rel="stylesheet" type="text/css" />
    <!--[if lt IE 10]>
    <link href="<?PHP echo ASSETS_URL;?>css/ie.css" media="screen" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script src="<?PHP echo ASSETS_URL;?>js/vendor.js"></script>
    <script src="<?PHP echo ASSETS_URL;?>js/plugin.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-71833282-1', 'auto');
      ga('send', 'pageview');
    </script>
  </head>
  <body class="<?php echo ($page_addr=="index")?"page_index":""; ?> <?php echo (isset($sub))?"sub_open":""; ?>">
    <div id="intro">
      <div class="main">
        <section class="logo">
          <object data="<?PHP echo ASSETS_URL;?>images/logo.svg" type="image/svg+xml"><img alt="naked market" src="<?PHP echo ASSETS_URL;?>images/logo.png" /></object>
        </section>
        <div class="scroll_icon">
          <div class="icon">
            <div class="arr">
              <span></span>
            </div>
          </div>
          <span>SCROLL DOWN </span>
        </div>
      </div>
    </div>
    <div id="loading_part">
      <div class="main">
        <div class="container">
          <div id="activeBorder" class="active-border">
            <div id="circle" class="circle">
              <span class="prec" id="prec">0%</span>
            </div>
          </div>
          <div class="logo"><img src="<?php echo ASSETS_URL;?>images/loading.png" alt=""></div>
        </div>
      </div>
    </div>
    <header>
      <nav class="main_menu">
        <div class="icons">
          <div>
            <a class="member_icon <?php echo (@$_SESSION["member_id"]!="")?"in":""; ?>" href="<?php echo SITE_URL; ?>member/<?php echo (@$_SESSION["member_id"]!="")?"detail":"" ?>">
              <?php if (@$_SESSION["member_id"]!=""): ?>
                <img alt="" src="<?PHP echo ASSETS_URL;?>images/member_icon_out.png" />
              <?php else: ?>
                <img alt="" src="<?PHP echo ASSETS_URL;?>images/member_icon.png" />
                <span>登入</span>
              <?php endif; ?>
            </a>
            <div class="close"></div>
            <a class="main_logo" href="<?php echo SITE_URL; ?>"><img alt="裸市集" src="<?PHP echo ASSETS_URL;?>images/logo2.png" /></a>
          </div>
        </div>
        <ul>
          <li class="<?php echo ($page_addr=="index")?"active":""; ?>">
            <a href="<?php echo SITE_URL; ?>">
              <div>
                <p>
                  裸市集
                </p>
              </div>
            </a>
          </li>
          <li class="<?php echo ($page_addr=="about")?"active":""; ?>">
            <a href="<?php echo SITE_URL; ?>about">
              <div>
                <p>
                  關於裸
                </p>
              </div>
            </a>
          </li>
          <li class="sub_option">
            <a href="ingredients_sub">
              <div>
                <p>
                  買食材
                </p>
              </div>
            </a>
          </li>
          <li class="sub_option">
            <a href="recipe_sub">
              <div>
                <p>
                  逛食譜
                </p>
              </div>
            </a>
          </li>
          <li class="sub_option">
            <a href="articles_sub">
              <div>
                <p>
                  生活用品
                </p>
              </div>
            </a>
          </li>
          <li>
            <a href="<?php echo SITE_URL;?>classes">
              <div>
                <p>
                  料理教室
                </p>
              </div>
            </a>
          </li>
          <li class="mobile_list">
            <div>
                <a href="<?php echo SITE_URL;?>info/privacy">隱私聲明</a>
                <a href="<?php echo SITE_URL;?>info/shopping">購物須知</a>
                <a href="<?php echo SITE_URL; ?>member/<?php echo (@$_SESSION["member_id"]!="")?"detail":"" ?>">會員專區</a>
            </div>
          </li>
        </ul>
        <div class="bottom_div">
          <div class="openhours">
            <p>
              OPEN HOURS
            </p>
            <p>
              Mon-Sun 11:00am~9:00pm
            </p>
          </div>
          <div class="socially">
            <a href="https://www.facebook.com/nkdmarket/?__mref=message_bubble" target="_blank"><img alt="" src="<?PHP echo ASSETS_URL;?>images/fb_icon.png" /></a><a href="https://www.instagram.com/nakedmarket/" target="_balnk"><img alt="" src="<?PHP echo ASSETS_URL;?>images/ig_icon.png" /></a>
          </div>
        </div>
      </nav>
      <div class="sub_item ingredients_sub <?php echo ($page_addr =="products")?"open":""; ?>">
        <div class="top_div">
          <p class="sub_title">
            買食材
          </p>
          <div class="sub_close">
            <span></span>
          </div>
        </div>
        <ul class="sub_product">
          <?php foreach ($sub_menu["ingredients_sub"] as $menu): ?>
            <li class="<?php echo ($menu["id"]==@$type_id)?"active":""; ?>">
              <a href="<?php echo SITE_URL; ?>ingredients/type/<?php echo $menu["id"] ?>">
                <div>
                  <p>
                    <?php echo $menu["title"] ?>
                  </p>
                </div>
              </a>
            </li>            
          <?php endforeach ?>
        </ul>
      </div>
      <div class="sub_item recipe_sub <?php echo ($page_addr =="recipes"||$page_addr =="recipes_detail")?"open":""; ?>">
        <div class="top_div">
          <p class="sub_title">
            逛食譜
          </p>
          <div class="sub_close">
            <span></span>
          </div>
        </div>
        <ul class="sub_product">
          <?php foreach ($sub_menu["recipe_sub"] as $menu): ?>
            <li class="<?php echo ($menu["id"]==@$type_id)?"active":""; ?>">
              <a href="<?php echo SITE_URL; ?>recipes/type/<?php echo $menu["id"] ?>">
                <div>
                  <p>
                    <?php echo $menu["title"] ?>
                  </p>
                </div>
              </a>
            </li>            
          <?php endforeach ?>
        </ul>
      </div>
      <div class="sub_item articles_sub <?php echo ($page_addr =="article"||$page_addr =="article_detail")?"open":""; ?>">
        <div class="top_div">
          <p class="sub_title">
            生活用品
          </p>
          <div class="sub_close">
            <span></span>
          </div>
        </div>
        <ul class="sub_product">
          <?php foreach ($sub_menu["articles_sub"] as $menu): ?>
            <li class="<?php echo ($menu["id"]==@$type_id)?"active":""; ?>">
              <a href="<?php echo SITE_URL; ?>articles/type/<?php echo $menu["id"] ?>">
                <div>
                  <p>
                    <?php echo $menu["title"] ?>
                  </p>
                </div>
              </a>
            </li>            
          <?php endforeach ?>
        </ul>
      </div>
      <div class="menu_btn">
        <img alt="" src="<?PHP echo ASSETS_URL;?>images/menu_icon.png" />
      </div>
    </header>
    <div class="warp">
      <div class="mobile_logo">
        <div class="m_icon">
          <span></span>
          <div class="menu_text">
            MENU
          </div>
        </div>
        <a class="logo" href="<?php echo SITE_URL; ?>">
          <img alt="" src="<?PHP echo ASSETS_URL;?>images/logo.png" />
        </a>
        <a class="cart_icon <?php echo (count($this->cart->contents())>0)?"on":"" ?>" href="javascript:void(0)">
          <img alt="" src="<?PHP echo ASSETS_URL;?>images/cart_icon.png" />
        </a>
      </div>
      <div class="ec_div">
        <a class="cart_icon <?php echo (count($this->cart->contents())>0)?"on":"" ?>" href="javascript:void(0)">
          <img alt="" src="<?PHP echo ASSETS_URL;?>images/cart_icon.png" />
        </a>

        <a class="member_icon <?php echo (@$_SESSION["member_id"])?"in":""; ?>" href="<?php echo SITE_URL; ?>member/<?php echo (@$_SESSION["member_id"]!="")?"detail":""; ?>">
          <?php if (@$_SESSION["member_id"]!=""): ?>
            <img alt="" src="<?PHP echo ASSETS_URL;?>images/member_icon_out.png" />
          <?php else: ?>
            <img alt="" src="<?PHP echo ASSETS_URL;?>images/member_icon.png" />
          <?php endif; ?>
        </a>

      </div>
      <div id="cart_list"><div>
        <div class="c_head">
          <p>
            購物車內有<span class="c"><?php echo count($this->cart->contents()); ?></span>樣商品
          </p>
          <div class="c_colse"></div>
        </div>
        <div class="c_content">
          <div class="all_list">
            <ul>
              <?php echo @$cart_view ?>
            </ul>
          </div>
          <div class="bottom_div">
            <div class="total">
              <p>
                總金額
              </p>
              <div class="total_price">
                <span>$</span><span class="n"><?php echo $this->cart->total(); ?></span>
              </div>
            </div>
            <a class="checkout" href="<?php echo SITE_URL; ?>shop/step1"><span>結　 帳</span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="warpper <?php echo $page_addr; ?>">
      <?php echo @$page_view; ?>
      <footer>
        <div class="sitemap">
          <div class="stitle">
            Site map
          </div>
          <div class="gp">
            <ul>
              <li>
                <a href="<?php echo SITE_URL; ?>">裸市集</a>
              </li>
              <li>
                <a href="<?php echo SITE_URL;?>about">關於裸</a>
              </li>
              <li>
                <a href="<?php echo SITE_URL;?>ingredients/type/<?php echo $sub_menu["ingredients_sub"][0]['id'] ?>">買食材</a>
              </li>
              <li>
                <a href="<?php echo SITE_URL;?>recipes/type/<?php echo $sub_menu["recipe_sub"][0]['id'] ?>">逛食譜</a>
              </li>
              <li>
                <a href="<?php echo SITE_URL;?>articles/type/<?php echo $sub_menu["articles_sub"][0]['id'] ?>">生活用品</a>
              </li>
              <li>
                <a href="<?php echo SITE_URL;?>classes">料理教室</a>
              </li>
            </ul>
            <ul>
              <li>
                <a href="<?php echo SITE_URL;?>info/shopping">購物須知</a>
              </li>
              <li>
                <a href="<?php echo SITE_URL;?>info/privacy">隱私聲明</a>
              </li>
            </ul>
            <ul>
              <li>
                <a href="<?php echo SITE_URL; ?>member/<?php echo (@$_SESSION["member_id"]!="")?"detail":"" ?>">會員專區</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="contact">
          <div class="stitle">
            Contact us
          </div>
          <div class="gp">
            <ul>
              <li>
                <a href="tel:02-2719-8809">02-2719-8809</a>
              </li>
              <li>
                <a href="" target="_blank">105台北市松山區民生東路四段75巷1號</a>
              </li>
              <li>
                <a href="mailto:nakedmarket.tw@gmail.com">nakedmarket.tw@gmail.com</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="follow">
          <div class="stitle">
            Follow me
          </div>
          <div class="gp">
            <ul>
              <li>
                <a href="https://www.facebook.com/nkdmarket/?__mref=message_bubble" target="_balnk">Facebook</a>
              </li>
              <li>
                <a href="https://www.instagram.com/nakedmarket/" target="_balnk">Instagram</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
      <div id="up_btn">
        <img alt="" src="<?PHP echo ASSETS_URL;?>images/up_arr.png" />
      </div>
      <script src="<?PHP echo ASSETS_URL;?>js/site.js" id="sitejs" data-site="<?php echo SITE_URL; ?>"></script>
    </div>
  </div>
</body>
</html>
