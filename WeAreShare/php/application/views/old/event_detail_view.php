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
                <div class="articles">
                    <div class="categories"><?PHP echo $data['terms'];?></div>
                    <h2><?PHP echo $data['post_title'];?></h2>
                    <div class="post-info">
                        <span><?PHP echo $data['display_date']?></span>| by <a href="<?PHP echo SITE_URL . 'search?key=' . $data['author']?>"><?PHP echo $data['author']?></a>
                        <div class="fontSizeCtl">
                            <a href="#" class="small">A</a>
                            <a href="#" class="bigger">A</a>
                        </div>
                    </div>


                    <div class="summary"></div>

                    <script>
                    var we_ad = <?PHP echo json_encode($slide_ad)?>;
                    </script>
                    <div class="fotorama" data-nav="thumbs" data-loop="true" data-allow-full-screen="true" data-width="100%" data-maxwidth="600" data-height="500" data-fit="contain">
                        <?PHP foreach($data['gallery'] as $row):?>
                        <img src="<?PHP echo SITE_URL . 'upload/' . $row['post_title'];?>" data-caption="<?PHP echo $row['caption'];?>"  data-full="<?PHP echo SITE_URL . 'upload/' . str_replace('_thumb','',$row['post_title']);?>">
                        <?PHP endforeach;?>
                    </div>

                    <div class="postContent">
                        <?PHP echo $data['post_content'];?>
                    </div>
                    <div class="tag">
                        <ul>
                            <li><span>標籤：</span></li>
                            <?PHP foreach($data['tags'] as $tag):?>
                            <li><a href="<?PHP echo SITE_URL . 'search?key=' . $tag['name']?>"><?PHP echo $tag['name']?></a>,</li>
                            <?PHP endforeach;?>
                        </ul>
                    </div>
                    <?PHP if($_SESSION[ADMIN_ACTIVE]=='1' || $_SESSION[ADMIN_SESSION]==$data['post_author']):?>
                    <div class="edit" style="text-align: right;">
                        <a style="color: #3b8bba;" href="<?PHP echo ADMIN_URL . 'posts/edit/' .$data['ID']?>" target="_blank">編輯頁面</a>  
                    </div>
                    <?PHP endif;?>          
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
                    <div class="pager">
                        <?PHP if ($data['prev_title']!=''):?>
                        <a href="<?PHP echo SITE_URL . 'event/' . $data['prev_title']['post_name']?>" class="prevEvent" title="<?PHP echo $data['prev_title']['post_title']?>"><img src="<?PHP echo SITE_URL?>assets/old/images/transparent.gif"><span>上一則</span>
                            <p>
                                <?PHP echo $data['prev_title']['display_title']?>
                            </p>
                        </a>
                        <?PHP endif;?>
                        <?PHP if ($data['next_title']!=''):?>
                        <a href="<?PHP echo SITE_URL . 'event/' . $data['next_title']['post_name']?>" class="nextEvent" title="<?PHP echo $data['next_title']['post_title']?>"><img src="<?PHP echo SITE_URL?>assets/old/images/transparent.gif"><span>下一則</span>
                            <p>
                                <?PHP echo $data['next_title']['display_title']?>
                            </p>
                        </a>
                        <?PHP endif;?>
                    </div>
                    <div id="recommend" class="recommend">
                        <h2>推薦派對</h2>
                        <ul>
                        </ul>
                        <div class="clear"></div>
                        <div id="pager" class="pager2">
                            <a href="#" class="prevBtn"><img src="<?PHP echo SITE_URL?>assets/old/images/transparent.gif"></a>
                            <a href="#" class="nextBtn"><img src="<?PHP echo SITE_URL?>assets/old/images/transparent.gif"></a>
                        </div>
                    </div>
                    <div class="goTop"><a href="#">
                        <img src="images/transparent.gif">Top</a></div>
                    </div>
                    <!-- disqus -->
                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                    var disqus_shortname = 'wearesharing'; // required: replace example with your forum shortname

                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                    <!-- end disqus -->
                </div>
                <?PHP
            //page footer
                echo (isset($page_footer))?$page_footer:"";
                ?>
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
            site.changeFontSize();site.getRecommend("<?PHP echo SITE_URL?>event/recommend/<?PHP echo ($data['post_name'])?>");
        })
        </script>
    </body>
    </html>
