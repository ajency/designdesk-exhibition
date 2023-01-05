<?php
    $term = get_queried_object();
    if(is_archive()){
        $banner_visibility = get_field('banner_visibility', $term);
        $banner_heading = get_field( "banner_heading", $term );
        $banner_text = get_field( "banner_text", $term );
        $banner_image_array = get_field( "banner_image", $term );
        $banner_image_mob_array = get_field( "banner_image_mob", $term );
        $caseStudyLocation = get_field('case-study-location', $term);
        $caseStudySize = get_field('case-study-size', $term);
    }else{
        $banner_visibility = get_field('banner_visibility');
        $banner_heading = get_field( "banner_heading" );
        $banner_text = get_field( "banner_text" );
        $banner_image_array = get_field( "banner_image" );
        $banner_image_mob_array = get_field( "banner_image_mob" );
        $caseStudyLocation = get_field('case-study-location');
        $caseStudySize = get_field('case-study-size');
    }

    $postName = $term-> post_name;

    if ($banner_visibility == 1 ) : ?>
        <div class="wp-block-genesis-blocks-gb-columns hero-banner mt-0 gb-layout-columns-1 one-column gb-background-cover gb-background-no-repeat alignfull" <?php if($banner_image_mob_array): ?> data-mobBg="<?php echo $banner_image_mob_array['url']; ?>"<?php endif; ?> style="background-image:url(<?php if($banner_image_array): echo $banner_image_array['url']; else: echo site_url() . '/wp-content/themes/designdesk-child/assets/images/placeholder.jpg'; endif; ?>)">
            <div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column">
                <div class="wp-block-genesis-blocks-gb-column alignwide gb-block-layout-column gb-is-vertically-aligned-center">
                    <div class="gb-block-layout-column-inner <?php if ($postName == 'contact-us'): echo "contact-us"; endif; ?>">
                        <h1 class="h1-semi-600 banner-heading has-white-color has-text-color"><?php if($banner_heading): echo $banner_heading; else: echo single_term_title(); endif; ?></h1>
                        <?php if($banner_text): ?><p class="h4-reg-400 banner-text has-white-color has-text-color"><?php echo $banner_text ?></p><?php endif; ?>
                        <hr class="wp-block-separator has-alpha-channel-opacity separator-horizontal-orange">
                        <?php if($caseStudyLocation || $caseStudySize): ?>
                            <ul class="stallDetails">
                                <li class="label-med-500">
                                    <span class="icon stroked">
                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 8.66602C7.10457 8.66602 8 7.77059 8 6.66602C8 5.56145 7.10457 4.66602 6 4.66602C4.89543 4.66602 4 5.56145 4 6.66602C4 7.77059 4.89543 8.66602 6 8.66602Z" stroke="#041925" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.0013 1.33301C4.58681 1.33301 3.23026 1.89491 2.23007 2.8951C1.22987 3.8953 0.667969 5.25185 0.667969 6.66634C0.667969 7.92767 0.935969 8.75301 1.66797 9.66634L6.0013 14.6663L10.3346 9.66634C11.0666 8.75301 11.3346 7.92767 11.3346 6.66634C11.3346 5.25185 10.7727 3.8953 9.77254 2.8951C8.77234 1.89491 7.41579 1.33301 6.0013 1.33301V1.33301Z" stroke="#041925" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>Location : New Delhi</li><li class="label-med-500"><span class="icon paths">
                                        <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.52825 2.5741L-0.0142221 6.92837C-0.534181 7.22855 -0.534181 7.71677 -0.0142221 8.01694L6.58544 11.8269C7.1054 12.1271 7.9511 12.1271 8.47106 11.8269L16.0135 7.47266C16.5335 7.17248 16.5335 6.68426 16.0135 6.38409L9.41387 2.5741C8.89391 2.27393 8.04821 2.27393 7.52825 2.5741ZM7.52825 11.2826L0.928587 7.47266L8.47106 3.11839L15.0712 6.9281L7.52825 11.2826Z" fill="#041925"/>
                                        <path d="M7.52825 0.54383L-0.0142221 4.8981C-0.534181 5.19827 -0.534181 5.68649 -0.0142221 5.98667L6.58544 9.79665C7.1054 10.0968 7.9511 10.0968 8.47106 9.79665L16.0135 5.44238C16.5335 5.14221 16.5335 4.65399 16.0135 4.35382L9.41387 0.54383C8.89391 0.243657 8.04821 0.243657 7.52825 0.54383ZM7.52825 9.25237L0.928587 5.44238L8.47106 1.08811L15.0712 4.89783L7.52825 9.25237Z" fill="#041925"/>
                                        </svg>
                                    </span>Size : 100 sqm</li>
                            </ul>
                        <?php endif ?>
                    </div>
                    <?php if ($postName == 'contact-us'):?>
                        <div class="image-container">
                            <img src="<?php echo site_url()."/wp-content/themes/designdesk-child/assets/images/map.svg" ?>" alt="map">
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
<?php endif; ?>