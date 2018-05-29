<div class="main-wrapper">
  <!-- 文章 slider show-->
  <?php if(count($data["gallery"]) > 0): ?>
  <div class="article__slider">
    <div style="background-image: url('<?php echo IMG_URL.'upload/'.str_replace('_thumb','',$data["gallery"][0]["post_title"]);?>')" class="slider__cover"></div>
    <div class="slider__thumb">
      <ul>
        <?php foreach($data["gallery"] as $img): ?>        
        <li style="background-image: url('<?php echo IMG_URL.'upload/'.$img["post_title"];?>')"></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>
  <div class="container">
    <!-- 文章內容-->
    <div class="article__content">
      <div class="subject"><?php echo $data["post_title"];?></div>
                    <?PHP if($_SESSION[ADMIN_ACTIVE]=='1' || $_SESSION[ADMIN_SESSION]==$data['post_author']):?>
                    <div class="edit" style="float: right;">
                        <a style="color: #3b8bba;" href="<?PHP echo ADMIN_URL . 'posts/edit/' .$data['ID']?>" target="_blank">編輯頁面</a>  
                    </div>
                    <?PHP endif;?>
      <div class="date">
        <span><?php echo $data["display_date"];?></span>
        <?php if(@$data["author"]["display_name"]!=""): ?>
        <span>by <a href="<?php echo SITE_URL."people/".$data["author"]["display_name"]?>"><?php echo $data["author"]["display_name"];?></a></span>
        <?php endif; ?>
      </div>
      <div class="shareMedia">
        <ol>
          <li><a href="#" class="facebook">facebook</a></li>
          <li><a href="#" class="twitter">twitter</a></li>
          <li><a href="#" class="google">google</a></li>
          <li><a href="#" class="pinterest">pinterest</a></li>
        </ol>
      </div>
      <div class="article__section post">
        <?php echo $data["post_content"];?>
      </div>
      <div class="article__section section__share">
        <div class="title">SHARE</div>
        <div class="shareMedia">
          <ol>
            <li><a href="#" class="facebook">facebook</a></li>
            <li><a href="#" class="twitter">twitter</a></li>
            <li><a href="#" class="google">google</a></li>
            <li><a href="#" class="pinterest">pinterest</a></li>
          </ol>
        </div>
      </div>
      <div class="article__section section__tag">
        <div class="title">TAGS</div>
        <div class="tag">
          <?PHP foreach($data['tags'] as $tag):?>
            <a href="<?PHP echo SITE_URL . 'search?key=' . $tag['name']?>"><?PHP echo $tag['name']?></a>
          <?PHP endforeach;?>
        </div>
      </div>
      <?php if(@$data["author"]["display_name"]!=""):?>
      <div class="article__section author">
        <div class="author__cover">
          <img src="<?php echo IMG_URL.'upload/'.$data["author"]["cover_img"];?>">
        </div>
        <div class="author__intro">
          <a href="<?php echo SITE_URL."people/".$data["author"]["display_name"]?>">
            <div class="name"><?php echo $data["author"]["display_name"];?></div>
          </a>
          <div class="text"><?php echo $data["author"]["post_content"];?></div>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <!-- 廣告 banner-->
    <?php if(@$banner[0]!=""): ?>
    <?php $img = json_decode($banner[0]["img_title"],true);?>
    <div class="ad-banner">
      <div class="banner__mobile">
        <a href="<?php echo $banner[0]["link"];?>">
          <img src="<?php echo IMG_URL.'upload/'.$img["mobile"];?>">
        </a>
      </div>
      <div class="banner__desktop">
        <a href="<?php echo $banner[0]["link"];?>">
          <img src="<?php echo IMG_URL.'upload/'.$img["pc"];?>">
        </a>
      </div>
    </div>
    <?php endif; ?>
    <!-- facebook comment-->
    <div class="fb-comment">
      <div data-href="<?PHP echo SITE_URL.uri_string();?>" data-numposts="5" data-width="100%" class="fb-comments"></div>
    </div>
    <!-- 推薦文章-->
    <div class="article__recommend">
      <div class="title">推薦文章</div>
      <ol class="slider">
        <?php foreach($recommend as $rec): ?>
        <li>
          <a href="<?php echo $rec["url"];?>">
            <div class="cover"><img src="<?php echo $rec["img"];?>"></div>
            <div class="info">
              <div class="subject"><?php echo $rec["title"];?></div>
              <div class="date">
                <span><?php echo $rec["date"];?></span>
                <?php if(@$rec["author"]["display_name"]!=""): ?>
                <span>by <a href="<?php echo SITE_URL."people/".$rec["author"]["display_name"]?>"><?php echo $rec["author"]["display_name"];?></a></span>
                <?php endif; ?>
              </div>
            </div>
          </a>
        </li>
        <?php endforeach; ?>
      </ol>
    </div>
    <!-- 推薦影片-->
    <div class="article__video">
      <?php if(count(@$rec_video) > 0): ?>
      <div class="title">推薦影片</div>
      <div class="video-slider">
        <div class="list">
          <ol class="slider">
          <?php foreach($rec_video as $video): ?>
            <li>
              <a href="<?php echo SITE_URL;?>video/play/<?php echo $video['ID'];?>">
                <div class="cover">
                  <div data-url="<?php echo SITE_URL;?>video/play/<?php echo $video['ID'];?>" class="play-button"></div>
                    <img src="<?php echo IMG_URL.'upload/'.$video['cover_img'];?>">
                  <div class="iframe"></div>
                </div>
                <div class="info"><span>Video</span>
                  <div class="subject"><?php echo $video['post_title'];?></div>
                  <div class="date"><?php echo $video["display_date"];?></div>
                </div>
              </a>
            </li>
          <?php endforeach; ?>
          </ol>
        </div>
        <div class="thumb">
          <ol class="thumbSlider">
            <?php foreach($rec_video as $video): ?>
            <li>
              <a href="#"><img src="<?php echo IMG_URL.'upload/'.$video['cover_img'];?>"></a>
            </li>
            <?php endforeach; ?>
          </ol>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>

    <div class="popup popup__article">
      <div class="container">
        <div class="content">
          <div class="close-button"></div>
          <div class="popup__article__slider">
            <ul>
              <?php foreach($data["gallery"] as $img): ?>        
              <li style="background-image: url('<?php echo IMG_URL.'upload/'.str_replace('_thumb','',$img["post_title"]);?>')">
                <div class="cover"><img src="<?php echo IMG_URL.'upload/'.str_replace('_thumb','',$img["post_title"]);?>"></div>
                <div class="text"><?php echo $img["caption"];?></div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div id="popupThumb" class="popup__article__thumb">
          <?php foreach($data["gallery"] as $i => $img): ?>   
          <a data-slide-index="<?php echo $i;?>" href="#" style="background-image: url('<?php echo IMG_URL.'upload/'.$img["post_title"];?>')"></a>
          <?php endforeach; ?>
          </div>
        </div>
        <div class="slideNum"><span class="currentNum"></span><span class="totalNum"></span></div>
      </div>
    </div>