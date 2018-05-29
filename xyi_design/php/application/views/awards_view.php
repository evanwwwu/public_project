
<script type="text/javascript">
$(function(){

    if ($('.awards').length>0){
        $('.awards').infinitescroll({
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
            donetext     : ""
        },function(newElements){    $('article.awards .pic').mouseenter(function () {
            $(this).find(".hover").stop().fadeOut(400);
            $(this).find(".hover").fadeIn(400);
        }).mouseleave(function () {
            $(this).find(".hover").stop().fadeIn(400);
            $(this).find(".hover").fadeOut(400);
        });
    });
    }

    $(".m_year.m span").html("<?PHP echo $years[0]['year']?>");

    $( window ).scroll(function() {
        var index = $(".awards .part[year="+$(".m_year.m span").html()+"]").index();
        var index_top = $(".awards .part[year="+$(".m_year.m span").html()+"]").offset().top;
        var index_bottom = index_top +  $(".awards .part[year="+$(".m_year.m span").html()+"]").height();

        if($(".awards .part:eq("+(index+1)+")").offset()){
            if($(this).scrollTop()+100 >= index_bottom){
                $(".m_year.m span").html($(".awards .part:eq("+(index+1)+")").attr("year"));
            }
        }

        if($(".awards .part:eq("+(index-1)+")").offset()){
            if($(this).scrollTop()+100 < index_top){
                $(".m_year.m span").html($(".awards .part:eq("+(index-1)+")").attr("year"));
            }
        }
    });
})   
</script>
<section>
    <article class="awards">

        <?PHP foreach($years as $year):?>
        <div class="part" year="<?PHP echo $year['year']?>">
            <div class="year c">
                <h1><span><?PHP echo $year['year']?></span></h1>
            </div>
            <div class="content clearfix">
                <?PHP foreach($datas as $row):?>
                <?PHP if($year['year']==date('Y',strtotime($row['createdate']))):?>
                <?PHP foreach($row['works'] as $work):?>
                <div class="award">
                    <a class="pic" href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $work['url']?>">
                        <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $work['work_cover_img']?>" />
                        <div class="hover" >
                            <div style="text-align: center;">
                                <?PHP foreach($work['award_title'] as $award):?>
                                <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $award['cover_img']?>" />
                                <?PHP endforeach;?>
                            </div>
                        </div>
                    </a>
                    <div class="detail">
                        <h2 onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $work['url']?>'"><?PHP echo $work['work_title']?></h2>
                        <h3></h3>
                        <?PHP foreach($work['award_title'] as $award):?>
                        <p><?PHP echo $award['title']?></p>
                        <?PHP endforeach;?>
                    </div>
                </div>
                <?PHP endforeach;?>
                <?PHP endif;?>
                <?PHP endforeach;?>
            </div>
        </div>
        <?PHP endforeach;?>
    </article>
</section>
<div class="navigation" style="display:none;">
    <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/awards/loadyear/2/<?PHP echo $over?>?wids=<?PHP echo $wids?>"></a>
</div> 