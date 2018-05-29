
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL.$this->data['controller_addr'];?>" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>
  <input type="hidden" name="product_id" value="<?php echo @$row['pid']; ?>">
  <label>產品編號</label>
  <span><?php echo @$row["product_no"] ?></span>
  <label>產品名稱</label>
  <span><?php echo @$row["title"] ?></span>
  <label>產品英文名稱</label>
  <input type="text" class="pure-input-1-2" name="sub_title" value="<?php echo @$row["sub_title"] ?>">

  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="1")?"checked":"" ?>>是

  <label>類別</label>
  <select name="type_id">
    <?PHP foreach($types as $type):?>
    <option value="<?PHP echo $type["id"]?>" <?php echo ($type["id"]==@$row["type_id"])?"selected":"" ?>><?PHP echo $type["title"]?></option>
    <?PHP endforeach;?>
  </select>

  <label>運送類別</label>
  <select name="ship_type">
    <option value="常溫" <?php echo ($row["ship_type"]=="常溫")?"selected":""; ?>>常溫</option>
    <option value="低溫" <?php echo ($row["ship_type"]=="低溫")?"selected":""; ?>>低溫</option>
  </select>
  
  <label>庫存量</label>
  <span><?php echo @$row["count"] ?></span>

  <label>產品單位</label>
  <input type="text" name="unit_text" value="<?php echo @$row["unit_text"]; ?>">

  <label>換算單位</label>
  <span><?php echo @$row["unit"] ?></span>
  <!-- <input type="text" name="unit" value="<?php echo @$row["unit"] ?>"> -->

  <label>金額</label>
  <input type="number" name="price" value="<?php echo @$row["price"] ?>">

  <label>封面照 (560 × 560)</label>
  <input type="hidden" name="cover_img" class="cover_img" value="<?PHP echo @$row['cover_img']?>">
  <label>內容照 (1050 × 840)</label>
  <input type="hidden" name="main_img" class="main_img" value="<?PHP echo @$row['main_img']?>">
  <div class="top_content">
    <label>產品簡介 <button style="margin-left:40px;" class="notice pure-button" onclick="project.add_table(4,'articles');"type="button">新增規格欄</button></label>
    <?php if (count(json_decode(@$row["top_text"]))>0): ?>
      <?php foreach (json_decode(@$row["top_text"]) as $i=> $top_content): ?>
        <div class="t_div">
          <table class="pure-table pure-table-bordered" width="100%">
            <thead>
              <tr>
                <th><span>產品規格</span> <button class="del_not del" type="button" onclick="project.table_del($(this))">刪除</button><button class="notice add" type="button" onclick="project.add_tr($(this),'articles')">新增</button></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($top_content as $key => $top): ?>
                <tr>
                  <td><input type="text" name="t_title" value="<?php echo $top->t_title; ?>"> - <input type="text" name="t_text" value="<?php echo $top->t_text; ?>"><a href="javascript:void(0)" onclick="edit_view.delete_tr($(this))">　<i class="icon-trash"></i></a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <label>商品描述</label>
  <textarea name="info" class="ckedit"><?php echo @$row["info"] ?></textarea>
  <label>備註</label>
  <textarea name="content" class="ckedit"><?php echo @$row["content"] ?></textarea>
  <br>
  <br>
</form>
<script>
  $(function () {
    edit_view.ckedit($(".ckedit"),"");
    edit_view.init();
    $(".cover_img").myCoverUpload({
      img_url: '<?PHP echo IMG_URL?>',
      upload_url: '<?PHP echo UPLOAD_URL.$controller_addr;?>/upload/',
      thumbnail_type: 'crop',
      thumbnail_size: ["560x"],
      crop_min: [],
      crop_ratio:1,
      crop_path:'<?PHP echo UPLOAD_URL.$controller_addr;?>/crop/'
    });
    $(".main_img").myCoverUpload({
      img_url: '<?PHP echo IMG_URL?>',
      upload_url: '<?PHP echo UPLOAD_URL.$controller_addr;?>/upload/',
      thumbnail_type: 'crop',
      thumbnail_size: ["525x","1050x"],
      crop_min: [],
      crop_ratio:525/420,
      crop_path:'<?PHP echo UPLOAD_URL.$controller_addr;?>/crop/'
    });

    edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr;?>/save/<?PHP echo @$id?>", 
      function(arr, $form, options){
        var top_content=[];
        $(".t_div").each(function(){
          var new_arr=[];
          $(this).find("tbody tr").each(function(){
            var l = {"t_title":"","t_text":""};
            l.t_title = $(this).find("input[name=t_title]").val();
            l.t_text = $(this).find("input[name=t_text]").val();
            new_arr.push(l);
          });
          top_content.push(new_arr);
        });
        arr.push({name:'top_text', value:JSON.stringify(top_content)});
      });

  });


</script>