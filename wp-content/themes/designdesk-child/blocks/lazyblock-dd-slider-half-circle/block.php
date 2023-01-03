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
    
    let ddCircle = $('.dd-slider-half-circle .outer-circle');
    let ddCircleRadius = (ddCircle.width()/2)+'px';

    var  type = 1, //circle type - 1 whole, 0.5 half, 0.25 quarter
        radius = ddCircleRadius, //distance from center
        start = -80, //shift start from 0
        $elements = $('.circle-slide'),
        numberOfElements = (type === 1) ? $elements.length : $elements.length - 1, //adj for even distro of elements when not full circle
        slice = 360 * type / numberOfElements;

        $($('.circle-slide').slice(9)).each(function(i){

            var  thisElement = $(this),
                rotate = slice * (i+9) + start,
                rotateReverse = rotate * -1,
                rotateHalf = rotate + 180,
                reverseHalf = (-rotateHalf),
                rotateFull = rotate + 360,
                reverseFull = (-rotateFull);

                let transformString = 'circleRotate'+i+' '+ '25s linear infinite';

            if(i < 9){
                console.log("Index "+i);
                $('head').append('<style id="circular-animations">@keyframes circleRotate'+ (i+9) +'{0%{transform: rotate(' + rotate + 'deg) translate(' + radius + ') rotate(' + rotateReverse + 'deg);}'+ (Math.floor(50-(5.5*i))) +'%{opacity:0;}'+ (Math.floor(50-(5.5*i))+10) +'%{opacity:1;}'+ (Math.floor(100-(5.5*i))-10) +'%{opacity:1;}'+ Math.floor(100-(5.5*i)) +'%{opacity:0;} 100%{transform: rotate(' + rotateFull + 'deg) translate(' + radius + ') rotate(' + reverseFull + 'deg);opacity: 0;}</style>');
            }
            });

    $elements.each(function(i) {
        var  thisElement = $(this),
            rotate = slice * i + start,
            rotateReverse = rotate * -1,
            rotateHalf = rotate + 180,
            reverseHalf = (-rotateHalf),
            rotateFull = rotate + 360,
            reverseFull = (-rotateFull);

        thisElement.css({
            'transform': 'rotate(' + rotate + 'deg) translate(' + radius + ') rotate(' + rotateReverse + 'deg)'
        });

        let transformString = 'circleRotate'+i+' '+ '25s linear infinite';

        if(i < 9){
            $('head').append('<style id="circular-animations">@keyframes circleRotate'+i+'{0%{transform: rotate(' + rotate + 'deg) translate(' + radius + ') rotate(' + rotateReverse + 'deg);}'+ (Math.floor(50-(5.5*i))-10) +'%{opacity:1;}'+ Math.floor(50-(5.5*i)) +'%{opacity:0;}'+ Math.floor(100-(5.5*i)) +'%{opacity:0;}'+ Math.floor(100-(5.5*i)+10) +'%{opacity:1;} 100%{transform: rotate(' + rotateFull + 'deg) translate(' + radius + ') rotate(' + reverseFull + 'deg);opacity: 1;}</style>');
        }
        
        setTimeout(function(){
            thisElement.css('animation', transformString);
        }, 3000);
    });



</script>