<?PHP echo $header?>
<body>
<div class="pure-g-r " id="layout">
	<?PHP echo $menu?>
	<div class="pure-u" id="main">
		<div class="content">
			<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
			<div class="right">
                <form id="new_term" class="pure-form">
                    <label>新增類別</label>
                    <input id="new_term" name="new_term" type="text" placeholder="" class="pure-input">
                    <button onclick="change=0;" type="submit"  class="pure-button notice"  title="新增">新增</button>
                </form>
            </div>
            <table class="pure-table pure-table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>名稱</th>
                        <th width="130"></th>
                    </tr>
                </thead>
                <tbody>
                	<?PHP foreach($data as $row):?>
                    <tr id="row_<?PHP echo $row['term_id']?>">
                            <td>
                                <div>
                                <spen><?PHP echo $row['name']?></spen><i value="<?PHP echo $row['term_id']?>" class="icon-move" style="visibility: hidden;"></i>
                                </div>
                                <div name="row_<?PHP echo $row['term_id']?>" style="display:none;">
                                <form class="pure-form edit_term_from<?PHP echo $row['term_id']?>">
                                     <input id="edit_term" name="edit_term" type="text" placeholder="" class="pure-input" value="<?PHP echo $row['name']?>">
                                     <button onclick="change=0;" type="submit"  class="pure-button notice"  title="修改">修改</button>
                                     <a onclick="change=0;" class="pure-button cancel_btn"  title="取消">取消</a>
                                </form>
                                </div>
                            </td>
                        <td>
                        	<a class="pure-button" title="編輯" onClick="change=0;edit(<?PHP echo $row['term_id']?>)"><i class="icon-pencil"></i></a> 
                            <a class="pure-button" title="刪除" onClick="change=0;del(<?PHP echo $row['term_id']?>)"><i class="icon-trash"></i></a></td>
                    </tr>
                    <?PHP endforeach;?>
                </tbody>
            </table>
		</div>
		<?PHP echo $footer?>
	</div>
</div>
<style>
.icon-move{visibility:hidden};
.ui-sortable-helper td{
}
.sortable-placeholder td{
	height:40px;
	background-color:#FF9;
}
</style>
<script>
var gid='';
$(function(){

        $('td div').hover(
            function(){
                $(this).find('.icon-move').css('visibility','visible');
            },
            function(){
                $(this).find('.icon-move').css('visibility','hidden');
            }
        );
        $('tbody').sortable({ 
        handle: ".icon-move" ,
        placeholder: "sortable-placeholder",
        start: function( event, ui ) {
            $('.sortable-placeholder').append('<td colspan="20">&nbsp;</td>')
        },
        stop: function( event, ui ) {
            var q = '';
            $('.icon-move').each(function(index, element) {
                q+='&id[]='+$(this).attr('value');
            });
            $.post('<?PHP echo ADMIN_URL?>tags/sort',q)
        }
    });

    $('#new_term').ajaxForm({
        url: '<?PHP echo ADMIN_URL?>tags_gallery/save',
        type: 'post',
        dataType: 'text',
        beforeSubmit: checkform,
        success:function(data) {
            if(data==""){
                alert('已有此類別!!');
            }
            else{
              location=location;
            }
        }
    });

    $('.cancel_btn').bind('click',function(){
        var display = $(this).parent().parent().prev();
        var edit_form = $(this).parent().parent();
        edit_form.hide();
        display.show();
    });
})
function checkform(){
   if($("input[name='new_term']").val()==""){
    alert("請填寫欄位");
    return false;
   }
}
function edit_checkform(){
   if($("input[name='edit_term']").val()==""){
    alert("請填寫欄位");
    return false;
   }
}
function del(id){
	if (!confirm('Delete?')) return;
	$.post('<?PHP echo ADMIN_URL?>tags_gallery/del','id='+id,null,'script');
}
function edit(id){
    var div = "#row_" + id + " td div";
    var form = "div[name='row_" + id + "']";
    $(div).hide();
    $(form).show();
    gid=id; 
    $('.edit_term_from'+gid).ajaxForm({
        url: '<?PHP echo ADMIN_URL?>tags_gallery/save/'+gid,
        type: 'post',
        dataType: 'text',
        beforeSubmit: edit_checkform,
        success:function(data) {
            if(data==""){
                alert('已有此類別!!');
            }
            else{
                $(div+" spen").html(data);
                $(div).show();
                $(form).hide();
            }
        } 
    });
}
</script>
</body>
</html>