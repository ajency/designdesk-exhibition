<?php
    $intro_visibility = get_field('intro_visibility');
    $intro_heading = get_field( "intro_heading" );
    $intro = get_field( "intro" );
    if ($intro_visibility == 1 ) : ?>
        <div class="wp-block-genesis-blocks-gb-columns page-intro gb-layout-columns-1 one-column alignfull">
            <div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column">
                <div class="wp-block-genesis-blocks-gb-column alignwide gb-block-layout-column">
                    <div class="gb-block-layout-column-inner">
                        <div class="wp-container-1 wp-block-group float-over text-left-mob">
                            <div class="wp-block-group__inner-container">
                                <h2 class="has-text-align-center section-heading has-text-color" style="color:#2471b5"><?php echo $intro_heading ?></h2>
                                <div class="has-text-align-center body-reg-400 intro-text"><?php echo $intro; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endif; ?>