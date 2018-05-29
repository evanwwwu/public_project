<script>
$(function(){
    if ($('.press').length>0){
        $('.press').infinitescroll({
            loading: {
                finished: function(){$('#infscr-loading').remove();},
                finishedMsg: "<em></em>",
                msg: null,
                msgText: "<em></em>",
                selector: null,
                speed: 'fast',
                start: undefined,
            },
            navSelector  : "div.navigation",
            nextSelector : "div.navigation a:first",
            itemSelector : "div.part",
            debug        : false,
            animate      : true,
            extraScrollPx: 0, 
            donetext     : "",
            localMode    : true
        },function(newElements){
          $('.book > div').mouseenter(function () {
            $(this).find(".hover_info").stop().fadeIn(750);
        }).mouseleave(function () {
            $(this).find(".hover_info").stop().fadeOut(750);
        });
    });
    }

})
</script>
<section>
    <article class="press">
        <?PHP foreach($years as $year):?>
        <div class="part">
            <div class="year">
                <div class="line"></div>
                <h3><?PHP echo $year['year']?></h3> 
            </div>
            <div class="content clearfix">
                <?PHP foreach($press as $row):?>
                <?PHP if($year['year']==date('Y',strtotime($row['createtime']))):?>
                <div class="book">
                    <div onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/press/post/'.$row['url']?>'">
                        <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $row['pic1']?>" />
                        <div class="hover_info">
                            <p><span><?PHP echo $row['name']?></span><br /><span><?PHP echo $row['showdate']?></span></p>
                        </div>
                    </div>
                    <p onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/press/post/'.$row['url']?>'"><?PHP echo $row['title']."－".$row['project']?></p>
                </div>
                <?PHP endif;?>
                <?PHP endforeach;?>
            </div>
        </div>
        <?PHP endforeach;?>
    </article>
</section>
<div class="navigation" style="display:none;">
    <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/press/loadyear/2/<?PHP echo $over?>"></a>
</div> 