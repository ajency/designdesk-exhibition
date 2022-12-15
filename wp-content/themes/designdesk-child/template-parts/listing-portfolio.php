<div class="alignfull">
    <div class="alignwide">

        <!-- blogs -->
        <?php if (have_posts()) : ?>
            <div class="dd-card-list">
                <?php while (have_posts()) : the_post(); // standard WordPress loop. 
                ?>
                    <?php get_template_part('template-parts/card', 'portfolio'); ?>
                <?php endwhile; ?>
            </div>
            <?php
            global $wp_query;
            post_pagination($wp_query); ?>
        <?php else :
            $args = array('post_type_title' => 'post');
            get_template_part('template-parts/state', 'empty', $args);
        ?>
        <?php endif; ?>

    </div>
</div>