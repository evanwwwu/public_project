
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
        },function(newElements){
            $(newElements).find('.award').each(function(){
               var img = $(this).find(".circle").html();
               var img_hover = $(this).find(".circle_hover").html();
               if (window.SVGForeignObjectElement) {
                $(this).find(".circle").html('\
                    <svg width="146px" height="146px">\
                    <defs>\
                    <mask id="mask" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse">\
                    <image width="146px" height="146px" xlink:href="<?PHP echo SITE_URL?>assets/images/awards_mask.png"/>\
                    </mask>\
                    </defs>\
                    <foreignObject width="100%" height="100%" style="mask: url(#mask);">\
                    '+img+'\
                    </foreignObject>\
                    </svg>\
                    ');
                $(this).find(".circle_hover").html('\
                    <svg width="146px" height="146px">\
                    <defs>\
                    <mask id="mask" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse">\
                    <image width="146px" height="146px" xlink:href="<?PHP echo SITE_URL?>assets/images/awards_mask.png"/>\
                    </mask>\
                    </defs>\
                    <foreignObject width="100%" height="100%" style="mask: url(#mask);">\
                    '+img_hover+'\
                    </foreignObject>\
                    </svg>\
                    ');
            }
        })

$('.award .detail p > span').mouseenter(function () {
    var s_index = $(this).index();
    $(this).parent().parent().prev().find(".circle_hover img:eq("+s_index+")").css("display","block");
    $(this).parent().parent().prev().find(".circle_hover").stop().animate({opacity:1},750);
}).mouseleave(function () {
    $(this).parent().parent().prev().find(".circle_hover").stop().animate({opacity:0},750);
    $(this).parent().parent().prev().find(".circle_hover img").css("display","none");
});

});
}


})   
</script>
<section>
    <article class="awards">
      <?PHP foreach ($years as $year):?>
      <div class="part">
        <div class="year">
            <div class="line"></div>
            <h3><?PHP echo $year['year']?></h3> 
        </div>
        <div class="content clearfix">

            <?PHP foreach($datas as $row):?>
            <?PHP if($year['year']==date('Y',strtotime($row['createdate']))):?>
            <div class="award">
                <div class="round">
                    <div class="circle">
                        <script>head();</script>
                        <!-- HTML begins -->
                        <div class="element">
                            <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $row['cover_img']?>" width="147px"/>
                        </div>
                        <!-- HTML ends -->
                        <script>foot();</script>
                    </div>
                    <div class="circle_hover">
                        <script>head();</script>
                        <!-- HTML begins -->
                        <div class="element">
                            <?PHP foreach($row['works'] as $work1):?>
                            <img style="display:none"<?PHP echo (isset($work1['w_cover_img']))?'src="'.IMG_URL.'upload/'.$work1["w_cover_img"].'"':'' ?>width="147px"/>
                            <?PHP endforeach;?>
                        </div>
                        <!-- HTML ends -->
                        <script>foot();</script>
                    </div>
                </div>
                <div class="detail">
                    <p><?PHP echo $row['title']?></p>
                    <p>
                        <?PHP foreach($row['works'] as $work2):?>
                        <span onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo @$work2['url']?>'"><?PHP echo $work2['w_title']?></span><br/>
                        <?PHP endforeach;?>
                    </p>
                </div>
            </div>
            <?PHP endif;?>
            <?PHP endforeach;?>
        </div>
    </div>
    <?PHP endforeach;?>
</article>
</section>
<div class="navigation" style="display:none;">
    <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/awards/loadyear/2/<?PHP echo $over?>"></a>
</div> 