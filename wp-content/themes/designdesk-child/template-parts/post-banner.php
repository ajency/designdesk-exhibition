<?php
    $banner_image_array = get_field( "post_banner_image" );
    $post_date = get_the_date( 'F j, Y' );
?>
<div class="wp-block-genesis-blocks-gb-columns hero-banner mt-0 gb-layout-columns-1 one-column gb-background-cover gb-background-no-repeat alignfull" style="background-image:url(
    <?php
        if($banner_image_array){
            echo $banner_image_array['url'];
        }
        else{
            echo site_url()."/wp-content/themes/designdesk-child/assets/images/placeholder.jpg" ;
        }
    ?>
)">
    <div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column">
        <div class="wp-block-genesis-blocks-gb-column alignwide gb-block-layout-column gb-is-vertically-aligned-center">
            <div class="gb-block-layout-column-inner">
                <p class="h1-semi-600 banner-heading has-white-color has-text-color"><?php echo the_title() ?></p>
                <hr class="wp-block-separator has-alpha-channel-opacity separator-horizontal-orange">
                <div class="post-details">
                    <p class="post-date"><img class="icon" src="<?php echo site_url()."/wp-content/themes/designdesk-child/assets/images/calender-icon.svg" ?>" alt="date"><?php echo $post_date ?></p>
                    <p class="post-reading-time"><img class="icon" src="<?php echo site_url()."/wp-content/themes/designdesk-child/assets/images/clock-icon.svg" ?>" alt="time"><?php echo post_read_time() ?></p>
                </div>
            </div>
        </div>
    </div>
</div>