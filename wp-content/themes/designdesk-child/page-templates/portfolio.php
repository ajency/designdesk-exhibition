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
                        <?php 
                                $portfoliosQuery = new WP_Query([
                                    'post_type' => 'dd_portfolio',
                                    'posts_per_page' => -1
                                ]);
                                $stallSizes = [];
                                $locations = [];
                                $industries = [];

                                function cleanStr($string){
                                    // Replaces all spaces with hyphens.
                                    $string = str_replace(' ', '-', $string);
                                
                                    // Removes special chars.
                                    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
                                    // Replaces multiple hyphens with single one.
                                    $string = preg_replace('/-+/', '-', $string);
                                    
                                    return strtolower($string);
                                }
                        ?>
                        <?php if($portfoliosQuery->have_posts()): ?>

                            <?php
                                while($portfoliosQuery->have_posts()) : $portfoliosQuery->the_post();
                                    $stallSize = get_field('stall_size');
                                    if(!in_array($stallSize, $stallSizes, true) AND !empty($stallSize)):
                                        array_push($stallSizes, $stallSize);
                                    endif;
                                    $location = get_field('location');
                                    if(!in_array($location, $locations, true) AND !empty($location)):
                                        array_push($locations, $location);
                                    endif;

                                    $term_list = wp_get_post_terms( get_the_ID() , 'dd_industries', array( 'fields' => 'names' ) );

                                    $industry_list = $term_list;
                                    if(!in_array($industry_list, $industries, true) AND !empty($industry_list)):
                                        array_push($industries, $industry_list);
                                    endif;

                                endwhile;

                                $combinedIndustries = [];
                                foreach( $industries as $allindustry ): 
                                        foreach( $allindustry as $singleIndustry ): 
                                            if(!in_array($singleIndustry, $combinedIndustries, true) AND !empty($singleIndustry)):
                                                array_push($combinedIndustries, $singleIndustry);
                                            endif;
                                            
                                         endforeach; 
                                endforeach;
                                ?>

                        <div class="dd-filters">
                            <div class="dd-filters__wraper">
                            <div class="field-group">
                                <div id="reset-button" onclick="resetFilter(this)"></div>
                                <label for="stallSize">Stall Size</label>
                                <select class="dd-select" id="stallSizes">
                                    <option value="hide">Select Stall Size</option>
                                    <?php
                                        foreach( $stallSizes as $stallSize ) {?>
                                            <option value="<?php echo $stallSize ?>"><?php echo $stallSize ?> sqm</option>
                                        <?php }
                                    ?>
                                </select> 
                            </div>
                            <div class="field-group">
                                <label for="industries">Industry</label>
                                <div id="reset-button" onclick="resetFilter(this)"></div>
                                <select class="dd-select" id="industries">
                                    <option value="hide">Select Industry</option>
                                    <?php
                                        foreach( $combinedIndustries as $industry_name ) {?>
                                            <option value="<?php echo cleanStr($industry_name) ?>"><?php echo $industry_name ?></option>
                                        <?php }
                                    ?>
                                </select> 
                            </div>
                            <div class="field-group">
                                <label for="locations">Location</label>
                                <div id="reset-button" onclick="resetFilter(this)"></div>
                                <select class="dd-select" id="locations">
                                    <option value="hide">Select Location</option>
                                    <?php
                                        foreach( $locations as $location ) {?>
                                            <option value="<?php echo cleanStr($location) ?>"><?php echo $location ?></option>
                                        <?php }
                                    ?>
                                </select> 
                            </div>

                            </div>
                        </div>

                        <?php  endif; ?>

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
