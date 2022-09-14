<?php

$topbar_checkbox = get_theme_mod('dd_topbar_checkbox');

$email_id = get_theme_mod('dd_topbar_email');

$youtube_link = get_theme_mod('dd_social_link_1');
$twitter_link = get_theme_mod('dd_social_link_2');
$facebook_link = get_theme_mod('dd_social_link_3');
$instagram_link = get_theme_mod('dd_social_link_4');

?>
<?php
if ($topbar_checkbox == true) : ?>
    <div class="dd-topbar">
        <div class="site-inner dd-topbar__wraper">
            <?php if ($email_id) {  ?>
                <a href="mailto:<?php echo $email_id ?>" class="email-link"><img src="<?php echo get_site_url() ?>/wp-content/themes/designdesk-child/assets/images/email.svg" title="email" alt="email" class="icon"><?php echo $email_id ?></a>
            <?php } ?>
            <?php if ($youtube_link || $twitter_link || $facebook_link || $instagram_link) : ?>
                <ul class="social-links">
                    <?php if ($youtube_link) : ?>
                        <li class="social-link"><a href="<?php echo $youtube_link ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/youtube.png" title="youtube" alt="youtube"></a></li>
                    <?php endif ?>
                    <?php if ($twitter_link) : ?>
                        <li class="social-link"><a href="<?php echo $twitter_link ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/twitter.png" title="twitter" alt="twitter"></a></li>
                    <?php endif ?>
                    <?php if ($facebook_link) : ?>
                        <li class="social-link"><a href="<?php echo $facebook_link ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facebook.png" title="facebook" alt="facebook"></a></li>
                    <?php endif ?>
                    <?php if ($instagram_link) : ?>
                        <li class="social-link"><a href="<?php echo $instagram_link ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/instagram.png" title="instagram" alt="instagram"></a></li>
                    <?php endif ?>
                </ul>
            <?php endif ?>
        </div>
    </div>
<?php endif ?>
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
            <div class="mobile-dropdown-menu">
                <nav class="dd-menu genesis-responsive-menu">
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'menu genesis-nav-menu js-superfish sf-js-enabled sf-arrows')); ?>
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