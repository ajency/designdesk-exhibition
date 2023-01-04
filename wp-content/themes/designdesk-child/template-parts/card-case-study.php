<?php
$postTitle = get_the_title();
$postId = get_the_ID();
$postUrl = get_permalink($postId);
if (get_the_post_thumbnail()) {
    $thumbnailUrl = get_the_post_thumbnail_url();
} else {
    $thumbnailUrl = get_site_url() . '/wp-content/themes/designdesk-child/assets/images/placeholder-square.jpg';
}
?>

<!-- card -->
<div class="dd-card case-study-card">
    <a href="<?php echo $postUrl ?>" class="card-link">
        <div class="dd-card__wraper">
            <div class="card-image"><img src="<?php echo $thumbnailUrl ?>" alt="<?php echo the_title() ?>" title="<?php echo substrwords($postTitle, 60) ?>" width="280" height="330"></div>
            <div class="card-content">
                <div class="card-content__wraper">
                    <p class="card-title"><?php echo substrwords($postTitle, 60) ?></p>
                </div>
            </div>
        </div>
    </a>
</div>