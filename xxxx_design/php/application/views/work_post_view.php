<style>
#scrollbar1 {
    position: absolute;
    background:#000000;
    top: 15px;
    left: 62px;
    width: 540px;
    height: 90%;
    /*overflow-y: auto;*/
}
#scrollbar1 .viewport { top:10%;width: 540px; height: 65%; overflow: hidden; position: absolute; }
#scrollbar1 .overview { list-style: none; position: absolute; left: 0; top: 0; }
#scrollbar1 .thumb .end{
    background: rgba(240,240,240,.85);
    background-position: 50% 0;
    overflow: hidden; 
    height: 5px; 
    width: 8px;
    border-radius: 10px;
    -moz-border-radius: 10px;  
    -webkit-border-radius: 10px;}
    #scrollbar1 .thumb {
        background: rgba(240,240,240,.85);
        background-position: 50% 100%;
        height: 20px; 
        width: 8px; 
        cursor: pointer; 
        overflow: hidden; 
        position: absolute; 
        top: 0px; 
        left: 1px;
        border-radius: 10px;
        -moz-border-radius: 10px;  
        -webkit-border-radius: 10px;}
        #scrollbar1 .scrollbar {
            background: rgba(200,200,200,.85);
            background-position: 0 0; 
            position: absolute; 
            right:7px;
            top:10%;
            width: 10px;
            border-radius: 10px;
            -moz-border-radius: 10px;  
            -webkit-border-radius: 10px;}
            #scrollbar1 .track { background-color: rgba(0,0,0,.0); height: 100%; width:13px; position: relative; padding: 0 1px; }
            #scrollbar1 .thumb .end { overflow: hidden; height: 5px; width: 13px; }
            #scrollbar1 .disable{ display: none; }
            .info{width: 540px;}
            </style>
            <section>
                <article class="work_in">
                    <div class="fotoramawrap" style="background-color: rgba(200,200,200,1);">
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
                        <div class="slide_btn">
                            <div class="work_back" onclick="history.back();";><img src="<?PHP echo SITE_URL?>assets/images/work_back.png" /></div>
                            <div class="work_more" style="display:none;"><img src="<?PHP echo SITE_URL?>assets/images/work_+.png" /></div>
                        </div>

                    </div><div class="count m">1 / 3</div>
                    <div id="scrollbar1">
                        <div class="work_less"><img src="<?PHP echo SITE_URL?>assets/images/work_-.png" /></div>
                        <div class="share" onclick="share();return false;"><img src="<?PHP echo SITE_URL?>assets/images/m_fb.png"></div>
                        <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                        <div class="viewport">
                            <div class="overview">
                                <!-- <div class="info_main"> -->
                                <div class="info">
                                    <div class="word">
                                        <p>Designer:<span> <?PHP echo $data['designer']?></span></p>
                                        <p>Partners:<span><?PHP echo $data['codesigner']?></span></p>
                                        <p>Location:<span> <?PHP echo $data['place']?></span></p>
                                        <p>Square feet: <span><?PHP echo $data['sq']?></span></p>
                                        <p>Materials: 
                                            <span><?PHP echo $data['material']?> </span>
                                        </p>
                                        <div style="margin-bottom:0%;"><p>Intro:<?PHP echo $data['note']?></p></div>
                                    </div>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                        <h1><?PHP echo $data['title']?></h1>
                    </div>
                    <div id="closeMask_in"></div>
                </article>
            </section>
            <script>
            $(".info_main").ready(function(){
             var $scrollbar = $('#scrollbar1');   
             $scrollbar.tinyscrollbar();

             $scrollbar.tinyscrollbar_update();
         })
            </script>


