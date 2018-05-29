<?PHP echo $header?>
<body>
<div class="pure-g-r " id="layout">
	<?PHP echo $menu?>
	<div class="pure-u" id="main">
		<div class="content">
			<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
            <form class="pure-form">
                <div class="right"><a class="pure-button notice" href="<?PHP echo ADMIN_URL?>banner/edit/<?PHP echo $this->get['type'] ?>" onclick="change=0;" title="新增">新增</a></div>
            </form>
            <form class="pure-form" id="search_frm">
                <input type="hidden" name="type" value="<?PHP echo $this->get['type'] ?>">
                <input class="date_box" type="text" id="search_start_date" name="search_start_date" placeholder="不設定開始日期" value="<?PHP echo (isset($this->get['search_start_date']))?$this->get['search_start_date']:"";?>">
                <input class="date_box" type="text" id="search_end_date" name="search_end_date" placeholder="不設定結束日期" value="<?PHP echo (isset($this->get['search_end_date']))?$this->get['search_end_date']:"";?>">  
                <input type="text" name="search_key" placeholder="不設定關鍵字" value="<?PHP echo (isset($this->get['search_key']))?$this->get['search_key']:"";?>">
                <button class="pure-button" type="submit" href="#" onclick="change=0;" title="搜尋">搜尋</button>
            </form>
            <br>
            <?PHP if ($data['pages']>1):?>
                <ul class="pure-paginator">

                        <li><a  onclick="change=0;" class="pure-button double_prev"  href="<?PHP echo ADMIN_URL . 'banner/?page=1'.$data["search_url"]?>">&#171;</a></li>
                        <li><a class="pure-button prev" href="#" onclick="change=0;page(0)" >&#60;</a></li>

                        <?PHP if($data['current']<=5 ):?>
                            <?PHP for($x=0,$i=1;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a  onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'banner/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP elseif($data['current']>$data['pages']-5):?>

                            <?PHP for($x=0,$i=$data['pages']-9;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a  onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'banner/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP else:?>

                            <?PHP for($x=0,$i=($data['current']-5);$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a  onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'banner/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP endif;?>    

                    <li><a class="pure-button next" href="#" onclick="change=0;page(1)">&#62;</a></li>
                    <li><a onclick="change=0;" class="pure-button double_next" href="<?PHP echo ADMIN_URL . 'banner/?page='.$data['pages'].$data["search_url"]?>">&#187;</a></li>
                </ul>
            <?PHP endif;?>
            <br>  
            <table class="pure-table pure-table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="5%">發佈</th>
                        <th class="res">常駐</th>
                        <th>圖片</th>
                        <th>標題</th>
                        <th>開始時間</th>
                        <th>結束時間</th>
                        <th width="200"></th>
                    </tr>
                </thead>
                <tbody>
                	<?PHP foreach($data['rs'] as $row):?>
                    <tr id="row_<?PHP echo $row['id']?>">
                        <td>
                        	<div>
                            	<input type="checkbox" class="pulish" value="<?PHP echo $row['id']?>" <?PHP echo ($row['publish']=='1')?'checked':'';?>  onclick="publish($(this))"><i class="icon-move"></i>
                            </div>
                        </td>
                        <td  class="res">
                            <div>
                                <input type="checkbox" class="res" value="<?PHP echo $row['id']?>" <?PHP echo ($row['first']=='1')?'checked':'';?>  onclick="first($(this))">
                            </div>
                        </td>
                        <td valign="top"><img src="<?PHP echo SITE_URL . 'upload/' . $row['img_title']?>" style="max-height:150px; "></td>
                        <td><?PHP echo $row['banner_title']?></td>
                        <td><?PHP echo substr($row['date_start'],0,16)?></td>
                        <td><?PHP echo substr($row['date_end'],0,16)?></td>
                        <td>
                            <a onclick="change=0;" class="pure-button" title="編輯" href="<?PHP echo ADMIN_URL . 'banner/edit/'.$this->get['type'].'/' .$row['id']?>"><i class="icon-pencil"></i></a>
                            <a onclick="change=0;" class="pure-button" title="記錄" href="<?PHP echo ADMIN_URL . 'banner/record/'.$this->get['type'].'/' .$row['id']?>"><i class="icon-bar-chart"></i></a> 
                            <a  class="pure-button" title="刪除" onClick="change=0;del(<?PHP echo $row['id']?>)"><i class="icon-trash"></i></a></td>
                    </tr>
                    <?PHP endforeach;?>
                </tbody>
            </table>
            <br>
            <?PHP if ($data['pages']>1):?>
                <ul class="pure-paginator">

                        <li><a  onclick="change=0;" class="pure-button double_prev"  href="<?PHP echo ADMIN_URL . 'banner/?page=1'.$data["search_url"]?>">&#171;</a></li>
                        <li><a class="pure-button prev" href="#" onclick="change=0;page(0)" >&#60;</a></li>

                        <?PHP if($data['current']<=5 ):?>
                            <?PHP for($x=0,$i=1;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'banner/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP elseif($data['current']>$data['pages']-5):?>

                            <?PHP for($x=0,$i=$data['pages']-9;$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a  onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'banner/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>

                        <?PHP else:?>

                            <?PHP for($x=0,$i=($data['current']-5);$i<=$data['pages']&&$x<10;$i++,$x++):?>
                            <li><a onclick="change=0;" class="pure-button <?PHP echo ($i==$data['current'])?"pure-button-active":""?>" href="<?PHP echo ADMIN_URL . 'banner/?page='.$i.$data["search_url"]?>"><?PHP echo $i;?></a></li>
                            <?PHP endfor;?>
                        <?PHP endif;?>    

                    <li><a class="pure-button next" href="#" onclick="change=0;page(1)">&#62;</a></li>
                    <li><a onclick="change=0;" class="pure-button double_next" href="<?PHP echo ADMIN_URL . 'banner/?page='.$data['pages'].$data["search_url"]?>">&#187;</a></li>
                </ul>
            <?PHP endif;?>  
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
    $('.date_box').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat:"yy-mm-dd"
    });
    $('.date_box').change(function(){
        if($("#search_start_date").val()!="" && $("#search_ned_date").val()!=""){
            var  start =  new  Date($("#search_start_date").val());
            var  end =  new  Date($("#search_end_date").val());
            if((end-start)<0){
                alert("開始時間不可大於結束時間");
                $(this).val("");
            }
        }    
    });
    if(<?PHP echo $this->get['type'] ?>=="5"){
        $(".res").show(); 
    }

    if(<?PHP echo $this->get['type'] ?>=="2"){ 
        $('td div').hover(
            function(){
                $(this).find('.icon-move').css('visibility','visible');
            },
            function(){
                $(this).find('.icon-move').css('visibility','hidden');
            }
        )
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
                $.post('<?PHP echo ADMIN_URL?>banner/sort',q)
            }
        });
    }    
})
function publish(obj){
	var q = "id="+obj.attr('value');
	if (obj.attr('checked')){
		q += "&publish=1"
	}
	else{
		q += "&publish=0"
	}
	$.post('<?PHP echo ADMIN_URL?>banner/publish',q,null,'script');
}
function first(obj){
    var q = "id="+obj.attr('value');
    if (obj.attr('checked')){
        q += "&first=1"
    }
    else{
        q += "&first=0"
    }
    $.post('<?PHP echo ADMIN_URL?>banner/first',q,null,'script');
}
function del(id){
	if (!confirm('Delete?')) return;
	$.post('<?PHP echo ADMIN_URL?>banner/del','id='+id,null,'script');
}
function page(act){
    var cur = <?PHP echo $data['current']?>;
    var pages = <?PHP echo $data['pages']?>;
    var url = "";
    if(act=='1'){
        cur++;
        if(cur<pages){
            url = "<?PHP echo ADMIN_URL . 'banner/?page="+cur+"'.$data["search_url"]?>";
        }
        else{
            url = "<?PHP echo ADMIN_URL . 'banner/?page="+pages+"'.$data["search_url"]?>";
        }
    }
    else{
        cur--;
        if(cur>1){
            url = "<?PHP echo ADMIN_URL . 'banner/?page="+cur+"'.$data["search_url"]?>";
        }
        else{
            url = "<?PHP echo ADMIN_URL . 'banner/?page="+1+"'.$data["search_url"]?>";
        }

    }
    location = url;
}
</script>
</body>
</html>