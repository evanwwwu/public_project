<div class="main_img" data-stellar-background-ratio="1.5" data-stellar-vertical-offset="1200">
  <img alt="" src="<?PHP echo ASSETS_URL;?>images/index_pic.jpg" />
</div>
<div class="nmselect">
  <div class="maintitle">
  <span>NM特選</span>
  </div>
  <div class="s_items">
    <div class="bg_title">
      NAKED MARKET SELECT
    </div>
    <?php foreach ($products as $key => $row): ?>
      <a href="<?php echo SITE_URL; ?>ingredients/type/<?php echo @$row["type_id"] ?>?filter=<?php echo $row["filter_id"] ?>&row=<?php echo $row["id"] ?>">
        <div class="item">
          <div class="pic">
            <img alt="" src="<?PHP echo IMG_URL.@$row["cover_img"];?>" />
            <div class="hover_bg">
            </div>
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
        </div>
      </a>      
    <?php endforeach; ?>
  </div>
</div>
<div class="about_div">
  <div class="a_main" data-stellar-background-ratio="1.5" data-stellar-vertical-offset="1800">
    <img alt="" src="<?PHP echo ASSETS_URL;?>images/index_about.jpg" />
    <div class="a_title">
      ABOUT US
    </div>
  </div>
  <div class="a_content">
    <div class="slogan">
      “Eat better, spend less, and be  environmental-friendly”
    </div>
    <div class="ct">
      <img alt="" src="<?PHP echo ASSETS_URL;?>images/started.png" />
    </div>
    <div class="text">
      <p>
        我們創立，因為我們認為下廚應該可以更輕鬆簡單，我們相信好東西不應該高昂到成為少數人的權利，也希望更多人都能使用好食材。
      </p>
      <p>
        所以除了帶來購買的方便和減少食材的浪費之外，我們更由衷的期盼，大家能開始幫自己和家人選用更好的產品，也更願意動手去嘗試不同的食譜。
      </p>
    </div>
  </div>
  <div class="a_items">
    <div class="item">
      <img alt="" src="<?PHP echo ASSETS_URL;?>images/a_item1.png" /><span>BEST INGREDIENT</span>
    </div>
    <div class="item">
      <img alt="" src="<?PHP echo ASSETS_URL;?>images/a_item2.png" /><span>PERFECT RECIPES</span>
    </div>
    <div class="item">
      <img alt="" src="<?PHP echo ASSETS_URL;?>images/a_item3.png" /><span>GOOD LIFE</span>
    </div>
  </div>
</div>