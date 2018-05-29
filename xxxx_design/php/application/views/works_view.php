<script>
var insh;
$(function(){
    $('.h').imagesLoaded(function(){
        insh = $(this).height();
        check_size();
    });
    window.onresize=function(){
        check_size();
    }

    if ($('.work ul li').length>9){
        $('.work ul').infinitescroll({
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
            itemSelector : "li.item",
            debug        : false,
            animate      : false,
            extraScrollPx: 0, 
            donetext     : ""
        },function(newElements){
          $('article.work li').mouseenter(function () {
            var pic2 = $(this).find("img");
            TweenMax.to(pic2, 1, {opacity:0.85,scale:1.03});
           $(this).find("h1").stop().fadeOut(400);
            $(this).find("h1").fadeIn(400);
        }).mouseleave(function () {
           var pic2 = $(this).find("img");
           TweenMax.to(pic2, 1, {opacity:1,scale:1});
           $(this).find("h1").stop().fadeIn(400);
           $(this).find("h1").fadeOut(400);
       });
    }
    );
}

});

function check_size(){
    insh = $('.h').height();
    // console.log($('html, body').width());

    if($('html, body').width()>=724 && $('html, body').width()<=1079){
        $('article.work .item:nth-child(2)').css("top",(insh+2));
    }else{
        $("article.work .item:nth-child(2)").removeAttr('style');
    }

}
</script>
<style>
section .work ul:before{
  content: " ";
  display: table;
}
section .work ul:after {
  clear: both;
}
section .work ul > li:nth-child(5) {
    /*clear: both;*/
}
section .work ul > li:nth-child(7) {
    clear: both;
}
</style>
<section>
    <article class="work <?PHP echo ($work_tag!="")?'sorts':''?>">
        <ul class="clearfix">
            <?PHP if(isset($works[0])):?>
            <li class="item w1" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/work/post/'.$works[0]['url']?>'">
                <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $works[0]['cover_img']?>" />
                <h1><span><?PHP echo $works[0]['title']?></span></h1>
            </li>
            <?PHP if(isset($works[1])):?>
            <li class="item w1" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/work/post/'.$works[1]['url']?>'">
                <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $works[1]['cover_img']?>" />
                <h1><span><?PHP echo $works[1]['title']?></span></h1>
            </li>
            <?PHP if(isset($works[2])):?>
            <li class="item h" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/work/post/'.$works[2]['url']?>'">
                <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $works[2]['cover_img']?>" />
                <h1><span><?PHP echo $works[2]['title']?></span></h1>
            </li>
            <?PHP if(isset($works[3])):?>
            <?PHP for($x=3;$x<count($works);$x++):?>
            <li class="item" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/work/post/'.$works[$x]['url']?>'">
                <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $works[$x]['cover_img']?>" />
                <h1><span><?PHP echo $works[$x]['title'] ?></span></h1>
            </li>
            <?PHP endfor;?>
            <?PHP endif;?>
            <?PHP endif;?>
            <?PHP endif;?>
            <?PHP endif;?>
        </ul>
    </article>
</section>
<div class="navigation" style="display:none;">
    <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/loadmore/2/<?PHP echo $work_tag;?>"></a>
</div> 