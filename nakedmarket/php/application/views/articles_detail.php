
<a class="prev_btn" href="<?php echo SITE_URL; ?>articles/type/<?php echo $row["type_id"]; ?>">
  <img alt="" src="<?PHP echo ASSETS_URL;?>images/back_arr.png" />
</a>
<div class="main_img_pic" data-featherlight="<?PHP echo IMG_URL.str_replace("525x","1050x",$row["main_img"]);?>">
  <img alt="" src="<?PHP echo IMG_URL.$row["main_img"];?>" />
</div>
<div class="main_content" data-mid="<?php echo $row["id"]; ?>" data-pid="<?php echo $row["pid"]; ?>" data-count="<?php echo $row["count"];?>" >
  <div class="detail_title">
    <div class="t1">
      <?php echo $row["title"];?>
    </div>
    <div class="t2">
      <?php echo $row["sub_title"]; ?>
    </div>
  </div>
  <div class="content">
    <div class="info">
      <?php if (count(json_decode(@$row["top_text"]))>0): ?>
        <?php foreach (json_decode(@$row["top_text"]) as $i=> $top_content): ?>
          <ul>
            <?php foreach ($top_content as $key => $top): ?>
              <li>
                <?php echo $top->t_title; ?> - <?php echo $top->t_text; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <div class="mid_div">
      <table class="pro">
        <tr>
          <td>
            <?php echo $row["unit_text"]; ?>
          </td>
          <td class="price" data-price="<?php echo $row["price"]; ?>" data-unit="<?php echo $row["unit"]; ?>" data-unittext="<?php echo $row["unit_text"]; ?>" data-ship="<?php echo $row["ship_type"] ?>">
            NT <span><?php echo $row["price"]; ?></span>
          </td>
          <td class="cn">
            訂購數量
          </td>
          <td class="count">
            <input name="qty" type="number" value="0" min="0" max="<?php echo $row["count"]?>"/>
          </td>
        </tr>
      </table>
      <div class="add_cart <?php echo ($row["count"]<=0)?"over":""; ?>">
        <?php if ($row["count"]>=$row["unit"]): ?>
          <span>放進購物車</span>
          <div class="icon">
            <img alt="" src="<?PHP echo ASSETS_URL;?>images/add_bag.png" />
          </div>
        <?php else: ?>
          <span>缺貨</span>
        <?php endif; ?>
      </div>
    </div>
    <?php if (@$row["info"]!=""): ?>
      <div class="a_text">
        <div class="a_title">
          <p>
            商品描述
          </p>
        </div>
        <div class="t_content">
          <?php echo $row["info"]; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if (@$row["content"]!=""): ?>
      <div class="a_text">
        <div class="a_title">
          <p>
            備註
          </p>
        </div>
        <div class="t_content">
          <?php echo $row["content"]; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>