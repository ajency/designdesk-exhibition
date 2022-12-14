<?php

/**
 *
 * Template Name: Blogs
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

                    <!-- Post Slider -->
                    <?php get_template_part('template-parts/post', 'slider'); ?>

                    <div class="alignfull">
                        <div class="alignwide">

                        <!-- blogs -->
                                <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                $blogsArgs = [
                                    "post_type"     => 'post',
                                    "order_by"      => 'date',
                                    "order"         => 'ASC',
                                    'paged' => $paged,
                                    'posts_per_page' => 3 // limit of posts
                                ];
                                $blogsQuery = new WP_Query($blogsArgs);
                                ?>

                                <?php if ($blogsQuery-> have_posts()): ?>
                                    <div class="dd-card-list">
                                        <?php while($blogsQuery-> have_posts()): $blogsQuery->the_post(); ?>
                                            <?php get_template_part('template-parts/card', 'post'); ?>
                                        <?php endwhile; ?>
                                    </div>
                                    
                                    <?php post_pagination($blogsQuery); ?>
                                    <?php else:
                                        $args = array( 'post_type_title' => 'post' );
                                        get_template_part('template-parts/state', 'empty', $args);
                                    ?>
                                <?php endif; ?>

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
