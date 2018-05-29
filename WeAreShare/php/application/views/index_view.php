<div class="main-wrapper">
  <!-- 首頁 slider show-->
  <div class="index__slider">
    <ul class="slider">
      <?php if(@$slide_banner["ID"]!=""): ?>
      <li>
        <div class="slider__img">
          <a href="<?PHP echo SITE_URL . 'article/' . $slide_banner['post_name']?>" style="background-image: url('<?PHP echo IMG_URL . 'upload/' . str_replace('_560','_1560',$slide_banner['cover_img'])?>')"></a>
        </div>
        <div class="slider__info">
          <a href="<?PHP echo SITE_URL?>article/tag/<?php echo $slide_banner["type"]["slug"];?>">
            <div class="type"><?php echo $slide_banner["type"]["name"];?></div>
          </a>
          <a href="<?PHP echo SITE_URL . 'article/' . $slide_banner['post_name']?>">
            <div class="subject"><?php echo $slide_banner["display_title"];?></div>
          </a>
          <div class="date"><span><?php echo $slide_banner["display_date"];?></span>
          <?php if(@$row["author"]["display_name"]!=""):?>
          <span>by <a href="<?php echo SITE_URL."people/".$slide_banner["author"]["display_name"]?>"><?php echo $slide_banner["author"]["display_name"];?></a></span>
          <?php endif;?>
          </div>
        </div>
      </li>
      <?php endif; ?>
      <?php foreach($latest[0]["data"] as $row):?>
      <li>
        <div class="slider__img">
          <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>" style="background-image: url('<?PHP echo IMG_URL . 'upload/' . str_replace('_560','_1560',$row['cover_img'])?>')"></a>
        </div>
        <div class="slider__info">
          <a href="<?PHP echo SITE_URL?>article/tag/<?php echo $row["type"]["slug"];?>">
            <div class="type"><?php echo $row["type"]["name"];?></div>
          </a>
          <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
            <div class="subject"><?php echo $row["display_title"];?></div>
          </a>
          <div class="date"><span><?php echo $row["display_date"];?></span>
          <?php if(@$row["author"]["display_name"]!=""):?>
          <span>by <a href="<?php echo SITE_URL."people/".$row["author"]["display_name"]?>"><?php echo $row["author"]["display_name"];?></a></span>
          <?php endif;?>
          </div>
        </div>
      </li>
      <?php endforeach;?>
    </ul>
  </div>
  <div class="container">
    <!-- 文章列表-->
    <div class="news__list">
      <ol>
        <?php foreach($latest[1]["data"] as $row):?>
        <li>
          <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
            <div class="cover"><img src="<?PHP echo IMG_URL . 'upload/' .$row['cover_img']?>"></div>
          </a>
            <div class="info">
              <a href="<?PHP echo SITE_URL?>article/tag/<?php echo $row["type"]["slug"];?>">
                <div class="type"><?php echo $row["type"]["name"];?></div>
              </a>
              <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
                  <div class="subject"><?php echo $row["display_title"];?></div>
              </a>
            </div>
        </li>
        <?php endforeach; ?>
      </ol>
    </div>
    <!-- 廣告 banner-->
    <?php if(@$index_banner[0]!= ""):?>
    <div class="ad-banner">
      <?php $imgs = json_decode(@$index_banner[0]["img_title"],true);?>
      <div class="banner__mobile">
        <a target="_blank"　href="<?php echo @$index_banner[0]["link"];?>">
          <img src="<?php echo IMG_URL.'upload/'.$imgs["mobile"];?>">
        </a>
      </div>
      <div class="banner__desktop">
        <a href="<?php echo @$index_banner[0]["link"];?>">
          <img src="<?php echo IMG_URL.'upload/'.$imgs["pc"];?>">
        </a>
      </div>
    </div>
    <?php endif; ?>
    <!-- 文章列表-->
    <div class="news__list">
      <ol>
        <?php foreach($latest[2]["data"] as $row):?>
        <li>
            <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
              <div class="cover"><img src="<?PHP echo IMG_URL . 'upload/' .$row['cover_img']?>"></div>
            </a>
            <div class="info">
              <a href="<?PHP echo SITE_URL?>article/tag/<?php echo $row["type"]["slug"];?>">
                <div class="type"><?php echo $row["type"]["name"];?></div>
              </a>
              <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
                  <div class="subject"><?php echo $row["display_title"];?></div>
              </a>
            </div>
        </li>
        <?php endforeach; ?>
      </ol>
    </div>
    <!-- 廣告 banner-->
    <?php if(@$index_banner[1]!= ""):?>
    <?php $imgs = json_decode(@$index_banner[1]["img_title"],true);?>
    <div class="ad-banner">
      <?php $imgs = json_decode(@$index_banner[1]["img_title"],true);?>
      <div class="banner__mobile">
        <a href="<?php echo @$index_banner[1]["link"];?>">
          <img src="<?php echo IMG_URL.'upload/'.$imgs["mobile"];?>">
        </a>
      </div>
      <div class="banner__desktop">
        <a href="<?php echo @$index_banner[1]["link"];?>">
          <img src="<?php echo IMG_URL.'upload/'.$imgs["pc"];?>">
        </a>
      </div>
    </div>
    <?php endif; ?>
    <!-- 人氣文章-->
    <div class="popular__list">
      <div class="title">人氣文章</div>
      <ol>
        <?php foreach($popular as $row): ?>
        <li>
            <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
              <div class="cover"><img src="<?PHP echo IMG_URL . 'upload/' .$row['cover_img']?>"></div>
            </a>
            <div class="info"> 
              <?php if(@$row["type"]["name"]!=""): ?>
                <a href="<?PHP echo SITE_URL?>article/tag/<?php echo $row["type"]["slug"];?>">
                  <div class="type"><?php echo $row["type"]["name"];?></div>
                </a>
              <?php endif; ?>
              <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
                  <div class="subject"><?php echo $row["display_title"];?></div>
              </a>
            </div>
        </li>
        <?php endforeach; ?>
      </ol>
    </div>
    <!-- 文章列表-->
    <div class="news__list more_add">
      <ol>
        <?php foreach($latest[3]["data"] as $row):?>
        <li>
            <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
              <div class="cover"><img src="<?PHP echo IMG_URL . 'upload/' .$row['cover_img']?>"></div>
            </a>
            <div class="info">
              <a href="<?PHP echo SITE_URL?>article/tag/<?php echo $row["type"]["slug"];?>">
                <div class="type"><?php echo $row["type"]["name"];?></div>
              </a>
              <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
                  <div class="subject"><?php echo $row["display_title"];?></div>
              </a>
            </div>
        </li>
        <?php endforeach; ?>
      </ol>
    </div>
      <a href="<?php echo SITE_URL;?>ajax/index_page/31/0/<?php echo count($index_banner);?>" data-elename=".news__list.more_add" class="button button__more">MORE</a>
    <!-- 影音-->
    <div class="index__video">
      <div class="background"></div>
      <div class="list">
        <ol>
          <?php foreach($pop_video as $video ): ?>
          <li>
            <a href="<?php echo SITE_URL;?>video/play/<?php echo $video["ID"];?>">
              <div class="cover">
                <div class="play-button"></div>
                <img src="<?php echo IMG_URL.'upload/'.$video['cover_img'];?>">
                <div class="iframe"></div>
              </div>
              <div class="info"><span>Video</span>
                <div class="subject"><?php echo $video['post_title'];?></div>
                <div class="date"><?php echo $video['display_date'];?></div>
              </div>
            </a>
          </li>
          <?php endforeach; ?>
        </ol>
      </div>
      <div class="thumb">
        <ol>
          <?php foreach($pop_video as $video): ?>
          <li>
            <a href="#">
                <img src="<?php echo IMG_URL.'upload/'.$video['cover_img'];?>">
            </a>
          </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>
  </div>
</div>