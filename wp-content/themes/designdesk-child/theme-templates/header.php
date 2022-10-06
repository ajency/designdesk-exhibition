<?php

$topbar_checkbox = get_theme_mod('dd_topbar_checkbox');

$email_id = get_theme_mod('dd_topbar_email');

$youtube_link = get_theme_mod('dd_social_link_1');
$twitter_link = get_theme_mod('dd_social_link_2');
$facebook_link = get_theme_mod('dd_social_link_3');
$instagram_link = get_theme_mod('dd_social_link_4');
$linkedin_link = get_theme_mod('dd_social_link_5');

?>

<header class="dd-header">
    <div class="site-inner dd-header__wraper">
        <div class="left-side">
            <div class="dd-logo mobile-hide">
                <a href="<?php echo get_site_url() ?>">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                    if (has_custom_logo()) {
                        echo '<img src="' . esc_url($logo[0]) . '" class="dd-logo-img" alt="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '" width="236">';
                    } else {
                        echo '<h1>' . get_bloginfo('name') . '</h1>';
                    }
                    ?>
                </a>
            </div>
            <?php
            $mobile_logo_path = get_theme_mod('dd_mobile_logo');

            if (empty($mobile_logo_path)) {
                $mobile_logo_path = esc_url($logo[0]);
            }
            ?>
            <div class="dd-logo desktop-hide">
                <a href="<?php echo get_site_url() ?>">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                    if (has_custom_logo()) {
                        echo '<img src="' . $mobile_logo_path . '" class="dd-logo-img" alt="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '" width="236">';
                    } else {
                        echo '<h1>' . get_bloginfo('name') . '</h1>';
                    }
                    ?>
                </a>
            </div>
            <div class="menu-toggler desktop-hide">
                <div class="menu-toggler__wraper">
                </div>
            </div>
        </div>
        <div class="right-side">
            <?php
            if ($topbar_checkbox == true) : ?>
                <div class="dd-topbar">
                    <div class="dd-topbar__wraper">
                        <?php if ($email_id) {  ?>
                            <a href="mailto:<?php echo $email_id ?>" class="email-link"><span class="icon">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M29.3307 11.477V22.333C29.3308 23.4399 28.9073 24.5048 28.1472 25.3093C27.387 26.1139 26.3478 26.597 25.2427 26.6597L24.9974 26.6663H6.9974C5.89055 26.6664 4.82562 26.2429 4.02109 25.4828C3.21655 24.7226 2.73339 23.6834 2.67073 22.5783L2.66406 22.333V11.477L15.5334 18.2183C15.6766 18.2933 15.8358 18.3325 15.9974 18.3325C16.159 18.3325 16.3182 18.2933 16.4614 18.2183L29.3307 11.477ZM6.9974 5.33301H24.9974C26.0715 5.33288 27.1074 5.73167 27.9041 6.45203C28.7008 7.17239 29.2017 8.16298 29.3094 9.23167L15.9974 16.205L2.6854 9.23167C2.78876 8.20542 3.2548 7.2497 3.99973 6.53629C4.74466 5.82289 5.71964 5.39859 6.7494 5.33967L6.9974 5.33301H24.9974H6.9974Z" fill="#fff"/>
                                </svg></span><?php echo $email_id ?>
                            </a>
                        <?php } ?>
                        <?php if ($youtube_link || $twitter_link || $facebook_link || $instagram_link) : ?>
                            <ul class="social-links">
                                <?php if ($linkedin_link) : ?>
                                    <li class="social-link"><a href="<?php echo $linkedin_link ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/linkedin.svg" title="linkedin" alt="linkedin"></a></li>
                                <?php endif ?>
                                <?php if ($facebook_link) : ?>
                                    <li class="social-link"><a href="<?php echo $facebook_link ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facebook.png" title="facebook" alt="facebook"></a></li>
                                <?php endif ?>
                                <?php if ($twitter_link) : ?>
                                    <li class="social-link"><a href="<?php echo $twitter_link ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/twitter.png" title="twitter" alt="twitter"></a></li>
                                <?php endif ?>
                                <?php if ($instagram_link) : ?>
                                    <li class="social-link"><a href="<?php echo $instagram_link ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/instagram.png" title="instagram" alt="instagram"></a></li>
                                <?php endif ?>
                                <?php if ($youtube_link) : ?>
                                    <li class="social-link"><a href="<?php echo $youtube_link ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/youtube.png" title="youtube" alt="youtube"></a></li>
                                <?php endif ?>
                            </ul>
                        <?php endif ?>
                    </div>
                </div>
            <?php endif ?>
            <div class="mobile-dropdown-menu">
                <nav class="dd-menu genesis-responsive-menu">
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'menu genesis-nav-menu ')); ?> <!-- js-superfish sf-js-enabled sf-arrows -->
                </nav>
                <?php

                if (is_active_sidebar('header-bottom-area')) : ?>
                    <div class="header-bottom-area-container desktop-hide">
                        <?php dynamic_sidebar('header-bottom-area'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>