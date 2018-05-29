<?PHP echo $header?>
<body>
<div class="pure-g-r " id="layout">
	<?PHP echo $menu?>
	<div class="pure-u" id="main">
		<div class="content">
			<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
			<form class="pure-form">
            	<div class="right"><a onclick="change=0;" class="pure-button notice" href="<?PHP echo ADMIN_URL?>member/edit" title="新增">新增</a></div>
            </form>
            <table class="pure-table pure-table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>EMAIL</th>
                        <th width="65"></th>
                    </tr>


                </thead>
                <tbody>
 
                </tbody>
                <?PHP 
    
                for($i = 0;$i<count($data);$i++){
        //<a onclick="change=0;" class="pure-button" title="編輯" href="'.ADMIN_URL.'member/edit/'.$data[$i]['id'].'"><i class="icon-pencil"></i></a>
                    $icon = '  <a class="pure-button" title="刪除" onClick="change=0;del('.$data[$i]['id'].')"><i class="icon-trash"></i></a>';
                    echo "<tr class=row_".$data[$i]['id']."><td>".$data[$i]['email']."</td><td>".$icon."</td></tr>";
                    }           
            ?>
            </table>
		</div>
		<?PHP echo $footer?>
	</div>
</div>
<style>
.icon-move{visibility:hidden};
.ui-sortable-helper td{
}
.sortable-placeholder td{
	height:40px;
	background-color:#FF9;
}
</style>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
function del(id){
	if (!confirm('Delete?')) return;
	$.post('<?PHP echo ADMIN_URL?>member/del','id='+id,null,'script');
}
</script>
</body>
</html>