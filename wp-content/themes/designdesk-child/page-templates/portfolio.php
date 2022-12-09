<?php

/**
 *
 * Template Name: Portfolio
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
                    <!-- Page Intro -->
                    <?php get_template_part('template-parts/content', 'intro'); ?>

                    <div class="alignfull">
                        <div class="alignwide">
                        <div class="portfolio-listing-content">

                        <hr class="hide-md-up wp-block-separator alignfull has-alpha-channel-opacity is-style-wide">

                        <!-- Filters -->
                        <div class="dd-filters">
                            <div class="dd-filters__wraper">

                            <select class="dd-select" id="stallSizes">
                                <option value="hide">Select Stall Size</option>
                                <option value="1">100 sqm</option>
                                <option value="2">120 sqm</option>
                                <option value="3">200 sqm</option>
                            </select> 

                            <select class="dd-select" id="industries">
                                <option value="hide">Select Industry</option>
                                <option value="4">Pharmaceutical</option>
                                <option value="5">Agriculture</option>
                                <option value="6">Media and Telecommunication</option>
                            </select> 

                            <select class="dd-select" id="loactions">
                                <option value="hide">Select Location</option>
                                <option value="8">New Delhi</option>
                                <option value="9">Germany</option>
                                <option value="10">Bengaluru</option>
                            </select> 

                            </div>
                        </div>

                        <!-- Portfolios -->
                        <?php 
                            $portfolios = new WP_Query([
                                'post_type' => 'dd_portfolio',
                                'posts_per_page' => 6,
                                'order_by' => 'date',
                                'order' => 'desc',
                                'paged' => 1,
                            ]);
                        ?>
                        <?php if($portfolios->have_posts()): ?>
                            <div class="dd-card-list">
                                <?php
                                while($portfolios->have_posts()) : $portfolios->the_post();?>
                                <?php get_template_part('template-parts/portfolio', 'card'); ?>
                                <?php endwhile;
                                ?>
                            </div>

                            <?php
                            if (  $portfolios->max_num_pages > 1 ): ?>
                            <div id="load-more" class="wp-block-genesis-blocks-gb-button dd-button bordered right-icon plus-icon gb-block-button"><a class="gb-button gb-button-shape-rounded gb-button-size-medium" style="color:#ffffff;background-color:#3373dc">Load More</a></div>
                            <?php  endif; ?>

                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                        </div>
                        </div>
                    </div>


                    <!-- CTA -->
                    <?php get_template_part('template-parts/content', 'cta'); ?>
                </div>
            </article>
        </main>
    </div>
</div>

<?php
get_footer();
