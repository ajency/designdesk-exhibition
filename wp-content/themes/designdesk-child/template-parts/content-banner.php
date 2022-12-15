<?php
    $term = get_queried_object();
    if(is_archive()){
        $banner_visibility = get_field('banner_visibility', $term);
        $banner_heading = get_field( "banner_heading", $term );
        $banner_text = get_field( "banner_text", $term );
        $banner_image_array = get_field( "banner_image", $term );
    }else{
        $banner_visibility = get_field('banner_visibility');
        $banner_heading = get_field( "banner_heading" );
        $banner_text = get_field( "banner_text" );
        $banner_image_array = get_field( "banner_image" );
    }


    if ($banner_visibility == 1 ) : ?>
        <div class="wp-block-genesis-blocks-gb-columns hero-banner mt-0 gb-layout-columns-1 one-column gb-background-cover gb-background-no-repeat alignfull" style="background-image:url(<?php if($banner_image_array): echo $banner_image_array['url']; else: echo site_url() . '/wp-content/themes/designdesk-child/assets/images/placeholder.jpg'; endif; ?>)">
            <div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column">
                <div class="wp-block-genesis-blocks-gb-column alignwide gb-block-layout-column gb-is-vertically-aligned-center">
                    <div class="gb-block-layout-column-inner">
                        <p class="h1-semi-600 banner-heading has-white-color has-text-color"><?php if($banner_heading): echo $banner_heading; else: echo single_term_title(); endif; ?></p>
                        <?php if($banner_text): ?><p class="h4-reg-400 banner-text has-white-color has-text-color"><?php echo $banner_text ?></p><?php endif; ?>
                        <hr class="wp-block-separator has-alpha-channel-opacity separator-horizontal-orange">
                    </div>
                </div>
            </div>
        </div>
<?php endif; ?>