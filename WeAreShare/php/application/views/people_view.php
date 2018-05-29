<div class="main-wrapper">
  <div class="container">
    <!-- 人物介紹-->
    <div class="people__content">
      <div class="cover">
      <img src="<?php echo IMG_URL.'upload/'.$data['cover_img'];?>">
      </div>
      <div class="intro">
        <div class="name"><?php echo $data['display_name'];?></div>
        <div class="info"><?php echo $data['post_content'];?></div>
        <div class="tag">
          <?php foreach($data["tags"] as $tag): ?>
            <a href="<?PHP echo SITE_URL . 'search?key=' . $tag['name']?>"><?PHP echo $tag['name']?></a>
          <?php endforeach; ?>
          </div>
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
    <!-- 人物文章-->
    <?php if(count($data['related_article']["data"])>0): ?>
    <div class="people__post">
      <div class="title">文章</div>
      <ol>
        <?php foreach($data['related_article']["data"] as $row): ?>
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
    <?php endif; ?>
  </div>
</div>