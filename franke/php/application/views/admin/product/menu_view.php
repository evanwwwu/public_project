
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
  </div>
  <hr>
  <?PHP for($x=0;$x<2;$x++):?>
  <h3>SHOP<?PHP echo ($x+1)?></h3>
  <input type="hidden" name="submenu_id[]" value="<?PHP echo @$submenu[$x]["id"]?>">
  <label>封面照 (210 × 120)</label>
  <input type="hidden" name="submenu_cover[]" class="cover_img" value="<?PHP echo @$submenu[$x]['cover_img']?>">
  <label>標題</label>
  <input name="submenu_title[]" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$submenu[$x]["title"]?>">
  <label>連結</label>
  <?PHP if($x==-1):?>
  <span><?PHP echo SITE_URL."product/".$controller_addr?></span>
  <input name="submenu_link[]" type="hidden" placeholder="" class="pure-input-1-2" value="<?PHP echo SITE_URL."product/".$controller_addr?>">
  <?PHP else:?>
  <input name="submenu_link[]" type="text" placeholder="" class="pure-input-1-2" value="<?PHP echo @$submenu[$x]["link"]?>">
  <?PHP endif;?>
  <hr><br><br>
  <?PHP endfor;?>

  <?PHP for($i=0;$i<3;$i++):?>
  <h3>FEATURE<?PHP echo ($i+1)?></h3>
  <input type="hidden" name="feature_id[]" value="<?PHP echo @$feature[$i]["id"]?>">
  <label>封面照 (200 × 120)</label>
  <input type="hidden" name="feature_cover[]" class="cover_img" value="<?PHP echo @$feature[$i]['cover_img']?>">
  <label>標題</label>
  <input name="feature_title[]" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$feature[$i]["title"]?>">
  <label>連結</label>
  <input name="feature_link[]" type="text" placeholder="" class="pure-input-1-2" value="<?PHP echo @$feature[$i]["link"]?>">
  <hr><br><br>
  <?PHP endfor;?>
  <br>
  <br>
</form>
<script>
$(function () {


  $(".cover_img").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["210x"],
    crop_min: [],
    crop_ratio:21/12,
    crop_path:'<?PHP echo UPLOAD_URL.$controller_addr?>/crop/'
  });

  $(".cover_img2").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["200x"],
    crop_min: [],
    crop_ratio:20/12,
    crop_path:'<?PHP echo UPLOAD_URL.$controller_addr?>/crop/'
  });

  edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr?>/menu_save", 
    function(arr, $form, options){
    });
})
</script>