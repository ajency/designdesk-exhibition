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
    return '<span class="link-with-icon"><a href="' . $a['link'] . '">' . $a['link-title'] . '</a><span class="icon"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M5.33594 12.667L10.0026 8.00033L5.33594 3.33366" stroke="#2471B5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    </span>';
}
add_shortcode('dd_link_with_icon', 'link_with_icon');

function portfolios($atts){
    $default = array(
        'total-portfolios' => -1,
        'featured' => "false"
    );
    $a = shortcode_atts($default, $atts);
    //$output = $output . 'Display Posts: '. $a['total-portfolios'];

    if($a['featured'] == "true"){
        $featured = 1;
    }else{
        $featured = array(0, 1);
    }

    $args = array(
        'posts_per_page' => $a['total-portfolios'],
        'post_type'     => 'dd_portfolio',
        'orderby'=> 'title',
        'order' => 'ASC',
        'meta_query'    => array(
            'relation'      => 'AND',
            array(
                'key'       => 'featured_portfolio',
                'value'     => $featured,
                'compare'   => '=',
            )
        ),
    );

    $postQuery = new Wp_Query($args);

    if(!empty($postQuery)){

        $output ='';

        $output .='<div class="portfolio-list">';
        while ($postQuery -> have_posts()){
            $postQuery -> the_post();

            if ( get_the_post_thumbnail() ){
                $thumbnailUrl = get_the_post_thumbnail_url();
            } else{
                $thumbnailUrl = get_site_url() . '/wp-content/themes/designdesk-child/assets/images/placeholder-square.jpg';
            }

            $fields = get_field_objects();


            $portfolioId = get_the_ID();

            if(get_field('portfolio_title') == ''){
                $portfolioTitle = get_the_title();
            }else{
                $portfolioTitle = get_field('portfolio_title');
            }

            $portfolioLocation = get_field('location');
            $stallSize = get_field('stall_size');

                $output .=  '<div class="portfolio-card dd-popupToggler" target-popup="#'.$portfolioId.'">';
                    $output .=  '<div class="portfolio-card__wraper">';
                        $output .=  '<div class="card-image">';
                            $output .=  '<img src="'. $thumbnailUrl .'" alt="'.get_the_title().'" title="'.get_the_title().'" width="280" height="330">';
                        $output .=  '</div>';
                        $output .=  '<div class="card-content">';
                            $output .=  '<div class="card-content__wraper">';
                                $output .=  '<p class="ellipsis card-title">'. get_the_title() .'</p>';
                            $output .=  '</div>';
                        $output .=  '</div>';
                    $output .=  '</div>';
                $output .=  '</div>';
                //popup
                $output .=  '<div class="dd-popup portfolio-popup" id="'.$portfolioId.'">';
                    $output .=  '<div class="dd-popup__wraper">';
                        $output .=  '<div class="dd-popup-content">';
                            $output .=  '<div class="dd-popup-header">';
                                $output .=  '<span class="dd-close"></span>';
                            $output .=  '</div>';
                            $output .=  '<div class="dd-popup-body main-content">';
                                $output .=  '<div class="dd-popup-body__wraper">';
                                    $output .=  '<div data-class="'.$portfolioId.'" class="popup-slider portfolio-gallery-slider slider-'.$portfolioId.'">';
                                        
                                        foreach ($fields as $field):
                                            if($field['type'] == 'image'):
                                                $imagesFields = [$field];
                                                foreach ($imagesFields as $imagesField):
                                                    if(isset($imagesField['value']['url'])):
                                                        $imagesUrl = $imagesField['value']['url'];
                                                        $imagesAlt = $imagesField['value']['alt'];
                                                        $imagesTitle = $imagesField['value']['title'];
                                                        $output .=  '<div class="gallery-slide">';
                                                            $output .=  '<img class="gallery-image" src="'.$imagesUrl.'" alt="'.$imagesAlt.'" title="'.$imagesTitle.'">';
                                                        $output .=  '</div>';
                                                    endif;
                                                endforeach;
                                            endif;
                                            endforeach;

                                    $output .=  '</div>';
                                    $output .=  '<div class="portfolio-details">';
                                        $output .=  '<div class="portfolio-details__wraper">';
                                            $output .=  '<div class="portfolio-info">';
                                                $output .=  '<p class="h2-semi-600 portfolio-title">'.$portfolioTitle.'</p>';
                                                $output .=  '<ul class="portfolio-info-list">';
                                                    if($portfolioLocation):
                                                        $output .=  '<li class="label-med-500"><img class="icon" src="'. get_site_url() .'/wp-content/themes/designdesk-child/assets/images/location.svg">Location : '.$portfolioLocation.'</li>';
                                                    endif;
                                                    if($stallSize):
                                                        $output .=  '<li class="label-med-500"><img class="icon" src="'. get_site_url() .'/wp-content/themes/designdesk-child/assets/images/size-icon.svg">Size : '.$stallSize.' sqm</li>';
                                                    endif;
                                                $output .=  '</ul>';
                                            $output .=  '</div>';
                                            $output .=  '<div class="portfolio-slider-thumbnails">';
                                                $output .=  '<div data-class="'.$portfolioId.'" class="popup-slider portfolio-thumbnail-carousel carousel-'.$portfolioId.'">';

                                                    foreach ($fields as $field):
                                                        if($field['type'] == 'image'):
                                                            $imagesFields = [$field];
                                                            foreach ($imagesFields as $imagesField):
                                                                if(isset($imagesField['value']['url'])):
                                                                    $imagesUrl = $imagesField['value']['url'];
                                                                    $imagesAlt = $imagesField['value']['alt'];
                                                                    $imagesTitle = $imagesField['value']['title'];
                                                                    $output .=  '<div class="thumbnail-slide">';
                                                                        $output .=  '<img class="thumbnail-image" src="'.$imagesUrl.'" alt="'.$imagesAlt.'" title="'.$imagesTitle.'" height="62" width="99.2">';
                                                                    $output .=  '</div>';
                                                                endif;
                                                            endforeach;
                                                        endif;
                                                        endforeach;

                                                $output .=  '</div>';
                                            $output .=  '</div>';
                                        $output .=  '</div>';
                                    $output .=  '</div>';
                                $output .=  '</div>';
                                $output .=  '<div class="dd-slider-dots dd-slider-dots-'.$portfolioId.'"></div>';
                            $output .=  '</div>';
                            $output .=  '<div class="dd-popup-footer">';
                            $output .=  '</div>';
                        $output .=  '</div>';
                    $output .=  '</div>';
                $output .=  '</div>';
        }
        $output .='</div>';
    }

    return $output;
}
add_shortcode('dd_portfolios', 'portfolios');

function videos($atts){
    $default = array(
        'total-videos' => -1,
        'featured' => "false"
    );
    $a = shortcode_atts($default, $atts);
    //$output = $output . 'Display Posts: '. $a['total-portfolios'];

    if($a['featured'] == "true"){
        $featured = 1;
    }else{
        $featured = array(0, 1);
    }

    $args = array(
        'posts_per_page' => $a['total-videos'],
        'post_type'     => 'dd_video',
        'orderby'=> 'title',
        'order' => 'ASC',
        'meta_query'    => array(
            'relation'      => 'AND',
            array(
                'key'       => 'featured_video',
                'value'     => $featured,
                'compare'   => '=',
            )
        ),
    );

    $postQuery = new Wp_Query($args);

    if(!empty($postQuery)){

        $output ='';

        $output .='<div class="dd-card-list video-list">';

        $loopCount = 0;		// loop control variable

        while ($postQuery -> have_posts()){

            $loopCount++;

            $postQuery -> the_post();

            if ( get_the_post_thumbnail() ){
                $thumbnailUrl = get_the_post_thumbnail_url();
            } else{
                $thumbnailUrl = get_site_url() . '/wp-content/themes/designdesk-child/assets/images/placeholder-square.jpg';
            }

            $videoPopupId = get_the_ID();

            if(get_field('video_title') == ''){
                $videoTitle = get_the_title();
            }else{
                $videoTitle = get_field('video_title');
            }
            $videoId = get_field('youtube_embed_id');

                $output .=  '<div class="dd-card video-card dd-popupToggler" video-id="'.$videoId.'" target-popup="#'.$videoPopupId.'">';
                    $output .=  '<div class="dd-card__wraper">';
                        $output .=  '<div class="card-image">';
                            $output .=  '<img src="'. $thumbnailUrl .'" alt="'.get_the_title().'" title="'.get_the_title().'" width="280" height="330">';
                            $output .=  '<a class="play-button " ></a>';
                        $output .=  '</div>';
                        $output .=  '<div class="card-content">';
                            $output .=  '<div class="card-content__wraper">';
                                $output .=  '<p class="card-title">'. substrwords($videoTitle, 70 ) .'</p>';
                            $output .=  '</div>';
                        $output .=  '</div>';
                    $output .=  '</div>';
                $output .=  '</div>';
                //popup
                $output .=  '<div class="dd-popup video-popup" id="'.$videoPopupId.'">';
                    $output .=  '<div class="dd-popup__wraper">';
                        $output .=  '<div class="dd-popup-content">';
                            $output .=  '<div class="dd-popup-header">';
                                $output .=  '<span class="dd-close outside" onclick="stopYtPlayer(this)"></span>';
                            $output .=  '</div>';
                            $output .=  '<div class="dd-popup-body main-content">';
                                $output .=  '<div class="dd-popup-body__wraper">';
                                $output .=  '<div id="player'.$loopCount.'"></div>';
                                $output .=  '</div>';
                                $output .=  '<div class="dd-slider-dots dd-slider-dots-'.$videoPopupId.'"></div>';
                            $output .=  '</div>';
                            $output .=  '<div class="dd-popup-footer">';
                            $output .=  '</div>';
                        $output .=  '</div>';
                    $output .=  '</div>';
                $output .=  '</div>';
        }
        $output .='</div>';
    }

    return $output;
}
add_shortcode('dd_videos', 'videos');