<!DOCTYPE HTML>
<html>
<head>
    <title>隱木設計<?PHP echo (@$meta["title"]!="")?" - ".@$meta['title']:""?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta id="viewport" name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=1">
    <meta http-equiv="Cache-Control" content="Public">

    <meta name="keywords" content="隱木設計,隱巷設計">
    <meta name="description" content="<?PHP echo (@$meta['brief']!="")?$meta["brief"]:"從區域、建築定位的設計理念，我們具備完整的整合能力，具有房地產經驗背景的管理團隊操作產品定位與品牌理念，國際設計團隊著重設計管理方式，透過完整專業的服務與流程提供客戶國際水準的美學設計，將生活從品質的階段帶入品味的層次，將文化與生活緊密結合，創造富有涵養的作品。"?>">
    <meta property="og:title" content="<?PHP echo "隱木設計 - ".@$meta['title']?>">
    <meta property="og:type" content="website" >
    <meta property="og:url" content="<?PHP echo SITE_URL.uri_string()?>" >
    <meta property="og:description" content="<?PHP echo (@$meta['brief']!="")?$meta["brief"]:"從區域、建築定位的設計理念，我們具備完整的整合能力，具有房地產經驗背景的管理團隊操作產品定位與品牌理念，國際設計團隊著重設計管理方式，透過完整專業的服務與流程提供客戶國際水準的美學設計，將生活從品質的階段帶入品味的層次，將文化與生活緊密結合，創造富有涵養的作品。"?>" >
    <meta property="og:image" content="<?PHP echo (isset($meta['cover_img']))?IMG_URL.'upload/'.$meta['cover_img']:''?>" >
    <meta property="og:site_name" content="<?PHP echo "隱木設計 - ".@$meta['title']?>" >

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <link href="<?PHP echo SITE_URL?>assets/css/fotorama.css" rel="stylesheet">
    <script src="<?PHP echo SITE_URL?>assets/js/fotorama.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/spin.min.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/jquery.easing.js"></script>
    <script src="http://masonry.desandro.com/masonry.pkgd.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/jquery.masonry.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.3/TweenMax.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/jquery.infinitescroll.js"></script>
    <link href="<?PHP echo SITE_URL?>assets/css/layout.css" rel="stylesheet" type="text/css">  
    <script src="<?PHP echo SITE_URL?>assets/js/site.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/js/jquery.tinyscrollbar.min.js"></script>
    <script>
    function head () {
        if (window.SVGForeignObjectElement) {
            document.write('\
                <svg width="146px" height="146px">\
                <defs>\
                <mask id="mask" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse">\
                <image width="146px" height="146px" xlink:href="<?PHP echo SITE_URL?>assets/images/awards_mask.png"/>\
                </mask>\
                </defs>\
                <foreignObject width="100%" height="100%" style="mask: url(#mask);">\
                ');
        }
    }
    function foot () {
        if (window.SVGForeignObjectElement) {
            document.write('\
                </foreignObject>\
                </svg>\
                ');
        }
    }
    function share(url)
    {
        if(typeof(url)=="undefined")
        {
            url = location.href;
        }
        var width = 800;
        var height = 300;
        var left = parseInt((screen.availWidth/2) - (width/2));
        var top = parseInt((screen.availHeight/2) - (height/2));
        var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
        myWindow = window.open("https://www.facebook.com/sharer/sharer.php?u="+url,"Facebook Share",windowFeatures);
        myWindow.focus();
    }
    $(function(){
        document.oncontextmenu = function(){
            window.event.returnValue=false; 
        }
    });
    </script>
</head>
<body>
    <div class="wrapper">
        <header class="<?PHP echo (isset($ishome))?'':'in'?> <?PHP echo (isset($isin))?'a':''?>">
            <div class="logo" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>'"><img src="<?PHP echo SITE_URL?>assets/images/logo.png" /></div>
            <?PHP if(!isset($ishome)):?>
            <div class="logo m" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>'"><img src="<?PHP echo SITE_URL?>assets/images/m_logo.png" /></div>
            <?PHP endif;?>
            <div class="nav_btn"><img src="<?PHP echo SITE_URL?>assets/images/m_btn.png" /></div>
            <?PHP if(isset($iswork)):?>
            <div class="nav_btn2"><img src="<?PHP echo SITE_URL?>assets/images/m_btn2.png"></div>
            <?PHP endif;?>
            <nav class="c">
                <ul>
                    <li class="<?PHP echo ($controller_addr=='about')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/about'">
                        <h3><?PHP echo lang('menu_about');?></h3>
                    </li>
                    <li class="<?PHP echo ($controller_addr=='service')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/service'">
                        <h3><?PHP echo lang('menu_service');?></h3>
                    </li>
                    <li class="<?PHP echo ($controller_addr=='work')?'active':''?>">
                        <h3  onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work'"><?PHP echo lang('menu_work');?></h3>
                        <ul>
                            <li class="<?PHP echo ($work_tag=='')?'active':''?>" >
                                <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work">
                                    <p>全部</p>
                                </a>
                            </li>
                            <?PHP foreach($work_tags as $tag):?>
                            <li class="<?PHP echo ($work_tag==$tag['url'])?'active':''?>">
                                <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/tag/<?PHP echo $tag['url']?>">
                                    <p><?PHP echo $tag['title_name']?></p>
                                </a>
                            </li>
                            <?PHP endforeach;?>
                        </ul>
                    </li>
                    <li class="<?PHP echo ($controller_addr=='press')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/press'">
                        <h3><?PHP echo lang('menu_press');?></h3>
                    </li>
                    <li class="<?PHP echo ($controller_addr=='awards')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/awards'">
                        <h3><?PHP echo lang('menu_awards');?></h3>
                    </li>
                    <li class="<?PHP echo ($controller_addr=='members')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/members'">
                        <h3><?PHP echo lang('menu_members');?></h3>
                    </li>
                    <li class="<?PHP echo ($controller_addr=='contact')?'active':''?>" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/contact'">
                        <h3><?PHP echo lang('menu_contact');?></h3>
                    </li>
                </ul>
            </nav>
            <nav class="m">
                <div id="closeMask"></div>
                <div class="nav_show">
                    <div class="menu_btn" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/about'">
                        <h3><?PHP echo lang('menu_about');?></h3>                       
                    </div>
                    <div class="menu_btn" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/service'">
                        <h3><?PHP echo lang('menu_service');?></h3>
                    </div>
                    <div class="menu_btn" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work'">
                        <h3><?PHP echo lang('menu_work');?></h3>
                    </div>
                    <div class="menu_btn" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/press'">
                        <h3><?PHP echo lang('menu_press');?></h3>
                    </div>
                    <div class="menu_btn" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/awards'">
                        <h3><?PHP echo lang('menu_awards');?></h3>
                    </div>
                    <div class="menu_btn" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/members'">
                        <h3><?PHP echo lang('menu_members');?></h3>
                    </div>
                    <div class="menu_btn" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/contact'">
                        <h3><?PHP echo lang('menu_contact');?></h3>
                    </div>
                </div>
                <div class="nav_work">
                    <div><img src="<?PHP echo SITE_URL?>assets/images/m_arrow.png" /></div>
                    <div>
                        <ul>
                            <li class="<?PHP echo ($work_tag=='')?'active':''?>" >
                                <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work">
                                    <p><span style="color:#ffffff;">全部</span></p>
                                </a>
                            </li>
                            <?PHP foreach($work_tags as $tag):?>
                            <li class="<?PHP echo ($work_tag==$tag['url'])?'active':''?>">
                                <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/tag/<?PHP echo $tag['url']?>">
                                    <p><span style="color:#ffffff;"><?PHP echo $tag['title_name']?></span></p>
                                </a>
                            </li>
                            <?PHP endforeach;?>
                        </ul>
                    </div>
                </div>
            </nav>

        </header>
        <?PHP echo @$content_view;?>
        <footer class="<?PHP echo (isset($ishome))?'ii':''?> <?PHP echo (isset($isin))?'in a':''?>">
            <div class="c">
                <ul>
                    <li>
                        <div class="c"><img src="<?PHP echo SITE_URL?>assets/images/footer_logo.png" /></div>
                        <p>XWD DESIGN is an interior design & consulting<br />company based in Shanghai, China.</p>
                        <p>版权所有　隐木空间设计顾问(上海)有限公司<br />© 2014 XWD Shanghai Inc. All rights reserved.</p>
                        <!-- <div class="m"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_logo.png" /></div> -->
                    </li>
                    <li>
                        <div><h2>WE ARE HIRING</h2><!-- <img src="<?PHP echo SITE_URL?>assets/images/footer_hire.png" /> --></div>
                        <p>
                            <?PHP echo lang("footer_p");?>
                        </p>
                    </li>
                    <li>
                        <div><h2>LANGUAGE</h2><!-- <img src="<?PHP echo SITE_URL?>assets/images/footer_lan.png" /> --></div>
                        <p>
                            <span onclick="location='<?PHP echo SITE_URL?>en'">English</span>
                            <span class="line"></span>
                            <span onclick="location='<?PHP echo SITE_URL?>tw'">繁體中文</span>
                            <span class="line"></span>
                            <span onclick="location='<?PHP echo SITE_URL?>cn'">简体中文</span>
                        </p>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/XYIDC"><img src="<?PHP echo SITE_URL?>assets/images/footer_f.png" /></a>
                        <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/footer_i.png" /></a>
                        <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/footer_y.png" /></a>
                        <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/footer_w.png" /></a>
                    </li>
                </ul>
            </div>
            <div class="m">
                <div class="social">
                    <?PHP if(!isset($ishome)):?>
                    <div class="nav_btn2"><img src="<?PHP echo SITE_URL?>assets/images/m_btn2_f.png" /></div>
                    <?PHP endif;?>
                    <a href="https://www.facebook.com/XYIDC"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_f.png" /></a>
                    <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_i.png" /></a>
                    <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_y.png" /></a>
                    <a href="#"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_w.png" /></a>
                </div>
                <ul>
                    <li>
                        <div class="m"><img src="<?PHP echo SITE_URL?>assets/images/m_footer_logo.png" /></div>
                    </li>
                    <li>
                        <div><h2>WE ARE HIRING</h2><!-- <img src="<?PHP echo SITE_URL?>assets/images/footer_hire.png" /> --></div>
                        <p>
                            <?PHP echo lang("mobile_footer_p");?>
                        </p>
                    </li>
                    <li>
                        <div><h2>LANGUAGE</h2><!-- <img src="<?PHP echo SITE_URL?>assets/images/footer_lan.png" /> --></div>
                        <p>
                            <span onclick="location='<?PHP echo SITE_URL?>en'">English</span>
                            <span class="line"></span>
                            <span onclick="location='<?PHP echo SITE_URL?>tw'">繁體中文</span>
                            <span class="line"></span>
                            <span onclick="location='<?PHP echo SITE_URL?>cn'">简体中文</span>
                        </p>
                    </li>
                    <li>
                        <div><img src="<?PHP echo SITE_URL?>assets/images/m_footer_x.png" /></div>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</body>
</html>