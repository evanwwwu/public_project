
<h2 class="content-subhead" id="stacked-form">訂單管理 - <span id="ContentPlaceHolder1_lbl_title"><?php echo $row["order_no"]; ?></span></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL?>orders" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>
  <label>訂單編號</label>
  <span><?php echo $row["order_no"]; ?></span>
  <input type="hidden" value="<?php echo $row["order_no"]; ?>" name="order_no">
  <label>訂單狀態</label>
  <input type="hidden" name="old_state" value="<?php echo $row["state"]; ?>">
  <select name="order_type">
    <?php foreach ($states as $state): ?>
      <option value="<?php echo $state ?>" <?PHP echo (@$row["state"]==$state)?"selected":""?>><?php echo $state ?></option>            
    <?php endforeach ?>
  </select>
  <label>付款方式</label>
  <span><?php echo $pay_type[$row["pay_type"]]; ?></span>
  <?php if ($row["pay_type"]=="CVS"): ?>
    <p><?php echo $row["cvs_no"]; ?></p>
  <?php endif; ?>

  <label>總金額</label>
  <span style="color:red;"><?php echo $row["total"]; ?></span>
  
  <label>運送</label>
  <span>方式:<?php echo $row["ship"]["product_name"]; ?></span>
  <span> 金額: <?php echo $row["ship"]["total"]; ?></span>
  <h3>商品資訊</h3>
  <table class="pure-table">
    <thead>
      <tr>
        <th>#</th>
        <th>品名</th>
        <th>數量</th>
        <th>總額</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($row["products"] as $key => $pro): ?>
        <tr class="<?php echo ($key%2==0)?"":"pure-table-odd" ?>">
          <td><?php echo ($key+1); ?></td>
          <td><a target="_blank" href="<?php echo ADMIN_URL.$pro["category"]; ?>/edit/<?php echo $pro['main_id']; ?>"><?php echo $pro["product_name"] ?></a></td>
          <td><?php echo $pro["qty"] ?></td>
          <td><?php echo $pro["price"] ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <br>
  <h3>收件人資料</h3>
  <?php $order = (array)json_decode($row["consignee"]); ?>
  <ul>
    <li>姓名: <?php echo $order["username"] ?></li>
    <li>電話: <?php echo $order["phone"] ?></li>
    <li>手機: <?php echo $order["mobile"] ?></li>
    <li>地址: <?php echo $order["address"] ?></li>
    <li>電子信箱: <?php echo $order["email"] ?></li>
  </ul>


</form>
<script>
  $(function () {
    edit_view.init();
    edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr;?>/save/<?PHP echo @$row['id']?>", 
      function(arr, $form, options){
      });
  });
</script>