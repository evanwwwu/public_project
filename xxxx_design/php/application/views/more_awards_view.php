
<?PHP foreach ($years as $year):?>
<div class="part">
    <div class="year">
        <div class="line"></div>
        <h3><?PHP echo $year['year']?></h3> 
    </div>
    <div class="content clearfix">

        <?PHP foreach($datas as $row):?>
        <?PHP if($year['year']==date('Y',strtotime($row['createdate']))):?>
        <div class="award">
            <div class="round">
                <div class="circle">
                    <script>head();</script>
                    <!-- HTML begins -->
                    <div class="element">
                        <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $row['cover_img']?>" width="147px"/>
                    </div>
                    <!-- HTML ends -->
                    <script>foot();</script>
                </div>
                <div class="circle_hover">
                    <script>head();</script>
                    <!-- HTML begins -->
                    <div class="element">
                        <?PHP foreach($row['works'] as $work1):?>
                        <img style="display:none"<?PHP echo (isset($work1['w_cover_img']))?'src="'.IMG_URL.'upload/'.$work1["w_cover_img"].'"':'' ?>width="147px"/>
                        <?PHP endforeach;?>
                    </div>
                    <!-- HTML ends -->
                    <script>foot();</script>
                </div>
            </div>
            <div class="detail">
                <p><?PHP echo $row['title']?></p>
                <p>
                    <?PHP foreach($row['works'] as $work2):?>
                    <span onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $work2['url']?>'"><?PHP echo $work2['w_title']?></span><br/>
                    <?PHP endforeach;?>
                </p>
            </div>
        </div>
        <?PHP endif;?>
        <?PHP endforeach;?>
    </div>
</div>
<?PHP endforeach;?>