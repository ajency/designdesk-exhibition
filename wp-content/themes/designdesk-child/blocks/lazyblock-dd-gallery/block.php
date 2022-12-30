<?php
$images = $attributes['gallery-images'];

$imageClasses = ["", "tall", "", "wide", ""];

$totalImages = count($images);
?>

<div class="dd-gallery-container">
    <div class="dd-gallery">
        <?php
        foreach ($images as $image) : ?>
            <?php $random_keys = array_rand($imageClasses); ?>
            <figure class="gallery-image <?php echo $imageClasses[$random_keys] ?>">
                <a class="galleryTrigger dd-popupToggler" target-popup="#galleryPopup"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['title']); ?>"></a>
            </figure>
        <?php endforeach; ?>
    </div>

        <div id="gallery-load-more" class="wp-block-genesis-blocks-gb-button dd-button bordered right-icon plus-icon gb-block-button"><a class="gb-button gb-button-shape-rounded gb-button-size-medium" style="color:#ffffff;background-color:#3373dc">Load More</a></div>

</div>

<!-- popup -->

<div class="dd-popup gallery-popup" id="galleryPopup">
    <div class="dd-popup__wraper">
        <div class="dd-popup-content">
            <div class="dd-popup-header">
                <span class="dd-close"></span>
            </div>
            <div class="dd-popup-body main-content">
                <div class="dd-popup-body__wraper">
                    <div class="gallery-image-container">
                        <img src="<?php echo site_url()."/wp-content/themes/designdesk-child/assets/images/placeholder.jpg" ?>" alt="" title="">
                    </div>
                </div>
            </div>
            <div class="dd-popup-footer"></div>
        </div>
    </div>
</div>