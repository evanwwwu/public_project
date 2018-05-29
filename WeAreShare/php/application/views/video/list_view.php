<div class="main-wrapper">
  <!-- 置頂影音-->
  <div class="video__top">
  <?php if(@$rs[0]!=""): ?>
    <a href="<?php echo SITE_URL;?>video/play/<?php echo $rs[0]["ID"];?>">
      <div class="cover">
        <div class="play-button"></div>
        <img src="<?php echo IMG_URL;?>upload/<?php echo $rs[0]["cover_img"];?>">
        <div class="iframe"></div>
      </div>
      <div class="info">
        <div class="subject"><?php echo $rs[0]["title"];?></div>
        <div class="intro"><?php echo $rs[0]["content"];?></div>
        <div class="date"><?php echo $rs[0]["display_date"];?></div>
      </div>
    </a>
    <?php endif; ?>
  </div>
  <div class="container">
    <!-- 影音列表-->
    <div class="video__list">
      <ol>
        <?php for($i = 1;$i < count($rs);$i++): ?>        
        <li>
          <a href="<?php echo SITE_URL;?>video/play/<?php echo $rs[$i]["ID"];?>">
            <div class="cover">
              <div data-url="<?php echo SITE_URL;?>video/play/<?php echo $rs[$i]["ID"];?>" class="play-button"></div>
              <img src="<?php echo IMG_URL;?>upload/<?php echo $rs[$i]["cover_img"];?>">
            </div>
            <div class="info">
              <div class="subject"><?php echo $rs[$i]["title"];?></div>
              <div class="intro"><?php echo $rs[$i]["content"];?></div>
              <div class="date"><?php echo $rs[$i]["display_date"];?></div>
            </div>
          </a>
        </li>
        <?php endfor;?>
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