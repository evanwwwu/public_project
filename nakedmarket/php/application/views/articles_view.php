
<div class="main_img" data-stellar-background-ratio="1.5" data-stellar-vertical-offset="250">
  <img alt="" src="<?PHP echo ASSETS_URL;?>images/artucle_pic.jpg" /><span>KITCHEN & DINING</span>
</div>
<div class="main_content">
  <div class="maintitle">
    <span>生活用品</span>
  </div>
  <div class="content">
    <div class="items">
      <?php foreach ($rs as $key => $row): ?>
        <div class="item">
        <a href="<?php echo SITE_URL ?>articles/detail/<?php echo $row["id"] ?>">
            <div class="pic">
              <img alt="" src="<?PHP echo IMG_URL.$row["cover_img"];?>" />
              <div class="hover_bg"></div>
            </div>
            <div class="p_title">
              <div class="pt">
                <?php echo $row["title"];?>
              </div>
              <div class="line"></div>
              <div class="price">
                <?php echo "$".$row["price"]."/".$row["unit_text"]; ?>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>