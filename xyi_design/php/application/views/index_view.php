
<section>
    <article class="index">
        <div id="container">
            <ul class="clearfix">
                <li></li>
                <li class="item w2 i_w" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $work[0]['url']?>';">
                    <?PHP 
                    if($work[0]['imgs'][0]!=""){
                        $path = file_core_name($work[0]['imgs'][0]). '_1020x680.'. file_extension($work[0]['imgs'][0]);
                    }
                    ?>
                    <a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $work[0]['url']?>"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo (isset($path))?$path:'work1_img.jpg'?>" /></a>
                    <div class="hover">
                        <h2>作品展示</h2>
                        <h3><?PHP echo $work[0]['title']?></h3>
                    </div>
                </li>
                <li class="item w1 i_p" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/press/post/<?PHP echo $press[0]['url']?>'">
                    <div class="i_pp"></div>
                    <div class="i_em">
                        <a href="javascript:void(0)"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo ($press[0]['pic2']!='')?$press[0]['pic2']:'press_img.jpg'?>" /></a>
                        <div class="hover">
                            <h2>媒體報導</h2>
                            <h3><?PHP echo $press[0]['name']?><?PHP echo $press[0]['showdate']?></h3>
                        </div>
                    </div>
                </li>
                <li class="item w1 i_w" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $work[1]['url']?>';">
                    <a href="javascript:void(0)"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo($work[1]['cover_img2']!='')?$work[1]['cover_img2']:'work2_img.jpg'?>" /></a>
                    <div class="hover">
                        <h2>作品展示</h2>
                        <h3><?PHP echo $work[1]['title']?></h3>
                    </div>
                </li>
                <li class="item w1 i_p" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/press/post/<?PHP echo $press[1]['url']?>'">
                    <div class="i_pp"></div>
                    <div class="i_em">
                        <a href="javascript:void(0)"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo ($press[1]['pic2']!='')?$press[1]['pic2']:'press_img.jpg'?>" /></a>
                        <div class="hover">
                            <h2>媒體報導</h2>
                            <h3><?PHP echo $press[1]['name']?><?PHP echo $press[1]['showdate']?></h3>
                        </div>
                    </div>
                </li>
                <li class="item w2 i_a" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $award[0]['url']?>'">
                    <div class="i_aa"></div>
                    <div class="i_em">
                        <a href="javascript:void(0)"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo ($award[0]['work_cover_img']!='')?$award[0]['work_cover_img']:'award_img.jpg'?>" /></a>
                        <div class="hover">
                            <h2>得獎紀錄</h2>
                            <h3><?PHP echo $award[0]['award_title'][0]['title']?></h3>
                        </div>
                    </div>
                </li>
                <li class="item w2 i_a" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $award[1]['url']?>'">
                    <div class="i_aa"></div>
                    <div class="i_em">
                        <a href="javascript:void(0)"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo ($award[1]['work_cover_img']!='')?$award[1]['work_cover_img']:'award_img.jpg'?>"  /></a>
                        <div class="hover">
                            <h2>得獎紀錄</h2>
                            <h3><?PHP echo $award[1]['award_title'][0]['title']?></h3>
                        </div>
                    </div>
                </li>
                <li class="item w1 c">
                    <img src="<?PHP echo SITE_URL?>assets/images/<?PHP echo lang("index_img")?>" />
                </li>
                <li class="item w1 i_p" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/press/post/<?PHP echo $press[2]['url']?>'">
                    <div class="i_pp"></div>
                    <div class="i_em">
                        <a href="javascript:void(0)"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo ($press[2]['pic2']!='')?$press[2]['pic2']:'press_img.jpg'?>" /></a>
                        <div class="hover">
                            <h2>媒體報導</h2>
                            <h3><?PHP echo $press[2]['name']?><?PHP echo $press[2]['showdate']?></h3>
                        </div>
                    </div>
                </li>
                <li class="item w2 i_a" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $award[2]['url']?>'">
                    <div class="i_aa"></div>
                    <div class="i_em">
                        <a href="javascript:void(0)"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo ($award[2]['work_cover_img']!='')?$award[2]['work_cover_img']:'award_img.jpg'?>"  /></a>
                        <div class="hover">
                            <h2>得獎紀錄</h2>
                            <h3><?PHP echo $award[2]['award_title'][0]['title']?></h3>
                        </div>
                    </div>
                </li>
                <li class="item w1 i_w" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $work[2]['url']?>';">
                    <a href="javascript:void(0)"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo ($work[2]['cover_img2']!='')?$work[2]['cover_img2']:'work2_img.jpg'?>" /></a>
                    <div class="hover">
                        <h2>作品展示</h2>
                        <h3><?PHP echo $work[2]['title']?></h3>
                    </div>
                </li>
                <li class="item w1 i_w" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $work[3]['url']?>';">
                    <a href="javascript:void(0)"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo ($work[3]['cover_img2']!='')?$work[3]['cover_img2']:'work2_img.jpg'?>" /></a>
                    <div class="hover">
                        <h2>作品展示</h2>
                        <h3><?PHP echo $work[3]['title']?></h3>
                    </div>
                </li>
                <li class="item w1 c">
                    <img src="<?PHP echo SITE_URL?>assets/images/index_7.jpg" />
                </li>
                <li class="item w2" style="cursor:auto;">
                    <div class="footer">
                        <div>
                            <div><img src="<?PHP echo SITE_URL?>assets/images/footer_logo_i.png" /></div>
                            <label>Languages:<br />
                                <select name="languages" style="cursor: pointer;">
                                    <option value="tw" <?PHP echo ($this->uri->segment(1)=='tw')?'selected':''?> >繁體中文</option>
                                    <option value="cn" <?PHP echo ($this->uri->segment(1)=='cn')?'selected':''?> >简体中文</option>
                                    <option value="en" <?PHP echo ($this->uri->segment(1)=='en')?'selected':''?> >ENGLISH</option>
                                </select>
                            </label>
                            <a href="https://www.facebook.com/XYIDC">
                                <img src="<?PHP echo SITE_URL?>assets/images/footer_f.png" />
                                <img src="<?PHP echo SITE_URL?>assets/images/footer_f_h.png" />
                            </a>
                            <a href="#">
                                <img src="<?PHP echo SITE_URL?>assets/images/footer_i.png" />
                                <img src="<?PHP echo SITE_URL?>assets/images/footer_i_h.png" />
                            </a>
                            <a href="#">
                                <img src="<?PHP echo SITE_URL?>assets/images/footer_y.png" />
                                <img src="<?PHP echo SITE_URL?>assets/images/footer_y_h.png" />
                            </a>
                            <a href="#">
                                <img src="<?PHP echo SITE_URL?>assets/images/footer_w.png" />
                                <img src="<?PHP echo SITE_URL?>assets/images/footer_w_h.png" />
                            </a>
                        </div>
                        <p>版權所有 隱巷設計顧問有限公司 © 2013 XYI Design All Rights Reserved.</p>
                    </div>
                </li>
            </ul>
        </div>
    </article>
</section>