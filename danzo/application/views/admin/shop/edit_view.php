
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL?>shop" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>
  
  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (@$row["publish"]=="1")?"checked":"" ?>>是


  <label>國家</label>
  <select name="country_id">
    <option value="0">臺灣</option>
    <?PHP foreach($countrys as $country):?>
    <option <?PHP echo ($country["id"]==@$row["country_id"])?"selected":"";?> value="<?PHP echo $country["id"]?>"><?PHP echo $country["name_tw"]?></option>
    <?PHP endforeach;?>
  </select>

  <label>店家型態</label>
  <input type="radio" name="type_id" value="0" <?PHP echo (@$row["type_id"]=="0"||@$row["type_id"]=="")?"checked":""?>>網路
  <input type="radio" name="type_id" value="1" <?PHP echo (@$row["type_id"]=="1")?"checked":""?>>實體
  
  <label>連絡電話</label>
  <input type="text" name="phone" value="<?PHP echo @$row["phone"]?>">

  <label>連結</label>
  <input type="text" name="link" class="pure-input-1-2" value="<?PHP echo @$row["link"]?>">
  <br>

  <br>
</form>
<script>
$(function () {

  $("#frm").mylanguagesTab({
    path_url:"<?PHP echo ADMIN_URL?>shop/get_lang/<?PHP echo $id?>/",
    languages: ["en","tw"],
    surecce:function(){
    }
  });


  edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL?>shop/save/<?PHP echo @$id?>", 
    function(arr, $form, options){
    });
})
</script>