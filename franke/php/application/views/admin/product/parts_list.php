<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<div class="right">
    <a class="pure-button notice" href="<?PHP echo ADMIN_URL.$controller_addr?>/parts_edit" title="新增">新增</a>
</div>
<table class="pure-table pure-table-bordered" width="100%">
    <thead>
        <tr>
            <th>標題</th>
            <th>產品編號</th>
            <th>金額</th>
            <th width="130"></th>
        </tr>
    </thead>
    <tbody class="ui-sortable">
        <?PHP foreach($rs as $row):?>
        <tr id="row_<?PHP echo $row["id"]?>">
            <td><?PHP echo $row["title"]?></td>
            <td><?PHP echo $row["part_no"]?></td>
            <td><?PHP echo $row["price"]?></td>
            <td>
                <a class="pure-button" title="編輯" href="<?PHP echo ADMIN_URL.$controller_addr?>/parts_edit/<?PHP echo $row["id"]?>"><i class="icon-pencil"></i></a>
                <a class="pure-button" title="刪除" onclick="list_view.del('<?PHP echo $row['id']?>','<?PHP echo ADMIN_URL.$controller_addr?>/parts_del')"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?PHP endforeach;?>
    </tbody>
</table>