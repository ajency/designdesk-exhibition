<?php

/**
 *
 * Template Name: Testing
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

                                <!-- industries -->
                                <?php $industries = get_terms("dd_industries"); ?>
                                <ul class="cat-list">
                                <li><a class="cat-list_item active" href="#!" data-slug="">All Portfolios</a></li>

                                <?php foreach($industries as $industry) : ?>
                                    <li>
                                    <a class="cat-list_item" href="#!" data-slug="<?= $industry->slug; ?>" data-type="dd_portfolio">
                                        <?= $industry->name; ?>
                                    </a>
                                    </li>
                                <?php endforeach; ?>
                                </ul>

                                <!-- Portfolios/Posts -->
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
                                        while($projects->have_posts()) : $projects->the_post();
                                            get_template_part("template-parts/portfolio", "card");
                                        endwhile;
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
