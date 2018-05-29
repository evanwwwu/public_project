<section>
    <article class="index">
        <div onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/work/post/'.@$work['url']?>'">
            <img src="<?PHP echo IMG_URL.'upload/'.file_core_name(@$work['filename'][0]). '_538x510.'. file_extension(@$work['filename'][0])?>" />
            <h1>
                <span><?PHP echo @$work['title']?></span>
                <div class="m"><span><?PHP echo @$work['type']?></span></div>
            </h1>                  
        </div>
        <div class="c" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1).'/work/post/'.@$work['url']?>'">
            <img src="<?PHP echo IMG_URL.'upload/'.file_core_name(@$work['filename'][1]). '_538x510.'. file_extension(@$work['filename'][1])?>" />
            <h1><span><?PHP echo @$work['type']?></span></h1>
        </div>
    </article>
</section>