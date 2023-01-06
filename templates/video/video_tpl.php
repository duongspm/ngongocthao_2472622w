<div class="title-main"><span><?=@$titleMain?></span></div>
<div class="content-main form-row">
    <?php if(!empty($video)) { foreach($video as $k => $v) { ?>
    <div class="video col-12 col-md-6 col-lg-6 col-xl-6" data-fancybox="video" data-src="<?=$v['link_video']?>">
        <h3 class="video-name text-split"><?=$v['name'.$lang]?></h3>
        <div class="video-image scale-img">
            <?=$func->getImage(['class' => 'lazy w-100', 'size-error' => '480x360x1', 'url' => 'https://img.youtube.com/vi/'.$func->getYoutube($v['link_video']).'/0.jpg', 'alt' => $v['name'.$lang]])?>
        </div>
    </div>
    <?php } } else { ?>
    <div class="col-12">
        <div class="alert alert-warning w-100" role="alert">
            <strong><?=khongtimthayketqua?></strong>
        </div>
    </div>
    <?php } ?>
    <div class="clear"></div>
    <div class="col-12">
        <div class="pagination-home w-100"><?=(!empty($paging)) ? $paging : ''?></div>
    </div>
</div>