<?PHP echo $header?>
<body>
<div class="pure-g-r " id="layout">
    <?PHP echo $menu?>
    <div class="pure-u" id="main">
        <div class="content">
            <h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
            <div class="right">
                <form id="new_term" class="pure-form">
                    <label>新增標籤</label>
                    <input id="new_term" name="new_term" type="text" placeholder="" class="pure-input">
                    <button onclick="change=0;" type="submit"  class="pure-button notice"  title="新增">新增</button>
                </form>
            </div>
            <form class="pure-form" id="search_frm">
                <input type="text" name="search_key" placeholder="不設定關鍵字" value="<?PHP echo (isset($this->get['search_key']))?$this->get['search_key']:"";?>">
                <button onclick="change=0;" class="pure-button" type="submit" href="#" title="搜尋">搜尋</button>
            </form>
            <br>
            <?PHP if ($data['pages']>1):?>
                <ul class="pure-paginator">

                        <li><a onclick="change=0;" class="pure-button double_prev"  href="<?PHP echo ADMIN_URL . 'tags_all/?page=1'.$data["search_url"]?>">&#171;</a></li>
                        <li><a class="pure-button prev" href="#" onclick="change=0;page(0)" >&#60;</a></li>

                        <?PHP if($data['current']<=5 ):?>
                            <?PHP for($x=0,$i=1;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'tags_all/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP elseif($data['current']>$data['pages']-5):?>

                            <?PHP for($x=0,$i=$data['pages']-9;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'tags_all/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP else:?>

                            <?PHP for($x=0,$i=($data['current']-5);$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'tags_all/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP endif;?>    

                    <li><a class="pure-button next" href="#" onclick="change=0;page(1)">&#62;</a></li>
                    <li><a onclick="change=0;" class="pure-button double_next" href="<?PHP echo ADMIN_URL . 'tags_all/?page='.$data['pages'].$data["search_url"]?>">&#187;</a></li>
                </ul>
            <?PHP endif;?>
            <br> 
            <table class="pure-table pure-table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>名稱</th>
                        <th width="130"></th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach($data['rs'] as $row):?>
                    <tr id="row_<?PHP echo $row['term_id']?>">
                            <td>
                                <div>
                                <spen><?PHP echo $row['name']?></spen>
                                </div>
                                <div name="row_<?PHP echo $row['term_id']?>" style="display:none;">
                                <form class="pure-form edit_term_from<?PHP echo $row['term_id']?>">
                                     <input id="edit_term" name="edit_term" type="text" placeholder="" class="pure-input" value="<?PHP echo $row['name']?>">
                                     <button  onclick="change=0;" type="submit"  class="pure-button notice"  title="修改">修改</button>
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
            <br>
            <?PHP if ($data['pages']>1):?>
                <ul class="pure-paginator">

                        <li><a onclick="change=0;" class="pure-button double_prev"  href="<?PHP echo ADMIN_URL . 'tags_all/?page=1'.$data["search_url"]?>">&#171;</a></li>
                        <li><a class="pure-button prev" href="#" onclick="change=0;page(0)" >&#60;</a></li>

                        <?PHP if($data['current']<=5 ):?>
                            <?PHP for($x=0,$i=1;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'tags_all/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP elseif($data['current']>$data['pages']-5):?>

                            <?PHP for($x=0,$i=$data['pages']-9;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'tags_all/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP else:?>

                            <?PHP for($x=0,$i=($data['current']-5);$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'tags_all/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP endif;?>    

                    <li><a class="pure-button next" href="#" onclick="change=0;page(1)">&#62;</a></li>
                    <li><a onclick="change=0;" class="pure-button double_next" href="<?PHP echo ADMIN_URL . 'tags_all/?page='.$data['pages'].$data["search_url"]?>">&#187;</a></li>
                </ul>
            <?PHP endif;?>
            <br>
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

    $('#new_term').ajaxForm({
        url: '<?PHP echo ADMIN_URL?>tags_all/save',
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
    $.post('<?PHP echo ADMIN_URL?>tags_all/del','id='+id,null,'script');
}
function edit(id){
    var div = "#row_" + id + " td div";
    var form = "div[name='row_" + id + "']";
    $(div).hide();
    $(form).show();
    gid=id; 
    $('.edit_term_from'+gid).ajaxForm({
        url: '<?PHP echo ADMIN_URL?>tags_all/save/'+gid,
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