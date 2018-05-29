
<div class="main_img" data-stellar-background-ratio="1.5" data-stellar-vertical-offset="250">
  <img alt="" src="<?PHP echo ASSETS_URL;?>images/classes_pic.jpg" /><span>CLASSES</span>
</div>
<div class="main_content">
  <div class="maintitle">
    <span>料理教室</span>
  </div>
  <div class="content">
    <div class="items">
      <?php foreach ($rs as $key => $row): ?>
        <div class="item">
          <div class="m_date m<?php echo $row["month"];?>">
            <span><?php echo strtoupper($month_name[($row["month"]-1)]); ?></span>
          </div>
          <div class="c_title">
            <p>
              <?php echo $row["title"] ?>
            </p>
            <div class="dates">
              <?php foreach ($row["dates"] as $date): ?>
                <div class="date">
                  <span class="d"><?php echo date("n/d",strtotime($date["classes_date"]));?></span>
                  <span class="t"><?php echo date("H:i",strtotime($date["classes_date"]));?></span>
                  <span class="s">(<?php echo $day_name[(date("N",strtotime($date["classes_date"]))-1)];?>)</span>
                </div>                
              <?php endforeach ?>
            </div>
          </div>
          <div class="teacher">
            <p>
              <?php echo $row["teacher_name"] ?>
            </p>
          </div>
          <div class="btns">
            <?php if ($row["now_people"] >= $row["people_limit"]): ?>
              <div class="over">
                <span>已額滿</span>
              </div>
            <?php endif; ?>
            <a class="d_btn" href="<?php echo SITE_URL; ?>classes/detail/<?php echo $row["id"] ?>"><span>詳細內容</span></a>
          </div>
        </div>        
      <?php endforeach ?>
    </div>
  </div>
</div>