<div class="dd-slider-basic">
    <?php foreach ($attributes['slide'] as $inner) : ?>
        <div class="dd-slide">
            <div class="dd-slide__wraper">
                <div class="image-container">
                    <img src="<?php echo $inner['slide-image']['url'] ?>" alt="<?php echo $inner['slide-image']['alt'] ?>" title="<?php echo $inner['slide-image']['title'] ?>">
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="dd-slider-basic-navigation dots-dark"></div>