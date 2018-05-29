
<section>
    <article class="press_in">
        <div class="slide_btn">
            <div class="work_back" onclick="history.back();";>
                <p>← 返回前頁</p>
            </div>
        </div>  
        <div class="info_press">
            <p><?PHP echo $data['name']?> <?PHP echo $data['showdate']?></p>
            <h2><?PHP echo $data['title']?></h2>
            <h3><?PHP echo $data['project']?></h3>
        </div>
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
            <div class="slide_btn m" style="cursor: pointer;">
                <div class="m_back" onclick="history.back();";><img src="<?PHP echo SITE_URL?>assets/images/m_back.png" /></div>
            </div>                   
        </div>
        <div class="count m">1 / 3</div>
    </article>
</section>