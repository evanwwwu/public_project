<h2 class="content-subhead" id="stacked-form">會員管理</h2>
<form id="form_search" action="" method="get">
    會員狀態 : 
    <select name="active">
        <option value="">所有狀態</option>
        <option value="0" <?php echo (@$this->get["active"]=="0")?"selected":""; ?>>停用</option>
        <option value="1" <?php echo (@$this->get["active"]=="1")?"selected":""; ?>>啟用</option>
    </select>  
    E-Mail：<input type="text" name="email" value="<?PHP echo @$this->get["email"]?>">
    <a class="pure-button" onclick="$('#form_search').submit()">搜尋</a>
</form>
<br>
<table class="pure-table pure-table-bordered" width="100%">
    <thead>
        <tr>
            <th width="100">會員狀態</th>
            <th>E-Mail</th>
            <th width="200">FB</th>
            <th width="130"></th>
        </tr>
    </thead>
    <tbody class="ui-sortable">
        <?PHP foreach ($rs as $row):?>
        <tr id="row_<?PHP echo $row['id']?>">
            <td><?php echo ($row["active"]=='1')?"啟用":""; ?><?php echo ($row["active"]=="0")?"停用":""; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo ($row["fb_id"]!="")?$row["fb_id"]:"未綁定"; ?></td>
            <td>
                <a class="pure-button" title="編輯" href="member/edit/<?PHP echo $row["id"]?>"><i class="icon-pencil"></i></a>
                <a class="pure-button" title="刪除" onclick="list_view.del('<?PHP echo $row['id']?>','<?PHP echo ADMIN_URL?>member/del')"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?PHP endforeach;?>
    </tbody>
</table>