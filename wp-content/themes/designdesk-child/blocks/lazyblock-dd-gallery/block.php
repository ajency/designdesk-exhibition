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
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </figure>
        <?php endforeach; ?>
    </div>

    <?php

    if ($totalImages > 10) { ?>
        <div id="gallery-load-more" class="wp-block-genesis-blocks-gb-button dd-button bordered right-icon plus-icon gb-block-button"><a class="gb-button gb-button-shape-rounded gb-button-size-medium" style="color:#ffffff;background-color:#3373dc">Load More</a></div>
    <?php } ?>

</div>