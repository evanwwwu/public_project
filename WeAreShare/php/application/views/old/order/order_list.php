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
            	<?if(count($OrderList) > 0){?>
            		<div class="col-lg-12 col-xs-12 order-list-title">
            			<div class="">
            				<div class="col-lg-2 col-xs-2 text-center">訂單編號</div>
            				<div class="col-lg-2 col-xs-2 text-center">商品數量</div>
            				<div class="col-lg-2 col-xs-2 text-center">訂單金額</div>
            				<div class="col-lg-2 col-xs-2 text-center">訂單狀態</div>
            				<div class="col-lg-2 col-xs-2 text-center">成立時間</div>
            				<div class="col-lg-2 col-xs-2 text-center">訂單詳細</div>
            			</div>
           			</div>
           			<?foreach ($OrderList as $val){?>
           			<div class="col-lg-12 col-xs-12 order-list">
            			<div class="order-list-box">
            				<div class="col-lg-2 col-xs-12 text-center">
            					<lable class="pull-left">訂單編號:</lable>
            					<a href="<?PHP echo SITE_URL?>order/order_detial/<?=$val->Order_Id?>"><?=$val->Order_OrderId?></a>
            				</div>
            				<div class="col-lg-2 col-xs-12 text-center"><lable class="pull-left">訂單編號:</lable><?=$val->Order_Num?></div>
            				<div class="col-lg-2 col-xs-12 text-center"><lable class="pull-left">商品數量:</lable><?=$val->Order_Money?></div>
            				<div class="col-lg-2 col-xs-12 text-center"><lable class="pull-left">訂單金額:</lable><?=$val->OrderStatus_Name?></div>
            				<div class="col-lg-2 col-xs-12 text-center"><lable class="pull-left">成立時間:</lable><?=$val->Order_TimeAdd?></div>
            				<div class="col-lg-2 col-xs-12 text-center"><lable class="pull-left">訂單詳細:</lable><a class="btn btn-default" href="<?PHP echo SITE_URL?>order/order_detial/<?=$val->Order_Id?>">查看</a></div>
            			</div>
           			</div>
           			<?}?>
            	<?}else{?>
            		<div class="col-lg-12 col-xs-12">目前尚無訂單</div>
            	<?}?>
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

</script>