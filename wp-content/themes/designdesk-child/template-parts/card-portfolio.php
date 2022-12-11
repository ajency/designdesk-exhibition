<?php
    if (get_the_post_thumbnail()) {
        $thumbnailUrl = get_the_post_thumbnail_url();
    } else {
        $thumbnailUrl = get_site_url() . '/wp-content/themes/designdesk-child/assets/images/placeholder-square.jpg';
    }

    if(get_field('portfolio_title') == ''){
        $portfolioTitle = get_the_title();
    }else{
        $portfolioTitle = get_field('portfolio_title');
    }
    
    $fields = get_field_objects();

    $portfolioLocation = get_field('location');
    $stallSize = get_field('stall_size');
?>

<!-- card -->
<div class="portfolio-card dd-popupToggler" target-popup="#<?php echo the_ID() ?>">
    <div class="portfolio-card__wraper">
        <div class="card-image"><img src="<?php echo $thumbnailUrl ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title()?>" width="280" height="330"></div>
        <div class="card-content">
            <div class="card-content__wraper">
                <p class="ellipsis card-title"><?php echo the_title() ?></p>
            </div>
        </div>
    </div>
</div>
<!-- popup -->
<div class="dd-popup portfolio-popup" id="<?php echo the_ID() ?>">
    <div class="dd-popup__wraper">
        <div class="dd-popup-content">
            <div class="dd-popup-header">
                <span class="dd-close"></span>
            </div>
            <div class="dd-popup-body main-content">
                <div class="dd-popup-body__wraper">
                    <div data-class="<?php echo the_ID() ?>" class="popup-slider portfolio-gallery-slider slider-<?php echo the_ID() ?>">
                        <?php
                        foreach ($fields as $field):
                            if($field['type'] == 'image'):
                                $imagesFields = [$field];
                                foreach ($imagesFields as $imagesField):
                                    if(isset($imagesField['value']['url'])):
                                        $imagesUrl = $imagesField['value']['url'];
                                        $imagesAlt = $imagesField['value']['alt'];
                                        $imagesTitle = $imagesField['value']['title'];?>
                                        <div class="gallery-slide">
                                            <img class="gallery-image" src="<?php echo $imagesUrl ?>" alt="<?php echo $imagesAlt?>" title="<?php echo $imagesTitle?>">
                                        </div>
                                        <?php
                                    endif;
                                endforeach;
                            endif;
                            endforeach;
                        ?>
                    </div>
                    <div class="portfolio-details">
                        <div class="portfolio-details__wraper">
                            <div class="portfolio-info">
                                <p class="h2-semi-600 portfolio-title"><?php echo $portfolioTitle ?></p>
                                <ul class="portfolio-info-list">
                                    <?php if($portfolioLocation): ?>
                                        <li class="label-med-500"><img class="icon" src="<?php echo get_site_url() ?>/wp-content/themes/designdesk-child/assets/images/location.svg">Location : <?php echo $portfolioLocation ?></li>
                                    <?php endif;
                                    if($stallSize): ?>
                                        <li class="label-med-500"><img class="icon" src="<?php echo get_site_url() ?>/wp-content/themes/designdesk-child/assets/images/size-icon.svg">Size : <?php echo $stallSize ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="portfolio-slider-thumbnails">
                                <div data-class="<?php echo the_ID() ?>" class="popup-slider portfolio-thumbnail-carousel carousel-<?php echo the_ID() ?>">
                                    <?php
                                    foreach ($fields as $field):
                                        if($field['type'] == 'image'):
                                            $imagesFields = [$field];
                                            foreach ($imagesFields as $imagesField):
                                                if(isset($imagesField['value']['url'])):
                                                    $imagesUrl = $imagesField['value']['url'];
                                                    $imagesAlt = $imagesField['value']['alt'];
                                                    $imagesTitle = $imagesField['value']['title']; ?>
                                                    <div class="thumbnail-slide">
                                                        <img class="thumbnail-image" src="<?php echo $imagesUrl ?>" alt="<?php echo $imagesAlt?>" title="<?php echo $imagesTitle?>" height="62" width="99.2">
                                                    </div>
                                                <?php endif;
                                            endforeach;
                                        endif;
                                        endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dd-slider-dots dd-slider-dots-<?php echo the_ID() ?>"></div>
            </div>
            <div class="dd-popup-footer">
            </div>
        </div>
    </div>
</div>
