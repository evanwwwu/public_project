<?PHP foreach ($members as $row):?>
<div class="item">
    <div class="circle">
        <script>head();</script>
        <!-- HTML begins -->
        <div class="element">
            <img src="<?PHP echo IMG_URL?>upload/<?PHP echo $row['cover_img']?>" width="147px"/>
        </div>
        <!-- HTML ends -->
        <script>foot();</script>
    </div>
    <div class="detail">
        <p><?PHP echo $row['name']?></p>
        <p><span><?PHP echo $row['profession']?></span></p>
        <div>
            <?PHP echo $row['content']?>
        </div>
        <div class="line"></div>
    </div>
</div>
<?PHP endforeach;?>