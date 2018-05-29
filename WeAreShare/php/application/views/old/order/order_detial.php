<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
	<?PHP
		//meta,js,css
  echo (isset($page_head))?$page_head:"";
  ?>
</head>
<body class="index">
    <?PHP
        //mobile menu
    echo (isset($menu_mobile))?$menu_mobile:"";
    ?>
    <div id="viewport">
        <div id="closeMask"></div>
        <div id="wrapper">
            <?PHP
            //page top
            echo (isset($page_top))?$page_top:"";
            ?>
            <?PHP
            //menu main
            echo (isset($menu_main))?$menu_main:"";
            ?>
            <div class="innerWrapper">
				<div class="col-lg-12 col-xs-12">
					訂單資料
				</div>
				<?if(isset($OrderData->Order_Id) && $OrderData->Order_Id != ""){?>
				<div class="col-lg-12 col-xs-12">
					<div class="row">
						<div class="col-lg-5 sopping-title" >商品詳情</div>
						<div class="col-lg-2 text-center sopping-title">單件價格</div>
						<div class="col-lg-2 text-center sopping-title">數量</div>
						<div class="col-lg-3 text-right sopping-title">小計</div>
					</div>
				<?foreach ($OrderDetial as $val){?>
					<div class="row shopping_cart" id="cart<?=$val->SC_Id?>">
						<div class="col-lg-5" >
							<img class="product_pic_70" src="<?php echo SITE_URL?>images/product/<?=$val->Product_Id?>/thumb150/<?=$val->Product_Picture?>" >
							<a href="<?php echo SITE_URL?>Shop/product_detial/<?=$val->Product_Id?>">
								<?=$val->Product_Name."-".$val->OD_Spec?>
							</a>
						</div>
						<div class="col-lg-2 text-center"><?=$val->OD_Price?></div>
						<div class="col-lg-2 text-center"><?=$val->OD_Num?></div>
						<div class="col-lg-3 text-right l-total" ><?="NT＄".$val->OD_Price*$val->OD_Num?></div>
					</div>
				<?}?>
				</div>
				<div class="col-lg-7 col-xs-12">
					<h2>送貨與付款方式</h2>
					<div class="form-group">
						<label for="">運送方式</label>
						<input readonly type="text" class="form-control repuire" value="<?echo (isset($OrderData->Delivery_Name))?$OrderData->Delivery_Name:"";?>">
					</div>
					<div class="form-group">
						<label for="">付款方式</label>
						<input readonly type="text" class="form-control repuire" value="<?echo (isset($OrderData->Pay_Name))?$OrderData->Pay_Name:"";?>">
					</div>
					<div class="form-group">
						<textarea readonly class="form-control" rows="3" name="o_content"><?echo (isset($OrderData->Pay_Content))?$OrderData->Pay_Content:"";?></textarea>
					</div>
					<?if($OrderData->Pay_RemitStatus == 1){?>
					
					<div class="col-lg-12 col-xs-12 text-center">
						<div class="form-group">
							<label for="">匯款日期</label>
							<input <?echo ($OrderData->Order_OrderStatus =="6")?"readonly":"";?> type="text" class="form-control" id="paydate" value="<?=$OrderData->Order_PayDate?>">
						</div>
						<div class="form-group">
							<label for="">匯款後五碼</label>
							<input <?echo ( $OrderData->Order_OrderStatus =="6")?"readonly":"";?> type="text" class="form-control repuire" id="paynumber" placeholder="" value="<?=$OrderData->Order_PayNumber?>">
						</div>
						<?if($OrderData->Order_OrderStatus !="6"){?>
						<a class="btn btn-primary" href="javascript:void(0)" onclick="rebackpay()">回填後五碼</a>
						<?}?>
					</div>
					
					<?}?>
					<h2>收貨人資料</h2>
					<div class="form-group">
						<label for="">收貨人姓名</label>
						<input readonly type="text" class="form-control repuire" id="o_name" name="o_name" placeholder="" value="<?echo (isset($OrderData->Order_OName))?$OrderData->Order_OName:"";?>">
					</div>
					<div class="form-group">
						<label for="">收貨人電話</label>
						<input readonly type="text" class="form-control repuire" id="o_phone" name="o_phone" placeholder="" value="<?echo (isset($OrderData->Order_OPhone))?$OrderData->Order_OPhone:"";?>">
					</div>
					<div class="form-group">
						<label for="">收貨人地址</label>
						<input readonly type="text" class="form-control repuire" id="o_address" name="o_address" placeholder="" value="<?echo (isset($OrderData->Order_OAddress))?$OrderData->Order_OAddress:"";?>">
					</div>
					<div class="form-group">
						<label>訂單備註</label>
						<textarea readonly class="form-control" rows="3" name="o_content"><?echo (isset($OrderData->Order_Note))?$OrderData->Order_Note:"";?></textarea>
					</div>
				</div>
				<div class="col-lg-5 col-xs-12">
					<div class="row">
					<div class="col-lg-4 col-xs-4 text-right">
						<div class="row">
							<div class="col-xs-12">小計</div>
							<div class="col-xs-12">運費</div>
							<div class="col-xs-12"><strong>合計</strong></div>
						</div>
					</div>
					<div class="col-lg-8 col-xs-8 text-right">
						<div class="row">
							<div class="col-xs-12">NT＄<span id="total"><?=$OrderData->Order_Money-$OrderData->Order_DeliveryPrice?></span></div>
							<div class="col-xs-12">NT＄<span id="deliveryprice"><?=$OrderData->Order_DeliveryPrice?></span></div>
							<div class="col-xs-12"><strong>NT＄<span id="alltotal"><?=$OrderData->Order_Money?></span></strong></div>
						</div>
					</div>
				</div>
				</div>
			<?}else{?>
				<div class="col-lg-12 col-xs-12 text-center">
					查無此訂單
				</div>
			<?}?>
			<?PHP
            //page footer
        	echo (isset($page_footer))?$page_footer:"";
			?>
            </div>
        </div>
       	</div>
        <!-- end profile form -->
        <?PHP echo $login_view;?>
        <script src="<?PHP echo SITE_URL?>assets/js/swipe.js"></script>
        <script src="<?PHP echo SITE_URL?>assets/js/main.js"></script>
        <script src="<?PHP echo SITE_URL?>assets/js/jquery.infinitescroll.js"></script>
        <script type="text/javascript" src="<?PHP echo SITE_URL?>ajax"></script>
        <script>
        $('#footer').removeClass('footerOpen');
        $(function(){
            site.changeFontSize();site.getRecommend("<?PHP echo SITE_URL?>article/recommend/<?PHP echo ($data['post_name'])?>");
        })
        </script>
    </body>
    </html>
<script>
$('#paydate').datepicker({format: 'yyyy-mm-dd',language: 'zh-TW'});
var lock=0;
function rebackpay(){
	if(lock == 0){
		lock = 1;
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "<?PHP echo SITE_URL?>order/reply_number",
			data:{
				'order_id':'<?=$OrderData->Order_Id?>',
				'order_paydate':$("#paydate").val(),
				'order_paynumber':$("#paynumber").val(),
			},
			success: function(data){
				if(data.Status != '0000')
				{
					lock=0;
					alert(data.Msg);
					return false;
				}else{
					alert("填寫成功");
					window.location.reload();
				}
			}
		});
	}
}
</script>