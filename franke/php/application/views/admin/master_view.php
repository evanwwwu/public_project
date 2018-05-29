<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="<?PHP echo ASSETS_URL?>images/icon.png">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/pure-min.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/theme.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/jquery-ui.css">
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery-1.11.0.min.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery-ui.min.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery.form.min.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/ckeditor/ckeditor.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/ckeditor/adapters/jquery.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery.fileupload.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery.autosize.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery.Jcrop.js"></script>
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/jquery.Jcrop.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/admin.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/admin_plugin.css">
    <script src="<?PHP echo ADMIN_ASSETS;?>js/admin_img.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/admin_select.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/admin_listedit.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/site.js"></script>
    <title>
        <?PHP echo (!isset($page_title))?SITE_TITLE_ADMIN:$page_title;?>
    </title>
    <script>
    $(function(){
        $("#menu").find(".<?PHP echo $controller_addr?>").addClass("pure-menu-selected");
    });
    </script>

</head>

<body>
    <div id="layout">
        <!-- Menu toggle -->
        <a href="#menu" id="menuLink" class="menu-link">
            <!-- Hamburger icon -->
            <span></span>
        </a>
        <div id="menu">
            <div class="pure-menu pure-menu-open">
                <a class="pure-menu-heading" href="javascript:void(0)">
                    FRANKE
                </a>
                <ul>
                    <?PHP if($_SESSION[ADMIN_ACTIVE] = "1"):?>
                    <li class="accounts">
                        <a href="<?PHP echo ADMIN_URL?>accounts">帳號管理</a>
                    </li>
                    <?PHP endif;?>
                    <li class="home">
                        <a href="javascript:void(0)">首頁管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>home/banner">輪播圖管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>home/product">PRODUCT區塊</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>home/feature">FEATURE區塊</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>home/appliance">APPLIANCE區塊</a></li>
                        </ul>
                    </li>
                    <li class="sink">
                        <a href="javascript:void(0)">水槽管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>sink/banner">輪播圖管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>sink/menu">選單管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>sink/filter">過濾選項管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>sink/parts">配件管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>sink/ad">廣告管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>sink/products/">商品管理</a></li>
                        </ul>
                    </li>
                    <li class="faucet">
                        <a href="javascript:void(0)">龍頭管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>faucet/banner">輪播圖管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>faucet/menu">選單管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>faucet/filter">過濾選項管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>faucet/parts">配件管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>faucet/ad">廣告管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>faucet/products/">商品管理</a></li>
                        </ul>
                    </li>
                    <li class="water_filter">
                        <a href="javascript:void(0)">淨水器管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <!-- <li><a href="<?PHP echo ADMIN_URL?>water_filter/banner">輪播圖管理</a></li> -->
                            <!-- <li><a href="<?PHP echo ADMIN_URL?>water_filter/menu">選單管理</a></li> -->
                            <!-- <li><a href="<?PHP echo ADMIN_URL?>water_filter/filter">過濾選項管理</a></li> -->
                            <li><a href="<?PHP echo ADMIN_URL?>water_filter/parts">配件管理</a></li>
                            <!-- <li><a href="<?PHP echo ADMIN_URL?>water_filter/ad">廣告管理</a></li> -->
                            <li><a href="<?PHP echo ADMIN_URL?>water_filter/products/">商品管理</a></li>
                        </ul>
                    </li>
                    <li class="fitting">
                        <a href="javascript:void(0)">周邊商品</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>fitting/banner">輪播圖管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>fitting/filter">過濾選項管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>fitting/ad">廣告管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>fitting/products/">商品管理</a></li>
                        </ul>
                    </li>
                    <li class="partner">
                        <a href="javascript:void(0)">夥伴管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>partner/north">北區</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>partner/west">中區</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>partner/south">南區</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>partner/east">東區</a></li>
                        </ul>
                    </li>
                    <li class="member">
                        <a href="<?PHP echo ADMIN_URL?>member">會員管理</a>
                    </li>
                    <li class="order">
                        <a href="<?PHP echo ADMIN_URL?>order">訂單管理</a>
                    </li>
                    <li class=" menu-item-divided">
                        <a href="<?PHP echo ADMIN_URL?>logout">登出</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="main">
            <div class="content">
                <?PHP echo @$content_view;?>
            </div>
        </div>
    </div>
</body>

</html>
