<?php get_header(); ?>

<div class="page-content">
    <div class="content-sidebar-wrap">
        <main class="content" id="genesis-content">
            <article>
                <div class="entry-content">

                    <div class="alignfull">
                        <div class="alignwide">
                            <div class="error-page-content">
                                <div class="left-panel">
                                    <p class="section-heading">Page Not found</p>
                                    <div class="image-container">
                                        <img class="hide-md-up" src="<?php echo site_url() . '/wp-content/themes/designdesk-child/assets/images/error-icon.svg' ?>" alt="error" title="error">
                                    </div>
                                    <p class="text h4-med-500">Sorry, but we couldn’t find the content you were looking for</p>
                                    <hr class="separator-horizontal-orange">
                                    <div class="dd-button shadow right-icon"><a href="<?php echo home_url(); ?>">Go back to home</a></div>
                                </div>
                                <div class="right-panel hide-md-down">
                                    <div class="image-container">
                                        <img src="<?php echo site_url() . '/wp-content/themes/designdesk-child/assets/images/error-icon.svg' ?>" alt="error" title="error">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </article>
        </main>
    </div>
</div>

<?php
get_footer();
