<?php

// email
function contact_email($atts) {
    $default = array(
        'email' => '#',
    );
    $a = shortcode_atts($default, $atts);
    return '<div class="contact-link"><img src="'. get_site_url() .'/wp-content/themes/designdesk-child/assets/images/email.png" title="email" alt="email" class="icon"><a href="mailto:'.$a['email']. '">'.$a['email']. '</a></div>';
}
add_shortcode('dd_email', 'contact_email');

// phone
function contact_phone($atts) {
    $default = array(
        'number' => '#',
    );
    $a = shortcode_atts($default, $atts);
    return '<div class="contact-link"><img src="'. get_site_url() .'/wp-content/themes/designdesk-child/assets/images/phone.png" title="phone" alt="phone" class="icon icon-phone"><a href="tel:'.$a['number']. '">'.$a['number']. '</a></div>';
}
add_shortcode('dd_phone', 'contact_phone');

// follow

function follow_us($atts) {
    $default = array(
        'title' => 'Follow Us On',
    );
    $a = shortcode_atts($default, $atts);

    return '<div class="follow-us"><p class="title">'. $a['title'] .'</p></div>';
}
add_shortcode('dd_follow', 'follow_us');
