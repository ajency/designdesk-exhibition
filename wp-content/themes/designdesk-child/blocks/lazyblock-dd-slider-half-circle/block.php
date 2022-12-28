<div class="dd-slider-half-circle">
    <div class="outer-circle">
        <div class="content-circle">
            <?php foreach ($attributes['slide'] as $inner) : ?>
                <div class="circle-slide">
                    <div class="circle-slide__wraper">
                        <img class="slide-icon" src="<?php echo $inner['slide-icon']['url']; ?>" alt="<?php echo $inner['slide-icon']['alt']; ?>" title="<?php echo $inner['slide-icon']['title']; ?>">
                        <p class="label-semi-600 slide-heading"><?php echo $inner['slide-heading']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    var type = 0.5, //circle type - 1 whole, 0.5 half, 0.25 quarter
        radius = '14em', //distance from center
        start = -90, //shift start from 0
        $elements = $('.circle-slide'),
        numberOfElements = (type === 1) ? $elements.length : $elements.length - 1, //adj for even distro of elements when not full circle
        slice = 360 * type / numberOfElements;

    $elements.each(function(i) {
        var $self = $(this),
            rotate = slice * i + start,
            rotateReverse = rotate * -1;

        $self.css({
            'transform': 'rotate(' + rotate + 'deg) translate(' + radius + ') rotate(' + rotateReverse + 'deg)'
        });
    });
</script>