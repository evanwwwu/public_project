<?PHP echo $header?>
<body>
<div class="pure-g-r " id="layout">
	<?PHP echo $menu?>
	<div class="pure-u" id="main">
		<div class="content">
			<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
			<form class="pure-form">
            	<div class="right"><a onclick="change=0;" class="pure-button notice" href="<?PHP echo ADMIN_URL?>calendar/edit" title="新增">新增</a></div>
            </form>
            <form class="pure-form" id="search_frm">
                <select name="author">
                    <option value="0">不設定作者</option>
                    <?PHP foreach($data['authors'] as $author):?>
                    <option value="<?PHP echo $author['id']?>" <?PHP echo (isset($this->get['author']) and $this->get['author']==$author['id'])?"selected":"";?>><?PHP echo $author['display_name']?></option>
                    <?PHP endforeach;?>
                </select>
                <select name="tag" style="width:200px">
                    <option value="0">不設定標籤</option>
                    <?PHP foreach($data['tags'] as $tag):?>
                    <option value="<?PHP echo $tag['term_id']?>" <?PHP echo (isset($this->get['tag']) and $this->get['tag']==$tag['term_id'])?"selected":"";?>><?PHP echo $tag['name']?></option>
                    <?PHP endforeach;?>
                </select>
                <input type="text" id="search_date" name="search_date" placeholder="不設定日期" value="<?PHP echo (isset($this->get['search_date']))?$this->get['search_date']:"";?>">
                <input type="text" name="search_key" placeholder="不設定關鍵字" value="<?PHP echo (isset($this->get['search_key']))?$this->get['search_key']:"";?>">
                <button class="pure-button" type="submit" href="#" onclick="change=0;" title="搜尋">搜尋</button>
            </form>
            <br>
            <?PHP if ($data['pages']>1):?>
                <ul class="pure-paginator">

                        <li><a onclick="change=0;" class="pure-button double_prev"  href="<?PHP echo ADMIN_URL . 'calendar/?page=1'.$data["search_url"]?>">&#171;</a></li>
                        <li><a class="pure-button prev" href="#" onclick="change=0;age(0)" >&#60;</a></li>

                        <?PHP if($data['current']<=5 ):?>
                            <?PHP for($x=0,$i=1;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'calendar/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP elseif($data['current']>$data['pages']-5):?>

                            <?PHP for($x=0,$i=$data['pages']-9;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'calendar/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>

                        <?PHP else:?>
                            <?PHP for($x=0,$i=($data['current']-5);$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'calendar/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP endif;?>    

                    <li><a class="pure-button next" href="#" onclick="change=0;page(1)">&#62;</a></li>
                    <li><a onclick="change=0;" class="pure-button double_next" href="<?PHP echo ADMIN_URL . 'calendar/?page='.$data['pages'].$data["search_url"]?>">&#187;</a></li>
                </ul>
            <?PHP endif;?>
            <br>            
            <table class="pure-table pure-table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="5%">發佈</th>
                        <th>標題</th>
                        <th>時間</th>
                        <th>城市</th>
                        <th>作者</th>
                        <th>標籤</th>
                        <th width="200"></th>
                    </tr>
                </thead>
                <tbody>
                	<?PHP foreach($data['rs'] as $row):?>
                    <tr id="row_<?PHP echo $row['ID']?>">
                        <td>
                        	<div>
                            	<input type="checkbox" class="pulish" value="<?PHP echo $row['ID']?>" <?PHP echo ($row['post_status']=='publish')?'checked':'';?>  onclick="publish($(this))"><i class="icon-move"></i>
                            </div>
                        </td>
                        <td><a onclick="change=0;" href="<?PHP echo SITE_URL?>calendar/<?PHP echo $row['post_name']?>?preview=1" target="_blank" ><?PHP echo $row['post_title']?></a></td>
                        <td><?PHP echo substr($row['post_date'],0,16)?></td>
                        <td><a onclick="change=0;" href="<?PHP echo SITE_URL?>search?key=<?PHP echo $row['location']?>" target="_blank"><?PHP echo $row['location']?></a></td>
                        <td><?PHP if(isset($row['users'][0])):?><a onclick="change=0;" href="<?PHP echo SITE_URL?>search?key=<?PHP echo $row['users'][0]?>" target="_blank"><?PHP echo $row['users'][0]?></a><?PHP endif;?></td>

                        <td>
                            <?PHP foreach($row['terms'] as $key=>$term){
                                echo ($key==0)?'<a onclick="change=0;" href="'.SITE_URL.'search?key='.$term.'" target="_blank">'.$term.'</a>':',<a onclick="change=0;" href="'.SITE_URL.'search?key='.$term.'" target="_blank">'.$term.'</a>';
                            }
                            ?>
                        </td>

                        <td>
                        	<a onclick="change=0;" class="pure-button" title="編輯" href="<?PHP echo ADMIN_URL . 'calendar/edit/' .$row['ID']?>"><i class="icon-pencil"></i></a> 
                            <a onclick="change=0;" class="pure-button" title="照片" href="<?PHP echo ADMIN_URL . 'calendar/images/' .$row['ID']?>"><i class="icon-picture"></i></a> 
                            <a class="pure-button" title="刪除" onClick="change=0;del(<?PHP echo $row['ID']?>)"><i class="icon-trash"></i></a></td>
                    </tr>
                    <?PHP endforeach;?>
                </tbody>
            </table>
            <br>
            <?PHP if ($data['pages']>1):?>
                <ul class="pure-paginator">

                        <li><a onclick="change=0;" class="pure-button double_prev"  href="<?PHP echo ADMIN_URL . 'calendar/?page=1'.$data["search_url"]?>">&#171;</a></li>
                        <li><a class="pure-button prev" href="#" onclick="change=0;page(0)" >&#60;</a></li>

                        <?PHP if($data['current']<=5 ):?>
                            <?PHP for($x=0,$i=1;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'calendar/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP elseif($data['current']>$data['pages']-5):?>

                            <?PHP for($x=0,$i=$data['pages']-9;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'calendar/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP else:?>

                            <?PHP for($x=0,$i=($data['current']-5);$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'calendar/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP endif;?>    

                    <li><a class="pure-button next" href="#" onclick="change=0;page(1)">&#62;</a></li>
                    <li><a onclick="change=0;" class="pure-button double_next" href="<?PHP echo ADMIN_URL . 'calendar/?page='.$data['pages'].$data["search_url"]?>">&#187;</a></li>
                </ul>
            <?PHP endif;?>
		</div>
		<?PHP echo $footer?>
	</div>
</div>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<style>
.icon-move{visibility:hidden};
.ui-sortable-helper td{
}
.sortable-placeholder td{
	height:40px;
	background-color:#FF9;
}
.ui-widget{
  font-size:60%;
}
</style>
<script>
$(function(){
    $('#search_date').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat:"yy-mm-dd"
    });
})
function publish(obj){
	var q = "id="+obj.attr('value');
	if (obj.attr('checked')){
		q += "&publish=publish"
	}
	else{
		q += "&publish=unpublish"
	}
	$.post('<?PHP echo ADMIN_URL?>calendar/publish',q,null,'script');
}

function del(id){
	if (!confirm('Delete?')) return;
	$.post('<?PHP echo ADMIN_URL?>calendar/del','id='+id,null,'script');
}
function page(act){
    var cur = <?PHP echo $data['current']?>;
    var pages = <?PHP echo $data['pages']?>;
    var url = "";
    if(act=='1'){
        cur++;
        if(cur<pages){
            url = "<?PHP echo ADMIN_URL . 'calendar/?page="+cur+"'.$data["search_url"]?>";
        }
        else{
            url = "<?PHP echo ADMIN_URL . 'calendar/?page="+pages+"'.$data["search_url"]?>";
        }
    }
    else{
        cur--;
        if(cur>1){
            url = "<?PHP echo ADMIN_URL . 'calendar/?page="+cur+"'.$data["search_url"]?>";
        }
        else{
            url = "<?PHP echo ADMIN_URL . 'calendar/?page="+1+"'.$data["search_url"]?>";
        }

    }
    location = url;
}
</script>
</body>
</html>