
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
  </div>
  <hr>
<?PHP for($x=0;$x<3;$x++):?>
<h3>區塊<?PHP echo ($x+1)?></h3>
  <input type="hidden" name="pid[]" value="<?PHP echo @$rs[$x]["id"]?>">
  <label>封面照 (350 × 200)</label>
  <input type="hidden" name="cover_img[]" class="cover_img" value="<?PHP echo @$rs[$x]['cover_img']?>">
  <label>標題</label>
  <input name="title[]" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$rs[$x]["title"]?>">
  <label>連結</label>
  <input name="link[]" type="text" placeholder="" class="pure-input-1-2" value="<?PHP echo @$rs[$x]["link"]?>">
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
    thumbnail_size: ["350x"],
    crop_min: [],
    crop_ratio:7/4,
    crop_path:'<?PHP echo UPLOAD_URL.$controller_addr?>/crop/'
  });
  edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr?>/product_save", 
    function(arr, $form, options){
    });
})
</script>