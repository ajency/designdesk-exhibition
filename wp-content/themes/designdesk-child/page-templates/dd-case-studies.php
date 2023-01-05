<?php

/**
 *
 * Template Name: Case Studies
 */
?>
<?php get_header(); ?>

<div class="page-content">
    <div class="content-sidebar-wrap">
        <main class="content" id="genesis-content">
            <article>
                <div class="entry-content">
                    <!-- Banner -->
                    <?php get_template_part('template-parts/content', 'banner'); ?>

                    <!-- Case Studies -->
                    <div class="alignfull mb-80 mb-60-mob">
                        <div class="alignwide">
                            <h3 class="testBox"></h3>
                        <?php 
                            $dd_post_per_page = get_option( 'posts_per_page' );

                            $caseStudies = new WP_Query([
                                'post_type' => 'dd_case_study',
                                'posts_per_page' => $dd_post_per_page,
                                'order_by' => 'date',
                                'order' => 'desc',
                                'paged' => 1
                            ]);
                        ?>
                        <?php if($caseStudies->have_posts()): ?>
                            <div class="dd-card-list">
                                <?php
                                $loopCount = 0;		// loop control variable
                                while($caseStudies->have_posts()) : $caseStudies->the_post();
                                    $loopCount++;
                                    $args = [
                                        'loop_count'    => $loopCount,
                                    ];
                                ?>
                                    <?php get_template_part('template-parts/card', 'case-study', $args); ?>
                                <?php endwhile;
                                ?>
                            </div>

                            <?php
                            if (  $caseStudies->max_num_pages > 1 ): ?>
                            <div id="dd-load-more" data-type="dd_case_study" data-card="case-study" data-postsPerPage = "<?php echo $dd_post_per_page ?>" class="wp-block-genesis-blocks-gb-button dd-button bordered right-icon plus-icon gb-block-button"><a class="gb-button gb-button-shape-rounded gb-button-size-medium" style="color:#ffffff;background-color:#3373dc">Load More</a></div>
                            <?php  endif; ?>

                            <?php wp_reset_postdata(); ?>
                        <?php 
                            else: 
                                $args = array('post_type_title' => 'case study');
                                get_template_part('template-parts/state', 'empty', $args);
                        ?>
                        <?php endif; ?>
                        </div>
                    </div>

                </div>
            </article>
        </main>
    </div>
</div>

<?php
get_footer();
