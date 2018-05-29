<?PHP foreach ($cart as $key => $row): ?>
<?PHP $product_no = $row["options"]["product_no"]; ?>
<?PHP $parts = json_decode(urldecode($row["options"]["parts"])); ?>
<li class="cart_product" data-id="<?PHP echo $row["rowid"] ?>">
    <div onclick="location='<?PHP echo SITE_URL; ?>product/<?PHP echo $this->order_model->get_url($row["options"]["main_id"]); ?>/detail/<?PHP echo $row["id"]; ?>';" class="pic"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $row["options"]["cover_img"] ?>"></div>
    <div onclick="location='<?PHP echo SITE_URL; ?>product/<?PHP echo $this->order_model->get_url($row["options"]["main_id"]); ?>/detail/<?PHP echo $row["id"]; ?>';" class="w1">
        <p class="model"><?PHP echo urldecode($product_no); ?></p>
        <p class="name"><?PHP echo urldecode($row["name"]); ?></p>
    </div>
    <div class="w2">
        <p>配件</p>
        <?PHP foreach ($parts as $key => $part): ?>
        <div class="accessory">
            <div class="line"></div>
            <p>
                <span class="a_name"><?PHP echo urldecode($part->p_name) ?></span>
                <span class="a_price"><?PHP echo ($part->p_price=="0")?"-Free-":"NT$ ".$part->p_price ?></span>
            </p>
        </div>
        <?PHP endforeach; ?>
    </div>
    <div class="w3">
        <p>總價</p>
        <p class="price">NT$ <span class="total_price"><?PHP echo $row["price"] ?></span></p>
    </div>
    <div>
        <button type="button" onclick="remove_cart('<?PHP echo SITE_URL; ?>ajax/remove_cart','<?PHP echo $row['rowid'] ?>','<?PHP echo $row["price"]; ?>',$(this))">移除</button>
    </div>
</li>
<?PHP endforeach; ?>