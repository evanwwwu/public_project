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
            $('article.press .book > div').mouseenter(function () {
                $(this).find(".hover_info").stop().fadeOut(400);
                $(this).find(".hover_info").fadeIn(400);
            }).mouseleave(function () {
                $(this).find(".hover_info").stop().fadeIn(400);
                $(this).find(".hover_info").fadeOut(400);
            });

        });
}
$(".m_year.m span").html("<?PHP echo $years[0]['year']?>");
$( window ).scroll(function() {
    var index = $(".press .part[year="+$(".m_year.m span").html()+"]").index();
    var index_top = $(".press .part[year="+$(".m_year.m span").html()+"]").offset().top;
    var index_bottom = index_top +  $(".press .part[year="+$(".m_year.m span").html()+"]").height();

    if($(".press .part:eq("+(index+1)+")").offset()){
        if($(this).scrollTop()+100 >= index_bottom){
            $(".m_year.m span").html($(".press .part:eq("+(index+1)+")").attr("year"));
        }
    }

    if($(".press .part:eq("+(index-1)+")").offset()){
        if($(this).scrollTop()+100 < index_top){
            $(".m_year.m span").html($(".press .part:eq("+(index-1)+")").attr("year"));
        }
    }
});

})
</script>
<section>
    <article class="press">
        <?PHP foreach($years as $year):?>
        <div class="part" year="<?PHP echo $year['year']?>">
            <div class="year c">
                <h1><span><?PHP echo $year['year']?></span></h1>
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
                    <p onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/press/post/'.$row['url']?>'">
                        <span><?PHP echo $row['title']?></span><br /><span><?PHP echo $row['project']?></span>
                    </p>
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