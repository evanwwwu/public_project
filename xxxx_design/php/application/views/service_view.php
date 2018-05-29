<section>
    <article class="service">
        <div class="title">
            <h3><span>服務項目</span></h3>
            <?PHP echo $service['title']?>
        </div>
        <div class="part clearfix">
            <div class="detail">
                <div>
                    <?PHP echo $service['left_top']?>
                </div>
            </div>
            <div class="detail">
                <div>
                    <?PHP echo $service['right_top']?>
                </div>
            </div>
        </div>
        <div class="pic"><img src="<?PHP echo $service['cover_img']?>" /></div>
    </article>
</section>