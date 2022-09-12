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

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }
?>
        <ul class="social-links">
            <?php if (!empty($title)) { ?>
                <li class="social-link"><a href="<?php echo esc_url_raw($youtube_link) ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/youtube.png" title="youtube" alt="youtube"></a></li>
            <?php } ?>
            <?php if (!empty($twitter_link)) { ?>
                <li class="social-link"><a href="<?php echo esc_url_raw($twitter_link) ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/twitter.png" title="twitter" alt="twitter"></a></li>
            <?php } ?>
            <?php if (!empty($facebook_link)) { ?>
                <li class="social-link"><a href="<?php echo esc_url_raw($facebook_link) ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facebook.png" title="facebook" alt="facebook"></a></li>
            <?php } ?>
            <?php if (!empty($instagram_link)) { ?>
                <li class="social-link"><a href="<?php esc_url_raw($instagram_link) ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/instagram.png" title="instagram" alt="instagram"></a></li>
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

        return $instance;
    }
}

add_action('widgets_init', 'wpdocs_register_widgets');

function wpdocs_register_widgets()
{
    register_widget('social_links_widget');
}

?>