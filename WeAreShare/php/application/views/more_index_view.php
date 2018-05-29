
<?php if(@$ad[0]!= ""):?>
<?php $imgs = json_decode(@$ad[0]["img_title"],true);?>
 <div class="ad-banner">
  <?php $imgs = json_decode(@$ad[0]["img_title"],true);?>
   <div class="banner__mobile">
    <a href="<?php echo @$ad[0]["link"];?>">
          <img src="<?php echo IMG_URL.'upload/'.$imgs["mobile"];?>">
     </a>
   </div>
   <div class="banner__desktop">
     <a href="<?php echo @$ad[0]["link"];?>">
       <img src="<?php echo IMG_URL.'upload/'.$imgs["pc"];?>">
     </a>
   </div>
 </div>
<?php endif; ?>
    <div class="news__list more_add">
      <ol>
<?php foreach($posts["data"] as $row):?>
<li>
  <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
    <div class="cover"><img src="<?PHP echo IMG_URL . 'upload/' .$row['cover_img']?>"></div>
  </a>
  <div class="info">
    <a href="<?PHP echo SITE_URL?>article/tag/<?php echo $row["type"]["slug"];?>">
      <div class="type">
        <?php echo $row["type"]["name"];?>
      </div>
    </a>
    <a href="<?PHP echo SITE_URL . 'article/' . $row['post_name']?>">
      <div class="subject">
        <?php echo $row["display_title"];?>
      </div>
    </a>
  </div>
</li>
<?php endforeach; ?>
</ol>
</div>