<div class="main-wrapper">
  <div class="container">
    <!-- 搜尋結果-->
    <div class="search__result">
      <div class="container">
        <div class="search__result__text">
          <p><span><?php echo @$_GET["key"];?></span>的搜尋結果</p>
        </div>
        <div class="tabs">
          <ol>
            <li><a href="#post">相關文章(<span><?php echo $post["search_total"];?></span>)</a></li>
            <li><a href="#party">相關派對(<span><?php echo $event["search_total"];?></span>)</a></li>
            <li><a href="#photo">相關照片(<span><?php echo $img["search_total"];?></span>)</a></li>
            <li><a href="#video">相關影片(<span><?php echo $video["search_total"];?></span>)</a></li>
          </ol>
        </div>
        <div class="tabs-container">
          <!-- 文章列表-->
          <div id="post" class="news__list">
            <ol>
							<?PHP foreach($post['data'] as $row):?>
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
          </div>
          <!-- 派對列表-->
          <div id="party" class="news__list">
            <ol>
							<?PHP foreach($event['data'] as $row):?>
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
          </div>
          <!-- 圖片列表-->
          <div id="photo" class="photo__list">
            <ol>
              <?php foreach($img["data"] as $row): ?>              
              <li><a href="<?PHP echo IMG_URL .'upload/'.$row['post_title']?>"><img src="<?PHP echo IMG_URL . 'upload/' . $row['post_title']?>">
                      <p><?php echo $row['meta_value'];?></p></a></li>
              <?php endforeach; ?>
            </ol>
          </div>
          <!-- 影片列表-->
          <div id="video" class="video__list">
            <ol>
              <?php foreach($video["data"] as $row): ?>
              <li>
                <a href="<?php echo SITE_URL;?>video/play/<?php echo $row["ID"];?>">
                  <div class="cover">
                    <div data-url="<?php echo SITE_URL;?>video/play/<?php echo $row["ID"];?>" class="play-button"></div><img src="<?php echo IMG_URL;?>upload/<?php echo $row["cover_img"];?>">
                  </div>
                  <div class="info">
                    <div class="subject"><?php echo $row["display_title"];?></div>
                    <div class="intro"><?php echo $row["brief"];?></div>
                    <div class="date"><?php echo $row["display_date"];?></div>
                  </div>
                </a>
              </li>
              <?php endforeach; ?>
            </ol>
          </div>
        </div>
      </div>
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
<div class="popup popup__video">
  <div class="container">
    <div class="content">
      <div class="close-button"></div>
      <div class="iframe"></div>
      <div class="shareMedia">
        <ol>
          <li><a href="#" class="facebook">facebook</a></li>
          <li><a href="#" class="twitter">twitter</a></li>
          <li><a href="#" class="google">google</a></li>
          <li><a href="#" class="pinterest">pinterest</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="popup popup__photo">
  <div class="container">
    <div class="content">
      <div class="close-button"></div>
      <div class="photo"></div>
    </div>
  </div>
</div>