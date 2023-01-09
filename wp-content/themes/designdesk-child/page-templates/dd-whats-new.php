<?php

/**
 *
 * Template Name: What's New
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

                    <div class="alignfull">
                        <div class="alignwide">
                            <div class="dd-instagram-feed">
                                <!-- Place <div> tag where you want the feed to appear -->
                                <div id="curator-feed-default-feed-layout"></div><!-- The Javascript can be moved to the end of the html page before the </body> tag -->
                                <script type="text/javascript">
                                    /* curator-feed-default-feed-layout */
                                    (function() {
                                        var i, e, d = document,
                                            s = "script";
                                        i = d.createElement("script");
                                        i.async = 1;
                                        i.charset = "UTF-8";
                                        i.src = "https://cdn.curator.io/published/6e101893-37ea-47ce-8ed4-8d43cbaed53e.js";
                                        e = d.getElementsByTagName(s)[0];
                                        e.parentNode.insertBefore(i, e);
                                    })();
                                </script>
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
