<article class="slideshow">
    <div class="owl-carousel">
        <?PHP foreach($banners as $banner):?>
        <a href="<?PHP echo (@$banner["link"]!="")?$banner["link"]:"javascript:void(0)"?>"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $banner["cover_img"];?>" /></a>
        <?PHP endforeach;?>
    </div>
    <div class="slidebtn">
        <div class="slidebtn_l"><img src="<?PHP echo ASSETS_URL?>images/slidebtn_l.png" /></div>
        <div class="slidebtn_r"><img src="<?PHP echo ASSETS_URL?>images/slidebtn_r.png" /></div>
    </div>
</article>
<article class="wrap main">
    <div class="part">
        <div class="title">
            <h1><span>PRODUCT</span></h1>
            <div class="line"></div>
        </div>
        <ul>
            <?PHP foreach($products as $pro):?>
            <li class="index_p">
                <a href="<?PHP echo $pro["link"]?>" class="pic">
                    <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $pro["cover_img"]?>" />
                </a>
                <a href="<?PHP echo $pro["link"]?>" class="link"><?PHP echo $pro["title"]?> ><div class="line"></div></a>
            </li>
            <?PHP endforeach;?>
        </ul>
    </div>
    <div class="part event">
        <div class="title">
            <h1><span>FEATURES</span></h1>
            <div class="line"></div>
        </div>
        <?PHP foreach($features as $fea):?>
        <div>
            <a href="<?PHP echo @$fea["link"]?>">
                <img src="<?PHP echo IMG_URL?>upload/<?PHP echo @$fea["cover_img"]?>" />
            </a>
            <a href="<?PHP echo @$fea["link"]?>" class="link"><?PHP echo @$fea["link_title"]?> ><div class="line"></div></a>
        </div>
        <?PHP endforeach;?>
    </div>
    <div class="part">
        <div class="title">
            <h1><span>APPLIANCES</span></h1>
            <div class="line"></div>
        </div>
        <?PHP foreach($apps as $a=>$app):?>
        <?PHP if($app["type"]=="1"):?>
        <ul class="appliance <?PHP echo ($a!=0)?"water":""?> t1">
            <li class="words">
                <P>
                    <?PHP echo nl2br(@$app["content"]);?>
                </P>
                <div class="link">
                    <a <?PHP echo (@$app["link"])?'href="'.$app["link"].'"':""?> ><?PHP echo @$app["link_title"]?><div class="line"></div></a>
                </div>
            </li>
            <li class="pic">
                <a <?PHP echo (@$app["link"])?'href="'.$app["link"].'"':""?> class="">
                    <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $app["cover_img"]?>" />
                </a>
            </li>
        </ul>
        <?PHP else:?>
        <ul class="appliance <?PHP echo ($a!=0)?"water":""?> t2">
            <li class="pic">
                <a <?PHP echo (@$app["link"])?'href="'.$app["link"].'"':""?>>
                    <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $app["cover_img"]?>" />
                </a>
            </li>
            <li class="words">
                <P>
                    <?PHP echo nl2br(@$app["content"]);?>
                </P>
                <div class="link">
                    <a <?PHP echo (@$app["link"])?'href="'.$app["link"].'"':""?>><?PHP echo @$app["link_title"]?> ><div class="line"></div></a>
                </div>
            </li>
        </ul>
        <?PHP endif;?>
        <?PHP endforeach;?>
    </div>
</article>