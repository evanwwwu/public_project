<?PHP echo $header?>
<body>
<div class="pure-g-r " id="layout">
	<?PHP echo $menu?>
	<div class="pure-u" id="main">
		<div class="content">
			<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>


            <table class="pure-table pure-table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="5%">發佈</th>
                        <th>標題</th>
                    </tr>
                </thead>
                <tbody>
                	<?PHP foreach($data as $row):?>
                    <tr id="row_<?PHP echo $row['id']?>">
                        <td>
                        	<div>
                            	<input type="checkbox" class="pulish" value="<?PHP echo $row['id']?>" <?PHP echo ($row['publish']=='1')?'checked':'';?>  onclick="publish($(this))"><i class="icon-move"></i>
                            </div>
                        </td>
                        <td><?PHP echo $row['title']?></td>
                    </tr>
                    <?PHP endforeach;?>
                </tbody>
            </table>
            <br>
           
		</div>
		<?PHP echo $footer?>
	</div>
</div>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<style>
.icon-move{visibility:hidden;}
.ui-sortable-helper td{
}
.sortable-placeholder td{
	height:40px;
	background-color:#FF9;
}
.ui-widget{
  font-size:60%;
}
.res{display:none;}
</style>
<script>
$(function(){

         $('td div').hover(
            function(){
                $(this).find('.icon-move').css('visibility','visible');
            },
            function(){
                $(this).find('.icon-move').css('visibility','hidden');
            }
        );
        $('tbody').sortable({
            handle: ".icon-move" ,
            placeholder: "sortable-placeholder",
            start: function( event, ui ) {
                $('.sortable-placeholder').append('<td colspan="20">&nbsp;</td>')
            },
            stop: function( event, ui ) {
                var q ="";
                $('.pulish').each(function(index, element) {
                    q+='&id[]='+$(this).val();
                });
                $.post('<?PHP echo ADMIN_URL?>side/sort',q)
            }
        });    
})
function publish(obj){
	var q = "id="+obj.attr('value');
	if (obj.attr('checked')){
		q += "&publish=1"
	}
	else{
		q += "&publish=0"
	}
	$.post('<?PHP echo ADMIN_URL?>side/publish',q,null,'script');
}
</script>
</body>
</html>