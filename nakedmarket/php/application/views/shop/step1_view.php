
<div class="main_content">
  <?php echo $step_view; ?>
  <div class="content">
    <div class="item i_title">
      <div>
        <p>
          取消
        </p>
      </div>
      <div>
        <p>
          商品
        </p>
      </div>
      <div>
        <p>
          商品名稱
        </p>
      </div>
      <div>
        <p>
          數量
        </p>
      </div>
      <div>
        <p>
          單價
        </p>
      </div>
      <div>
        <p>
          小計
        </p>
      </div>
    </div>
    <ul class="items">
      <?php foreach ($this->cart->contents() as $key => $item): ?>
        <li rowid="<?php echo $item["rowid"]; ?>">
          <div class="item">
            <div>
              <div class="i_del">
                <div class="mt"></div>
              </div>
            </div>
            <div>
              <img alt="" src="<?php echo $item["options"]->img;?>" />
            </div>
            <div class="item_name">
              <p><?php echo $item["name"] ?></p>
            </div>
            <div>
              <p>
                <?php echo $item['qty'].$item["options"]->unit_text ?>
              </p>
            </div>
            <div>
              <p>
                <?php echo $item["options"]->price_text ?>
              </p>
            </div>
            <div>
              <p>
                <?php echo "$".($item["subtotal"]); ?>
              </p>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="ship_div">
      <p>
        運送方式
      </p>
      <p class="ship_type">
        <?php echo $this->cart->ship_type; ?>
      </p>
      <p class="ship_price">
        <?php echo ($this->cart->ship==0)?"免運":$this->cart->ship; ?>
      </p>
    </div>
    <div class="totle_price">
      <span>總計</span><span class="n"><?php echo "$".($this->cart->total()+$this->cart->ship); ?></span>
    </div>
    <div class="b">
      <?php if (isset($_SESSION["member_id"])):?>
        <a class="next_btn" href="<?php echo SITE_URL; ?>shop/step2">
          <span>下一步填寫資料</span>
        </a>
      <?php else: ?>
        <?php $_SESSION["history_url"] = SITE_URL."/shop/step1"; ?>
        <a class="next_btn" href="<?php echo SITE_URL; ?>member">
          <span>登入</span>
        </a>
      <?php endif; ?>
    </div>
  </div>
</div>