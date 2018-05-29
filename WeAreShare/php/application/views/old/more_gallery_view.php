
<?PHP $banner_count = 0;?>
<?PHP foreach($posts['data'] as $data):?>
	<?PHP if (isset($data['img_title'])):?>
		<?PHP $banner_count++;?>
	<?PHP else:?>
        <li>
            <a href="<?PHP echo SITE_URL . 'gallery/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>">
                <img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>">
                <p><?PHP echo $data['post_title'];?></p>
                <span><?PHP echo $data['display_date']?></span>
                <div class="overlay"></div>
            </a>
        </li>
	<?PHP endif;?>
<?PHP endforeach;?>
