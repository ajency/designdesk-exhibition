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
    <a href="<?php echo $postUrl ?>" class="card-link" target="_blank">
        <div class="dd-card__wraper">
            <div class="card-image">
                <img src="<?php echo $thumbnailUrl ?>" alt="<?php echo $postTitle ?>" title="<?php echo $postTitle ?>" width="280" height="330">
            </div>
            <div class="card-content">
                <div class="card-content__wraper">
                    <p class="card-title"><?php echo substrwords($postTitle, 60) ?></p>
                    <p class="date"><?php echo $postDate ?></p>
                    <div class="link-with-icon">
                        <a href="<?php echo $postUrl ?>"  target="_blank">Read More</a>
                        <span class="icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.33594 12.667L10.0026 8.00033L5.33594 3.33366" stroke="#2471B5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>