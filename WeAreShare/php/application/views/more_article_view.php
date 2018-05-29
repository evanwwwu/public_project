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
    <div class="date"><span><?php echo $row["display_date"];?></span>
      <?php if(@$row["author"]["display_name"]!=""):?>
      <span>by <a href="<?php echo SITE_URL."people/".$row["author"]["display_name"]?>"><?php echo $row["author"]["display_name"];?></a></span>
      <?php endif;?>
    </div>
</li>
<?php endforeach; ?>