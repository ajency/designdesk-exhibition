<?php get_header(); ?>

<div class="page-content">
    <div class="content-sidebar-wrap">
        <main class="content" id="genesis-content">
            <article class="<?php echo str_replace(' ', '_', get_the_title()); ?>">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        </main>
    </div>
</div>
<?php
get_footer();
