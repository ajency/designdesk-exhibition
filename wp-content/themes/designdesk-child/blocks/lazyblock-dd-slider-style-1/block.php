<?php 
    $slideNo = 0;
?>

<div class="dd-slider-style-1">
    <div class="dd-slide">
        <div class="dd-slide__wraper">
            <div class="image-container-slider">
                <?php foreach ($attributes['slide'] as $inner) : ?>
                    <div class="image-container">
                        <img src="<?php echo $inner['slide-image']['url'] ?>" alt="<?php echo $inner['slide-image']['alt'] ?>" title="<?php echo $inner['slide-image']['title'] ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="slide-content-slider">
                <?php foreach ($attributes['slide'] as $inner) : ?>
                    <?php $slideNo++; $slideNo = sprintf("%02d", $slideNo); ?>
                    <div class="slide-content">
                        <div class="slide-content__wraper">
                            <div class="h3-semi-400 heading"><span class="slide-number"><?php echo $slideNo; ?></span><div class="slide-heading"><?php echo $inner['heading'];?></div></div>
                            <hr class="separator-horizontal-orange">
                            <div class="body-reg-400 text"><?php echo $inner['text'];?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="dd-slider-style-1-navigation dots-dark"></div>