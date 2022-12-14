<?php
    $postSlides = get_field('post_slides');
?>

<div class="alignfull">
    <div class="alignwide">
        <div class="dd-post-slider">
            <?php foreach($postSlides as $post): setup_postdata($post);
            
            $postTitle = get_the_title();
            $postDate = get_the_date('F j, Y');
            $postUrl = get_permalink();
            $postExcerpt = get_the_excerpt();

            if (get_the_post_thumbnail()) {
                $thumbnailUrl = get_the_post_thumbnail_url();
            } else {
                $thumbnailUrl = get_site_url() . '/wp-content/themes/designdesk-child/assets/images/placeholder-square.jpg';
            }

            ?>
                <div class="dd-post-slide">
                    <div class="dd-post-slide__wraper">
                        <div class="image-container">
                            <img src="<?php if($thumbnailUrl): echo $thumbnailUrl; else: echo site_url() . '/wp-content/themes/designdesk-child/assets/images/placeholder.jpg'; endif; ?>" alt="" title="" width="481" height="274">
                        </div>
                        <div class="details-container">
                            <p class="title hide-md-down"><?php echo substrwords($postTitle , 90); ?></p>
                            <p class="title hide-md-up"><?php echo substrwords($postTitle , 50); ?></p>
                            <p class="excerpt"><?php echo substrwords($postExcerpt , 175); ?></p>
                            <?php date_n_readTime($postDate, post_read_time()); ?>
                            <?php echo do_shortcode('[dd_link_with_icon link="'.$postUrl.'" link-title="Read More" style="2"]'); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>