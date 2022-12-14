<?php

$postId = get_the_ID();
$postTitle = get_the_title();
$postDate = get_the_date('F j, Y');
$postUrl = get_permalink($postId);

if (get_the_post_thumbnail()) {
    $thumbnailUrl = get_the_post_thumbnail_url();
} else {
    $thumbnailUrl = get_site_url() . '/wp-content/themes/designdesk-child/assets/images/placeholder-square.jpg';
}

?>

<div class="dd-card post-card">
    <a href="<?php echo $postUrl ?>" class="card-link">
        <div class="dd-card__wraper">
            <div class="card-image">
                <img src="<?php echo $thumbnailUrl ?>" alt="<?php echo $postTitle ?>" title="<?php echo $postTitle ?>" width="280" height="330">
            </div>
            <div class="card-content">
                <div class="card-content__wraper">
                    <p class="card-title"><?php echo substrwords($postTitle, 60) ?></p>
                    <?php date_n_readTime($postDate, post_read_time()); ?>
                    <?php echo do_shortcode('[dd_link_with_icon link="'.$postUrl.'" link-title="Read More" style="2"]'); ?>
                </div>
            </div>
        </div>
    </a>
</div>