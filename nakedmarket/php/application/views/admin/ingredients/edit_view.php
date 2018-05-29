
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

  <div id="filter_id">  
    <label>過濾類別</label>
    <select name="filter_id">
    </select>
  </div>
  
  <label>運送類別</label>
  <select name="ship_type">
    <option value="常溫" <?php echo ($row["ship_type"]=="常溫")?"selected":""; ?>>常溫</option>
    <option value="低溫" <?php echo ($row["ship_type"]=="低溫")?"selected":""; ?>>低溫</option>
  </select>

  <label>庫存量</label>
  <span><?php echo @$row["count"] ?></span>

  <label>產品單位</label>
  <input type="text" name="unit_text" value="<?php echo @$row["unit_text"] ?>">

  <label>換算單位</label>
  <input type="number" name="unit" value="<?php echo @$row["unit"] ?>">

  <label>金額</label>
  <input type="number" name="price" value="<?php echo @$row["price"] ?>">

  <label>封面照 (560 × 560)</label>
  <input type="hidden" name="cover_img" class="cover_img" value="<?PHP echo @$row['cover_img']?>">
  <label>內容照 (525 × 420)</label>
  <input type="hidden" name="main_img" class="main_img" value="<?PHP echo @$row['main_img']?>">

  <label>食材簡介</label>
  <textarea name="info" class="ckedit"><?php echo @$row["info"] ?></textarea>

  <label>食材介紹</label>
  <textarea name="content" class="ckedit"><?php echo @$row["content"] ?></textarea>
  <div class="record_div">
    <label class="record_file pure-button notice">
      <span>簡介上傳</span>
      <input type="file" name="record_file">
    </label>
    <?php if (@$row["record_img"]!=""): ?>
      <div>
        <input type="hidden" name="record_img" value="<?php echo $row["record_img"]; ?>">
        <a href="<?php echo IMG_URL.$row["record_img"]; ?>" target="_blank">預覽</a>
        <a href="javascript:void(0)" onclick="edit_view.delete_img($(this))">　<i class="icon-trash"></i></a>
      </div>
    <?php endif; ?>
  </div>
  <br>
  <br>
</form>
<script>
  var filter_id = '<?php echo @$row["filter_id"]; ?>';
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
      thumbnail_size: ["525x"],
      crop_min: [],
      crop_ratio:525/420,
      crop_path:'<?PHP echo UPLOAD_URL.$controller_addr;?>/crop/'
    });
    $("select[name=type_id]").change(function(){
      var selected = $(this).find("option:selected").val();
      $.get("<?php echo ADMIN_URL.$controller_addr; ?>/get_filter/"+selected,function(data){
        $("#filter_id").find("select").empty();
        $.each(data,function(key,value){
           var option = $("<option>").attr("value",value.id).html(value.title);
          if(filter_id==value.id){
            option.attr("selected","selected");
          }
          $("#filter_id").find("select").append(option);
        })
      },"json");
    }).trigger("change");

    $(".record_file").fileupload({
      change: function (e, data) {
        $(this).append('<i class="icon-spinner icon-spin"></i>');
      },
      formData: {
      },
      url: "<?PHP echo ADMIN_URL.$controller_addr;?>/file_upload/record_file",
      sequentialUploads: true,
      dataType: 'json',
      done: function (e, data) {
        var json = data.result;
        $(this).find(".icon-spinner").remove();
        if(!json.error){
          console.log(json);
          var html = '<div><input type="hidden" name="record_img" value="'+json.filename+'"><a href="<?php echo IMG_URL;?>'+json.filename+'" target="_blank">預覽</a><a href="javascript:void(0)" onclick="edit_view.delete_img($(this))">　<i class="icon-trash"></i></a></div>';
          $(".record_div").append(html);
        }
        else{
          alert(json.error);
        }
      },
      dropZone: null
    });

    edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr;?>/save/<?PHP echo @$id?>", 
      function(arr, $form, options){
      });

  });


</script>