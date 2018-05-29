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
                <div class="author_detail">
                    <div class="postContent">
                        <div class="profile">
                            <div class="img"><img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>" width="162"></div>
                            <h2><?PHP echo $data['display_name'];?></h2>
                        </div>
                        <?PHP echo $data['post_content'];?>
                    </div>
                    <div class="tag">
                        <ul>
                            <li><span>標籤：</span></li>
                            <?PHP foreach($data['tags'] as $tag):?>
                            <li><a href="<?PHP echo SITE_URL . 'search/?key=' . $tag['slug']?>"><?PHP echo $tag['name']?></a>,</li>
                            <?PHP endforeach;?>
                        </ul>
                    </div>      
                    <div class="socialMedia">
                        <ul>
                            <li>
                               <!-- <li class="fb"><iframe src="//www.facebook.com/plugins/like.php?href=<?PHP echo $current_url?>&amp;width=450&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId=198295326906970" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe></li> -->
                               <!-- <li class="weibo"><wb:like type="number" language="zh_tw"></wb:like></li> -->
                               <div style="float:left;" class="fb-like" data-href="<?PHP echo current_url();?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>                         <div id="fb-root"></div>
                               <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=1430709557144046";
                                  fjs.parentNode.insertBefore(js, fjs);
                              }(document, 'script', 'facebook-jssdk'));</script>
                          </li>
                          <li>
                            <!-- Place this tag in your head or just before your close body tag. -->
                            <script type="text/javascript" src="https://apis.google.com/js/platform.js">
                            {lang: 'zh-TW'}
                            </script>

                            <!-- Place this tag where you want the share button to render. -->
                            <div class="g-plus" data-action="share" data-annotation="none" data-height="20" data-href="<?PHP echo current_url();?>"></div>
                        </li>
                        <li>
                            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="tw">Tweet</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </li>

                        <li class="mail">
                            <div class="socialMail"><a target="_blank" href="mailto:?subject=<?PHP echo $data['post_title']?>&body=<?PHP echo $data['brief']?>...<?PHP echo SITE_URL?>article/<?PHP echo $data['post_title']?>">
                                <img src="<?PHP echo SITE_URL?>assets/old/images/btn_social_mail.png"/>
                                    <!-- <div class="mailNum">
                                        <div class="num"><span>0</span></div>
                                        <div class="nub"><s></s><i></i></div>
                                    </div> --></a>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="otherAuthor">
                        <ul>
                            <?PHP foreach($data['article']['data'] as $data2):?>
                            <li>
                                <div class="img">
                                    <a href="<?PHP echo SITE_URL . 'article/' . $data2['post_name']?>" title="<?PHP echo $data2['post_title'];?>">
                                        <img src="<?PHP echo SITE_URL . 'upload/' . $data2['cover_img']?>">
                                    </a>
                                </div>
                                <div class="content">
                                    <span class="date"><?PHP echo $data2['tags'];?></span>
                                    <h2><a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data2['post_title'];?>"><?PHP echo $data2['display_title'];?></a></h2>
                                    <div class="post-info">
                                        <span><?PHP echo $data2['display_date']?></span>| by <a href="<?PHP echo SITE_URL.'search?key='.$data2['author']?>"><?PHP echo $data2['author']?></a>
                                    </div>
                                    <p>
                                        <?PHP echo $data2['brief']?>
                                    </p>
                                    <a href="<?PHP echo SITE_URL . 'article/' . $data2['post_name']?>" class="readMore">閱讀全文 »</a>
                                </div>
                                <div class="clear">
                                </div>
                            </li>
                            <?PHP endforeach;?>
                        </ul>
                    </div>
                    <div id="famous" class="famous">
                        <h2>推薦作者</h2>
                        <ul></ul>
                        <div class="clear"></div>
                        <div id="pager" class="pager2">
                            <a href="#" class="prevBtn"><img src="<?PHP echo SITE_URL?>assets/old/images/transparent.gif"></a>
                            <a href="#" class="nextBtn"><img src="<?PHP echo SITE_URL?>assets/old/images/transparent.gif"></a>
                        </div>
                    </div>
                </div>
            </div>
            <?PHP
            //page footer
            echo (isset($page_footer))?$page_footer:"";
            ?>
            <div class="navigation">
                <a href="<?PHP echo SITE_URL?>ajax/author_page/2/<?PHP echo $tag_id;?>/<?PHP echo $data['post_parent']?>"></a>
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
        site.changeFontSize();site.getFamous("<?PHP echo SITE_URL?>author/recommend/<?PHP echo ($data['display_name'])?>");
        if ($('.otherAuthor ul li').length>0){
            $('.otherAuthor ul').infinitescroll({
                loading: {
                    finished: undefined,
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
