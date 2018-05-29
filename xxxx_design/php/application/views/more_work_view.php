
<?PHP foreach($works as $work):?>
<li class="item" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/work/post/'.$work['url']?>'">
	<img src="<?PHP echo IMG_URL?>upload/<?PHP echo $work['cover_img']?>" />
	<h1><span><?PHP echo $work['title'] ?></span></h1>
</li>
<?PHP endforeach;?>