<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<div class="right">
    <label class="pure-button notice">
        <span>匯入資料</span>
        <input type="file" name="new_data">
    </label>
</div>
<table class="pure-table pure-table-bordered" width="100%">
    <thead>
        <tr>
            <th width="50">發佈</th>
            <th width="180">產品代號</th>
            <th>商品名稱</th>
            <th width="130">金額</th>
            <th width="130">庫存單位</th>
            <th width="130">庫存數量</th>
            <th width="130"></th>
        </tr>
    </thead>
    <tbody class="ui-sortable">
        <?PHP foreach($rs as $row):?>
        <tr id="row_<?PHP echo $row["id"]?>">
            <td>
                <div>
                    <i value="<?PHP echo $row['id']?>" class="icon-move" ></i>
                    <input value="<?PHP echo $row["id"]?>" type="checkbox" <?PHP echo (@$row["publish"])?"checked":"" ?> onclick="list_view.publish($(this),'<?PHP echo ADMIN_URL.$this->data["controller_addr"];?>/publish/')">
                </div>
            </td>
            <td><?PHP echo $row["product_no"]?></td>
            <td><?PHP echo $row["title"]?></td>
            <td><?PHP echo $row["price"]?></td>
            <td><?PHP echo $row["unit_text"]?></td>
            <td><?PHP echo $row["count"]?></td>
            <td>
                <a class="pure-button" title="編輯" href="<?PHP echo ADMIN_URL.$this->data["controller_addr"];?>/edit/<?PHP echo $row["id"]?>"><i class="icon-pencil"></i></a>
                <a class="pure-button" title="刪除" onclick="list_view.del2('<?PHP echo $row['id']?>','<?php echo $row["pid"] ?>','<?PHP echo ADMIN_URL.$this->data["controller_addr"];?>/del')"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?PHP endforeach;?>
    </tbody>
</table>
<script type="text/javascript">
    $(function(){
        list_view.sort('<?PHP echo ADMIN_URL.$this->data["controller_addr"];?>/sort');
        $(".notice input").fileupload({
            change: function(e, data) {
                $(this).parent().append('<i class="icon-spinner icon-spin"></i>');
            },
            fileuploadsubmit: function(e, data) {},
            url:"<?php echo ADMIN_URL.$controller_addr; ?>/add_data/new_data",
            sequentialUploads: false,
            acceptFileTypes: /(\.|\/)(xls?x)$/i,
            dataType: 'text',
            done: function(e, data) {
                console.log(data);
                 $(this).parent().find(".icon-spinner").remove();
                 location.reload();
            },
            progressall: function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                console.log(progress);
                // $(this).next().find("span").html(progress + "%");
                // if (progress == 100) {
                //     $(this).next().html("");
                // }
            },
            dropZone: null
        });

    })
</script>