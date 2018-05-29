<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="<?PHP echo ADMIN_ASSETS;?>css/favicon.ico"/>
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/pure-min.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/theme.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/jquery-ui-timepicker-addon.min.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/style.css">
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery-1.11.0.min.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery-ui.min.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery-ui-timepicker-addon.min.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery.form.min.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/ckeditor/ckeditor.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/ckeditor/adapters/jquery.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery.fileupload.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery.autosize.js"></script>
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery.Jcrop.js"></script>
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/jquery.Jcrop.css">
    <!--  -->
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/admin.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/admin_plugin.css">
    <script src="<?PHP echo SITE_URL;?>assets/admin/js/jscolor/jscolor.js"></script>
    <script type="text/javascript" src="<?PHP echo ADMIN_ASSETS; ?>js/admin_img.js"></script>
    <script type="text/javascript" src="<?PHP echo ADMIN_ASSETS; ?>js/admin_template.js" ></script>
    <script type="text/javascript" src="<?PHP echo ADMIN_ASSETS; ?>js/admin_select.js" ></script>
    <script type="text/javascript" src="<?PHP echo ADMIN_ASSETS; ?>js/admin_languages.js" ></script>

    <script id="main_js" data-url="<?php echo UPLOAD_URL; ?>" src="<?PHP echo ADMIN_ASSETS;?>js/site.js"></script>
    <title>
        <?PHP echo (!isset($page_title))?SITE_TITLE_ADMIN:$page_title;?>
    </title>
    <script>        
        csrf = {"name":"<?php echo $this->security->get_csrf_token_name(); ?>","value":"<?php echo $this->security->get_csrf_hash();?>"};
        $(function(){
            $("#menu").find(".<?PHP echo $controller_addr?>").addClass("pure-menu-selected");
            $("#menuLink").click(function(e){
                e.preventDefault();
                $("#menu").toggleClass("active");
                $("#layout").toggleClass("active");
                $(this).toggleClass("active");

            });
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
                    <?PHP echo SITE_TITLE_ADMIN ?>
                </a>
                <ul>
                    <?PHP if($_SESSION[ADMIN_ACTIVE] = "1"):?>
                    <li class="accounts">
                        <a href="<?PHP echo ADMIN_URL?>accounts">帳號管理</a>
                    </li>
                    <?PHP endif;?>
                    <li class="index_product">
                        <a href="<?PHP echo ADMIN_URL?>index_product">首頁產品</a>
                    </li>
                    <li class="ingredients">
                        <a href="javascript:void(0)">食材管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>ingredients/type">分類管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>ingredients">商品管理</a></li>
                        </ul>
                    </li>
                    <li class="recipes">
                        <a href="javascript:void(0)">食譜管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>recipes/type">分類管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>recipes">商品管理</a></li>
                        </ul>
                    </li>
                    <li class="articles">
                        <a href="javascript:void(0)">生活用品管理</a>
                        <i class="icon-chevron-right icon-right"></i>
                        <ul class="pure-menu-children">
                            <li><a href="<?PHP echo ADMIN_URL?>articles/type">分類管理</a></li>
                            <li><a href="<?PHP echo ADMIN_URL?>articles">商品管理</a></li>
                        </ul>
                    </li>
                    <li class="classes">
                        <a href="<?PHP echo ADMIN_URL?>classes">料理教室管理</a>
                    </li>
                    <li class="member">
                        <a href="<?PHP echo ADMIN_URL?>member">會員管理</a>
                    </li>
                    <li class="orders">
                        <a href="<?PHP echo ADMIN_URL?>orders">訂單管理</a>
                    </li>
                    <li class="classes_order">
                        <a href="<?PHP echo ADMIN_URL?>classes_order">教室訂單管理</a>
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
