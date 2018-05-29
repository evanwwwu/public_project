<section>
    <form method="post" id="car_form" action="<?PHP echo SITE_URL;?>checkout/step02">
        <input type="hidden" name="step" value="sp01">
        <article class="wrap main type02">
            <div class="breadcrumb noline">
                <p>
                    <a href="<?PHP echo SITE_URL; ?>">HOME</a>
                    >
                    <a>考慮選單</a>
                </p>
            </div>
            <div class="part">
                <div class="steps_block">
                    <div class="step01 active">
                        <h3>我的考慮選單</h3>
                        <div class="mask"></div>
                        <div class="bg"></div>
                    </div>
                    <div class="step02">
                        <h3>基本資料填寫</h3>
                        <div class="bg"></div>
                    </div>
                    <div class="step03">
                        <h3>謝謝您的洽詢!</h3>
                        <div class="mask"></div>
                        <div class="bg"></div>
                    </div>
                </div>
                <div class="mylist s1">
                    <div class="part">
                        <div class="content">
                            <div class="cart s1">
                                <ul>
                                    <li class="cart_title">
                                        <div class="col01">類別</div>
                                        <div class="col02">項目</div>
                                        <div class="col03">產品名</div>
                                        <div class="col04">配件選購項目</div>
                                        <div class="col05">數量</div>
                                        <div class="col06">總計</div>
                                        <div class="col07">移除</div>
                                    </li>
                                    <?PHP foreach ($rs as $key => $row): ?>
                                    <li class="cart_product" data-id="<?PHP echo $row["rowid"] ?>">
                                        <div class="col01"><p><?PHP echo $this->order_model->product_main($row["options"]["main_id"]); ?></p></div>
                                        <div class="col02" onclick="location='<?PHP echo SITE_URL; ?>product/<?PHP echo $this->order_model->get_url($row["options"]["main_id"]); ?>/detail/<?PHP echo $row["id"]; ?>';">
                                            <div class="pic">
                                                <img src="<?PHP echo IMG_URL;?>upload/<?PHP echo $row["options"]["cover_img"] ?>">
                                            </div>
                                        </div>
                                        <div class="col03" onclick="location='<?PHP echo SITE_URL; ?>product/<?PHP echo $this->order_model->get_url($row["options"]["main_id"]); ?>/detail/<?PHP echo $row["id"]; ?>';">
                                            <p class="model"><?PHP echo urldecode($row["options"]["product_no"]) ?></p>
                                            <p class="name"><?PHP echo urldecode($row["name"]) ?></p>
                                            <p class="p_price">NT$ <?PHP echo @$row["options"]["site_price"] ?></p>
                                        </div>
                                        <div class="col04">
                                            <?PHP foreach (json_decode(urldecode($row["options"]["parts"])) as $pp => $part): ?>
                                            <div class="accessory">
                                                <div class="line"></div>
                                                <p>
                                                    <span class="a_name"><?PHP echo $part->p_name ?></span>
                                                    <span class="a_price"><?PHP echo ($part->p_price=="0")?"-Free-":"NT$ ".$part->p_price;?></span>
                                                </p>
                                            </div>
                                            <?PHP endforeach; ?>
                                        </div>
                                        <div class="col05">
                                            <p>1</p>
                                        </div>
                                        <div class="col06">
                                            <p class="price">NT$ <?PHP echo $row["price"] ?></p>
                                        </div>
                                        <div class="col07">
                                            <div class="remove" onclick="remove_cart('<?PHP echo SITE_URL; ?>ajax/remove_cart','<?PHP echo $row['rowid'] ?>','<?PHP echo $row["price"]; ?>',$(this))"><img src="<?PHP echo ASSETS_URL; ?>images/cart_xx.png" /></div>
                                        </div>
                                    </li>
                                    <?PHP endforeach; ?>
                                </ul>
                                <div class="total">
                                    <h3>TOTAL<span class="amount">NT$<span class="cart_total_price"><?PHP echo $total; ?></span></span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="pro_qa">
                            <h1>針對產品提問<span>如有其他的疑問，請連結至<a href="<?PHP echo SITE_URL;?>contact">【聯絡我們】</a></span></h1>
                            <?PHP foreach ($rs as $pp => $row): ?>
                            <label class="check mylist_check" data-id="<?PHP echo $row["rowid"] ?>">
                                <input type="checkbox" name="pro[]" value="<?PHP echo $row["options"]["product_no"]; ?>"><?PHP echo urldecode($row["options"]["product_no"]);?>
                            </label>
                            <?PHP endforeach; ?>
                            <label>
                                <textarea name="content"></textarea>
                            </label>
                        </div>
                        <div class="btn_part">
                            <button type="button"><a href="<?PHP echo SITE_URL;?>">返回購物</a></button>
                            <button><a>下一步</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </form>
</section>
<script type="text/javascript">
    $(function(){
        $("#car_form").submit(function(){
            if($(".cart_product").length<=0){
                alert("請先選擇商品!");
                return false;
            }
        });
    });
</script>