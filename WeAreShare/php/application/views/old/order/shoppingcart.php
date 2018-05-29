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
            	<form action="<?PHP echo SITE_URL?>order/order_add" method="post" id="order_form" enctype="multipart/form-data">
				<div class="col-lg-12 col-xs-12">
					<div class="row">訂單結帳</div>
				</div>
				<div class="col-lg-12 col-xs-12">
					訂單資料
				</div>
				<?if(count($SCData['SCData'])>0){?>
				<div class="col-lg-12 col-xs-12">
					<div class="row">
						<div class="col-lg-5 sopping-title" >商品詳情</div>
						<div class="col-lg-2 text-center sopping-title">單件價格</div>
						<div class="col-lg-2 text-center sopping-title">數量</div>
						<div class="col-lg-3 text-right sopping-title">小計</div>
					</div>
				<?foreach ($SCData['SCData'] as $val){?>
					<div class="row shopping_cart" id="cart<?=$val->SC_Id?>">
						<div class="col-lg-5" >
							<img class="product_pic_70" src="<?php echo SITE_URL?>images/product/<?=$val->Product_Id?>/thumb150/<?=$val->Product_Picture?>" >
							<a href="<?php echo SITE_URL?>Shop/product_detial/<?=$val->Product_Id?>">
								<?=$val->Product_Name."-".$val->Specification_Name?>
							</a>
						</div>
						<div class="col-lg-2 text-center"><?=$val->Product_Price?></div>
						<div class="col-lg-2 text-center">
							<select class="form-control cart_num" data-cartid="<?=$val->SC_Id?>" data-price="<?=$val->Product_Price?>">
								<?
									for($x=1;$x<=10;$x++){
									if($x<=$val->Specification_Inventory){
								?>
									<option value="<?=$x?>" <?echo ($x==$val->SC_Num)?"selected":"";?> ><?=$x?></option>
								<?}}?>	
							</select>
						</div>
						<div class="col-lg-3 text-right l-total" id="total<?=$val->SC_Id?>" data-total="<?=$val->Product_Price*$val->SC_Num?>"><?="NT＄".$val->Product_Price*$val->SC_Num?></div>
					</div>
					<div class="col-lg-12 col-xs-12"><div class="row text-right"><a class="del_cart" data-cartid="<?=$val->SC_Id?>" href="javascript:void(0)">刪除</a></div></div>
				<?}?>
				</div>
				<div class="col-lg-7 col-xs-12">
					<h2>送貨與付款方式</h2>
					<div class="form-group">
						<label for="">運送方式</label>
						<select class="form-control delivery" name="delivery">
						<?foreach ($DeliveryList as $val){?>
							<option 
									value="<?=$val->Delivery_Id?>" 
									data-power ="<?=$val->Delivery_Power?>"
									data-cost  ="<?=$val->Delivery_Cost?>"
									data-nocost="<?=$val->Delivery_NoCost?>"
									>
									<?=$val->Delivery_Name?> 運費$<?=$val->Delivery_Cost?> 免運$<?=$val->Delivery_NoCost?>
							</option>
						<?}?>	
						</select>
					</div>
					<div class="form-group">
						<label for="">付款方式</label>
						<select class="form-control" name="pay">
						<?
							$x=0;
						 	$Power = explode(",",$DeliveryList[0]->Delivery_Power);
							foreach ($PayList as $val){
						?>
							<option class="opt-pay <?echo (in_array($val->Pay_Id,$Power))?"":"hide-select";?>" 
									value="<?=$val->Pay_Id?>" 
									id="pay<?=$val->Pay_Id?>"
									<?if($x==0&&in_array($val->Pay_Id,$Power)==true){echo "selected";$x++;}?>
									><?=$val->Pay_Name?></option>
						<?}?>	
						</select>
					</div>
					<h2>購買人資料</h2>
					<input type="hidden" name="member_id" value="<?echo (isset($MemberData->id))?$MemberData->id:"";?>">
					<div class="form-group">
						<label for="">購買人姓名</label>
						<input type="text" class="form-control repuire" id="b_name" name="b_name" placeholder="" value="<?echo (isset($MemberData->b_name))?$MemberData->b_name:"";?>">
					</div>
					<div class="form-group">
						<label for="">購買人電話</label>
						<input type="text" class="form-control repuire" id="b_phone" name="b_phone"  placeholder="" value="<?echo (isset($MemberData->b_phone))?$MemberData->b_phone:"";?>">
					</div>
					<div class="form-group">
						<label for="">購買人地址</label>
						<input type="text" class="form-control repuire" id="b_address" name="b_address" placeholder="" value="<?echo (isset($MemberData->b_address))?$MemberData->b_address:"";?>">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" id="pas_o">　同訂購人
						</label>
					</div>
					<h2>收貨人資料</h2>
					<div class="form-group">
						<label for="">收貨人姓名</label>
						<input type="text" class="form-control repuire" id="o_name" name="o_name" placeholder="">
					</div>
					<div class="form-group">
						<label for="">收貨人電話</label>
						<input type="text" class="form-control repuire" id="o_phone" name="o_phone" placeholder="">
					</div>
					<div class="form-group">
						<label for="">收貨人地址</label>
						<input type="text" class="form-control repuire" id="o_address" name="o_address" placeholder="">
					</div>
					<div class="form-group">
						<label>訂單備註</label>
						<textarea class="form-control" rows="3" name="o_content"></textarea>
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
							<div class="col-xs-12">NT＄<span id="total"><?=$SCData['Total']?></span></div>
							<div class="col-xs-12">NT＄<span id="deliveryprice"><?=$SCData['DeliveryPrice']?></span></div>
							<div class="col-xs-12"><strong>NT＄<span id="alltotal"><?=$SCData['Total']+$SCData['DeliveryPrice']?></span></strong></div>
						</div>
					</div>
					<div class="col-lg-12 col-xs-12 text-right">
						<div class="checkbox">
							<label>
								<input class="sure" type="checkbox">我同意<a href="#">服務條款</a>和<a href="#">退換貨政策</a>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="changem" value="1" checked>同步訂購人資料至會員資料
							</label>
						</div>
						<a class="btn btn-primary" href="javascript:void(0)" onclick="submit()">訂單結帳</a>
					</div>
				</div>
				</div>
			<?}else{?>
				<div class="col-lg-12 col-xs-12 text-center">
					購物車目前無商品
				</div>
			<?}?>
			<?PHP
            //page footer
        	echo (isset($page_footer))?$page_footer:"";
			?>
			</form>
            </div>
        </div>
       	</div>
        <!-- end profile form -->
        <?PHP echo $login_view;?>
        <script src="<?PHP echo SITE_URL?>assets/old/js/swipe.js"></script>
        <script src="<?PHP echo SITE_URL?>assets/old/js/main.js"></script>
        <script src="<?PHP echo SITE_URL?>assets/old/js/jquery.infinitescroll.js"></script>
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
//計算總金額
var total = 0;
$(".l-total").each(function(){
	total = total + Number($(this).attr("data-total"));
});
//計算運費
var cost = Number($( ".delivery option:selected").attr("data-cost"));
var nocost = Number($( ".delivery option:selected").attr("data-nocost"));

if(total<nocost){
	//單運費
	$("#deliveryprice").text(cost);
	//含運費
	$("#alltotal").text(total+cost);
	//更改小計
	$("#total").text(total);
}

$( "#pas_o" ).on( "change", function() {
	if($(this).prop("checked")){
		$("#o_name").val( $("#b_name").val() );
		$("#o_phone").val( $("#b_phone").val() );
		$("#o_address").val( $("#b_address").val() );
	}else{
		$("#o_name").val("");
		$("#o_phone").val("");
		$("#o_address").val("");
	}
});
$( ".delivery" ).on( "change", function() {
	//計算總金額
	var total = 0;
	$(".l-total").each(function(){
		total = total + Number($(this).attr("data-total"));
	});
	//計算運費
	var cost = Number($( ".delivery option:selected").attr("data-cost"));
	var nocost = Number($( ".delivery option:selected").attr("data-nocost"));
	if(total<nocost){
		//單運費
		$("#deliveryprice").text(cost);
		//含運費
		$("#alltotal").text(total+cost);
		
	}
	
	//付款方式
	var str = $( ".delivery option:selected").attr("data-power")
	var delivery = str.split(",");
	var x=0;
	$(".opt-pay").hide();
	for(var key in delivery){
		$("#pay"+delivery[key]).show();
		if(x == 0)
		{
			$("#pay"+delivery[key]).prop("selected", true);
		}
		x++;
	}
	
});
function submit(){
	var x=0;
	var lock=0;
	$(".repuire").each(function(){
	    if($(this).val()==""){
		    if(x==0){
			    $(this).focus();
			    alert("請填齊資料");
			}
		    lock=1;
			x++;
		}
	});
	if($(".sure").prop("checked") == false){
		lock=1;
		$(".sure").focus();
	    alert("請勾選服務條款和退換貨政策");
	}
	if(lock==0){
		$("#order_form").submit();
	}
}
//刪除購物車
$( ".del_cart" ).on( "click", function() {
	var cart = this;
	$.ajax({
		type: "POST",
		dataType: 'json',
		url: "<?PHP echo SITE_URL?>order/shop_del",
		data:{
			'cartid':$(cart).attr("data-cartid")
		},
		success: function(data){
			if(data.Status != '0000')
			{
				alert(data.Msg);
				return false;
			}else{
				alert('刪除成功!');
				$(cart).remove();
				$("#cart"+$(cart).attr("data-cartid")).remove();
				delivery();
			}
		}
	});
});
//更換數量
$( ".cart_num" ).on( "change", function() {
	var num = this;
	$.ajax({
		type: "POST",
		dataType: 'json',
		url: "<?PHP echo SITE_URL?>order/shop_change",
		data:{
			'cartid':$(num).attr("data-cartid"),
			'num':$(num).val(),
		},
		success: function(data){
			if(data.Status != '0000')
			{
				alert(data.Msg);
				return false;
			}else{
				$("#total"+$(num).attr("data-cartid")).attr("data-total",Number($(num).val())*Number($(num).attr("data-price")) );
				$("#total"+$(num).attr("data-cartid")).text("NT＄"+Number($(num).val())*Number($(num).attr("data-price")) );
				delivery();
			}
		}
	});
});
function delivery(){
	//計算總金額
	var total = 0;
	$(".l-total").each(function(){
		total = total + Number($(this).attr("data-total"));
	});
	if(total==0)
	{
		//購物車內無商品
		window.location.reload();
	}
	//計算運費
	var cost = Number($( ".delivery option:selected").attr("data-cost"));
	var nocost = Number($( ".delivery option:selected").attr("data-nocost"));
	
	if(total<nocost){
		//單運費
		$("#deliveryprice").text(cost);
		//含運費
		$("#alltotal").text(total+cost);
		//更改小計
		$("#total").text(total);
	}
}
</script>