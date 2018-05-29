<?foreach ($VideoList as $val){?>
<a href="<?PHP echo SITE_URL?>video/video_detial/<?=$val->Video_Id?>" alt="<?=$val->Video_Name?>">
	<div class="col-lg-4 col-xs-12">
		<div class="row">
			<div class="video-pic">
				<img src="<?PHP echo SITE_URL?>/images/video/<?=$val->Video_Id?>/<?=$val->Video_Picture?>" alt="<?=$val->Video_Name?>">
			</div>
			<div class="col-lg-12 col-xs-12" class="video-name">
				<p ><?=$val->Video_Name?></p>
			</div>
		</div>
	</div>
</a>
<?}?>