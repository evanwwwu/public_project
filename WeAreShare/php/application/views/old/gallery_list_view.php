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
                <div class="gallery">
                    <div class="selectItem">
                        <select name="month">
                            <?PHP 
                                for($i=1;$i<=12;$i++):
                                    $tmp = mktime(0,0,0,$i,1,2013);
                                    echo '<option value="'.date('m',$tmp).'">'.date('F',$tmp).'</option>';
                                endfor;
                            ?>
                        </select>
                        <select name="year">
                            <?PHP for($i=date('Y');$i>2000;$i--):?>
                            <option value="<?PHP echo $i?>"><?PHP echo $i?></option>
                            <?PHP endfor;?>
                        </select>
                    </div>
                    <ul>
                        <?PHP $banner_count = 0;?>
                        <?PHP foreach($article['data'] as $data):?>
                            <?PHP if (isset($data['img_title'])):?>
                                <?PHP $banner_count++;?>
                            <?PHP else:?>
                            <li>
                                <a href="<?PHP echo SITE_URL . 'gallery/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>">
                                    <img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>">
                                    <p><?PHP echo $data['post_title'];?></p>
                                    <span><?PHP echo $data['display_date']?></span>
                                    <div class="overlay"></div>
                                </a>
                            </li>
                            <?PHP endif;?>
                        <?PHP endforeach;?>
                    </ul>
                </div>
                <div class="clear">
                </div>
            </div>
            <?PHP
            //page footer
            echo (isset($page_footer))?$page_footer:"";
            ?>
            <div class="navigation">
                <?PHP if (isset($yymm)):?>
                <a href="<?PHP echo SITE_URL?>ajax/gallery_page_by_date/2/<?PHP echo $yymm;?>"></a>
                <?PHP else:?>
                <a href="<?PHP echo SITE_URL?>ajax/gallery_page/2/<?PHP echo $tag_id;?>"></a>
                <?PHP endif;?>
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
            if ($('.gallery ul li').length>0){
                $('.gallery ul').infinitescroll({
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
                    path:function(){return "<?PHP echo SITE_URL?>/ajax/gallery_page/"+page+"/<?PHP echo $tag_id;?>"}
                });
            }

            <?PHP if (isset($yymm)):?>
            var str_date = '<?PHP echo $yymm?>';
            var arr_date = str_date.split("-");
            $('.selectItem select[name="year"] option[value="'+arr_date[0]+'"]').attr('selected',true)
            $('.selectItem select[name="month"] option[value="'+arr_date[1]+'"]').attr('selected',true)
            <?PHP endif;?>
            $('.selectItem select[name="categories"]').bind('change',function(){
                if ($(this)[0].selectedIndex==0) return;
                location = '<?PHP echo SITE_URL?>gallery/tag/'+$(this).find('option:selected').text();
            })

            $('.selectItem select[name="year"],.selectItem select[name="month"]').bind('change',function(){
                search_month();
            })

        })
        function search_month(){
            //if ($('.selectItem select[name="year"]')[0].selectedIndex == 0) return;
            //if ($('.selectItem select[name="month"]')[0].selectedIndex == 0) return;
            var str_date = $('.selectItem select[name="year"] option:selected').text() + "-" + 
                            $('.selectItem select[name="month"] option:selected').val()

            location = "<?PHP echo SITE_URL?>gallery/month/" + str_date;
        }
    </script>
</body>
</html>
