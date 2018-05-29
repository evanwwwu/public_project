
<h2 class="content-subhead" id="stacked-form">帳號管理</h2>
<!-- <div class="right">
    <a class="pure-button notice" href="<?PHP echo ADMIN_URL?>accounts/edit" title="新增">新增</a>
</div> -->
<table class="pure-table pure-table-bordered" width="100%">
    <thead>
        <tr>
            <th width="7%">帳號身份</th>
            <th>電子信箱</th>
            <th width="130"></th>
        </tr>
    </thead>
    <tbody class="ui-sortable">
        <?PHP foreach($rs as $row):?>
        <tr id="row_<?PHP echo $row['id']?>">
            <td>
            <?PHP echo ($row["active"]=="0")?"停用":"";?><?PHP echo ($row["active"]=="1")?"一般":""?>
            </td>
            <td><?PHP echo $row['email']?></td>
            <td>
                <a class="pure-button" title="編輯" href="<?PHP echo ADMIN_URL?>member/edit/<?PHP echo $row['id']?>"><i class="icon-pencil"></i></a>
                <a class="pure-button" title="刪除" onclick="list_view.del('<?PHP echo $row['id']?>','<?PHP echo ADMIN_URL?>member/del')"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?PHP endforeach;?>

    </tbody>
</table>