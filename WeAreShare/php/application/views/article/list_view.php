<div class="main-wrapper">
  <div class="container">
    <!-- 文章列表-->
    <div class="news__list">
      <ol class="more_add">
        <?php foreach($article["data"] as $row):?>
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
            <div class="date"><span><?php echo $row["display_date"];?></span>
            <?php if(@$row["author"]["display_name"]!=""):?>
            <span>by <a href="<?php echo SITE_URL."people/".$row["author"]["display_name"]?>"><?php echo $row["author"]["display_name"];?></a></span>
            <?php endif;?>
            </div>
        </li>
        <?php endforeach; ?>
      </ol>
      <?php if($article["total_posts"] > 12):?>
        <a href="<?php echo SITE_URL;?>ajax/article_page/12/<?php echo $tag_id;?>" data-elename=".news__list ol.more_add" class="button button__more">MORE</a>
      <?php endif; ?>
    </div>
  </div>
  <!-- 側邊廣告 & 人氣文章-->
  <div class="side">
    <!-- 側邊廣告-->
    <?php if(@$side_ad[0] != ""): ?>
      <?php $imgs = json_decode(@$side_ad[0]["img_title"],true);?>
    <div class="side__ad">
      <a target="_blank" href="<?php echo $side_ad[0]["link"];?>">
        <img src="<?php echo IMG_URL.'upload/'.$imgs["pc"];?>">
      </a>
    </div>
    <?php endif; ?>
    <div class="popular__list">
      <div class="title">人氣文章</div>
      <ol>      
        <?php foreach($popular as $row): ?>
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
  </div>
</div>