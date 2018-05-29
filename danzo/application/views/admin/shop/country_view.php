<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<div class="right">
    <form id="add_country">
        <h4 style="margin:0px;">國家名稱</h4>
        EN:<input type="text" name="name_en" vlaue="" >
        中:<input type="text" name="name_tw" vlaue="" >
        <input type="submit" class="pure-button notice" value="新增">
    </form>
</div>
<table class="pure-table pure-table-bordered" width="100%">
    <thead>
        <tr>
            <th width="50">排序</th>
            <th>名稱</th>
            <th width="130"></th>
        </tr>
    </thead>
    <tbody class="ui-sortable">
        <tr>
            <td></td>
            <td>Taiwan</td>
            <td></td>
        </tr>
        <?PHP foreach($rs as $key=>$row):?>
        <tr id="row_<?PHP echo $row["id"]?>">
            <td>
                <i value="<?PHP echo $row["id"]?>" class="icon-move" ></i>
            </td>
            <td class="edit">
                <span>EN: <?PHP echo $row["name_en"]?></span>&nbsp;&nbsp;&nbsp;
                <span>中: <?PHP echo $row["name_tw"]?></span>
                <div style="display:none;">
                    <input type="hidden" name="tag_id" value="<?PHP echo $row["id"]?>">
                    EN:<input type="text" name="name_en" value="<?PHP echo $row["name_en"]?>"> &nbsp;&nbsp;&nbsp;
                    中:<input type="text" name="name_tw" value="<?PHP echo $row["name_tw"]?>"> 
                    <a class="pure-button notice" onclick="save_edit('<?PHP echo $row["id"]?>')">儲存</a> 
                    <a class="pure-button" onclick="close_edit('<?PHP echo $row["id"]?>')">取消</a>
                </div>
            </td>
            <td>
                <a class="pure-button" title="編輯" href="javascript:void(0)" onclick="edit('<?PHP echo $row["id"]?>')"><i class="icon-pencil"></i></a>
                <a class="pure-button" title="刪除" onclick="list_view.del('<?PHP echo $row['id']?>','<?PHP echo ADMIN_URL?>shop/country_del')"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?PHP endforeach;?>
    </tbody>
</table>
<script type="text/javascript">
$(function(){
    list_view.sort("<?PHP echo ADMIN_URL?>shop/country_sort");
    $("#add_country").ajaxForm({
        forceSync: true,
        beforeSubmit: function(){
            if($("#add_country").find("input[name=name_en]").val()==""||$("#add_country").find("input[name=name_tw]").val()=="")
            {
                alert("請輸入國家名稱");
                return false;
            }
        },
        url: "<?PHP echo ADMIN_URL?>shop/country_save/0",
        success:function(){
            location=location;
        },
        type: 'post',
        dataType: 'script'
    });
})

function edit(tid){
 var e = $("#row_"+tid).find(".edit");
 e.find("span").hide();
 e.find("div").show();
}
function close_edit(tid){
 var e = $("#row_"+tid).find(".edit");
 e.find("div").hide();
 e.find("span").show();
}
function save_edit(tid){
    var e = $("#row_"+tid).find(".edit");
    var name_en = e.find("input[name=name_en]").val();
    var name_tw = e.find("input[name=name_tw]").val();
    $.post("<?PHP echo ADMIN_URL?>shop/country_save/"+tid,{"name_en":name_en,"name_tw":name_tw},null,'script');
    // close_edit(tid);
}
</script>