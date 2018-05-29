
<?PHP foreach($years as $year):?>
<div class="part" year="<?PHP echo $year['year']?>">
    <div class="year c">
        <h1><span><?PHP echo $year['year']?></span></h1>
    </div>
    <div class="content clearfix">
        <?PHP foreach($datas as $row):?>
        <?PHP if($year['year']==date('Y',strtotime($row['createdate']))):?>
        <?PHP if($row['works']!=""):?>
        <?PHP foreach($row['works'] as $work):?>
        <div class="award">
            <a class="pic" href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $work['url']?>">
                <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $work['work_cover_img']?>" />
                <div class="hover" >
                    <div style="text-align: center;">
                        <?PHP foreach($work['award_title'] as $award):?>
                        <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $award['cover_img']?>" />
                        <?PHP endforeach;?>
                    </div>
                </div>
            </a>
            <div class="detail">
                <h2 onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $work['url']?>'"><?PHP echo $work['work_title']?></h2>
                <h3></h3>
                <?PHP foreach($work['award_title'] as $award):?>
                <p><?PHP echo $award['title']?></p>
                <?PHP endforeach;?>
            </div>
        </div>
        <?PHP endforeach;?>
        <?PHP endif;?>
        <?PHP endif;?>
        <?PHP endforeach;?>
    </div>
</div>
<?PHP endforeach;?>