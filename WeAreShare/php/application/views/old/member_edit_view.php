<?PHP echo $header?>
<body>
<div class="pure-g-r " id="layout">
	<?PHP echo $menu?>
	<div class="pure-u" id="main">
		<div class="content">
			<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2;?></h2>
            <?PHP $info = json_decode($data['info'],true); ?>
            <form id="frm" class="pure-form pure-form-stacked">

				<input type="hidden" id="deleteimg" name="deleteimg" value="0">
              <div style="">
<!--                       <div style="display:inline-block;"><button type="submit" class="pure-button notice">SAVE</button></div>
                    <div style="display:inline-block;"><a title="DELETE" class="pure-button error" onclick="del(<?PHP echo $data['id']?>)" >DELETE</a></div> -->
                    <div style="display:inline-block;"><a href="<?PHP echo ADMIN_URL?>member" class="pure-button">BACK</a></div>
                </div>
                <div style="clear:both"></div>
                <label></label>
                <hr>
				<label>EMAIL</label>
				<input id="username" name="username" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $data['email']?>">

				<label>密碼</label>
				<input id="userpwd" name="userpwd" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $data['pwd']?>">

                <label>姓</label>
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['last_name']?>">

				<label>名字</label>
				<input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['first_name']?>">

                <label>電話</label>
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['mobile']?>">

                <label>郵政區號</label>
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['zipcode']?>">

                <label>地址</label>
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['country']?>">
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['province']?>">
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['city']?>">
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['area']?>">
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['address']?>">
                <label>性別</label>
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['gender']?>">
                <label>生日</label>
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['birth']?>">
                <label>學歷</label>
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['edu']?>">      
                <label>職業</label>
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['job']?>">       
                <label>訂購狀態</label>
                <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $info['epaper']?>">                
             
			</form> 
		</div>
		<?PHP echo $footer?>
	</div>
</div>
<script>
var id = "<?php echo $data['id'] ?>";
$(function(){
	
	// $("input[value='<?php echo $data['active']?>']").attr("checked","true");


    $('#frm').ajaxForm({
        beforeSubmit:function(){change=0;},
        url: '<?PHP echo ADMIN_URL?>member/save/'+id,
        type: 'post',
        dataType: 'script'
    });
})

function checkform(){
        var username = $("input[name='username']").val();
        var password = $("input[name='userpwd']").val();
        // var active = $("input[name='active']:checked").val();
        var display_name = $("input[name='display_name']").val();
        if(username!=null&password!=null&display_name!=null&$("input[name='userpwd2']").val()!=null){
            
            if($("input[name='userpwd2']").val()!=password){
                alert("請確認兩次密碼都相同");
                $("input[name='userpwd2']").val("");
                $("input[name='userpwd']").val("");
                return false;
            }

         }
        else{
            alert("請確實填寫欄位!!");
            return false;
        }

}
function del(id){
  if (!confirm('Delete?')) return;
  $.post('<?PHP echo ADMIN_URL?>member/del/0','id='+id,function(){
    location = '<?PHP echo ADMIN_URL?>member';
  },'script');
}
 </script> 
</body>
</html>