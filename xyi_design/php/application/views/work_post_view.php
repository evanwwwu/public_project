<section>
    <article class="work_in">
        <div class="slide_btn">
            <div class="work_back" onclick="history.back();";>
                <!-- <img src="<?PHP echo SITE_URL?>assets/images/work_back.png" /> -->
                <p>← 返回前頁</p>
            </div>
            <div class="line"></div>
            <div class="share"><img src="<?PHP echo SITE_URL?>assets/images/m_fb.png"></div>
        </div>                
        <div class="info">
            <h2 class="clearfix"><span><?PHP echo $data['title']?></span></h2>
            <div class="word">
                <div class="part">
                    <p class="title">Designer:&nbsp;&nbsp;<span><?PHP echo $data['designer']?></span></p>
                    <p class="title">Partners:&nbsp;&nbsp;<span><?PHP echo $data['codesigner']?></span></p>
                    <p class="title">Location:&nbsp;&nbsp;<span> <?PHP echo $data['place']?></span></p>
                    <p class="title">Square feet:&nbsp;&nbsp;<span><?PHP echo $data['sq']?></span></p>
                </div>
                <div class="part">
                    <p class="title">Materials:&nbsp;&nbsp;
                        <span><?PHP echo $data['material']?>
                        </span>
                    </p>
                </div>
                <div class="part">
                    <p class="title">Intro:&nbsp;&nbsp;
                        <div class="intro"><?PHP echo $data['note']?></div>
                    </p>
                </div>                       
            </div>
        </div>
        <div id="closeMask_in"></div>
        <div class="fotoramawrap">
            <div class="fotorama">
                <?PHP if(isset($data['filename'])):?>
                <?PHP foreach($data['filename'] as $img):?>
                <?PHP 
                if($img!=""):
                    $path = file_core_name($img). '_resize.'. file_extension($img) ;
                ?>
                <a href="<?PHP echo IMG_URL?>upload/<?PHP echo $path?>"></a>
                <?PHP endif;?>
                <?PHP endforeach;?>
                <?PHP endif;?>
            </div>
            <div class="slide_btn m">
                <div class="m_back" onclick="history.back();";><img src="<?PHP echo SITE_URL?>assets/images/m_back.png" /></div>
                <div class="m_more"><img src="<?PHP echo SITE_URL?>assets/images/m_more.png" /></div>
            </div>                   
        </div>
        <div class="count m">0 / 0</div>
    </article>
</section>
<script>
var old_intro = $(".intro").html();
$(function(){
    if(window.innerWidth>640){
        if(intro = $(".intro").html().length>200){
            less();
        }
    }
});
function more(){
    $(".intro").html(old_intro);
    $(".intro").append("<div class='less'><b>-</b><a href='javascript:void(0);' onclick='less();' style='border-bottom:1px solid #6e6e6e;'> LESS</a></div>");
}
function less(){
    var intro = $(".intro").html().substr(0,200);
    $(".intro").html(intro);
    $(".intro").append("<a href='javascript:void(0)' onclick='more();' style='float:right;'>+ <span style='border-bottom:1px solid #6e6e6e;'>MORE</span></a>");

}
</script>