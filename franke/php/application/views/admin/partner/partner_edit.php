<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL.$controller_addr?>/partner/<?PHP echo $de_area?>" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>

  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (@$row["publish"]=="1")?"checked":"" ?>>是

  <label>地區</label>
  <select name="type_id">
    <?PHP foreach($areas as $area):?>
    <option value="<?PHP echo $area["id"]?>" <?PHP echo (@$row["type_id"]==$area["id"] || (!isset($row["type_id"])&&$de_area == $area["id"])?"selected":"" )?>><?PHP echo $area["title"]?></option>
    <?PHP endforeach;?>
  </select>

  <label>店名</label>
  <input name="title" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$row["title"]?>">

  <label>店家網址</label>
  <input name="link" type="text" placeholder="" class="pure-input-1-2" value="<?PHP echo @$row["link"]?>">

  <label>連絡電話</label>
  <input name="phone" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$row["phone"]?>">

  <label>地址</label>
  <input name="address" type="text" placeholder="" class="pure-input-1-2" value="<?PHP echo @$row["address"]?>">

  <label>營業時間</label>
  <input name="open_time" type="text" placeholder="" class="pure-input-1-2" value="<?PHP echo @$row["open_time"]?>">

  <label>廚具品牌</label>
  <input name="brand" type="text" placeholder="" class="pure-input-1-2" value="<?PHP echo @$row["brand"]?>">

  <label>封面照 (315 × 190)</label>
  <input type="hidden" name="cover_img" class="cover_img" value="<?PHP echo @$row['cover_img']?>">
  
  <label>內頁大圖(1480 x 565)</label>
  <input type="hidden" name="banner" class="banner" value="<?PHP echo @$row['banner']?>">

  <label>店內產品</label>
  <?php if(@$row["product_content"]!=""): ?>
  <?php $product = json_decode($row["product_content"]); ?>
<?php endif; ?>
<input type="button" class="select_btn button-success pure-button pure-button-secondary" value="選擇產品">
<!-- 
<div class="pro">
  <h2>產品1</h2>
  <h4>圖片 (330 x 200)</h4>
  <div class="pro_gallery">
    <?PHP if(@$product[0]->pro_img!=''):?>
    <?PHP foreach($product[0]->pro_img as $key => $gallery):?>
    <input type="hidden" class="default_img" name="pro_gallery0[]" value="<?PHP echo $gallery?>">
    <?PHP endforeach;?>
    <?PHP endif;?>
  </div>
  <h4>名稱</h4>
  <input name="pro_name[]" value="<?php echo urldecode(@$product[0]->pro_name) ?>">
  <h4>連結</h4>
  <input name="pro_link[]" value="<?php echo @$product[0]->pro_link?>" class="pure-input-1-2" >
</div> 

<div class="pro">
  <h2>產品2</h2>
  <h4>圖片 (330 x 200)</h4>
  <div class="pro_gallery">
    <?PHP if(@$product[1]->pro_img!=''):?>
    <?PHP foreach($product[1]->pro_img as $key => $gallery):?>
    <input type="hidden" class="default_img" name="pro_gallery1[]" value="<?PHP echo $gallery?>">
    <?PHP endforeach;?>
    <?PHP endif;?>
  </div>
  <h4>名稱</h4>
  <input name="pro_name[]" value="<?php echo urldecode(@$product[1]-> pro_name) ?>">
  <h4>連結</h4>
  <input name="pro_link[]" value="<?php echo @$product[1]->pro_link ?>" class="pure-input-1-2" >
</div>

<div class="pro">
  <h2>產品3</h2>
  <h4>圖片 (330 x 200)</h4>
  <div class="pro_gallery">
    <?PHP if(@$product[2]->pro_img!=''):?>
    <?PHP foreach($product[2]->pro_img as $key => $gallery):?>
    <input type="hidden" class="default_img" name="pro_gallery_img[]" value="<?PHP echo $gallery?>">
    <?PHP endforeach;?>
    <?PHP endif;?>
  </div>
  <h4>名稱</h4>
  <input name="pro_name[]" value="<?php echo urldecode(@$product[2]->pro_name) ?>">
  <h4>連結</h4>
  <input name="pro_link[]" value="<?php echo @$product[2]->pro_link ?>" class="pure-input-1-2" >
</div>
-->
<label>GALLERY (400 x auto)</label>
<div class="gallery">
  <?PHP if(@$row["gallery_img"]!=''):?>
  <?PHP foreach(json_decode($row["gallery_img"]) as $key => $gallery):?>
  <input type="hidden" class="default_img" name="gallery_img[]" value="<?PHP echo $gallery?>">
  <?PHP endforeach;?>
  <?PHP endif;?>
</div>

<label>內容</label>
<textarea class="ckedit" name="content"><?PHP echo @$row["content"]?></textarea>

<br>
<br>
</form>
<style>
.pro{
  border:1px solid #999;
  padding: 5px;
  margin: 10px 0px;
}
h4{margin:0;}
</style>
<script>
$(function () { 
  edit_view.ckedit(".ckedit","","655");
  $(".banner").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["1480x"],
    crop_min: [],
    crop_ratio:1480/565,
    crop_path:'<?PHP echo UPLOAD_URL.$controller_addr?>/crop/'
  });

  $(".cover_img").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["315x"],
    crop_min: [],
    crop_ratio:315/190,
    crop_path:'<?PHP echo UPLOAD_URL.$controller_addr?>/crop/'
  });

  $(".gallery").myGallery({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/gallery_img/',
    img_size:[], 
  });
  $(".pro_gallery").myGallery({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/gallery_img/',
    img_size: ["330x200"], 
  });

  var stn = $(".select_btn").myselectoption({
    default_option:[<?PHP echo (@$row["product_ids"]=="")?"[]":$row["product_ids"]?>],
    select_path:["<?PHP echo ADMIN_URL.$controller_addr?>/select_product"],
    get_option_path:["<?PHP echo ADMIN_URL.$controller_addr?>/get_product_rec"]
  }); 

  edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr?>/save/<?PHP echo @$row['id']?>", 
    function(arr, $form, options){
      $(".pure-button.notice").hide();
    });
})
function rec_updata(wid,set_no,check_val){
  var url = ["<?PHP echo ADMIN_URL.$controller_addr?>/get_product_rec"]
  $(".select_btn").myselectoption("updata",wid,url[set_no],set_no,check_val);
}
</script>