<script type="text/javascript">
$(function(){

    $('#container').imagesLoaded(function(){
        $('#container').masonry({
            itemSelector: '.item',
            columnWidth: 200,
            animated: true,
            gutterWidth: 40,
            isFitWidth: true,
            // isAnimated: Modernizr.csstransitions,
            // singleMode: true
        });
        $("#container").css("opacity",1);
    });
    if ($('#container').length>0){
        $('#container').infinitescroll({
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
            itemSelector : "div.item",
            debug        : false,
            animate      : true,
            gutterWidth: 40,
            extraScrollPx: 0, 
            donetext     : ""
        },function(newElements){

            $(newElements).find(".circle").each(function(){
             var img = $(this).html();
             if (window.SVGForeignObjectElement) {
                $(this).html('\
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
            }
        })
            var data = $(newElements);
            var $boxes = $(data);
                    //var $boxes = $('<div style="margin:10px"class="news_item">jfjsklafjsklafjsklfjskl</div><div class="news_item">5456g4sd56g456sd</div><div class="news_item">fgdjgkjdkgjdlgjdk</div>');
                    $('#container').append($boxes)
                    $('#container').imagesLoaded(function(){
                        $('#container').masonry('appended', $boxes);
                    });

                });
}

});
</script>
<section>
    <article class="members">
        <div id="container" style="opacity:0;">
            <?PHP foreach ($members as $row):?>
            <div class="item">
                <div class="circle">
                    <script>head();</script>
                    <!-- HTML begins -->
                    <div class="element">
                        <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $row['cover_img']?>" width="147px"/>
                    </div>
                    <!-- HTML ends -->
                    <script>foot();</script>
                </div>
                <div class="detail">
                    <p><?PHP echo $row['name']?></p>
                    <p><span><?PHP echo $row['profession']?></span></p>
                    <div>
                        <?PHP echo $row['content']?>
                    </div>
                    <div class="line"></div>
                </div>
            </div>
            <?PHP endforeach;?>
        </div>
    </article>
</section>
<div class="navigation" style="display:none;">
    <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/members/loadmore/2"></a>
</div> 
