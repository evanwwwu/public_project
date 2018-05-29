
<?PHP foreach($years as $year):?>
<div class="part" year="<?PHP echo $year['year']?>">
    <div class="year c">
        <h1><span><?PHP echo $year['year']?></span></h1>
    </div>
    <div class="content clearfix">
        <?PHP foreach($press as $row):?>
        <?PHP if($year['year']==date('Y',strtotime($row['createtime']))):?>
        <div class="book">
            <div onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/press/post/'.$row['url']?>'">
                <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $row['pic1']?>" />
                <div class="hover_info">
                    <p><span><?PHP echo $row['name']?></span><br /><span><?PHP echo $row['showdate']?></span></p>
                </div>
            </div>
            <p onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/press/post/'.$row['url']?>'">
                <span><?PHP echo $row['title']?></span><br /><span><?PHP echo $row['project']?></span>
            </p>
        </div>
        <?PHP endif;?>
        <?PHP endforeach;?>
    </div>
</div>
<?PHP endforeach;?>