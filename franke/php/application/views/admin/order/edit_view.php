<h2 class="content-subhead" id="stacked-form">訂單編號 - <span id="ContentPlaceHolder1_lbl_title">編輯</span></h2>
<form id="frm" class="pure-form pure-form-stacked">
    <div style="">
        <div style="display: inline-block;">
            <button type="submit" class="pure-button notice">儲存</button>
        </div>
        <div style="display: inline-block;">
            <a href="<?PHP echo ADMIN_URL?>order" class="pure-button">回上頁</a>
        </div>
    </div>
    <hr>

    <label>訂單編號</label>
    <span><?PHP echo $row["order_no"]?></span>
    <input type="hidden" name="order_no" value="<?PHP echo $row["order_no"]; ?>">
    <label>建單日期</label>
    <span><?PHP echo $row["createtime"]?></span>

    <label>訂單狀態</label>
    <select name="status">
        <option value="未處理" <?PHP echo (@$row["status"]=="未處理")?"selected":""?>>未處理</option>
        <option value="已連絡" <?PHP echo (@$row["status"]=="已連絡")?"selected":""?>>已連絡</option>
        <option value="準備出貨" <?PHP echo (@$row["status"]=="準備出貨")?"selected":""?>>準備出貨</option>
        <option value="出貨完成" <?PHP echo (@$row["status"]=="出貨完成")?"selected":""?>>出貨完成</option>
        <option value="訂單取消" <?PHP echo (@$row["status"]=="訂單取消")?"selected":""?>>訂單取消</option>
    </select>
    <div class="member_div">
        <?PHP $member = json_decode($row["member"]); ?>    
        <h3>人員資料</h3>
        <label>姓名</label>
        <span><?PHP echo urldecode($member->username);?></span>
        <label>連絡電話</label>
        <span><?PHP echo $member->phone;?></span>
        <label>身份</label>
        <span><?PHP echo urldecode($member->identity)?></span>
        <label>電子信箱</label>
        <span><?PHP echo $member->email?></span>
    </div>

    <label>總金額</label>
    <h4>NT <?PHP echo $row["total_amount"]?></h4>

    <label>訂購商品</label>
    <?PHP $products = json_decode($row["products"]); ?>
    <table class="pure-table pure-table-bordered">
        <thead>
            <tr>
                <th class="col01">類別</th>
                <th class="col02">項目</th>
                <th class="col03" width="200">產品名</th>
                <th class="col04" width="400">配件選購項目</th>
                <th class="col05">數量</th>
                <th class="col05">總金額</th>
            </tr>
        </thead>
        <?PHP if (count(@$products)>0): ?>
        <?PHP foreach ($products as $key => $pp): ?>
        <tr class="cart_product">
            <td><?PHP echo $this->order_model->product_main($pp->options->main_id); ?></td>

            <td class="pic">
                <img width="100" src="<?PHP echo IMG_URL;?>upload/<?PHP echo $pp->options->cover_img ?>">
            </td>
            <td class="col03">
                <div><?PHP echo urldecode($pp->options->product_no);?></div>
                <div class="name"><?PHP echo urldecode($pp->name); ?></div>
                <div class="p_price">NT$ <?PHP echo @$pp->options->site_price ?></div>
            </td>
            <td class="col04">
                <?PHP foreach (json_decode(urldecode($pp->options->parts)) as $s => $part): ?>
                <div class="accessory">
                    <span class="a_name"><?PHP echo urldecode($part->p_name) ?></span>
                    <span class="a_price"><?PHP echo ($part->p_price=="0")?"-Free-":"NT$ ".$part->p_price;?></span>
                </div>
                <?PHP endforeach; ?>
            </td>
            <td class="col05">
                <p>1</p>
            </td>
            <td class="col06">
                <p class="price">NT$ <?PHP echo $pp->price ?></p>
            </td>
        </tr>
        <?PHP endforeach; ?>
        <?PHP endif; ?>
    </table>
    <label>詢問商品</label>
    <?PHP foreach (json_decode($row["msg_product"]) as $s=>$ms): ?>
    <?PHP echo ($s!=0)?",":"" ?><span><?PHP echo str_replace("+"," ",urldecode(@$ms)); ?></span>
    <?PHP endforeach; ?>
    <label>產品提問</label>
    <div style="border:1px solid #202020;padding:10px;word-wrap: break-word;"><?PHP echo @$row["message"]; ?></div>
    <label>備註</label>                           
    <textarea id="comment" name="comment" rows="10" cols="97"><?PHP echo @$row["comment"]?></textarea> 

</form>
<script>
$(function () {
    edit_view.form_set($('#frm'),"<?PHP echo ADMIN_URL?>order/save/<?PHP echo @$row['id']?>",null);
})
</script>
<style type="text/css">
.member_div{
    margin-top: 30px;
    border:1px solid #000;
    padding:0px 10px 10px;
}
</style>