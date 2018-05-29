<?php foreach ($this->cart->contents() as $key => $item): ?>
  <li rowid = "<?php echo $item["rowid"]; ?>">
    <div class="main_c">
      <div class="i_del"></div>
      <div class="pic">
        <img alt="" src="<?php echo $item["options"]->img; ?>" />
      </div>
      <div class="title">
        <div class="t1">
          <?php echo $item["name"]; ?>
        </div>
        <div class="t2">
        <?php echo $item["options"]->name_t2; ?>
        </div>
      </div>
    </div>
    <div class="p_bottom">
      <div class="count">
        <span>數量</span><span><?php echo $item['qty'].$item["options"]->unit_text ?></span>
      </div>
      <div class="unit">
        <span>單價</span><span><?php echo $item["options"]->price_text ?></span>
      </div>
      <div class="price">
        <span>小計</span><span class="n"><?php echo "$".($item["subtotal"]); ?></span>
      </div>
    </div>
  </li>

<?php endforeach ?>