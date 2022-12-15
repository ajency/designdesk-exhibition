<?php get_header();?>

<div class="page-content">
    <div class="content-sidebar-wrap">
        <main class="content" id="genesis-content">
            <article>
                <div class="entry-content">
                    
                    <!-- Banner -->
                    <?php get_template_part('template-parts/content', 'banner'); ?>

                    <!-- Blogs Listing -->
                    <?php get_template_part('template-parts/listing', 'post'); ?>

                    <!-- CTA -->
                    <?php get_template_part('template-parts/content', 'cta'); ?>
                    
                </div>
            </article>
        </main>
    </div>
</div>

<?php get_footer(); ?>