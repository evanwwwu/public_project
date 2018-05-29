
<?PHP $banner_count = 0;?>
<?PHP foreach($posts['data'] as $data):?>
<?PHP if (isset($data['img_title'])):?>
<?PHP $banner_count++;?>
<li class="banner" id="<?PHP echo $data['id']?>">
	<a <?PHP echo ($data['link']!='')?"href='".SITE_URL . "adclick/?url=" . $data['link'] . "&ad=" . $data['id']."'":""?> target="_blank"><img src="<?PHP echo SITE_URL . 'upload/' . $data['img_title']?>" border="0"></a>
</li>
<?PHP else:?>
<li>
	<div class="img">
		<a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>" border="0"></a>
	</div>
	<div class="content">
		<span class="categories"><?PHP echo $data['tags'];?></span>
		<h2><a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo $data['display_title'];?></a></h2>
		<div class="post-info">
			<span><?PHP echo $data['display_date']?></span>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
		</div>
		<p>
			<?PHP echo $data['brief']?>
		</p>
		<a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
	</div>
	<div class="clear">
	</div>
</li>
<?PHP endif;?>
<?PHP endforeach;?>
