<?php foreach($ProductList as $val){?>
	<a href="<?php echo SITE_URL?>shop/product_detial/<?=$val->Product_Id?>">
		<div class="col-lg-4 col-xs-12 text-center product-box">
			<img class="img-fluid" alt="<?=$val->Product_Name?>" src="<?php echo SITE_URL?>upload/<?=$val->Product_Picture?>" >
			<div class="product-en-name" ><?=$val->Product_EnName?></div>
			<div class="product-name" ><?=$val->Product_Name?></div>
			<div class="product-name" ><?=$val->Product_SubName?></div>
			<div class="product-line"></div>
			<div class="product-price" >$<?=$val->Product_Price?></div>
			<div class="text-center product-cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></div>
		</div>
	</a>
<?php }?>
