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
                <div class="event index">
                    <div class="selectItem">
                        <select name="month">
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name="year">
                            <?PHP for($i=date('Y');$i>2000;$i--):?>
                            <option value="<?PHP echo $i?>"><?PHP echo $i?></option>
                            <?PHP endfor;?>
                        </select>
                    </div>
                    <div class="post_list">
                        <ul>
                            <?PHP $banner_count = 0;?>
                            <?PHP foreach($posts['data'] as $data):?>
                            <?PHP if (isset($data['img_title'])):?>
                            <?PHP $banner_count++;?>
                            <li class="banner" id="<?PHP echo $data['id']?>">
                                <a <?PHP echo ($data['link']!='')?"href='".SITE_URL . "adclick/?url=" . $data['link'] . "&ad=" . $data['id']."'":""?> target="_blank"><img src="<?PHP echo SITE_URL . 'upload/' . $data['img_title']?>" border="0"></a>
                            </li>
                            <?PHP else:?>
                            <?PHP if ($data['post_type']=='event'):?>
                            <li>
                                <div class="img">
                                    <a href="<?PHP echo SITE_URL . 'event/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>" border="0"></a>
                                </div>
                                <div class="content">
                                    <span class="categories"><?PHP echo $data['tags'];?></span>
                                    <h2><a href="<?PHP echo SITE_URL . 'event/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo $data['display_title'];?></a></h2>
                                    <div class="post-info">
                                        <span><?PHP echo $data['display_date']?></span>| @<?PHP echo $data['location']?>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
                                    </div>
                                    <p>
                                        <?PHP echo $data['brief']?>
                                    </p>
                                    <a href="<?PHP echo SITE_URL . 'event/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
                                </div>
                                <div class="clear">
                                </div>
                            </li>
                            <?PHP else:?>  
                            <li>
                                <div class="img">
                                    <a href="<?PHP echo SITE_URL . 'calendar/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>" border="0"></a>
                                </div>
                                <div class="content">
                                    <span class="date">
                                        <?PHP echo date('F d, Y',strtotime($data['start_date']))?>
                                        <?PHP echo ($data['end_date']!=''? ' - ' . date('F d, Y',strtotime($data['end_date'])):'');?>
                                    </span>
                                    <span class="categories"><?PHP echo $data['tags'];?></span>
                                    <h2><a href="<?PHP echo SITE_URL . 'calendar/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo $data['display_title'];?></a></h2>
                                    <div class="post-info">
                                        <span><?PHP echo $data['display_date']?></span>| @<?PHP echo $data['location']?>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
                                    </div>
                                    <p>
                                        <?PHP echo $data['brief']?>
                                    </p>
                                    <a href="<?PHP echo SITE_URL . 'calendar/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
                                </div>
                                <div class="clear">
                                </div>
                            </li>                  
                            <?PHP endif;?>
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
                <?PHP if (isset($yymm)):?>
                <a href="<?PHP echo SITE_URL?>ajax/schedule_page_by_date/2/<?PHP echo $yymm;?>"></a>
                <?PHP else:?>
                <a href="<?PHP echo SITE_URL?>ajax/schedule_page/2/<?PHP echo $tag_id;?>"></a>
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
    <?PHP if (isset($yymm)):?>
    var url="<?PHP echo SITE_URL?>ajax/schedule_page_by_date/"+page+"/<?PHP echo $yymm;?>";
    <?PHP else:?>
    var url="<?PHP echo SITE_URL?>ajax/schedule_page/"+page+"/<?PHP echo $tag_id;?>"
    <?PHP endif;?>

    $(function(){
        if ($('.post_list ul li').length>0){
            $('.post_list ul').infinitescroll({
                loading: {
                    finished: function(){$('#infscr-loading').remove();
                    page++;
                    <?PHP if (isset($yymm)):?>
                    url="<?PHP echo SITE_URL?>ajax/schedule_page_by_date/"+page+"/<?PHP echo $yymm;?>";
                    <?PHP else:?>
                    url="<?PHP echo SITE_URL?>ajax/schedule_page/"+page+"/<?PHP echo $tag_id;?>"
                    <?PHP endif;?>

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
                path:function(){return ""+url+"/?exist_banner="+ad+""}
            });
}

$('.selectItem select').bind('change',function(){
    search_month();
})

<?PHP if (isset($yymm)):?>
var str_date = '<?PHP echo $yymm?>';
var arr_date = str_date.split("-");
$('.selectItem select:eq(1) option[value="'+arr_date[0]+'"]').attr('selected',true)
$('.selectItem select:eq(0) option[value="'+arr_date[1]+'"]').attr('selected',true)
<?PHP endif;?>
})
function search_month(){
    // if ($('.selectItem select:eq(0)')[0].selectedIndex == 0) return;
    // if ($('.selectItem select:eq(1)')[0].selectedIndex == 0) return;
    var str_date = $('.selectItem select:eq(1) option:selected').text() + "-" + 
    $('.selectItem select:eq(0) option:selected').val()

    location = "<?PHP echo SITE_URL?>schedule/month/" + str_date;
}
</script>
</body>
</html>
