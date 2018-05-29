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
                <div class="blog index">
                    <div class="post_list">
                        <ul>
                            <?PHP $banner_count = 0;?>
                            <?PHP foreach($article['data'] as $data):?>
                                <?PHP if (isset($data['img_title'])):?>
                                    <?PHP $banner_count++;?>
                                    <li class="banner" id="<?PHP echo $data['id']?>">
                                        <a <?PHP echo ($data['link']!='')?"href='".SITE_URL . "adclick/?url=" . $data['link'] . "&ad=" . $data['id']."'":""?> target="_blank"><img src="<?PHP echo SITE_URL . 'upload/' . $data['img_title']?>" border="0"></a>
                                    </li>
                                <?PHP else:?>

                                <li>
                                    <div class="img">
                                        <a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>"></a>
                                    </div>
                                    <div class="content">
                                        <span class="categories"><?PHP echo $data['tags'];?></span>
                                        <h2><a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo $data['display_title'];?></a></h2>
                                        <div class="post-info">
                                            <span><?PHP echo $data['display_date']?></span>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
                                        </div>
                                        <p>
                                            <?PHP echo $data['brief']?>
                                        </p>
                                        <a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
                                    </div>
                                    <div class="clear">
                                    </div>
                                </li>
                                <?PHP endif;?>
                            <?PHP endforeach;?>
                        </ul>
                    </div>
                    <div class="goTop">
                        <a href="#"><img src="<?php echo SITE_URL?>assets/old/images/transparent.gif">Top</a>
                    </div>
                </div>
                <?PHP
                //page aside
                echo (isset($aside))?$aside:"";
                ?>
                <div class="clear">
                </div>
            </div>
            <?PHP
            //page footer
            echo (isset($page_footer))?$page_footer:"";
            ?>
            <div class="navigation">
                <a href="<?PHP echo SITE_URL?>ajax/column_page/2/"></a>
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
        var page = 2;
        if($('.banner').eq(0).attr('id')==null){
        var ad = Array('0');
        }else{
        var ad = Array($('.banner').eq(0).attr('id'));
        }
        $(function(){
            if ($('.post_list ul li').length>0){
                $('.post_list ul').infinitescroll({
                    loading: {
                        finished: function(){$('#infscr-loading').remove();page++;
                             for(var index = 1;index<$('.banner').length;index++){
                                ad.push($('.banner').eq(index).attr('id'));
                             }},
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
                    path:function(){return "<?PHP echo SITE_URL?>/ajax/column_page/"+page+"/?exist_banner="+ad+""}
                });
            }
        })
    </script>
</body>
</html>
