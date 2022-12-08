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
                            $projects = new WP_Query([
                                'post_type' => 'dd_portfolio',
                                'posts_per_page' => -1,
                                'order_by' => 'date',
                                'order' => 'desc',
                            ]);
                        ?>
                        <?php if($projects->have_posts()): ?>
                            <div class="dd-card-list">
                                <?php
                                while($projects->have_posts()) : $projects->the_post();?>
                                <?php get_template_part('template-parts/portfolio', 'card'); ?>
                                <?php endwhile;
                                ?>
                            </div>
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
