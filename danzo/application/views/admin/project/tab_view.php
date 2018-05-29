  <label>專案名稱</label>
  <input name="title_<?PHP echo $lan?>" type="text" placeholder="" class="pure-input-1-4" value="<?PHP echo @$title?>">
  <label>規格樣板</label>
  <div class="formats" data-lan="<?PHP echo $lan?>">  
  	<input type="button" class="select_btn button-success pure-button pure-button-secondary" onclick="add_format($(this))" value="新增規格">
  	<br>
  	<?PHP if(@$formats!=""):?>
  	<?php foreach(json_decode($formats) as $format): ?>
  	<div class="formats_div">
  		標題:<input type="text" name="formats_title_<?PHP echo $lan?>[]" value="<?PHP echo urldecode(@$format->formats_title);?>">
  		內容:<br><textarea cols="30" rows="10" name="formats_content_<?PHP echo $lan?>[]"><?PHP echo urldecode(@$format->formats_content);?></textarea>
  		<br>
  		<a href="javascript:void(0)"><i class="icon-trash"></i>DELETE</a>
  	</div>
  <?php endforeach;?>
  <?PHP endif;?>
</div>
<label>內容</label>
<textarea name="content_<?PHP echo $lan?>" class="ckedit"><?PHP echo @$content?></textarea>