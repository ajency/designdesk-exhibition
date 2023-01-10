<?php
    $term = get_queried_object();
    if(is_archive()){
        $cta_visibility = get_field('cta_visibility', $term);
        $cta_heading = get_field( 'cta_heading', $term );
        $cta_image_array = get_field( 'cta_image', $term );
        $cta_array = get_field( 'cta', $term );
    }else{
        $cta_visibility = get_field('cta_visibility');
        $cta_heading = get_field( 'cta_heading' );
        $cta_image_array = get_field( 'cta_image' );
        $cta_array = get_field( 'cta' );
    }

    if ($cta_visibility == 1 ) : ?>
        <div class="wp-block-genesis-blocks-gb-columns bg-image-cta belowFold gb-layout-columns-1 gb-1-col-equal alignfull in-viewport">
            <div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column">
                <div class="wp-block-genesis-blocks-gb-column alignwide gb-block-layout-column">
                    <div class="gb-block-layout-column-inner gb-background-cover gb-background-no-repeat" style="background-image:url(<?php echo $cta_image_array['url'] ?>)">
                        <div class="wp-container-4 wp-block-columns alignwide are-vertically-aligned-center has-bg">
                            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
                                <p class="h2-semi-600 mb-0 has-white-color has-text-color"><?php echo $cta_heading ?></p>
                            </div>
                            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
                                <div style="text-align:right" class="wp-block-genesis-blocks-gb-button dd-button shadow right-icon mb-0 gb-block-button"><a class="gb-button gb-button-shape-rounded gb-button-size-medium" style="color:#ffffff;background-color:#3373dc" href="<?php echo $cta_array['url'] ?>"><?php echo $cta_array['title'] ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endif; ?>