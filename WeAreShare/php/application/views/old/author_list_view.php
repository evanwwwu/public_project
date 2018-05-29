<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
	<?PHP
		//meta,js,css
  echo (isset($page_head))?$page_head:"";
  ?>
</head>
<body class="index">
    <?PHP
        //mobile menu
    echo (isset($menu_mobile))?$menu_mobile:"";
    ?>
    <div id="viewport">
        <div id="closeMask"></div>
        <div id="wrapper">
            <?PHP
            //page top
            echo (isset($page_top))?$page_top:"";
            ?>
            <?PHP
            //menu main
            echo (isset($menu_main))?$menu_main:"";
            ?>
            <div class="innerWrapper">
                <div class="authorList">
                    <ul>
                        <?PHP foreach($data['data'] as $data):?>
                        <li>
                            <div class="img" >
                                <a href="<?PHP echo SITE_URL . 'author/' . $data['display_name']?>"><img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>" border="0" hight="190" width="190"></a>
                            </div>
                            <div class="info">
                               <a href="<?PHP echo SITE_URL . 'author/' . $data['display_name']?>">
                                <h2><?PHP echo $data['display_name']?></h2>
                            </a>
                            <p><?PHP echo $data['brief']?></p>
                            <a href="<?PHP echo SITE_URL . 'author/' . $data['display_name']?>" class="readMore">查看文章»</a>
                        </div>
                    </li>
                    <?PHP endforeach;?>
                </ul>
            </div>
        </div>
        <?PHP
            //page footer
        echo (isset($page_footer))?$page_footer:"";
        ?>
        <div class="navigation">
            <a href="<?PHP echo SITE_URL?>ajax/author_list_page/2/<?PHP echo $class;?>"></a>
        </div>
    </div>
</div>
<!-- end profile form -->
<?PHP echo $login_view;?>
<script src="<?PHP echo SITE_URL?>assets/old/js/swipe.js"></script>
<script src="<?PHP echo SITE_URL?>assets/old/js/main.js"></script>
<script src="<?PHP echo SITE_URL?>assets/old/js/jquery.infinitescroll.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL?>ajax"></script>
<script>
$('#footer').removeClass('footerOpen');
$(function(){
    if ($('.authorList ul li').length>0){
        $('.authorList ul').infinitescroll({
            loading: {
                finished: function(){$('#infscr-loading').remove();},
                finishedMsg: "<em></em>",
                img: "<?PHP echo SITE_URL?>assets/old/images/loading.gif",
                msg: null,
                msgText: "<em></em>",
                selector: null,
                speed: 'fast',
                start: undefined
            },
            navSelector  : "div.navigation",
            nextSelector : "div.navigation a:first",
            itemSelector : "li",
            debug        : false,
            animate      : true,
            extraScrollPx: 50, 
            donetext     : "" ,
            bufferPx     : 40,
        });
    }
})
</script>
</body>
</html>
