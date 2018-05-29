
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL.$controller_addr?>/parts" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>
  <label>標題</label>
  <input name="title" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$row["title"]?>">

  <label>產品編號</label>
  <input name="part_no" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$row["part_no"]?>">

  <label>價格 (Free設定0)</label>
  <input name="price" type="number" min="0" placeholder="" class="pure-input-1-5" value="<?PHP echo @$row["price"]?>">

  <label>封面照 (330 x 200)</label>
  <input type="hidden" name="cover_img" class="cover_img" value="<?PHP echo @$row['cover_img']?>">

  <br>
  <br>
</form>
<script>
$(function () {

  $(".cover_img").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["330x"],
    crop_min: [],
    crop_ratio:33/20,
    crop_path:'<?PHP echo UPLOAD_URL.$controller_addr?>/crop/'
  });

  edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr?>/parts_save/<?PHP echo @$id?>", 
    function(arr, $form, options){
      if($("input[name=price]").val()<0){
        alert("金額不可小餘0!");return;
      }
    });
})
</script>