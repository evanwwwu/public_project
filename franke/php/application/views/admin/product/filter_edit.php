<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<div class="right">
    <a class="pure-button notice add_types" onclick="add_type()" href="javascript:void(0)" title="新增">新增</a>
</div>
<div class="types">
    <?PHP foreach($filters as $filter):?>
    <table class="pure-table pure-table-bordered type_edit" data-key="<?PHP echo $filter['id']?>" width="100%">
        <thead>
            <tr>
                <th>
                    <i class="icon-move type_move" ></i> 
                    <span class="de_data" data-col="title" style="font-size: 22px;"><?PHP echo $filter['title']?></span>
                    <div class="edit_div" style="display:none;">
                        <input name="key" type="hidden" value="<?PHP echo $filter['id']?>">
                        <input name="type" type="hidden" value="filter">
                        <input name="title" type="text" value="<?PHP echo $filter['title']?>">
                        <a class="pure-button notice" onclick="save_fn($(this))">儲存</a>
                        <a class="pure-button" onclick="remover($(this))">取消</a>
                    </div>
                    <div class="right">
                        <a class="pure-s-button pure-button-secondary" onclick="edit_filter($(this))" href="javascript:void(0)" title="編輯"><i class="icon-pencil"></i></a>
                        <a class="pure-button-secondary pure-s-button" onclick="add_option($(this),'<?PHP echo $filter["id"]?>')" href="javascript:void(0)" title="新增">新增</a>
                        <a class="pure-button-error pure-s-button" onclick="remover_type($(this))" href="javascript:void(0)" title="刪除">刪除</a>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody class="ui-sortable filter_optoins">
            <?PHP foreach($filter["options"] as $option):?>
            <tr class="optione_edit" data-key="<?PHP echo @$option["id"]?>">
                <td>
                    <i class="icon-move option_move" ></i>
                    <span class="de_data" data-col="title" style="font-size: 18px;"><?PHP echo @$option['name']?></span>
                    <div class="edit_div" style="display:none;">
                        <input name="key" type="hidden" value="<?PHP echo @$option['id']?>">
                        <input name="type" type="hidden" value="option">
                        <input name="filter_id" type="hidden" value="<?PHP echo @$filter['id']?>">
                        <input name="name" type="text" value="<?PHP echo @$option['name']?>">
                        <a class="pure-button notice" onclick="save_fn($(this))">儲存</a>
                        <a class="pure-button" onclick="remover($(this))">取消</a>
                    </div>
                    <div class="right">
                        <a class="pure-button" title="編輯" onclick="edit_filter($(this))" href="javascript:void(0)"><i class="icon-pencil"></i></a>
                        <a class="pure-button" title="刪除" onclick="remover_option($(this))"><i class="icon-trash"></i></a>
                    </div>
                </td>
            </tr>
            <?PHP endforeach;?>
        </tbody>
    </table>
    <?PHP endforeach;?>
</div>

<script>
$(function () {

    $('.types').sortable({
        handle: ".type_move",
        placeholder: "sortable-placeholder",
        start: function (event, ui) {
            $('.sortable-placeholder').append('<td colspan="20">&nbsp;</td>')
        },
        stop: function (event, ui) {
            var q="";
            $(this).find('.type_move').each(function (index, element) {
                q += '&id[]=' + $(this).parents("table").attr('data-key');
            });
            $.post('<?PHP echo ADMIN_URL?>sink/filter_sort/', q)
        }
    });

    $('.filter_optoins').sortable({
        handle: ".option_move",
        placeholder: "sortable-placeholder",
        start: function (event, ui) {
            $('.sortable-placeholder').append('<td colspan="20">&nbsp;</td>')
        },
        stop: function (event, ui) {
            var q="";
            $(this).find('.option_move').each(function (index, element) {
                q += '&id[]=' + $(this).parents(".optione_edit").attr('data-key');
            });
            $.post('<?PHP echo ADMIN_URL?>sink/option_sort', q)
        }
    });

})
function save_fn(save_obj){
    var val_inx = 0;
    save_obj.parent().hide();
    save_obj.parent().find("input").each(function(ix,obj){
        var name = $(obj).attr("name")
        ,val = $(obj).val();
        if(ix!=0){
            json += ',"'+name+'":"'+val+'"';
        }
        else{
            json = '"'+name+'":"'+val+'"';
        }
        if($(obj).attr("type")=="text"){
           save_obj.parent().siblings(".de_data").eq(val_inx).html(val);
           val_inx++;
       }  
   });
    json = "{"+json+"}";
    json = jQuery.parseJSON(json);
    $.post("<?PHP echo ADMIN_URL.$controller_addr?>/filter_save/",json,function(data){
        console.log(data);
        save_obj.parent().siblings(".de_data").show();
        if(data.type=="filter"){
            save_obj.parents("table.type_edit").attr("data-key",data.id);
        }else{
            save_obj.parents("tr.optione_edit").attr("data-key",data.id);
        }
    },'json');

}

function remover(re_obj){
    re_obj.parent().hide();
    re_obj.parent().siblings(".de_data").show();
}

function add_type(){
    var edit_div = $('<div class="edit_div"></div>')
    ,input_div = $('<input name="key" type="hidden" value="0"><input name="type" type="hidden" value="filter"><input name="title" type="text" value="">')
    ,save_btn = $('<a class="pure-button notice" onclick="save_fn($(this))">儲存</a>')
    ,close_btn = $('<a class="pure-button" onclick="remover($(this))">取消</a>');
    edit_div.append(input_div).append(save_btn).append(close_btn);
    var ele = '<table class="pure-table pure-table-bordered type_edit" data-key="0" width="100%"><thead><tr><th><i class="icon-move" ></i> <span class="de_data" data-col="title" style="font-size: 22px;"></span><div class="edit_div">'+edit_div.html()+'</div><div class="right"><a class="pure-s-button pure-button-secondary" onclick="edit_filter($(this))" href="javascript:void(0)" title="編輯"><i class="icon-pencil"></i></a> <a class="pure-button-secondary pure-s-button" onclick="add_option($(this))" href="javascript:void(0)" title="新增">新增</a> <a class="pure-button-error pure-s-button" onclick="remover_type($(this))" href="javascript:void(0)" title="刪除">刪除</a></div></th></tr></thead><tbody class="ui-sortable"></tbody></table>';
    $(".types").prepend(ele);
    $(".types").sortable( "refresh" );
}
function remover_type(re_obj){
    if (!confirm('刪除?')) return;
    var type_edit = re_obj.parents(".type_edit");
    $.post("<?PHP echo ADMIN_URL.$controller_addr?>/filter_del/"+type_edit.attr("data-key"),null,function(){
        type_edit.remove();
    },'script');
}
function remover_option(re_obj){
    if (!confirm('刪除?')) return;
    var type_edit = re_obj.parents(".optione_edit");
    $.post("<?PHP echo ADMIN_URL.$controller_addr?>/option_del/"+type_edit.attr("data-key"),null,function(){
        type_edit.remove();
    },'script');
}
function edit_filter(edit_obj){
    edit_obj.parents("tr").find(".de_data").hide();
    edit_obj.parents("tr").find(".edit_div").show();
}
function add_option(filter_obj,filter_id){
    var edit_div = $('<div class="edit_div"></div>')
    ,input_div = $('<input name="key" type="hidden" value="0"><input name="type" type="hidden" value="option"><input name="filter_id" type="hidden" value="'+filter_id+'"><input name="name" type="text" value="">')
    ,save_btn = $('<a class="pure-button notice" onclick="save_fn($(this))">儲存</a>')
    ,close_btn = $('<a class="pure-button" onclick="remover($(this))">取消</a>');
    edit_div.append(input_div).append(save_btn).append(close_btn);
    var ele = '<tr class="optione_edit" data-key="0"><td><i class="icon-move" ></i><span class="de_data" data-col="title" style="font-size: 18px;"></span><div class="edit_div">'+edit_div.html()+'</div> <div class="right"><a class="pure-button" title="編輯" onclick="edit_filter($(this))" href="javascript:void(0)"><i class="icon-pencil"></i></a><a class="pure-button" title="刪除" onclick="remover_option($(this))"><i class="icon-trash"></i></a></div></td></tr>';
    filter_obj.parents("table.type_edit").find("tbody").prepend(ele);
    $(".filter_optoins").sortable( "refresh" );
}

</script>
<style>
.edit_div{
    display: inline-block;
}
table{
    margin-bottom: 10px;
}
/*//*/
li
{
    list-style-type:none;
}
ul,li
{
    padding: 0;
    margin: 0;
}

.ul_table
{
    width: 100%;
    display: inline-table;
}
.ul_table ul li
{
    padding: 5px 0;
    min-height: 40px;
    clear: both;
}
.ul_table > li > div
{
    font-weight:bolder;
    font-size: 18px;
}
.ul_table ul li div
{
    display: inline-block;
    min-height: 40px;
}
.ul_table ul li div:nth-child(1),.thead div:nth-child(1)
{
    display: inline-block;
    width:7%;
}
.ul_table ul li div:nth-child(3)
{
    float:right;
}
.ul_table ul li
{
    border-top:solid 1px black;
}
.ul_table > li 
{
    border-bottom:solid 1px black;
}
.thead div
{
    display: inline-block;
}
</style>