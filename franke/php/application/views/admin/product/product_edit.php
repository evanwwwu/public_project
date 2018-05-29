
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL.$controller_addr?>/products" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>

  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (@$row["publish"]=="1")?"checked":"" ?>>是

  <label>商品名稱</label>
  <input name="title" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$row["title"]?>">

  <label>商品編號</label>
  <input name="product_no" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$row["product_no"]?>">

  <label>商品金額</label>
  <input name="price" type="number" min="0" placeholder="" class="pure-input-1-5" value="<?PHP echo @$row["price"]?>">

  <label>封面照GALLERY (330 x 200)</label>
  <div class="cover_img">
    <?PHP if(@$row["cover_img"]!=''):?>
    <?PHP foreach(json_decode($row["cover_img"]) as $key => $covers):?>
    <input type="hidden" class="default_img" name="cover_img[]" value="<?PHP echo @$covers?>">
    <?PHP endforeach;?>
    <?PHP endif;?>
  </div> 

  <label>GALLERY (600 x 600)</label>
  <div class="gallery">
    <?PHP if(@$row["gallery_img"]!=''):?>
    <?PHP foreach(json_decode($row["gallery_img"]) as $key => $gallery):?>
    <input type="hidden" class="default_img" name="gallery_img[]" value="<?PHP echo @$gallery?>">
    <?PHP endforeach;?>
    <?PHP endif;?>
  </div>

  <label>產品描述</label>
  <textarea style="width:1180px;" class="ckedit" name="content"><?PHP echo @$row["content"]?></textarea>

  <label>必附配件</label>
  <input type="button" class="select_btn button-success pure-button pure-button-secondary" value="選擇配件">

  <label>套裝配件</label>
  <input type="button" id="add_part_select" class="button-success pure-button pure-button-secondary" onclick="add_select()" value="新增套裝">
  <table class="pure-table pure-table-bordered">
    <thead>  
      <tr>
        <th width="200">套裝標題</th>
        <th width="60%">內容配件</th>
        <th width="10">刪除</th>
      </tr>
    </thead>
    <tbody id="sel_part_body">
      <?php if(@$row["parts_select"]!=""): ?>
      <?PHP foreach(json_decode(@$row["parts_select"]) as $key=> $select):?>
      <tr class="sel_tr" data-inx="<?PHP echo $key?>">
        <td><input name="select_title[]" type="text" placeholder="" class="pure-input-1" value="<?PHP echo urldecode($select->select_title)?>"></td>
        <td>
          <div class="p_div">
            <input onclick="add_sel_part($(this))" type="button" class="button-success pure-button pure-button-secondary" value="選擇配件">
            <i class="icon-spinner icon-spin"></i>
          </div>
        </td>
        <td><i class="icon-trash" onclick="del_sel($(this))"></i></td>
      </tr>
      <?PHP endforeach;?>
    <?php endif; ?>
  </tbody>
</table>
<br>

<label>加購配件</label>
<input type="button" class="select_btn button-success pure-button pure-button-secondary" value="選擇配件">
<br>
<label>選擇屬性</label>
<div id="filter_ids">
  <?PHP 
  $li_html="";
  $child_html="";
  foreach($filters as $fk=>$filter){
    $li_html .= '<li><a href="#filter'.$fk.'">'.$filter["title"].'</a></li>';
    $child_html .= '<div id="filter'.$fk.'">';
    foreach($filter["options"] as $option){
      $is_check = (in_array($option["id"],$row["filters"]))?"checked":"";
      $input = '<label class="for_checkbox" style="margin-left:10px;"><input type="checkbox" name="filter_ids[]" value="'.$option["id"].'" '.$is_check.'>'.$option["name"].'</label>';
      $child_html .=$input;
    }
    $child_html .= "</div>";
  }
  ?>
  <ul>
    <?PHP echo $li_html;?>
  </ul>
  <?PHP echo $child_html;?>
</div>  
<br>
<label>推薦商品</label>
<input type="button" class="select_btn button-success pure-button pure-button-secondary" value="選擇商品">

</form>
<script>
$(function () {
  $("#filter_ids").tabs();
  edit_view.ckedit(".ckedit");
  $(".cover_img").myGallery({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/gallery_img/',
    img_size: ["330x200"]
  });
  $(".gallery").myGallery({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/gallery_img/',
    img_size: ["600x600","150x150"]
  });

  var stn = $(".select_btn").myselectoption({
    default_option:[<?PHP echo (@$row["parts"]=="")?"[]":$row["parts"]?>,<?PHP echo (@$row["sp_parts"]=="")?"[]":$row["sp_parts"]?>,<?PHP echo (@$row["recommend"]=="")?"[]":$row["recommend"]?>],
    select_path:["<?PHP echo ADMIN_URL.$controller_addr?>/select_part","<?PHP echo ADMIN_URL.$controller_addr?>/select_part","<?PHP echo ADMIN_URL.$controller_addr?>/select_product"],
    get_option_path:["<?PHP echo ADMIN_URL.$controller_addr?>/get_part","<?PHP echo ADMIN_URL.$controller_addr?>/get_part","<?PHP echo ADMIN_URL.$controller_addr?>/get_product_rec"]
  }); 


  var selects = $.parseJSON(JSON.stringify(<?PHP echo (@$row["parts_select"]=="")?"[]":$row["parts_select"]?>));
  $.each(selects,function(inx,select){
    var get_url = "<?PHP echo ADMIN_URL.$controller_addr?>/get_part";
    $.post(get_url, {
      "ids": $.parseJSON(JSON.stringify(select.sel_parts))
    }, function(result) {
      if(result.length==0){
        $("#sel_part_body").find("tr.sel_tr:eq("+inx+")").find(".p_div .icon-spinner").remove();
      }
      $.each(result, function(rinx, obj) {
        var sd = $('<div class="p_item"></div>'),
        sinp = $('<input name="p' + inx + '_ids[]" type="hidden" value="' + result[rinx].id + '">'),
        sa = $('<a href="javascript:void(0)"></a>'),
        dei = $('<i class="icon-trash"></i>');
        sa.click(function() {
          if (!confirm('確定刪除?')) return;
          var target = $(this).parent();
          target.remove();
        });
        sd.append(sinp).append(sa.append(dei)).append(result[rinx].showname);
        $("#sel_part_body").find("tr.sel_tr:eq("+inx+")").find(".p_div").append(sd);        
        $("#sel_part_body").find("tr.sel_tr:eq("+inx+")").find(".p_div .icon-spinner").remove();
        $("#sel_part_body").find("tr.sel_tr:eq("+inx+")").find(".p_div .icon-spinner").remove();
      });
    }, "json");
});
edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr?>/save/<?PHP echo @$id?>", 
  function(arr, $form, options){
    $(".pure-button.notice").hide();
  });
});
function rec_updata(wid,set_no,check_val){
  var url = ["<?PHP echo ADMIN_URL.$controller_addr?>/get_part","<?PHP echo ADMIN_URL.$controller_addr?>/get_part","<?PHP echo ADMIN_URL.$controller_addr?>/get_product_rec"];
  $(".select_btn").myselectoption("updata",wid,url[set_no],set_no,check_val);
}
function add_select(){
  var m_inx = $("#sel_part_body").find("tr").length;
  var add_part = $('<input type="button" class="button-success pure-button pure-button-secondary" onclick="add_sel_part($(this))" value="選擇配件">')
  ,tr = $('<tr class="sel_tr" data-inx="'+m_inx+'"></tr>')
  ,title_input = $('<input name="select_title[]" type="text" placeholder="" class="pure-input-1" value="">') 
  ,del_btn = $('<i class="icon-trash" onclick="del_sel($(this))"></i>')
  ,td1 = $("<td></td>"),td2 = $("<td></td>"),td3 = $("<td></td>")
  ,p_div = $('<div class="p_div"></div>');
  td1.append(title_input);
  td2.append(p_div.append(add_part));
  td3.append(del_btn);
  tr.append(td1).append(td2).append(td3);
  $("#sel_part_body").append(tr);
}
function add_sel_part(obj){
  var sel_url = "<?PHP echo ADMIN_URL.$controller_addr?>/select_part/0";
  var width = 800;
  var height = 600;
  var left = parseInt((screen.availWidth / 2) - (width / 2));
  var top = parseInt((screen.availHeight / 2) - (height / 2));
  var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
  var newWindow = window.open(sel_url, "SELECT PART", windowFeatures);
  newWindow.focus();
  if (!newWindow) {
    return false;
  }
  var inx = obj.parents("tr.sel_tr").attr("data-inx");
  // console.log(inx)
  var p_ids = [];
  var html = "";  
  html += "<html><head></head><body><form id='formid' method='post' action='" + sel_url + "'>";
  obj.parent().find("input[type=hidden]").each(function(x,input){
    p_ids.push($(input).val());
  });
  console.log(p_ids.toString());
  html += "<input type='hidden' name='ids' value='["+p_ids.toString()+"]'/><input type='hidden' name='sel_inx' value='"+inx+"'><input type='hidden' name='type' value='sel'>";
  html += "</form><script type='text/javascript'>document.getElementById(\"formid\").submit()";
  html += '<'+'/'+'script></body></html>';
  newWindow.document.write(html);
}
function del_sel(obj){
  if (!confirm('確定刪除?')) return;
  var target = obj.parents(".sel_tr");
  target.remove();
}
function add_select_part(id,sel_inx,check){
  if (check) {
    if ($("#sel_part_body").find("tr.sel_tr").eq(sel_inx).find(".p_div>input[value='" + id + "']").length <= 0) {
      $.ajaxSetup({
        async: false
      });
      $.post("<?PHP echo ADMIN_URL.$controller_addr?>/get_part", {
        "ids": $.parseJSON(id)
      }, function(result) {
        var sd = $('<div class="p_item"></div>'),
        sinp = $('<input name="p' + sel_inx + '_ids[]" type="hidden" value="' + result[0].id + '">'),
        sa = $('<a href="javascript:void(0)"></a>'),
        dei = $('<i class="icon-trash"></i>');
        sa.click(function() {
          if (!confirm('確定刪除?')) return;
          var target = $(this).parent();
          target.remove();
        });
        sd.append(sinp).append(sa.append(dei)).append(result[0].showname);
        $("#sel_part_body").find("tr.sel_tr:eq("+sel_inx+")").find(".p_div").append(sd);
        $.ajaxSetup({
          async: true
        });
      }, "json");
    }
  } else {
    $(".set" + set_no + "_item").find("input[value='" + id + "']").parent().remove();
  }

}
</script>