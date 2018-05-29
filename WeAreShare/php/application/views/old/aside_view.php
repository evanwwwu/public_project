
<div class="aside">
    <div class="search">
        <form id="frm_search" action="<?PHP echo SITE_URL?>search" onsubmit="return search_term();">
            <input id='key' name="key" type="text" ><a href="javascript:void(0)" onClick="if(search_term()==true) $('#frm_search').submit();"></a>
        </form>
    </div>
    <div class="socialMedia">
        <p>
            Follow us
        </p>
        <ul>
            <li><a href="#" class="fb">facebook</a></li>
            <li><a class="weibo">weibo</a></li>
            <li><a class="twitter">twitter</a></li>
            <li><a class="linkin">linkin</a></li>
            <li><a class="instagram">instagram</a></li>
            <li><a href="#" class="rss">RSS</a></li>
        </ul>
    </div>
    <div class="ad">
        <div id="random" class="randomshow" style="overflow:hidden; "> 
            <?PHP if(isset($first_banner)): ?>
            <?PHP foreach($first_banner as $banner):?>
            <?PHP $url = ($banner['link']=='')?"javascript:void(0)":SITE_URL . 'adclick/?url=' . $banner['link'] . '&ad='.$banner['id'];?>
            <?PHP $on = ($banner['cont']>'1')?'onload="setTimeout(random_banner(\''.$banner['id'].'\'),2000)"':""; ?>
            <div class="img_div" style=" margin-left:0px; width:730px; height:240px; position:relative;">
                <?PHP echo '<a href="'.$url.'" target="_blank" style="position:absolute;"><img '.$on.'style="width:240px; height:240px;" src="'.SITE_URL.'upload/'.$banner['img_title'].'"></a> '?>         
            </div>
            <?PHP endforeach; endif;?>
        </div>

        <ul style="margin-top:20px;">
            <?PHP if(isset($side_banner)){
                foreach($side_banner as $banner){
              $url2 = ($banner['link']=='')?"":'href="'.SITE_URL . 'adclick/?url=' . $banner['link'] . '&ad='.$banner['id'].'"';
                    echo '<li><a '.$url2.' target="_blank"><img src="'.SITE_URL.'upload/'.$banner['img_title'].'"/></a></li>';
                }
            }
            ?>

        </ul>
    </div>
</div>