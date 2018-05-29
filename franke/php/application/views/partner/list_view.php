<section>
    <article class="wrap main type02">
        <div class="breadcrumb noline">
            <p>
                <a href="<?PHP echo SITE_URL?>">HOME</a>
                >
                <a>夥伴專區</a>
            </p>
        </div>
        <div class="part">
            <div class="title">
                <h1><span>夥伴專區</span></h1>
                <div class="line"></div>
            </div>
            <div class="area_option">
                <div class="area">
                    <p>地區</p>
                </div>
                <div onclick="location='<?PHP echo SITE_URL; ?>partner/north';" <?PHP echo ($area["url"]=="north")?'class="active"':''?>>
                    <p>北區</p>
                </div>
                <div onclick="location='<?PHP echo SITE_URL; ?>partner/west';" <?PHP echo ($area["url"]=="west")?'class="active"':''?>>
                    <p>中區</p>
                </div>
                <div onclick="location='<?PHP echo SITE_URL; ?>partner/south';" <?PHP echo ($area["url"]=="south")?'class="active"':''?>>
                    <p>南區</p>
                </div>
                <div onclick="location='<?PHP echo SITE_URL; ?>partner/east';" <?PHP echo ($area["url"]=="east")?'class="active"':''?>>
                    <p>東區</p>
                </div>
            </div>
            <div class="part">
                <ul>
                    <?php foreach($rs as $key=>$row): ?>
                    <li class="store">
                        <div class="pic">
                            <a href="<?PHP echo SITE_URL?>partner/store/<?PHP echo $row["id"]?>"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo @$row["cover_img"]?>" /></a>
                        </div>
                        <div class="content">
                            <h2><a href="<?PHP echo SITE_URL?>partner/store/<?PHP echo $row["id"]?>"><?PHP echo @$row["title"]?></a></h2>
                            <div>
                                <p>Tel.</p>
                                <p><?PHP echo @$row["phone"]?></p>
                            </div>
                            <div>
                                <p>Add.</p>
                                <p><?PHP echo @$row["address"]?></p>
                            </div>
                            <div>
                                <p>廚具品牌</p>
                                <p><?PHP echo @$row["brand"]?></p>
                            </div>
                            <a href="<?PHP echo SITE_URL?>partner/store/<?PHP echo $row["id"]?>" class="link">read more ><div class="line"></div></a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</article>
</section>