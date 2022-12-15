<?php
    $dd_post_count = get_option( 'posts_per_page' );
?>

<div class="alignfull">
    <div class="alignwide">

    <!-- blogs -->
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $blogsArgs = [
        "post_type"     => 'post',
        "order_by"      => 'date',
        "order"         => 'DESC',
        'paged' => $paged,
        'posts_per_page' => $dd_post_count, // limit of posts
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