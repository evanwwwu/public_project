<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="<?PHP echo ADMIN_ASSETS;?>css/icon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/pure-min.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/theme.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/style.css">
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
    <script src="<?PHP echo ADMIN_ASSETS;?>js/admin_languages.js"></script>
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
                    <?PHP if($_SESSION[ADMIN_ACTIVE] ==1):?>
                    <li class="accounts">
                        <a href="<?PHP echo ADMIN_URL?>accounts">帳號管理</a>
                    </li>
                    <?PHP endif;?>
                    <li class="news">
                        <a href="javascript:void(0)">新聞管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>news/?type=news">NEWS</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>news/?type=press">PRESS</a></li>
                        </ul>
                    </li>
                    <li class="project">
                        <a href="javascript:void(0)">專案管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>project/type">類別管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>project/">專案管理</a></li>
                        </ul>
                    </li>
                    <li class="member">
                        <a href="<?PHP echo ADMIN_URL?>member">員工管理</a>
                    </li>
                    <li class="shop">
                        <a href="javascript:void(0)">店家管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>shop/country">國家類別</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>shop/">店家管理</a></li>
                        </ul>
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
