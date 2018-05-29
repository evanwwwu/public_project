<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" xmlns:wb="http://open.weibo.com/wb">
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
            <!-- slide banner -->
            <div id="slideBanner" class="slider">
                <div class="swipe-wrap">
                    <?PHP foreach($index_banner as $banner):?>
                    <div>
                        <div class="img">
                            <a <?PHP echo ($banner['link']!="")?'href="'.SITE_URL . 'adclick/?url=' . $banner['link'] . '&ad=' . $banner['id']. '"':""?>  target="_blank"><img src="<?PHP echo SITE_URL?>upload/<?PHP echo $banner['img_title']?>" ></a>
                        </div>
                    </div>
                    <?PHP endforeach;?>
                </div>
                <div class="slideNav">
                    <div class="wordW"><a href="#">W</a></div>
                    <ul id="slidePos"></ul>
                    <div class="wordE"><a href="#">E</a></div>
                </div>
            </div>
            <!-- end slide banner -->
            <?PHP
            //menu main
            echo (isset($menu_main))?$menu_main:"";

            ?>
            <div class="innerWrapper">
                <div class="index0">
                    <ul class="post_list">
                        <?PHP foreach($latest[0]['data'] as $data):?>
                        <li><a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>">
                        		<img src="<?PHP echo SITE_URL . 'timthumb.php?src=./upload/'.(str_replace('_thumb', '', $data['cover_img'])).'&h=440&w=440'?>">
                        	</a>
                            <div class="post_info">
                                <a href="#">
                                    <h3>什麼東西</h3>
                                </a><a href="#">
                                <h1 style="height:24px"><a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo $data['display_title'];?></a></h1>
                            </a>
                            <div class="post_footer">
                                <span><?PHP echo $data['display_date']?></span>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
                            </div>
                            <p>
                                <?PHP echo $data['brief']?>
                            </p>
                            <a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
                        </div>
                    </li>
                    <?PHP endforeach;?>
                    <?PHP foreach($latest[1]['data'] as $data):?>
                    <li><a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img width="200" src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>"></a>
                        <div class="post_info">
                            <a href="#">
                                <h3>東西焦點</h3>
                            </a><a href="#">
                            <h1><a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo $data['display_title'];?></a></h1>
                        </a>
                        <div class="post_footer">
                            <span><?PHP echo $data['display_date']?></span>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
                        </div>
                        <p>
                            <?PHP echo $data['brief']?>
                        </p>
                        <a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
                    </div>
                </li>
                <?PHP endforeach;?>
                <?PHP foreach($latest[2]['data'] as $data):?>
                <li><a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img width="200" src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>"></a>
                    <div class="post_info">
                        <a href="#">
                            <h3>分享東西</h3>
                        </a><a href="#">
                        <h1><a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo $data['display_title'];?></a></h1>
                    </a>
                    <div class="post_footer">
                        <span><?PHP echo $data['display_date']?></span>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
                    </div>
                    <p>
                        <?PHP echo $data['brief']?>
                    </p>
                    <a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
                </div>
            </li>
            <?PHP endforeach;?>
            <?PHP foreach($latest[3]['data'] as $data):?>
            <li><a href="<?PHP echo SITE_URL . 'gallery/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img width="200" src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>"></a>
                <div class="post_info">
                    <a href="#">
                        <h3>東張西望</h3>
                    </a><a href="#">
                    <h1><a href="<?PHP echo SITE_URL . 'gallery/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo $data['display_title'];?></a></h1>
                </a>
                <div class="post_footer">
                    <span><?PHP echo $data['display_date']?></span>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
                </div>
                <p>
                    <?PHP echo $data['brief']?>
                </p>
                <a href="<?PHP echo SITE_URL . 'gallery/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
            </div>
        </li>
        <?PHP endforeach;?>
        <?PHP foreach($latest[4]['data'] as $data):?>
        <?PHP $url = ($data['post_type']=='event')?'event':'calendar'?>
        <li><a href="<?PHP echo SITE_URL . $url . '/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img width="200" src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>"></a>
            <div class="post_info">
                <a href="#">
                    <h3>東奔西跑</h3>
                </a><a href="#">
                <h1><a href="<?PHP echo SITE_URL . $url . '/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo $data['display_title'];?></a></h1>
            </a>
            <div class="post_footer">
                <span><?PHP echo $data['display_date']?></span>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
            </div>
            <p>
                <?PHP echo $data['brief']?>
            </p>
            <a href="<?PHP echo SITE_URL . $url . '/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
        </div>
    </li>
    <?PHP endforeach;?>
    <?PHP foreach($latest[5]['data'] as $data):?>
    <?PHP $url = ($data['post_type']=='brand')?'brand':'people'?>
    <li><a href="<?PHP echo SITE_URL .$url . '/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img width="200" src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>"></a>
        <div class="post_info">
            <a href="#">
                <h3>東成西就</h3>
            </a><a href="#">
            <h1><a href="<?PHP echo SITE_URL . $url . '/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo $data['post_name'];?></a></h1>
        </a>
        <div class="post_footer">
            <span><?PHP echo $data['display_date']?></span>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
        </div>
        <p>
            <?PHP echo $data['brief']?>
        </p>
        <a href="<?PHP echo SITE_URL . $url . '/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
    </div>
</li>
<?PHP endforeach;?>
</ul>
<div class="clear"></div>
<hr />
<p class="subject">Most Popular</p>
<ul class="popular">
    <?PHP foreach($popular as $row):?>
    <li>
        <a href="<?PHP echo $row['url']?>">
            <img width="200px" src="<?php echo SITE_URL?>upload/<?PHP echo $row['cover_img']?>"><h3><?PHP echo $row['type']?></h3>
            <p><?PHP echo $row['title']?></p>
        </a>
    </li>
    <?PHP endforeach;?>
</ul>
<div class="clear"></div>
<div class="goTop">
    <a href="#">
        <img src="<?php echo SITE_URL?>assets/old/images/transparent.gif">Top</a>
    </div>
</div>
</div>
<?PHP
            //page footer
echo (isset($page_footer))?$page_footer:"";
?>
</div>
</div>
<!-- end profile form -->
<?PHP echo $login_view;?>
<script type="text/javascript" src="<?PHP echo SITE_URL?>ajax"></script>
<script src="<?PHP echo SITE_URL?>assets/old/js/swipe.js"></script>
<script src="<?PHP echo SITE_URL?>assets/old/js/main.js"></script>
<script>
site.slideBanner();

</script>
</body>
</html>
