<script type="text/javascript">
$(function(){
    if ($('#container').length>0){
        $('#container ul').infinitescroll({
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
            itemSelector : "li.item",
            debug        : false,
            animate      : true,
            extraScrollPx: 0, 
            donetext     : ""
        },function(newElements){

            if ($(window).width()>625){

                var data = $(newElements);
                var $boxes = $(data);
                    //var $boxes = $('<div style="margin:10px"class="news_item">jfjsklafjsklafjsklfjskl</div><div class="news_item">5456g4sd56g456sd</div><div class="news_item">fgdjgkjdkgjdlgjdk</div>');
                    $('#container ul').append($boxes)
                    $('#container ul').imagesLoaded(function(){
                        $('#container').masonry('appended', $boxes);
                    });
            }
         });
}

});
</script>
<section>
    <article class="members">
        <div id="container">
            <ul>
                <?PHP foreach ($members as $row):?>
                <li class="item">
                    <div class="pic"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $row['cover_img']?>" /></div>
                    <div class="m">
                        <h2><?PHP echo $row['name']?></h2>
                        <h4><?PHP echo $row['profession']?></h4>
                    </div>
                    <div class="detail">
                        <h2><?PHP echo $row['name']?></h2>
                        <h4><?PHP echo $row['profession']?></h4>
                        <?PHP echo $row['content']?>
                    </div>
                </li>
                <?PHP endforeach;?>
            </ul>
        </div>
    </article>
</section>
<div class="navigation" style="display:none;">
    <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/members/loadmore/2"></a>
</div> 
