<script>
var insh;
$(function(){

    if ($('.work ul li').length>0){
        $('.work').infinitescroll({
            loading: {
                finished: function(){$('#infscr-loading').remove();},
                finishedMsg: "<em></em>",
                msg: null,
                msgText: "<em></em>",
                selector: null,
                speed: 'fast',
                start: undefined,
                img: ""
            },
            navSelector  : "div.navigation",
            nextSelector : "div.navigation a:first",
            itemSelector : "div.part",
            debug        : false,
            animate      : false,
            extraScrollPx: 150, 
            donetext     : ""
        },function(newElements){
            check_size();
            $('article.work li').mouseenter(function () {
                var w_pic = $(this).find(".hover h1");
                TweenMax.to(w_pic, 1, {opacity:1});
                $(this).find(".hover").stop().fadeOut(400);
                $(this).find(".hover").fadeIn(400);
            }).mouseleave(function () {
                var w_pic = $(this).find(".hover h1");
                TweenMax.to(w_pic, 1, {opacity:0});
                $(this).find(".hover").stop().fadeIn(400);
                $(this).find(".hover").fadeOut(400);
            });

        }
        );
}

});

</script>
<style>

</style>
<section>
    <article class="work">
        <?PHP foreach($works as $key=>$rows):?>
        <?PHP if(count($rows)==1):?>
        <div class="part">
            <ul class="clearfix">
                <li class="item w1 year" style="cursor:auto;">
                    <img src="<?PHP echo SITE_URL?>assets/images/work_year.jpg" />
                    <h1><span><?PHP echo $key?></span></h1>
                </li>
                <li class="item w1 count1" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $rows[0]['url']?>'">
                    <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $rows[0]['cover_img']?>" />
                    <div class="hover">
                        <div style="height:100%;width:100%;display:table;">
                            <!-- <img src="<?PHP echo SITE_URL?>assets/images/work_hover2.png" /> -->
                            <h1><span><?PHP echo $rows[0]['title']?></span></h1>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <?PHP else:?>
        <div class="part">
            <ul class="clearfix">
                <?PHP
                $total = count($rows);
                if($total<=5){
                    $rem = abs($total-5)%4;
                }else{
                    $rem = abs($total-5)%4;
                    $rem = 4-$rem;
                }
                ?>
                <li class="item w1" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $rows[0]['url']?>'">
                    <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $rows[0]['cover_img']?>" />
                    <div class="hover">
                        <div style="height:100%;width:100%;display:table;">
                            <!-- <img src="<?PHP echo SITE_URL?>assets/images/work_hover2.png" /> -->
                            <h1><span><?PHP echo $rows[0]['title']?></span></h1>
                        </div>
                    </div>
                </li>
                <li class="item w1" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $rows[1]['url']?>'">
                    <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $rows[1]['cover_img']?>" />
                    <div class="hover">
                        <div style="height:100%;width:100%;display:table;">
                            <!-- <img src="<?PHP echo SITE_URL?>assets/images/work_hover2.png" /> -->
                            <h1><span><?PHP echo $rows[1]['title']?></span></h1>
                        </div>
                    </div>
                </li>
                <li class="item year">
                    <img src="<?PHP echo SITE_URL?>assets/images/work_year.jpg" />
                    <h1><span><?PHP echo $key?></span></h1>
                </li>
                <?PHP for($k=2;$k<count($rows);$k++):?>
                <li class="item" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $rows[$k]['url']?>'">
                    <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $rows[$k]['cover_img']?>" />
                    <div class="hover">
                        <div style="height:100%;width:100%;display:table;">
                            <!-- <img src="<?PHP echo SITE_URL?>assets/images/work_hover2.png" /> -->
                            <h1><span><?PHP echo $rows[$k]['title']?></span></h1>
                        </div>
                    </div>
                </li>
                <?PHP endfor;?>
                <?PHP for($r=0;$r<$rem;$r++):?>
                <li class="item">
                    <img src="<?PHP echo SITE_URL?>assets/images/work_p.jpg" />
                </li>
                <?PHP endfor;?>
            </ul>
        </div>
        <?PHP endif;?>
        <?PHP endforeach;?>
    </article>
</section>
<div class="navigation" style="display:none;">
    <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/loadmore/2/<?PHP echo $work_tag;?>"></a>
</div>  