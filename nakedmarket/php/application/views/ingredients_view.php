<div class="main_img" data-stellar-background-ratio="1.5" data-stellar-vertical-offset="250">
  <img alt="" src="<?PHP echo ASSETS_URL;?>images/products_pic.jpg" /><span>INGERDIENT</span>
</div>
<div class="main_content">
  <div class="maintitle">
    <span>買食材</span>
  </div>
  <div class="content">
    <div class="type_select">
      <div class="select_btn">
        <p class="selected_p">
          <?php echo $filters[0]["title"] ?>
        </p>
      </div>
      <ul>
        <?php foreach ($filters as $key => $filter): ?>
          <li class="<?php echo ($key==0 && !isset($this->get["filter"]) || @$this->get["filter"]== $filter["id"])?"active":""; ?>" filter-id="<?php echo $filter["id"] ?>">
            <a href="javascript:viod(0);">
              <p>
                <?php echo $filter["title"]; ?>
              </p>
            </a>
          </li>          
        <?php endforeach ?>
      </ul>
    </div>
    <div class="items">
      <?php foreach ($rs as $key => $row): ?>
        <div class="item row_<?php echo $row["id"];?>" data-filter="<?php echo $row["filter_id"]; ?>" style="<?php echo (@$this->get["filter"]!= $row["filter_id"])?"display:none;":""; ?>">
          <a href="<?php echo SITE_URL; ?>ingredients/detail/<?php echo $row['id']; ?>" data-id="<?php echo $row["id"]; ?>">
            <div class="pic">
              <img alt="" src="<?php echo IMG_URL.$row["cover_img"]; ?>" />
              <div class="hover_bg"></div>
            </div>
            <div class="p_title">
              <div class="pt">
                <?php echo $row["title"] ?>
              </div>
              <div class="line"></div>
              <div class="price">
                <?php echo "$".$row["price"]."/".$row["unit"].$row["unit_text"]; ?>
              </div>
            </div>
          </a>
        </div>        
      <?php endforeach ?>
    </div>
  </div>
</div>