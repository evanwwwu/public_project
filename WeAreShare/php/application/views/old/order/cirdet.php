<html>
<head>
<script type="text/javascript" src="<?PHP echo ADMIN_URL?>assets/old/js/jquery-1.7.2.min.js"></script>
</head>
<?php 
	$MerchantNumber = 	$_POST['Merchantnumber'];
	$OrderNumber 	= 	$_POST['OrderNumber'];
	$Amount 		= 	$_POST['Amount'];
	$OrgOrderNumber = 	$_POST['OrgOrderNumber'];
	
	$CheckValue = sha1($MerchantNumber.$pay_type_r_code.$Amount);
	$CheckValue = strtoupper($CheckValue);
?>
<form action="<?=$pay_type_url?>" method=post id="cash_api"> 
    
	<input type="hidden" name="web" value="<?=urlencode($MerchantNumber)?>" /> <!-- 1.商店代號-->
	<input type="hidden" name="MN" value="<?=$Amount?>" /> <!--2.*交易金額--> 
	<input type="hidden" name="OrderInfo" value="" /> <!--3.交易內容-->
	<input type="hidden" name="Td" value="<?=$OrderNumber?>" /> <!--4.商家訂單編號--> 
	<input type="hidden" name="sna" value="<?=urlencode($OrderData->Order_OName)?>" /> <!--5.消費者姓名-->
	<input type="hidden" name="sdt" value="<?=$OrderData->Order_OPhone?>" /> <!--6.消費者電話--> 
	<input type="hidden" name="email" value="<?=urlencode("f4080273@gmail.com")?>" /> <!--7.消費者Email--> 
	<input type="hidden" name="note1" value="<?=urlencode($OrderData->Order_Note)?>" /> <!--8.備註--> 
	<input type="hidden" name="note2" value="web" /> <!--9.備註-->
	<input type="hidden" name="Card_Type" value="" /> <!--10.交易類別-->
	<input type="hidden" name="Country_Type" value="" /> <!--11.語言類別-->
	<input type="hidden" name="Term " value="" /> <!--12.分期期數-->
	<input type="hidden" name="ChkValue" value="<?=$CheckValue?>" /> <!--13.交易檢查碼-->
</form>
<script>

$(document).ready(function() {  
	setTimeout(function(){$('#cash_api').submit();},0);
});

</script>