  <label>標題</label>
  <input name="title_<?PHP echo $lan?>" type="text" placeholder="" class="pure-input-1-4" value="<?PHP echo @$title?>">
  <label>副標題</label>
  <input name="sub_title_<?PHP echo $lan?>" type="text" placeholder="" class="pure-input-1-4" value="<?PHP echo @$sub_title?>">
  <label>媒體名稱</label>
  <input name="related_<?PHP echo $lan?>" type="text" placeholder="" class="pure-input-1-4" value="<?PHP echo @$related?>">
  
  <label>內容</label>
  <textarea class="ckedit" name="content_<?PHP echo $lan?>">
  	<?PHP echo @$content;?>
  </textarea>