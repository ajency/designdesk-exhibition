<?php

class social_links_widget extends WP_Widget
{

    public function __construct()
    {
        // actual widget processes
        parent::__construct(
            'social_links', // Base ID
            'Social Links', // Name
            [
                'description' => __('Dispaly social links.', 'designdesk'),
            ] // Args
        );
    }

    public function widget($args, $instance)
    {
        // outputs the content of the widget
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $youtube_link = $instance['youtube_link'];
        $twitter_link = $instance['twitter_link'];
        $facebook_link = $instance['facebook_link'];
        $instagram_link = $instance['instagram_link'];
        $linkedin_link = $instance['linkedin_link'];

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }
?>
        <ul class="social-links">

            <?php if (!empty($linkedin_link)) { ?>
                <li class="social-link"><a href="<?php esc_url_raw($linkedin_link) ?>" target="_blank">
                    <div class="icon">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.83851 0C3.52794 0 0 3.52786 0 7.83851V32.1628C0 36.4733 3.52786 40 7.83851 40H32.1628C36.4734 40 40 36.4734 40 32.1628V7.83851C40 3.52794 36.4734 0 32.1628 0H7.83851ZM9.81001 6.6008C11.8768 6.6008 13.1499 7.95764 13.1892 9.74118C13.1892 11.4853 11.8768 12.8803 9.77003 12.8803H9.73125C7.70377 12.8803 6.39331 11.4854 6.39331 9.74118C6.39331 7.95768 7.74342 6.6008 9.80997 6.6008H9.81001ZM27.621 14.9368C31.5959 14.9368 34.5756 17.5349 34.5756 23.1179V33.5404H28.5349V23.8166C28.5349 21.3732 27.6606 19.7061 25.4745 19.7061C23.8056 19.7061 22.8108 20.8297 22.3741 21.9152C22.2145 22.3035 22.1753 22.8459 22.1753 23.3891V33.5404H16.1346C16.1346 33.5404 16.2138 17.0687 16.1346 15.3631H22.1766V17.9372C22.9793 16.6987 24.4152 14.9368 27.621 14.9368V14.9368ZM6.74963 15.3644H12.7904V33.5405H6.74963V15.3644Z" fill="white"/>
                        </svg>
                    </div>
                    </a></li>
            <?php } ?>

            <?php if (!empty($facebook_link)) { ?>
                <li class="social-link"><a href="<?php echo esc_url_raw($facebook_link) ?>" target="_blank">
                        <div class="icon"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M31.9962 16.098C31.9962 7.20605 24.8322 -0.00195312 15.9962 -0.00195312C7.15619 4.68751e-05 -0.0078125 7.20605 -0.0078125 16.1C-0.0078125 24.134 5.84419 30.794 13.4922 32.002V20.752H9.43219V16.1H13.4962V12.55C13.4962 8.51605 15.8862 6.28805 19.5402 6.28805C21.2922 6.28805 23.1222 6.60205 23.1222 6.60205V10.562H21.1042C19.1182 10.562 18.4982 11.804 18.4982 13.078V16.098H22.9342L22.2262 20.75H18.4962V32C26.1442 30.792 31.9962 24.132 31.9962 16.098Z" fill="#041925" />
                            </svg>
                        </div>
                    </a></li>
            <?php } ?>

            <?php if (!empty($twitter_link)) { ?>
                <li class="social-link"><a href="<?php echo esc_url_raw($twitter_link) ?>" target="_blank">
                        <div class="icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 0C7.16429 0 0 7.16429 0 16C0 24.8357 7.16429 32 16 32C24.8357 32 32 24.8357 32 16C32 7.16429 24.8357 0 16 0ZM23.6893 12.0607C23.7 12.2286 23.7 12.4036 23.7 12.575C23.7 17.8179 19.7071 23.8571 12.4107 23.8571C10.1607 23.8571 8.075 23.2036 6.31786 22.0786C6.63929 22.1143 6.94643 22.1286 7.275 22.1286C9.13214 22.1286 10.8393 21.5 12.2 20.4357C10.4571 20.4 8.99286 19.2571 8.49286 17.6857C9.10357 17.775 9.65357 17.775 10.2821 17.6143C9.38474 17.432 8.57812 16.9446 7.99934 16.2349C7.42056 15.5253 7.10531 14.6372 7.10714 13.7214V13.6714C7.63214 13.9679 8.25 14.15 8.89643 14.175C8.35301 13.8128 7.90735 13.3222 7.59897 12.7465C7.29059 12.1709 7.12901 11.528 7.12857 10.875C7.12857 10.1357 7.32143 9.46071 7.66786 8.875C8.66394 10.1012 9.9069 11.1041 11.3159 11.8184C12.725 12.5328 14.2686 12.9427 15.8464 13.0214C15.2857 10.325 17.3 8.14286 19.7214 8.14286C20.8643 8.14286 21.8929 8.62143 22.6179 9.39286C23.5143 9.225 24.3714 8.88929 25.1357 8.43929C24.8393 9.35714 24.2179 10.1321 23.3929 10.6214C24.1929 10.5357 24.9643 10.3143 25.6786 10.0036C25.1393 10.7964 24.4643 11.5 23.6893 12.0607Z" fill="#041925" />
                            </svg>

                        </div>
                    </a></li>
            <?php } ?>

            <?php if (!empty($instagram_link)) { ?>
                <li class="social-link"><a href="<?php esc_url_raw($instagram_link) ?>" target="_blank">
                        <div class="icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M29.9034 8.85464C29.8866 7.59501 29.6504 6.34789 29.2054 5.16909C28.8194 4.17477 28.23 3.27176 27.4747 2.51774C26.7195 1.76372 25.8149 1.17527 24.819 0.789999C23.6534 0.353183 22.422 0.116989 21.1773 0.0914737C19.5746 0.019958 19.0665 0 14.9983 0C10.9301 0 10.4087 1.11523e-07 8.81775 0.0914737C7.57357 0.117176 6.34276 0.353368 5.1777 0.789999C4.18157 1.175 3.27691 1.76335 2.5216 2.51741C1.76629 3.27146 1.17696 4.17462 0.791315 5.16909C0.352895 6.33185 0.11682 7.56089 0.0932919 8.80308C0.021657 10.4047 0 10.912 0 14.9734C0 19.0348 -9.30909e-09 19.5537 0.0932919 21.1437C0.118281 22.3877 0.353176 23.6152 0.791315 24.781C1.17761 25.7752 1.76737 26.678 2.52294 27.4317C3.2785 28.1854 4.18325 28.7736 5.17936 29.1585C6.34124 29.6128 7.57226 29.8659 8.81942 29.9069C10.4237 29.9784 10.9318 30 15 30C19.0682 30 19.5896 30 21.1806 29.9069C22.4253 29.8824 23.6568 29.6468 24.8223 29.21C25.818 28.8243 26.7223 28.2357 27.4775 27.4817C28.2327 26.7278 28.8223 25.825 29.2087 24.8309C29.6468 23.6667 29.8817 22.4393 29.9067 21.1936C29.9783 19.5936 30 19.0864 30 15.0233C29.9967 10.9619 29.9967 10.4463 29.9034 8.85464ZM14.9883 22.6538C10.7336 22.6538 7.28676 19.2128 7.28676 14.9651C7.28676 10.7174 10.7336 7.27631 14.9883 7.27631C17.0309 7.27631 18.9899 8.08637 20.4342 9.5283C21.8785 10.9702 22.6899 12.9259 22.6899 14.9651C22.6899 17.0043 21.8785 18.9599 20.4342 20.4019C18.9899 21.8438 17.0309 22.6538 14.9883 22.6538ZM22.9964 8.78479C22.7605 8.78501 22.5269 8.73878 22.3089 8.64876C22.091 8.55874 21.8929 8.42668 21.7261 8.26015C21.5593 8.09363 21.427 7.89589 21.3368 7.67827C21.2467 7.46065 21.2004 7.22741 21.2006 6.99191C21.2006 6.75657 21.247 6.52354 21.3372 6.30612C21.4274 6.0887 21.5596 5.89114 21.7263 5.72474C21.893 5.55833 22.0909 5.42633 22.3087 5.33627C22.5265 5.24621 22.7599 5.19986 22.9956 5.19986C23.2313 5.19986 23.4648 5.24621 23.6825 5.33627C23.9003 5.42633 24.0982 5.55833 24.2649 5.72474C24.4316 5.89114 24.5638 6.0887 24.654 6.30612C24.7442 6.52354 24.7907 6.75657 24.7907 6.99191C24.7907 7.98315 23.9877 8.78479 22.9964 8.78479Z" fill="#041925" />
                                <path d="M15 20C17.7614 20 20 17.7614 20 15C20 12.2386 17.7614 10 15 10C12.2386 10 10 12.2386 10 15C10 17.7614 12.2386 20 15 20Z" fill="#041925" />
                            </svg>

                        </div>
                    </a></li>
            <?php } ?>

            <?php if (!empty($youtube_link)) { ?>
                <li class="social-link"><a href="<?php echo esc_url_raw($youtube_link) ?>" target="_blank">
                        <div class="icon"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.5654 15.7327L14.9718 14.0559C14.6582 13.9103 14.4006 14.0735 14.4006 14.4207V17.5791C14.4006 17.9263 14.6582 18.0895 14.9718 17.9439L18.5638 16.2671C18.879 16.1199 18.879 15.8799 18.5654 15.7327ZM16.0006 0.639893C7.51743 0.639893 0.640625 7.51669 0.640625 15.9999C0.640625 24.4831 7.51743 31.3599 16.0006 31.3599C24.4838 31.3599 31.3606 24.4831 31.3606 15.9999C31.3606 7.51669 24.4838 0.639893 16.0006 0.639893ZM16.0006 22.2399C8.13823 22.2399 8.00062 21.5311 8.00062 15.9999C8.00062 10.4687 8.13823 9.75989 16.0006 9.75989C23.863 9.75989 24.0006 10.4687 24.0006 15.9999C24.0006 21.5311 23.863 22.2399 16.0006 22.2399Z" fill="#041925" />
                            </svg>
                        </div>
                    </a></li>
            <?php } ?>

        </ul>
    <?php
        echo $after_widget;
    }

    public function form($instance)
    {
        // outputs the options form in the admin
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $youtube_link = !empty($instance['youtube_link']) ? $instance['youtube_link'] : '';
        $twitter_link = !empty($instance['twitter_link']) ? $instance['twitter_link'] : '';
        $facebook_link = !empty($instance['facebook_link']) ? $instance['facebook_link'] : '';
        $instagram_link = !empty($instance['instagram_link']) ? $instance['instagram_link'] : '';
        $linkedin_link = !empty($instance['linkedin_link']) ? $instance['linkedin_link'] : '';
    ?>
        <p>
            <label for=" <?php echo $this->get_field_name('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('youtube_link'); ?>"><?php _e('Youtube:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube_link'); ?>" name="<?php echo $this->get_field_name('youtube_link'); ?>" type="text" value="<?php echo esc_attr($youtube_link); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('twitter_link'); ?>"><?php _e('Twitter:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" type="text" value="<?php echo esc_attr($twitter_link); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('facebook_link'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook_link'); ?>" name="<?php echo $this->get_field_name('facebook_link'); ?>" type="text" value="<?php echo esc_attr($facebook_link); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('instagram_link'); ?>"><?php _e('Instagram:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram_link'); ?>" name="<?php echo $this->get_field_name('instagram_link'); ?>" type="text" value="<?php echo esc_attr($instagram_link); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('linkedin_link'); ?>"><?php _e('LinkedIn:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin_link'); ?>" name="<?php echo $this->get_field_name('linkedin_link'); ?>" type="text" value="<?php echo esc_attr($linkedin_link); ?>" />
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['youtube_link'] = (!empty($new_instance['youtube_link'])) ? strip_tags($new_instance['youtube_link']) : '';
        $instance['twitter_link'] = (!empty($new_instance['twitter_link'])) ? strip_tags($new_instance['twitter_link']) : '';
        $instance['facebook_link'] = (!empty($new_instance['facebook_link'])) ? strip_tags($new_instance['facebook_link']) : '';
        $instance['instagram_link'] = (!empty($new_instance['instagram_link'])) ? strip_tags($new_instance['instagram_link']) : '';
        $instance['linkedin_link'] = (!empty($new_instance['linkedin_link'])) ? strip_tags($new_instance['linkedin_link']) : '';

        return $instance;
    }
}

add_action('widgets_init', 'wpdocs_register_widgets');

function wpdocs_register_widgets()
{
    register_widget('social_links_widget');
}

?>