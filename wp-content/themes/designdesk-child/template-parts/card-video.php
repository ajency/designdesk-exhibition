<?php
if (get_the_post_thumbnail()) {
    $thumbnailUrl = get_the_post_thumbnail_url();
} else {
    $thumbnailUrl = get_site_url() . '/wp-content/themes/designdesk-child/assets/images/placeholder-square.jpg';
}

$videoPopupId = get_the_ID();

if (get_field('video_title') == '') {
    $videoTitle = get_the_title();
} else {
    $videoTitle = get_field('video_title');
}
$videoId = get_field('youtube_embed_id');

$videoId = get_field('youtube_embed_id');

$videoPlayerId = get_the_ID();

?>

<div class="dd-card video-card dd-popupToggler" video-id="<?php echo $videoId ?>" player-id="player-<?php echo $videoPlayerId ?>"  target-popup="#<?php echo $videoPopupId ?>">
    <div class="dd-card__wraper">
        <div class="card-image">
            <img src="<?php echo  $thumbnailUrl  ?>" alt="<?php echo get_the_title() ?>" title="<?php echo get_the_title() ?>" width="280" height="330">
            <a class="play-button "></a>
        </div>
        <div class="card-content">
            <div class="card-content__wraper">
                <p class="card-title"><?php echo  substrwords($videoTitle, 60)  ?></p>
            </div>
        </div>
    </div>
</div>
<!-- popup -->
<div class="dd-popup video-popup" id="<?php echo $videoPopupId ?>">
    <div class="dd-popup__wraper">
        <div class="dd-popup-content">
            <div class="dd-popup-header">
                <span class="dd-close outside" onclick="stopYtPlayer(this)"></span>
            </div>
            <div class="dd-popup-body main-content">
                <div class="dd-popup-body__wraper">
                    <div id="player-<?php echo $videoPlayerId ?>"></div>
                </div>
            </div>
            <div class="dd-popup-footer">
            </div>
        </div>
    </div>
</div>