<?php

// email
function contact_email($atts)
{
    $default = array(
        'email' => '#',
    );
    $a = shortcode_atts($default, $atts);
    return '<div class="contact-link"><div class="icon"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M29.3307 11.477V22.333C29.3308 23.4399 28.9073 24.5048 28.1472 25.3093C27.387 26.1139 26.3478 26.597 25.2427 26.6597L24.9974 26.6663H6.9974C5.89055 26.6664 4.82562 26.2429 4.02109 25.4828C3.21655 24.7226 2.73339 23.6834 2.67073 22.5783L2.66406 22.333V11.477L15.5334 18.2183C15.6766 18.2933 15.8358 18.3325 15.9974 18.3325C16.159 18.3325 16.3182 18.2933 16.4614 18.2183L29.3307 11.477ZM6.9974 5.33301H24.9974C26.0715 5.33288 27.1074 5.73167 27.9041 6.45203C28.7008 7.17239 29.2017 8.16298 29.3094 9.23167L15.9974 16.205L2.6854 9.23167C2.78876 8.20542 3.2548 7.2497 3.99973 6.53629C4.74466 5.82289 5.71964 5.39859 6.7494 5.33967L6.9974 5.33301H24.9974H6.9974Z" fill="#fff"/>
    </svg></div><a href="mailto:' . $a['email'] . '">' . $a['email'] . '</a></div>';
}
add_shortcode('dd_email', 'contact_email');

// phone
function contact_phone($atts)
{
    $default = array(
        'number' => '#',
    );
    $a = shortcode_atts($default, $atts);
    return '<div class="contact-link"><img src="' . get_site_url() . '/wp-content/themes/designdesk-child/assets/images/phone.png" title="phone" alt="phone" class="icon icon-phone"><a href="tel:' . $a['number'] . '">' . $a['number'] . '</a></div>';
}
add_shortcode('dd_phone', 'contact_phone');

// follow

function dd_site_url($atts)
{


    return site_url() . "/wp-content/uploads/";
}
add_shortcode('dd_site_url', 'dd_site_url');


// arrow-link
function link_with_icon($atts)
{
    $default = array(
        'link' => '#',
        'link-title'    => 'Link Title',
    );
    $a = shortcode_atts($default, $atts);
    return '<span class="link-with-icon"><a href="' . $a['link'] . '">' . $a['link-title'] . '</a><span class="icon"><svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.33594 10.667L6.0026 6.00033L1.33594 1.33366" stroke="#2471B5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>';
}
add_shortcode('dd_link_with_icon', 'link_with_icon');
