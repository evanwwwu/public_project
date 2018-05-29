<article class="wrap main type02">
    <div class="breadcrumb">
        <p>
            <a href="<?PHP echo SITE_URL?>">HOME</a>
            >
            <a href="<?PHP echo SITE_URL?><?PHP echo ($controller_addr=="water_filter")?'water_filter':'product/'.$controller_addr?>"><?PHP echo $h2?></a>
            >
            <a><?PHP echo $row["product_no"]?></a>
        </p>
    </div>
    <div class="part product">
        <div>
            <div class="slideshow">
                <div class="owl-carousel-p">
                    <?PHP if(count(@$row["gallery_img"])>0):?>
                    <?PHP foreach(json_decode($row["gallery_img"]) as $key => $gallery):?>
                    <div><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $gallery?>" /></div>
                    <?PHP endforeach;?>
                    <?PHP endif;?>
                </div>
                <div class="slidebtn">
                    <div class="slidebtn_l"><img src="<?PHP echo ASSETS_URL?>images/slidebtn_l2.png" /></div>
                    <div class="slidebtn_r"><img src="<?PHP echo ASSETS_URL?>images/slidebtn_r2.png" /></div>
                </div>
                <div class="zoom"><img src="<?PHP echo ASSETS_URL?>images/zoom.png" /></div>
            </div>
            <?PHP if(count($de_part)>0): ?>
            <div class="ese">
                <div class="title">
                    <h1><span>本產品必附配件</span></h1>
                    <div class="line"></div>
                </div>
                <ul class="default_part">
                    <?PHP foreach($de_part as $part):?>
                    <li>
                        <div class="pic"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $part["cover_img"]?>" /></div>
                        <div class="words">
                            <p><?PHP echo $part["part_no"]?></p>
                            <p class="part_name"><?PHP echo $part["title"]?></p>
                        </div>
                    </li>
                    <?PHP endforeach;?>
                </ul>
            </div>
            <?PHP endif; ?>
        </div>
        <div class="content">
            <div class="title">
                <h2 class="main_no"><?PHP echo $row["product_no"]?></h2>
                <h1 class="main_no"><?PHP echo $row["title"]?></h1>
                <p><?PHP echo ($row["price"]=="0")?"-<span class='main_price'>Free</span>-":"NT$ <span class='main_price'>".$row["price"]."</span>"?></p>
            </div>
            <div class="part ga">
                <?PHP if(count(@$row["gallery_img"])>0):?>
                <?PHP foreach(json_decode($row["gallery_img"]) as $key => $gallery):?>
                <div class="type <?PHP echo ($key==0)?"active":""?>"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $gallery?>" /></div>
                <?PHP endforeach;?>
                <?PHP endif;?>
            </div>
            <?PHP if($parts_select!=""):?>
            <?PHP foreach($parts_select as $kk=>$sel):?>
            <div class="part sel_div">
                <div class="title">
                    <h3><?PHP echo urldecode($sel["title"])?></h3>
                </div>
                <ul>
                    <?PHP foreach($sel["parts"] as $key=> $part):?>
                    <li>
                        <label>
                            <div class="pic"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $part["cover_img"]?>" /></div>
                            <div class="words">
                                <input type="radio" name="sel<?PHP echo $kk; ?>" value='{"price":"<?PHP echo $part['price'];?>","title":"<?PHP echo $part['title'] ?>"}'/>
                                <p><?PHP echo $part["title"]?></p>
                                <p class="price"><?PHP echo ($part["price"]=="0")?"-Free-":"NT$ ".$part["price"]?></p>
                            </div>
                        </label>
                    </li>
                    <?PHP endforeach;?>
                </ul>
            </div>
            <?PHP endforeach;?>
            <?PHP endif;?>
            <?PHP if(count($sp_part)>0): ?>
            <div class="part">
                <div class="title">
                    <h3>可加購配件</h3>
                </div>
                <ul>
                    <?PHP foreach($sp_part as $part):?>
                    <li>
                        <label>
                            <div class="pic"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $part["cover_img"]?>" /></div>
                            <div class="words">
                                <input type="checkbox" name="checkbox" value='{"price":"<?PHP echo $part['price'];?>","title":"<?PHP echo $part['title'] ?>"}'>
                                <p><?PHP echo $part["title"]?></p>
                                <p><?PHP echo ($part["price"]=="0")?"-Free-":"NT$ ".$part["price"]?></p>
                            </div>
                        </label>
                    </li>
                    <?PHP endforeach;?>
                </ul>
            </div>
            <?PHP endif; ?>
            <!-- <h4><a href="" class="link">我該如何選購配件?＞<div class="line"></div></a></h4> -->
            <button data-url="<?PHP echo SITE_URL; ?>ajax/add2cart" class="add_cart">加入考慮選單</button>
        </div>
    </div>
    <div class="part detail">
        <div class="title">
            <div class="tab">
                <a href="javascript:void(0)" class="link active">產品描述<div class="line"></div></a>
                <?PHP if(count($de_part)>0||count($sp_part)>0):?>
                <div class="line"></div>
                <a href="javascript:void(0)" class="link">產品配件<div class="line"></div></a>
                <?PHP endif; ?>
            </div>
            <div class="line"></div>
        </div>
        <div class="in allinfo active">
            <?PHP echo $row["content"]?>
        </div>
        <div class="in" style="display:none;"></div>
        <div class="in list">
            <?PHP if(count($de_part)>0): ?>
            <div>
                <h3>STANDARD / <span>本產品必附配件</span></h3>
            </div>
            <ul>
                <?PHP foreach($de_part as $part):?>
                <li class="product">
                    <div class="pic"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $part["cover_img"]?>" /></div>
                    <div class="words">
                        <p><?PHP echo $part["part_no"]?></p>
                        <p><?PHP echo $part["title"]?></p>
                    </div>
                </li>
                <?PHP endforeach;?>
            </ul>
            <?PHP endif; ?>
            <?PHP if(count($sp_part)>0):?>
            <div>
                <h3>OPTIONAL / <span>可加購配件</span></h3>
            </div>
            <ul>
                <?PHP foreach($sp_part as $part):?>
                <li class="product">
                    <div class="pic"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $part["cover_img"]?>" /></div>
                    <div class="words">
                        <p><?PHP echo $part["title"]?></p>
                        <p><?PHP echo ($part["price"]=="0")?"-Free-":"NT$ ".$part["price"]?></p>
                    </div>
                </li>
                <?PHP endforeach;?>
            </ul>
            <?PHP endif; ?>
        </div>
    </div>
    <div class="recommend">
        <?PHP if(count(@$rec_product)>0): ?>
        <div class="title">
            <h1><span>推薦商品</span></h1>
            <div class="line"></div>
        </div>
        <ul class="list side">
            <?PHP foreach($rec_product as $pro):?>
            <?PHP $cr_num=0;?>
            <li class="product">
                <a href="<?PHP echo SITE_URL?>product/<?PHP echo $this->main_model->get_url($pro["main_id"]);?>/detail/<?PHP echo $pro["id"]?>" class="pic">
                    <?PHP if(@$pro["cover_img"]!=""&&@$pro["cover_img"]!="null"):?>
                    <?PHP $cr_num = count($pro["cover_img"]);?>
                    <?PHP foreach(json_decode($pro["cover_img"]) as $k=> $img):?>
                    <img class="<?PHP echo ($k==0)?"active":""?>" src="<?PHP echo IMG_URL?>upload/<?PHP echo $img?>" />
                    <?PHP endforeach;?>
                    <?PHP endif;?>
                </a>
                <div class="words">
                    <a href="<?PHP echo SITE_URL?>product/<?PHP echo $this->main_model->get_url($pro["main_id"]);?>/detail/<?PHP echo $pro["id"]?>" class="link"><?PHP echo $pro["product_no"]?><div class="line"></div></a>
                    <div class="circle_part">
                        <?PHP for($x=0;$x<$cr_num;$x++):?>
                        <div class="circle <?PHP echo ($x==0)?"active":""?>"></div>
                        <?PHP endfor;?>
                    </div>
                </div>
            </li>
            <?PHP endforeach;?>
        </ul>
        <?PHP endif; ?>
    </div>
</article>
<article class="popup">

    <div>
        <div class="in">
            <div class="slideshow">
                <div class="owl-carousel-pop">
                    <?PHP if(@$row["gallery_img"]!=''):?>
                    <?PHP foreach(json_decode($row["gallery_img"]) as $key => $gallery):?>
                    <div><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $gallery?>" /></div>
                    <?PHP endforeach;?>
                    <?PHP endif;?>
                </div>
                <div class="slidebtn">
                    <div class="slidebtn_l"><img src="<?PHP echo ASSETS_URL?>images/slidebtn_l2.png" /></div>
                    <div class="slidebtn_r"><img src="<?PHP echo ASSETS_URL?>images/slidebtn_r2.png" /></div>
                </div>
                <div class="xx">
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="mask c"></div>
    </div>
</article>
<script type="text/javascript">
var product = <?PHP echo json_encode($row); ?>;
</script>