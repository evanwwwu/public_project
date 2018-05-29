
<?PHP foreach ($members as $row):?>
<li class="item">
    <div class="pic"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $row['cover_img']?>" /></div>
    <div class="m">
        <h2><?PHP echo $row['name']?></h2>
        <h4><?PHP echo $row['profession']?></h4>
    </div>
    <div class="detail">
        <h2><?PHP echo $row['name']?></h2>
        <h4><?PHP echo $row['profession']?></h4>
        <?PHP echo $row['content']?>
    </div>
</li>
<?PHP endforeach;?>