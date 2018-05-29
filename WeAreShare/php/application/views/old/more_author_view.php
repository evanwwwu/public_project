
<?PHP foreach($data['data'] as $data):?>
<li>
    <div class="img" style="width:190px;height:190px;float:left;">
        <a href="<?PHP echo SITE_URL . 'author/' . $data['display_name']?>"><img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>" border="0" hight="190" width="190"></a>
    </div>
    <div class="info">
     <a href="<?PHP echo SITE_URL . 'author/' . $data['display_name']?>">
        <h2><?PHP echo $data['display_name']?></h2>
    </a>
    <p><?PHP echo $data['brief']?></p>
    <a href="<?PHP echo SITE_URL . 'author/' . $data['display_name']?>" class="readMore">查看文章»</a>
</div>
</li>
<?PHP endforeach;?>