<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<div class="right">
    <a class="pure-button notice" href="<?PHP echo ADMIN_URL?>member/edit" title="新增">新增</a>
</div>
<table class="pure-table pure-table-bordered" width="100%">
    <thead>
        <tr>
            <th width="50">發佈</th>
            <th width="100">職位</th>
            <th>名稱</th>
            <th width="130"></th>
        </tr>
    </thead>
    <tbody class="ui-sortable">
        <?PHP foreach($rs as $row):?>
        <tr id="row_<?PHP echo $row["id"]?>">
            <td>
                <div>
                    <i value="<?PHP echo $row["id"]?>" class="icon-move" ></i>
                    <input value="<?PHP echo $row["id"]?>" type="checkbox" <?PHP echo (@$row["publish"])?"checked":"" ?> onclick="list_view.publish($(this),'<?PHP echo ADMIN_URL?>member/publish/')">
                </div>
            </td>
            <td>
                <?PHP switch($row["office"]){
                    case "1":
                    echo "產品設計";
                    break;
                    case "2":
                    echo "平面設計";
                    break;
                    case "3":
                    echo "行銷企劃";
                    break;
                } ?>
            </td>
            <td><?PHP echo $row["name_tw"]?></td>
            <td>
                <a class="pure-button" title="編輯" href="<?PHP echo ADMIN_URL?>member/edit/<?PHP echo $row["id"]?>"><i class="icon-pencil"></i></a>
                <a class="pure-button" title="刪除" onclick="list_view.del('<?PHP echo $row['id']?>','<?PHP echo ADMIN_URL?>member/del')"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?PHP endforeach;?>
    </tbody>
</table>
<script type="text/javascript">
$(function(){
    list_view.sort("<?PHP echo ADMIN_URL?>member/sort");
})
</script>