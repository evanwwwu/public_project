<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css">
    <script src="<?php echo ADMIN_URL?>assets/js/jquery-1.7.2.min.js"></script>
    <script src="<?php echo ADMIN_URL?>assets/js/jquery-ui-1.8.16.custom.min.js"></script>
    <script src="<?php echo ADMIN_URL?>assets/js/jquery-ui-timepicker-addon.js"></script>
</head>
<body class="recommend">
    <div class="pure-g-r " id="layout">
       <div class="pure-u" id="main">
          <div class="content">
            <div style="display:<?php echo ($type == 'post') ? '' : 'none'?>">
                <form class="pure-form" id="search_frm">
                    <select name="author">
                        <option value="0">不設定作者</option>
                        <?php foreach ($data['authors'] as $author):?>
                        <option value="<?php echo $author['id']?>" <?php echo (isset($this->get['author']) and $this->get['author'] == $author['id']) ? 'selected' : ''; ?>><?php echo $author['display_name']?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="tag">
                        <option value="0">不設定類別/標籤</option>
                        <?php foreach ($data['tags'] as $tag):?>
                        <option value="<?php echo $tag['term_id']?>" <?php echo (isset($this->get['tag']) and $this->get['tag'] == $tag['term_id']) ? 'selected' : ''; ?>><?php echo $tag['name']?></option>
                        <?php endforeach; ?>
                    </select> 
                    <input type="text" id="search_date" name="search_date" placeholder="不設定日期" value="<?php echo (isset($this->get['search_date'])) ? $this->get['search_date'] : ''; ?>">             
                    <input type="text" name="search_key" placeholder="不設定關鍵字" value="<?php echo (isset($this->get['search_key'])) ? $this->get['search_key'] : ''; ?>">
                    <button onclick="change=0;" class="pure-button" type="submit" href="#" title="搜尋">搜尋</button>
                </form>
            </div>

            <div style="display:<?php echo ($type == 'event') ? '' : 'none'?>">
                <form class="pure-form" id="search_frm">
                    <select name="author">
                        <option value="0">不設定作者</option>
                        <?php foreach ($data['authors'] as $author):?>
                        <option value="<?php echo $author['id']?>" <?php echo (isset($this->get['author']) and $this->get['author'] == $author['id']) ? 'selected' : ''; ?>><?php echo $author['display_name']?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="tag">
                        <option value="0">不設定類別/標籤</option>
                        <?php foreach ($data['tags'] as $tag):?>
                        <option value="<?php echo $tag['term_id']?>" <?php echo (isset($this->get['tag']) and $this->get['tag'] == $tag['term_id']) ? 'selected' : ''; ?>><?php echo $tag['name']?></option>
                        <?php endforeach; ?>
                    </select> 
                    <input type="text" id="search_date" name="search_date" placeholder="不設定日期" value="<?php echo (isset($this->get['search_date'])) ? $this->get['search_date'] : ''; ?>">             
                    <input type="text" name="search_key" placeholder="不設定關鍵字" value="<?php echo (isset($this->get['search_key'])) ? $this->get['search_key'] : ''; ?>">
                    <button onclick="change=0;" class="pure-button" type="submit" href="#" title="搜尋">搜尋</button>
                </form>
            </div>   

            <div style="display:<?php echo ($type == 'people') ? '' : 'none'?>">
                <form class="pure-form" id="search_frm">
                    <select name="a_z">
                        <option value="0">不設定字母</option>
                        <?php foreach ($a_z as $a_z):?>
                        <?php echo '<option value="'.$a_z.'"'?><?php echo (isset($this->get['a_z']) and $this->get['a_z'] == $a_z) ? 'selected' : ''; ?>><?php echo $a_z?></option> ?>
                        <?php endforeach; ?>
                    </select>

                    <select name="west">
                        <option value="0">不設定東/西</option>
                        <?php echo '<option value="west"'?><?php echo (isset($this->get['west']) and $this->get['west'] == 'west') ? 'selected' : ''; ?>>西方</option> ?>
                        <?php echo '<option value="east"'?><?php echo (isset($this->get['west']) and $this->get['west'] == 'east') ? 'selected' : ''; ?>>東方</option> ?>
                    </select>
                    <select name="tag">
                        <option value="0">不設定類別/標籤</option>
                        <?php foreach ($data['tags'] as $tag):?>
                        <option value="<?php echo $tag['term_id']?>" <?php echo (isset($this->get['tag']) and $this->get['tag'] == $tag['term_id']) ? 'selected' : ''; ?>><?php echo $tag['name']?></option>
                        <?php endforeach; ?>
                    </select>  
                    <input type="text" id="search_date" name="search_date" placeholder="不設定日期" value="<?php echo (isset($this->get['search_date'])) ? $this->get['search_date'] : ''; ?>">             
                    <input type="text" name="search_key" placeholder="不設定關鍵字" value="<?php echo (isset($this->get['search_key'])) ? $this->get['search_key'] : ''; ?>">
                    <button onclick="change=0;" class="pure-button" type="submit" href="#" title="搜尋">搜尋</button>
                </form>
            </div>  

            <div style="display:<?php echo ($type == 'brand') ? '' : 'none'?>">
                <form class="pure-form" id="search_frm">
                    <select name="a_z">
                        <option value="0">不設定字母</option>
                        <?php foreach ($a_z2 as $a_z):?>
                        <?php echo '<option value="'.$a_z.'"'?><?php echo (isset($this->get['a_z']) and $this->get['a_z'] == $a_z) ? 'selected' : ''; ?>><?php echo $a_z?></option> ?>
                        <?php endforeach; ?>
                    </select>
                    <select name="tag">
                        <option value="0">不設定類別/標籤</option>
                        <?php foreach ($data['tags'] as $tag):?>
                        <option value="<?php echo $tag['term_id']?>" <?php echo (isset($this->get['tag']) and $this->get['tag'] == $tag['term_id']) ? 'selected' : ''; ?>><?php echo $tag['name']?></option>
                        <?php endforeach; ?>
                    </select>  
                    <input type="text" name="search_key" placeholder="不設定關鍵字" value="<?php echo (isset($this->get['search_key'])) ? $this->get['search_key'] : ''; ?>">
                    <button onclick="change=0;" class="pure-button" type="submit" href="#" title="搜尋">搜尋</button>
                </form>
            </div>
            <div style="display:<?php echo ($type == 'calendar') ? '' : 'none'?>">
                <form class="pure-form" id="search_frm">
                    <select name="author">
                        <option value="0">不設定作者</option>
                        <?php foreach ($data['authors'] as $author):?>
                        <option value="<?php echo $author['id']?>" <?php echo (isset($this->get['author']) and $this->get['author'] == $author['id']) ? 'selected' : ''; ?>><?php echo $author['display_name']?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="tag">
                        <option value="0">不設定類別/標籤</option>
                        <?php foreach ($data['tags'] as $tag):?>
                        <option value="<?php echo $tag['term_id']?>" <?php echo (isset($this->get['tag']) and $this->get['tag'] == $tag['term_id']) ? 'selected' : ''; ?>><?php echo $tag['name']?></option>
                        <?php endforeach; ?>
                    </select> 
                    <input type="text" id="search_date" name="search_date" placeholder="不設定日期" value="<?php echo (isset($this->get['search_date'])) ? $this->get['search_date'] : ''; ?>">             
                    <input type="text" name="search_key" placeholder="不設定關鍵字" value="<?php echo (isset($this->get['search_key'])) ? $this->get['search_key'] : ''; ?>">
                    <button onclick="change=0;" class="pure-button" type="submit" href="#" title="搜尋">搜尋</button>
                </form>
            </div>
            <br>  
            <?php if ($data['pages'] > 1):?>
            <ul class="pure-paginator">

                <li><a onclick="change=0;" class="pure-button double_prev"  href="<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page=1'.$data['search_url']?>">&#171;</a></li>
                <li><a  class="pure-button prev" href="#" onclick="change=0;page(0)" >&#60;</a></li>
                <?php if ($data['current'] <= 5):?>
                <?php for ($x = 0, $i = 1; $i <= $data['pages'] && $x < 10; $i++, $x++):?>
                <li><a onclick="change=0;" class="pure-button <?php echo ($i == $data['current']) ? 'pure-button-active' : ''?>" href="<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page='.$i.$data['search_url']?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <?php elseif ($data['current'] > $data['pages'] - 5):?>

                <?php for ($x = 0, $i = $data['pages'] - 9; $i <= $data['pages'] && $x < 10; $i++, $x++):?>
                <li><a onclick="change=0;" class="pure-button <?php echo ($i == $data['current']) ? 'pure-button-active' : ''?>" href="<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page='.$i.$data['search_url']?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <?php else:?>

                <?php for ($x = 0, $i = ($data['current'] - 5); $i <= $data['pages'] && $x < 10; $i++, $x++):?>
                <li><a onclick="change=0;" class="pure-button <?php echo ($i == $data['current']) ? 'pure-button-active' : ''?>" href="<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page='.$i.$data['search_url']?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <?php endif; ?>    

                <li><a class="pure-button next" href="#" onclick="change=0;page(1)">&#62;</a></li>
                <li><a onclick="change=0;" class="pure-button double_next" href="<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page='.$data['pages'].$data['search_url']?>">&#187;</a></li>
            </ul>
            <?php endif; ?>
            <br>  
            <table class="pure-table pure-table-bordered" width="100%" style="display:<?php echo ($type == 'post') ? '' : 'none'?>"> 
                <thead>
                    <tr>
                        <th width="5%">推薦</th>
                        <th>標題</th>
                        <th>類別</th>
                        <th>作者</th>
                        <th>標籤</th>
                        <th>時間</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach ($data['rs'] as $row):?>
                    <tr id="row_<?php echo $row['ID']?>">
                        <td>
                        	<div>
                               <input type="checkbox" class="rec" value="<?php echo $row['ID']?>" <?php  foreach ($recs_id as $val) {
    echo ($row['ID'] == $val['rec_id']) ? 'checked' : '';
}?>  onclick="rec($(this))"><i class="icon-move"></i>
                           </div>
                       </td>
                       <td><?php echo $row['post_title']?></td>
                       <td><?php echo $row['tags']?></td>
                       <td><?php if (isset($row['users'][0])):?><?php echo $row['users'][0]?><?php endif; ?></td>
                       <td><?php echo $row['terms']?></td>
                       <td><?php echo substr($row['post_date'], 0, 16)?></td>
                   </tr>
                   <?php endforeach; ?>
               </tbody>
           </table>  

           <table class="pure-table pure-table-bordered" width="100%" style="display:<?php echo ($type == 'event') ? '' : 'none'?>"> 
            <thead>
                <tr>
                    <th width="5%">推薦</th>
                    <th>標題</th>
                    <th>時間</th>                        
                    <th>作者</th>
                    <th>標籤</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['rs'] as $row):?>
                <tr id="row_<?php echo $row['ID']?>">
                    <td>
                        <div>
                            <input type="checkbox" class="rec" value="<?php echo $row['ID']?>" <?php  foreach ($recs_id as $val) {
    echo ($row['ID'] == $val['rec_id']) ? 'checked' : '';
}?>  onclick="rec($(this))"><i class="icon-move"></i>
                        </div>
                    </td>
                    <td><?php echo $row['post_title']?></td>
                    <td><?php echo substr($row['post_date'], 0, 16)?></td>
                    <td><?php if (isset($row['users'][0])):?><?php echo $row['users'][0]?><?php endif; ?></td>
                    <td><?php echo $row['terms']?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  
           <table class="pure-table pure-table-bordered" width="100%" style="display:<?php echo ($type == 'calendar') ? '' : 'none'?>"> 
            <thead>
                <tr>
                    <th width="5%">推薦</th>
                    <th>標題</th>
                    <th>時間</th>                        
                    <th>作者</th>
                    <th>標籤</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['rs'] as $row):?>
                <tr id="row_<?php echo $row['ID']?>">
                    <td>
                        <div>
                            <input type="checkbox" class="rec" value="<?php echo $row['ID']?>" <?php  foreach ($recs_id as $val) {
    echo ($row['ID'] == $val['rec_id']) ? 'checked' : '';
}?>  onclick="rec($(this))"><i class="icon-move"></i>
                        </div>
                    </td>
                    <td><?php echo $row['post_title']?></td>
                    <td><?php echo substr($row['post_date'], 0, 16)?></td>
                    <td><?php if (isset($row['users'][0])):?><?php echo $row['users'][0]?><?php endif; ?></td>
                    <td><?php echo $row['terms']?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  

        <table class="pure-table pure-table-bordered" width="100%" style="display:<?php echo ($type == 'people') ? '' : 'none'?>"> 
            <thead>
                <tr>
                    <th width="5%">推薦</th>
                    <th>名稱 - 分類</th>
                    <th>東方 / 西方</th>
                    <th>標題</th>
                    <th>標籤</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['rs'] as $row):?>
                <tr id="row_<?php echo $row['ID']?>">
                    <td>
                        <div>
                            <input type="checkbox" class="rec" value="<?php echo $row['ID']?>" <?php  foreach ($recs_id as $val) {
    echo ($row['ID'] == $val['rec_id']) ? 'checked' : '';
}?>  onclick="rec($(this))"><i class="icon-move"></i>
                        </div>
                    </td>
                    <td><?php echo $row['letter']?></td>
                    <td><?php echo ($row['locale'] == 'west') ? '西方' : '東方'?></td>
                    <td><?php echo $row['post_title']?></td>
                    <td><?php echo $row['terms']?></td>
                    <?php endforeach; ?>
                </tbody>
            </table>  

            <table class="pure-table pure-table-bordered" width="100%" style="display:<?php echo ($type == 'brand') ? '' : 'none'?>"> 
                <thead>
                    <tr>
                        <th width="5%">推薦</th>
                        <th>名稱 - 分類</th>
                        <th>標題</th>
                        <th>標籤</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['rs'] as $row):?>
                    <tr id="row_<?php echo $row['ID']?>">
                        <td>
                            <div>
                                <input type="checkbox" class="rec" value="<?php echo $row['ID']?>" <?php  foreach ($recs_id as $val) {
    echo ($row['ID'] == $val['rec_id']) ? 'checked' : '';
}?>  onclick="rec($(this))"><i class="icon-move"></i>
                            </div>
                        </td>
                        <td><?php echo $row['letter']?></td>
                        <td><?php echo $row['post_title']?></td>
                        <td><?php echo $row['terms']?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <br>
            <?php if ($data['pages'] > 1):?>
            <ul class="pure-paginator">

                <li><a onclick="change=0;" class="pure-button double_prev"  href="<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page=1'.$data['search_url']?>">&#171;</a></li>
                <li><a class="pure-button prev" href="#" onclick="change=0;page(0)" >&#60;</a></li>
                <?php if ($data['current'] <= 5):?>
                <?php for ($x = 0, $i = 1; $i <= $data['pages'] && $x < 10; $i++, $x++):?>
                <li><a onclick="change=0;" class="pure-button <?php echo ($i == $data['current']) ? 'pure-button-active' : ''?>" href="<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page='.$i.$data['search_url']?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <?php elseif ($data['current'] > $data['pages'] - 5):?>

                <?php for ($x = 0, $i = $data['pages'] - 9; $i <= $data['pages'] && $x < 10; $i++, $x++):?>
                <li><a onclick="change=0;" class="pure-button <?php echo ($i == $data['current']) ? 'pure-button-active' : ''?>" href="<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page='.$i.$data['search_url']?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <?php else:?>

                <?php for ($x = 0, $i = ($data['current'] - 5); $i <= $data['pages'] && $x < 10; $i++, $x++):?>
                <li><a onclick="change=0;" class="pure-button <?php echo ($i == $data['current']) ? 'pure-button-active' : ''?>" href="<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page='.$i.$data['search_url']?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <?php endif; ?>    

                <li><a class="pure-button next" href="#" onclick="change=0;page(1)">&#62;</a></li>
                <li><a onclick="change=0;" class="pure-button double_next" href="<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page='.$data['pages'].$data['search_url']?>">&#187;</a></li>
            </ul>
            <?php endif; ?>
        </div>
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
.recommend{
    margin-top:20px; 
    margin-left:20px;  
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
function rec(obj){
	var url = "<?php echo ADMIN_URL?>recommend/addrec/<?php echo $us_id?>/"+obj.attr('value');
	if (obj.attr('checked')){
		url += "/1";
	}
	else{
		url += "/0";
	}
	$.post(url,null,function(){
        if (window.opener){
            try{
                window.opener.rec_updata();
            }
            catch(e){

            }
        }
    },'script');
}

function del(id){
	if (!confirm('Delete?')) return;
	$.post('<?php echo ADMIN_URL?>posts/del','id='+id,null,'script');
}
function page(act){
    var cur = <?php echo $data['current']?>;
    var pages = <?php echo $data['pages']?>;
    var url = "";
    if(act=='1'){
        cur++;
        if(cur<pages){
            url = "<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page="+cur+"'.$data['search_url']?>";
        }
        else{
            url = "<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page="+pages+"'.$data['search_url']?>";
        }
    }
    else{
        cur--;
        if(cur>1){
            url = "<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page="+cur+"'.$data['search_url']?>";
        }
        else{
            url = "<?php echo ADMIN_URL.'recommend/'.$type.'/'.$us_id.'?page="+1+"'.$data['search_url']?>";
        }

    }
    location = url;
}
</script>
</body>
</html>