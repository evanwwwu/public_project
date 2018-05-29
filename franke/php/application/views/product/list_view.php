<article class="slideshow pl">
    <div class="owl-carousel-pl">
        <?PHP foreach($banners as $banner):?>
        <a><img src="<?PHP echo IMG_URL?>upload/<?PHP echo @$banner["filename"]?>" /></a>
        <?PHP endforeach;?>
    </div>
    <?php if(count($banners)>1): ?>
    <div class="slidebtn">
        <div class="slidebtn_l"><img src="<?PHP echo ASSETS_URL?>images/slidebtn_l.png" /></div>
        <div class="slidebtn_r"><img src="<?PHP echo ASSETS_URL?>images/slidebtn_r.png" /></div>
    </div>
<?php endif; ?>
</article>
<article class="wrap main">
    <div class="part">
        <div class="title">
            <h1><span>FRANKE <?PHP echo $h2?></span></h1>
            <div class="line"></div>
        </div>
        <div class="option clearfix">
            <div class="op_wrap">
                <?PHP foreach($filters as $filter):?>
                <div class="part">
                    <div class="title">
                        <p><?PHP echo $filter["title"]?></p>
                        <div class="icon">
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </div>
                    <ul class="content">
                        <?PHP foreach($filter["options"] as $option):?>
                        <li>
                            <label>
                                <input type="checkbox" name="filter_option" <?PHP echo (in_array($option["id"],$filter_id))?"checked":"" ?> value="<?PHP echo $option["id"]?>"/>
                                <p><?PHP echo @$option["name"]?></p>
                            </label>
                        </li>
                        <?PHP endforeach;?>
                    </ul>
                </div>
                <?PHP endforeach;?>
                <div class="clearall"><a href="javascript:void(0)">CLEAR ALL</a></div>
            </div>
        </div>
        <ul class="list" style="font-size: 0px;">
            <?PHP $ad_inx=0;?>
            <?PHP foreach($rs as $key => $row):?>
            <?php $cr_num = 0; ?>
            <li class="product" data-filter="<?PHP echo $row['filters']?>">
                <a href="<?PHP echo SITE_URL?>product/<?PHP echo $controller_addr?>/detail/<?PHP echo $row["id"]?>" class="pic">
                    <?PHP if(@$row["cover_img"]!=""&&@$row["cover_img"]!="null"):?>
                    <?PHP $cr_num = count(json_decode($row["cover_img"]));?>
                    <?PHP foreach(json_decode($row["cover_img"]) as $k=> $img):?>
                    <img class="<?PHP echo ($k==0)?"active":""?>" src="<?PHP echo IMG_URL?>upload/<?PHP echo $img?>" />
                    <?PHP endforeach;?>
                    <?PHP endif;?>
                </a>
                <div class="words" style="font-size:14px;">
                    <a href="<?PHP echo SITE_URL?>product/<?PHP echo $controller_addr?>/detail/<?PHP echo $row["id"]?>" class="link"><?PHP echo $row["product_no"]?><div class="line"></div></a>
                    <div class="circle_part">
                        <?PHP for($x=0;$x<$cr_num;$x++):?>
                        <div class="circle <?PHP echo ($x==0)?"active":""?>"></div>
                        <?PHP endfor;?>
                    </div>
                </div>
            </li>
            <?php if($ad_scale>0): ?>
            <?PHP if($key%$ad_scale==0&&$key!=0):?>
            <?php if(@$ads[$ad_inx]["cover_img"]): ?>
            <li class="product ad">
                <a <?PHP echo (@$ads[$ad_inx]["link"]!="")?'href="'.$ads[$ad_inx]["link"].'"':""?> class="pic">
                    <img class="active" src="<?PHP echo IMG_URL?>upload/<?PHP echo @$ads[$ad_inx]["cover_img"]?>" />
                </a>
            </li>
            <?PHP $ad_inx++;?>
        <?php endif; ?>
        <?PHP endif;?>
        <?PHP endif;?>
        <?PHP endforeach;?>
    </ul>
</div>
</article>
<script type="text/javascript">
$(function(){
    site.choose_box_set();
})
</script>