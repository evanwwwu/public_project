<div class="main-wrapper">
  <div class="container">
    <!-- 置頂影音-->
    <div class="video__detail">
      <?php $vcode = explode("?v=",$data["post_content"]);?>
      <?php $vcode = explode("&",$vcode[count($vcode)-1])[0];?>
      <div class="iframe">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $vcode;?>?autoplay=1" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="info">
        <div class="subject"><?php echo $data["post_title"];?></div>
        <div class="intro"><?php echo $data["post_excerpt"];?></div>
        <div class="date"><?php echo $data["display_date"];?></div>
      </div>
    </div>
  </div>
</div>