<?php get_header(); ?>

<div class="page-content">
    <div class="content-sidebar-wrap">
        <main class="content" id="genesis-content">
            <article>
                <div class="entry-content">
                    <!-- Banner -->
                    <?php get_template_part('template-parts/content', 'banner'); ?>

                    <div class="alignfull">
                        <div class="alignwide">
                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    <?php get_template_part('template-parts/post', 'related'); ?>

                    <!-- CTA -->
                    <?php get_template_part('template-parts/content', 'cta'); ?>
                </div>
            </article>
        </main>
    </div>
</div>

<?php
get_footer();
