<section>
    <article class="work_in">
        <div class="fotoramawrap">
            <div class="fotorama">
                <?PHP if(isset($data['filename'])):?>
                <?PHP foreach($data['filename'] as $img):?>
                <?PHP if($img['type']=='img'):?>
                <a href="<?PHP echo IMG_URL?>upload/<?PHP echo $img['address']?>">
                </a>
                <?PHP endif;?>
                <?PHP if($img['type']=='video'):?>
                <a href="<?PHP echo $img['address']?>" data-video="true"></a>
                <?PHP endif;?>
                <?PHP endforeach;?>
                <?PHP endif;?>
            </div>
            <div class="slide_btn">
                <div class="work_back" onclick="history.back();";><img src="<?PHP echo SITE_URL?>assets/images/work_back.png" /></div>
            </div>
        </div>
        <div class="count m">1 / 3</div>
    </article>
</section>