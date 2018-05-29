<!DOCTYPE HTML>
<html>
<head>
    <title>隱巷設計<?PHP echo (@$meta["title"]!="")?" - ".@$meta['title']:""?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta id="viewport" name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=1" />
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- <link rel="shortcut icon" href="<?PHP echo SITE_URL?>assets/images/favicon.ico"> -->
    <!--[if lt IE 9]>
    <script src="<?PHP echo SITE_URL?>assets/js/html5shiv.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <script src="<?PHP echo SITE_URL?>assets/js/html5shiv.js"></script>
    <![endif]-->    

    <meta name="keywords" content="隱木設計,隱巷設計" />
    <meta name="description" content="<?PHP echo (@$meta['brief']!="")?$meta['brief']:"如「隱巷」字面般，一種低調、實務、質樸的理念，一種柳暗花明又一村的創新 「Less‭, ‬but better」 好的設計應該摒除非必要的元素與機能；“Excellent Design simply comes from necessary elements and functions, Which is what we do for our customers ”‭；2010年成立於臺北，XY各代表「隱」「巷」拼音字首，XY也為空間中兩個相對應的軸線，可衍伸出無限的可能性，I為INTERIOR，主要從事各類空間規劃設計、傢飾設計以及設計顧問等工作。"?>">

    <meta property="og:title" content="<?PHP echo "隱巷設計 - ".@$meta['title']?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?PHP echo SITE_URL.uri_string()?>" />
    <meta property="og:description" content="<?PHP echo (@$meta['brief']!="")?$meta['brief']:"如「隱巷」字面般，一種低調、實務、質樸的理念，一種柳暗花明又一村的創新 「Less‭, ‬but better」 好的設計應該摒除非必要的元素與機能；“Excellent Design simply comes from necessary elements and functions, Which is what we do for our customers ”‭；2010年成立於臺北，XY各代表「隱」「巷」拼音字首，XY也為空間中兩個相對應的軸線，可衍伸出無限的可能性，I為INTERIOR，主要從事各類空間規劃設計、傢飾設計以及設計顧問等工作。"?>" />
    <meta property="og:image" content="<?PHP echo (isset($meta['cover_img']))?IMG_URL.'upload/'.$meta['cover_img']:''?>" />
    <meta property="og:site_name" content="<?PHP echo "隱巷設計 - ".@$meta['title']?>" />
    <link rel="apple-touch-icon" href="icon/apple-touch-icon.png" />

    <link href="<?PHP echo SITE_URL?>assets/css/fotorama.css" rel="stylesheet">
    <script src="<?PHP echo SITE_URL?>assets/js/fotorama.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/spin.min.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/jquery.scrollAnimate.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/jquery.easing.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/jquery.masonry.min.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/modernizr-transitions.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/jquery.infinitescroll.js"></script>
    <script src="http://masonry.desandro.com/masonry.pkgd.js"></script>
    <!--CDN links for the latest TweenLite, CSSPlugin, and EasePack-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.3/TweenMax.min.js"></script>
    <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.3/plugins/ScrollToPlugin.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.3/utils/Draggable.min.js"></script>-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
    <link href="<?PHP echo SITE_URL?>assets/css/layout.css" rel="stylesheet" type="text/css">  
    <script src="<?PHP echo SITE_URL?>assets/js/site.js"></script>
    <script>
    $(function(){
        document.oncontextmenu = function(){
            window.event.returnValue=false; 
        }
        $("select[name=languages]").change(function(){
            var old = "<?PHP echo $this->uri->segment(1)?>"; 
            var lan = $(this).find(":selected").val();
            var url = window.location.toString();
            url = url.split(old);
            location = url[0]+lan+url[1];
        });
        $(".share").click(function(){
            share();
        });
    })

    function share() {
        var width = 800;
        var height = 600;
        var left = parseInt((screen.availWidth/2) - (width/2));
        var top = parseInt((screen.availHeight/2) - (height/2));
        var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
        myWindow = window.open("https://www.facebook.com/sharer/sharer.php?u="+encodeURI(window.location.toString()),'_blank',windowFeatures)
    }
    </script>
</head>
<body>
    <div class="wrapper">
        <?PHP if(!isset($isin)):?>
        <header class="<?PHP echo (isset($ishome))?'index_h':'';?> <?PHP echo (isset($pre))?'pre_nav':'';?>">
            <div class="logo c" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>'">
                <?PHP if(isset($ishome)):?>
                <div class="x"><img src="<?PHP echo SITE_URL?>assets/images/logo_x.png" /></div>
                <div class="y"><img src="<?PHP echo SITE_URL?>assets/images/logo_y.png" /></div>
                <div class="i"><img src="<?PHP echo SITE_URL?>assets/images/logo_i.png" /></div>
                <?PHP else:?>
                <img src="<?PHP echo SITE_URL?>assets/images/logo.png" />
                <?PHP endif;?>
            </div>
            <nav class="c">
                <ul>
                    <li class="<?PHP echo ($controller_addr=='about')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/about'"><h4><span><?PHP echo lang("menu_about")?></span></h4></li>
                    <li class="<?PHP echo ($controller_addr=='service')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/service'"><h4><span><?PHP echo lang("menu_service")?></span></h4></li>
                    <li class="<?PHP echo ($controller_addr=='work')?'active':''?>" >
                        <h4 onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work'"><span><?PHP echo lang("menu_work")?></span></h4>
                        <?PHP if($controller_addr=="work"):?>
                        <ul>
                            <li class="<?PHP echo ($work_tag=='')?'active':''?>" >
                                <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work">
                                    <h4><span>全部</h4></span>
                                </a>
                            </li>
                            <?PHP foreach($work_tags as $tag):?>
                            <li class="<?PHP echo ($work_tag==$tag['url'])?'active':''?>">
                                <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/tag/<?PHP echo $tag['url']?>">
                                    <h4><span><?PHP echo $tag['title_name']?></h4></span>
                                </a>
                            </li>
                            <?PHP endforeach;?>
                        </ul>
                        <?PHP endif;?>
                    </li>
                    <li class="<?PHP echo ($controller_addr=='press')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/press'"><h4><span><?PHP echo lang("menu_press")?></span></h4></li>
                    <li class="<?PHP echo ($controller_addr=='awards')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/awards'"><h4><span><?PHP echo lang("menu_awards")?><span></span></h4></li>
                    <li class="<?PHP echo ($controller_addr=='members')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/members'"><h4><span><?PHP echo lang("menu_members")?></span></h4></li>
                    <li class="<?PHP echo ($controller_addr=='contact')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/contact'"><h4><span><?PHP echo lang("menu_contact")?></span></h4></li>
                </ul>
                
            </nav>
            <div class="bar m">
                <div class="m_logo">
                    <img src="<?PHP echo SITE_URL?>assets/images/m_logo.png"  onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>'"/>
                    <?PHP if(isset($pre)&&!isset($iswork)):?>
                    <div class="m_year m"><h4><span>2013</span></h4></div>
                    <?PHP endif;?>
                </div>
                <div class="nav_btn"><img src="<?PHP echo SITE_URL?>assets/images/m_menu.png" /></div>
            </div>
            <nav class="m">
                <div id="closeMask"></div>
                <div class="nav_show">
                    <div class="menu_btn <?PHP echo ($controller_addr=='about')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/about'">
                        <h4><span><?PHP echo lang("menu_about")?></span></h4>                       
                    </div>
                    <div class="menu_btn <?PHP echo ($controller_addr=='service')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/service'">
                        <h4><span><?PHP echo lang("menu_service")?></span></h4>
                    </div>
                    <div class="menu_btn <?PHP echo ($controller_addr=='work')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work'">
                        <h4><span><?PHP echo lang("menu_work")?></span></h4>
                    </div>
                    <div class="menu_btn <?PHP echo ($controller_addr=='press')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/press'">
                        <h4><span><?PHP echo lang("menu_press")?></span></h4>
                    </div>
                    <div class="menu_btn <?PHP echo ($controller_addr=='awards')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/awards'">
                        <h4><span><?PHP echo lang("menu_awards")?></span></h4>
                    </div>
                    <div class="menu_btn <?PHP echo ($controller_addr=='members')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/members'">
                        <h4><span><?PHP echo lang("menu_members")?></span></h4>
                    </div>
                    <div class="menu_btn <?PHP echo ($controller_addr=='contact')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/contact'">
                        <h4><span><?PHP echo lang("menu_contact")?></span></h4>
                    </div>
                    <div class="line"></div>
                    <div class="menu_btn <?PHP echo ($this->uri->segment(1)=='tw')?'active':''?>" onclick="location='<?PHP echo SITE_URL?>tw'">
                        <h4><span>繁體中文</span></h4>
                    </div>
                    <div class="menu_btn <?PHP echo ($this->uri->segment(1)=='cn')?'active':''?>" onclick="location='<?PHP echo SITE_URL?>cn'">
                        <h4><span>简体中文</span></h4>
                    </div>
                    <div class="menu_btn <?PHP echo ($this->uri->segment(1)=='en')?'active':''?>" onclick="location='<?PHP echo SITE_URL?>en'">
                        <h4><span>ENGLISH</span></h4>
                    </div>
                </div>
                <?PHP if(isset($iswork)):?>
                <div class="nav_work">
                    <div>
                        <ul>
                            <li class="<?PHP echo ($work_tag=='')?'active':''?>" >
                                <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work">
                                    <p><span>總覽</span></p>
                                </a>
                            </li>
                            <?PHP foreach($work_tags as $tag):?>
                            <li class="<?PHP echo ($work_tag==$tag['url'])?'active':''?>">
                                <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/tag/<?PHP echo $tag['url']?>">
                                 <p><span><?PHP echo $tag['title_name']?></span></p></li>
                             </a>
                         </li>
                         <?PHP endforeach;?>
                     </ul>
                 </div>
                 <div class="nav_btn2">
                    <div><img src="<?PHP echo SITE_URL?>assets/images/m_menu2.png" /></div>
                    <p>作品總覽</p>
                </div>
            </div>
            <?PHP endif;?>
        </nav>
    </header>
    <?PHP endif;?>
    <?PHP echo $content_view;?>
    <footer>
        <?PHP if(!isset($ishome)):?>
        <div class="f_logo"><img src="<?PHP echo SITE_URL?>assets/images/footer_logo.png" /></div>
        <p>版權所有 隱巷設計顧問有限公司<br />© 2013 XYI Design All Rights Reserved.</p>
        <a href="https://www.facebook.com/XYIDC">
            <img src="<?PHP echo SITE_URL?>assets/images/footer_f.png" />
            <img src="<?PHP echo SITE_URL?>assets/images/footer_f_h.png" />
        </a>
        <a href="#">
            <img src="<?PHP echo SITE_URL?>assets/images/footer_i.png" />
            <img src="<?PHP echo SITE_URL?>assets/images/footer_i_h.png" />
        </a>
        <a href="#">
            <img src="<?PHP echo SITE_URL?>assets/images/footer_y.png" />
            <img src="<?PHP echo SITE_URL?>assets/images/footer_y_h.png" />
        </a>
        <a href="#">
            <img src="<?PHP echo SITE_URL?>assets/images/footer_w.png" />
            <img src="<?PHP echo SITE_URL?>assets/images/footer_w_h.png" />
        </a>           
        <label>Languages:
            <select name="languages">
                <option value="tw" <?PHP echo ($this->uri->segment(1)=='tw')?'selected':''?> >繁體中文</option>
                <option value="cn" <?PHP echo ($this->uri->segment(1)=='cn')?'selected':''?> >简体中文</option>
                <option value="en" <?PHP echo ($this->uri->segment(1)=='en')?'selected':''?> >ENGLISH</option>
            </select>
        </label>
        <div class="m">
            <div>
                <a href="https://www.facebook.com/XYIDC"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_f.png" /></a>
                <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_i.png" /></a>
                <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_y.png" /></a>
                <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_w.png" /></a>
            </div>
            <div><img src="<?PHP echo SITE_URL?>assets/images/m_footer_logo.png" /></div>
            <p>版權所有 隱巷設計顧問有限公司<br />© 2013 XYI Design All Rights Reserved.</p>
        </div>
        <?PHP else:?>
        <div class="m hire"><img src="<?PHP echo SITE_URL?>assets/images/m_hire.png" /></div>
        <div class="m">
            <div>
                <a href="https://www.facebook.com/XYIDC"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_f.png" /></a>
                <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_i.png" /></a>
                <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_y.png" /></a>
                <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_w.png" /></a>
            </div>
            <div><img src="<?PHP echo SITE_URL?>assets/images/m_footer_logo.png" /></div>
            <p>版權所有 隱巷設計顧問有限公司<br />© 2013 XYI Design All Rights Reserved.</p>
        </div>
        <?PHP endif;?>
    </footer>
</div>
</body>