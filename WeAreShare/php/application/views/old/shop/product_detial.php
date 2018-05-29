<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
	<?php
		//meta,js,css
  echo (isset($page_head))?$page_head:"";
  ?>
</head>
<body class="index">
    <?php
        //mobile menu
    echo (isset($menu_mobile))?$menu_mobile:"";
    ?>
    <div id="viewport">
        <div id="closeMask"></div>
        <div id="wrapper">
            <?php
            //page top
            echo (isset($page_top))?$page_top:"";
            ?>
            <?php
            //menu main
            echo (isset($menu_main))?$menu_main:"";
            ?>
            <div class="innerWrapper">
              	<?php if(isset($ProductDetial->Product_Id) && $ProductDetial->Product_Id!=""){?>
              		<div class="col-lg-12 col-xs-12" >
              			<input type="hidden" id="p_id" value="<?=$ProductDetial->Product_Id?>" >
              			<div class="row text-center">
              				<img style="max-height:550px;width:auto;" alt="<?=$ProductDetial->Product_Name?>" src="<?php  SITE_URL?>upload/<?=$ProductDetial->Product_Picture?>">
              			</div>
              			<div class="col-lg-12 col-xs-12">
              				<?=$ProductDetial->Product_Name?>
              			</div>
              			<div class="row">
              				<div class="col-lg-6 col-xs-6">
              					<div class="col-lg-12 col-xs-12"><?=$ProductDetial->Product_Price?>$</div>
              					<div class="col-lg-12 col-xs-12">
              						<select class="form-control" id="spec" >             						
              							<?php foreach($ProductDetial->Product_Spec as $val){?>
              							<option value="<?=$val->Specification_Id?>"><?=$val->Specification_Name?>　<?=($val->Specification_Inventory!=0)?"庫存:".$val->Specification_Inventory:"無庫存";?></option>
              							<?php }?>
              						</select>
              					</div>
              					<div class="col-lg-12 col-xs-12">
              						<?php 
              							$spec = $ProductDetial->Product_Spec;
              							foreach($ProductDetial->Product_Spec as $val){
              						?>
              						<select class="form-control num <? ($spec[0]->Specification_Id == $val->Specification_Id)?"show-select-num":"hide-select";?>" id="num<?=$val->Specification_Id?>">
   										<option value="0">請選擇數量</option>
              							<?php 
              								for($x=1;$x<=10;$x++){
              									if($x<=$val->Specification_Inventory){
              							?>
              							<option value="<?=$x?>"><?=$x?></option>
              							<?php }}?>
              						</select>
              						<?php }?>
								</div>
              				</div>
              				<div class="col-lg-6 col-xs-6">
              					<div class="col-lg-12 col-xs-12">
              						<div class="row">
              							<a class="btn btn-default shop_add" data-mothd="add" >加購物車</a>
              						</div>
              					</div>
              					<div class="col-lg-12 col-xs-12">
              						<div class="row">
              							<a class="btn btn-default shop_add" data-mothd="buy" >直接購買</a>
              						</div>
              					</div>
              				</div>
              				<div class="col-lg-12 col-xs-12 text-center">
              					商品詳情
              				</div>
              				<div class="col-lg-12 col-xs-12">
              					<?=$ProductDetial->Product_Detial?>
              				</div>
              			</div>
              		</div>
              	<?php }?>
			</div>
			<?php
            //page footer
        	echo (isset($page_footer))?$page_footer:"";
			?>
            </div>
        </div>
        <!-- end profile form -->
        <?php echo $login_view;?>
        <script src="<?php echo SITE_URL?>assets/old/js/swipe.js"></script>
        <script src="<?php echo SITE_URL?>assets/old/js/main.js"></script>
        <script src="<?php echo SITE_URL?>assets/old/js/jquery.infinitescroll.js"></script>
        <script type="text/javascript" src="<?php echo SITE_URL?>ajax"></script>
        <script>
        $('#footer').removeClass('footerOpen');
        $(function(){
            site.changeFontSize();site.getRecommend("<?php echo SITE_URL?>shop/recommend/<?php echo ($data['post_name'])?>");
        })
        </script>
    </body>
    </html>
<script>
$( "#spec" ).on( "change", function() {
	$(".num").hide();
	$("#num"+$(this).val()).show();
});
$( ".shop_add" ).on( "click", function() {
	var btn = $(this);
	if($("#spec").val()==0){
		alert("請選擇規格");
		$('#spec').focus();
		return false;	
	}
	if($("#num"+$("#spec").val()).val()==0){
		alert("請輸入數量");
		$('#num').focus();
		return false;	
	}else if(isNaN($("#num"+$("#spec").val()).val())){
		alert("數量為數字格式");
		return false
	}else{
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "<?php echo SITE_URL?>order/shop_add",
			data:{
				'p_id'	:$('#p_id').val(),
				'num'	:$("#num"+$("#spec").val()).val(),
				'spec'	:$('#spec').val()
			},
			success: function(data){
				if(data.Status != '0000')
				{
					alert(data.Msg);
					if(data.Status == '0202'){
				      var windowHeight = $(window).height();
				      $('body').css({
				        height: windowHeight,
				        overflow: 'hidden'
				      });
				      $('#logIn').fadeIn();
				      $('#overlay').fadeIn();
					}
					return false;
				}else{
					alert('加入成功! \n 如需結帳請至"我的購物車"，謝謝!');
					switch(btn.attr("data-mothd")){
						case "add":
							return false;
						break;
						case "buy":
							location.assign("<?php echo SITE_URL?>order/shopping");
							return false;
						break;
					}
					
				}
			}
		});
	}
});
</script>