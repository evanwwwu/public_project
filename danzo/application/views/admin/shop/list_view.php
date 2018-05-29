<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<div class="right">
    <a class="pure-button notice" href="<?PHP echo ADMIN_URL?>shop/edit" title="新增">新增</a>
</div>
<table class="pure-table pure-table-bordered" width="100%">
    <thead>
        <tr>
            <th width="50">發佈</th>
            <th width="100">國家</th>
            <th width="100">類別</th>
            <th>店家名稱</th>
            <th width="130"></th>
        </tr>
    </thead>
    <tbody class="ui-sortable">
        <?PHP foreach($rs as $row):?>
        <?PHP foreach($row["stores"] as $store):?>
        <tr id="row_<?PHP echo $store["id"]?>">
            <td>
                <div>
                    <i value="<?PHP echo $store["id"]?>" class="icon-move" ></i>
                    <input value="<?PHP echo $store["id"]?>" type="checkbox" <?PHP echo (@$store["publish"])?"checked":"" ?> onclick="list_view.publish($(this),'<?PHP echo ADMIN_URL?>shop/publish/')">
                </div>
            </td>
            <td><?PHP echo $row["name_tw"] ?></td>
            <td><?PHP echo ($store["type_id"]=="0")?"online":"store"?></td>
            <td><?PHP echo $store["title_tw"]?></td>
            <td>
                <a class="pure-button" title="編輯" href="<?PHP echo ADMIN_URL?>shop/edit/<?PHP echo $store["id"]?>"><i class="icon-pencil"></i></a>
                <a class="pure-button" title="刪除" onclick="list_view.del('<?PHP echo $store['id']?>','<?PHP echo ADMIN_URL?>shop/del')"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?PHP endforeach;?>
        <?PHP endforeach;?>
    </tbody>
</table>
<script type="text/javascript">
$(function(){
    list_view.sort("<?PHP echo ADMIN_URL?>shop/sort");
})
</script>