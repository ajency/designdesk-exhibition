<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_sample_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}

add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function genesis_sample_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style( // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- see https://core.trac.wordpress.org/ticket/49742
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		null
	);

	wp_enqueue_style( 'dashicons' );

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}

}

add_filter( 'body_class', 'genesis_sample_body_classes' );
/**
 * Add additional classes to the body element.
 *
 * @since 3.4.1
 *
 * @param array $classes Classes array.
 * @return array $classes Updated class array.
 */
function genesis_sample_body_classes( $classes ) {

	if ( ! genesis_is_amp() ) {
		// Add 'no-js' class to the body class values.
		$classes[] = 'no-js';
	}
	return $classes;
}

add_action( 'genesis_before', 'genesis_sample_js_nojs_script', 1 );
/**
 * Echo the script that changes 'no-js' class to 'js'.
 *
 * @since 3.4.1
 */
function genesis_sample_js_nojs_script() {

	if ( genesis_is_amp() ) {
		return;
	}

	?>
	<script>
	//<![CDATA[
	(function(){
		var c = document.body.classList;
		c.remove( 'no-js' );
		c.add( 'js' );
	})();
	//]]>
	</script>
	<?php
}

add_filter( 'wp_resource_hints', 'genesis_sample_resource_hints', 10, 2 );
/**
 * Add preconnect for Google Fonts.
 *
 * @since 3.4.1
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function genesis_sample_resource_hints( $urls, $relation_type ) {

	if ( wp_style_is( genesis_get_theme_handle() . '-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = [
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		];
	}

	return $urls;
}

add_action( 'after_setup_theme', 'genesis_sample_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_setup_theme', 'genesis_sample_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );
add_image_size( 'genesis-singular-images', 702, 526, true );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}

/***************************************************************************
***************************** CUSTOM CODE **********************************
***************************************************************************/

/* shortcodes */
include('shortcodes/shortcodes.php');

/* widgets */
include('widgets/all_widgets.php');

/* Filters */
include('filters/filters.php');

/* enqueue stylesheets */
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles' );

function enqueue_child_theme_styles() {
	wp_enqueue_style('theme-font-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false); 
	wp_enqueue_style('theme-font-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false); 
	wp_enqueue_style('critical-css', get_stylesheet_directory_uri() . '/assets/css/critical-css.css', array(), '0.1', false); 
	wp_enqueue_style('slick-styles', get_stylesheet_directory_uri() . '/assets/css/slick.css', array(), '0.1', false);
 	wp_enqueue_style('theme-styles', get_stylesheet_directory_uri() . '/assets/css/theme-styles.css', array(), '0.1', false);
}

/* enqueue scripts */
function enqueue_child_theme_scripts() { 
	global $wp_query;
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_stylesheet_directory_uri().'/assets/js/jquery.min.js' , '', '', false );
	wp_register_script( 'critical-scripts', get_stylesheet_directory_uri().'/assets/js/critical-scripts.js' , '', '0.1', false );
	wp_register_script( 'slick-script', get_stylesheet_directory_uri().'/assets/js/slick.min.js' , '', '3.6.1', true );
	wp_register_script( 'theme-scripts', get_stylesheet_directory_uri().'/assets/js/theme-scripts.js' , '', '0.1', true );
	wp_register_script( 'filters-scripts', get_stylesheet_directory_uri().'/assets/js/filters.js' , '', '0.1', true );


    wp_localize_script( 'theme-scripts', 'ajax_params', array(
		'url' => site_url() . '/wp-admin/admin-ajax.php', 
	) );
   	wp_enqueue_script('jquerys');
    wp_enqueue_script('critical-scripts');
	wp_enqueue_script('slick-script');
	wp_enqueue_script('theme-scripts');
	wp_enqueue_script('filters-scripts');
}
add_action("wp_enqueue_scripts", "enqueue_child_theme_scripts");


function wpb_widgets_init() {
 
    register_sidebar( array(
        'name'          => 'Header Bottom Area',
        'id'            => 'header-bottom-area',
        'before_widget' => '<div class="dd-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="dd-title">',
        'after_title'   => '</p>',
    ) );
 
}
add_action( 'widgets_init', 'wpb_widgets_init' );

/**
 * WP - Load CSS Asynchronously
 * Eliminate blocking-resources
 */
function ct_style_loader_tag($html, $handle) {
    $async_loading = array(
		'theme-font-montserrat',
		'theme-font-poppins',
		'critical-css',
		'slick-styles',
		'theme-styles'
    );
    if( in_array($handle, $async_loading) ) {
        $async_html = str_replace("rel='stylesheet'", "rel='preload' as='style' onload='this.onload=null;this.rel='stylesheet''", $html);
        $async_html .= str_replace( 'media=\'all\'', 'media="print" onload="this.media=\'all\'"', $html );
        return $async_html;
    }
    return $html;
}
add_filter('style_loader_tag', 'ct_style_loader_tag', 10, 2);

//defer
function defer_parsing_of_js ( $url ) {
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return "$url' defer";
	}
	add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );

//portfolio
function dd_portfolio_type() {
	register_post_type('dd_portfolio',
		array(
			'labels'      => array(
				'name'          => __('Portfolios', 'designdesk-child'),
				'singular_name' => __('portfolio', 'designdesk-child'),
				'all_items'           => __( 'All Portfolios', 'designdesk-child' ),
				'add_new'        => __( 'Add New Portfolio', 'designdesk-child' ),
			),
				'public'      => true,
				'has_archive' => true,
				'publicly_queryable'  => false, // disable single & archive page
				'rewrite'     => array( 'slug' => 'portfolios' ), // my custom slug
				'menu_icon' => 'dashicons-portfolio',
				'show_in_rest' => true,
				'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
				'taxonomies' => array( 'dd_industries' ),
		)
	);
}
add_action('init', 'dd_portfolio_type');

//add_post_type_support('dd_portfolio', 'genesis-seo');

// portfolio -Industry
function dd_register_taxonomy_industry() {
	$labels = array(
		'name'              => _x( 'Industries', 'designdesk-child' ),
		'singular_name'     => _x( 'Industry', 'designdesk-child' ),
		'search_items'      => __( 'Search Industries' ),
		'all_items'         => __( 'All Industries' ),
		'parent_item'       => __( 'Parent Industry' ),
		'parent_item_colon' => __( 'Parent Industry:' ),
		'edit_item'         => __( 'Edit Industry' ),
		'update_item'       => __( 'Update Industry' ),
		'add_new_item'      => __( 'Add New Industry' ),
		'new_item_name'     => __( 'New Industry Name' ),
		'menu_name'         => __( 'Industries' ),
	);
	$args   = array(
		'hierarchical'      => true, // make it hierarchical (like categories)
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'industry' ],
		'show_in_rest'		=> true,
	);
	register_taxonomy( 'dd_industries', [ 'dd_portfolio' ], $args );
}
add_action( 'init', 'dd_register_taxonomy_industry' );

//videos
function dd_video_type() {
	register_post_type('dd_video',
		array(
			'labels'      => array(
				'name'          => __('Videos', 'designdesk-child'),
				'singular_name' => __('video', 'designdesk-child'),
				'all_items'           => __( 'All Videos', 'designdesk-child' ),
				'add_new'        => __( 'Add New Video', 'designdesk-child' ),
			),
				'public'      => true,
				'has_archive' => true,
				'publicly_queryable'  => false, // disable single & archive page
				'rewrite'     => array( 'slug' => 'video' ), // my custom slug
				'menu_icon' => 'dashicons-video-alt3',
				'show_in_rest' => true,
				'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
		)
	);
}
add_action('init', 'dd_video_type');

//case studies
function dd_case_study() {
	register_post_type('dd_case_study',
		array(
			'labels'      => array(
				'name'          => __('Case Studies', 'designdesk-child'),
				'singular_name' => __('Case Study', 'designdesk-child'),
				'all_items'           => __( 'All Case Studies', 'designdesk-child' ),
				'add_new'        => __( 'Add New Case Study', 'designdesk-child' ),
			),
				'public'      => true,
				'has_archive' => true,
				'rewrite'     => array( 'slug' => 'case-study' ), // my custom slug
				'menu_icon' => 'dashicons-format-aside',
				'show_in_rest' => true,
				'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
		)
	);
}
add_action('init', 'dd_case_study');

// substr words
function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}

// clear string

function cleanStr($string){
    // Replaces all spaces with hyphens.
    $string = str_replace(' ', '-', $string);

    // Removes special chars.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    // Replaces multiple hyphens with single one.
    $string = preg_replace('/-+/', '-', $string);
    
    return strtolower($string);
}

// load more
function dd_load_more_next_page(){
	$industry = $_POST['industry'];
	$stallSize = $_POST['stallSize'];
	$location = $_POST['location'];

	$args = [
		'post_type' => 'dd_portfolio',
		'posts_per_page' => 3, // portfolio posts per page
		'order_by' => 'date',
		'order' => 'desc',
	  	'paged' => $_POST['paged'],
	];

	if(!empty($industry)){
		$args['tax_query'][] = [
			'taxonomy' => 'dd_industries',
			'field'    => 'slug',
			'terms'    => $industry,
		];
	}
	
	if(!empty($location)){
		$args['meta_query']['relation'] = 'AND';
		$args['meta_query'][] = [
			'key'       => 'location',
			'value'     => $location,
			'compare'   => '=',
		];
	}

	if(!empty($stallSize)){
		$args['meta_query'][] = [
			'key'       => 'stall_size',
			'value'     => $stallSize,
			'compare'   => '=',
		];
	}

	$ajaxposts = new WP_Query($args);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;
  
	if($ajaxposts->have_posts()) {
		ob_start();
	  	while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .=  get_template_part('template-parts/card', 'portfolio');
	  	endwhile;
	 	$output = ob_get_contents();
    	ob_end_clean();
	}

	$result = [
		'max' => $max_pages,
		'stallSize' => $stallSize,
		'industry' => $industry,
		'location' => $location,
		'html' => $output,
	];
  
	echo json_encode($result);
	exit;
}
add_action('wp_ajax_dd_load_more_next_page', 'dd_load_more_next_page');
add_action('wp_ajax_nopriv_dd_load_more_next_page', 'dd_load_more_next_page');

function dd_load_more(){
	$industry = $_POST['filtredIndustry'];
	$stallSize = $_POST['filtredStallSize'];
	$location = $_POST['filtredLocation'];

	$args = [
		'post_type' => 'dd_portfolio',
		'posts_per_page' => 3, // portfolio posts per page
		'order_by' => 'date',
		'order' => 'desc',
	  	'paged' => $_POST['paged'],
	];

	if(!empty($industry)){
		$args['tax_query'][] = [
			'taxonomy' => 'dd_industries',
			'field'    => 'slug',
			'terms'    => $industry,
		];
	}
	
	if(!empty($location)){
		$args['meta_query']['relation'] = 'AND';
		$args['meta_query'][] = [
			'key'       => 'location',
			'value'     => $location,
			'compare'   => '=',
		];
	}

	if(!empty($stallSize)){
		$args['meta_query'][] = [
			'key'       => 'stall_size',
			'value'     => $stallSize,
			'compare'   => '=',
		];
	}

	$ajaxposts = new WP_Query($args);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;
  
	if($ajaxposts->have_posts()) {
		ob_start();
	  	while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .=  get_template_part('template-parts/card', 'portfolio');
	  	endwhile;
	 	$output = ob_get_contents();
    	ob_end_clean();
	}

	$result = [
		'max' => $max_pages,
		'stallSize' => $stallSize,
		'industry' => $industry,
		'location' => $location,
		'html' => $output,
	];
  
	echo json_encode($result);
	exit;
}
add_action('wp_ajax_dd_load_more', 'dd_load_more');
add_action('wp_ajax_nopriv_dd_load_more', 'dd_load_more');

function dd_load_more_default(){
	$paged = $_POST['paged'];
	$postType = $_POST['postType'];
	$cardTemplate = $_POST['cardTemplate'];
	$postsPerPage = $_POST['postsPerPage'];

	$ajaxposts = new WP_Query([
		'post_type' => $postType,
		'posts_per_page' => $postsPerPage,
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => $paged,
	]);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;

	if($ajaxposts->have_posts()) {
		ob_start();
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .= get_template_part('template-parts/card', $cardTemplate);
		endwhile;
		$output = ob_get_contents();
    	ob_end_clean();
	  } else {
		$response = '';
	}

	$result = [
		'max' => $max_pages,
		'html' => $output,
	  ];

	echo json_encode($result);
	exit;
}
add_action('wp_ajax_dd_load_more_default', 'dd_load_more_default');
add_action('wp_ajax_nopriv_dd_load_more_default', 'dd_load_more_default');

// Post reading time
function post_read_time() {
 
	// get the post content
	$content = get_post_field( 'post_content', get_the_ID());
	 
	// count the words
	$word_count = str_word_count( strip_tags( $content ) );
	 
	// reading time itself	
	$readingtime = ceil($word_count / 100);
	 
	if ($readingtime == 1) {
	 $timer = " min read";
	} else {
	 $timer = " min read";
	}

	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}

/* date & reading time */
function date_n_readTime($postDate, $postReadTime){
	?>
		<div class="post-details">
			<p class="post-date">
				<span class="icon">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M19.0039 4.00098H17.0039V3.00098C17.0039 2.73576 16.8986 2.48141 16.711 2.29387C16.5235 2.10633 16.2691 2.00098 16.0039 2.00098C15.7387 2.00098 15.4843 2.10633 15.2968 2.29387C15.1093 2.48141 15.0039 2.73576 15.0039 3.00098V4.00098H9.00391V3.00098C9.00391 2.73576 8.89855 2.48141 8.71101 2.29387C8.52348 2.10633 8.26912 2.00098 8.00391 2.00098C7.73869 2.00098 7.48434 2.10633 7.2968 2.29387C7.10926 2.48141 7.00391 2.73576 7.00391 3.00098V4.00098H5.00391C4.20826 4.00098 3.4452 4.31705 2.88259 4.87966C2.31998 5.44227 2.00391 6.20533 2.00391 7.00098V19.001C2.00391 19.7966 2.31998 20.5597 2.88259 21.1223C3.4452 21.6849 4.20826 22.001 5.00391 22.001H19.0039C19.7996 22.001 20.5626 21.6849 21.1252 21.1223C21.6878 20.5597 22.0039 19.7966 22.0039 19.001V7.00098C22.0039 6.20533 21.6878 5.44227 21.1252 4.87966C20.5626 4.31705 19.7996 4.00098 19.0039 4.00098V4.00098ZM20.0039 19.001C20.0039 19.2662 19.8986 19.5205 19.711 19.7081C19.5235 19.8956 19.2691 20.001 19.0039 20.001H5.00391C4.73869 20.001 4.48434 19.8956 4.2968 19.7081C4.10926 19.5205 4.00391 19.2662 4.00391 19.001V12.001H20.0039V19.001ZM20.0039 10.001H4.00391V7.00098C4.00391 6.73576 4.10926 6.48141 4.2968 6.29387C4.48434 6.10633 4.73869 6.00098 5.00391 6.00098H7.00391V7.00098C7.00391 7.26619 7.10926 7.52055 7.2968 7.70808C7.48434 7.89562 7.73869 8.00098 8.00391 8.00098C8.26912 8.00098 8.52348 7.89562 8.71101 7.70808C8.89855 7.52055 9.00391 7.26619 9.00391 7.00098V6.00098H15.0039V7.00098C15.0039 7.26619 15.1093 7.52055 15.2968 7.70808C15.4843 7.89562 15.7387 8.00098 16.0039 8.00098C16.2691 8.00098 16.5235 7.89562 16.711 7.70808C16.8986 7.52055 17.0039 7.26619 17.0039 7.00098V6.00098H19.0039C19.2691 6.00098 19.5235 6.10633 19.711 6.29387C19.8986 6.48141 20.0039 6.73576 20.0039 7.00098V10.001Z" fill="white" />
					</svg>

				</span><?php echo $postDate ?>
			</p>
			<p class="post-reading-time"><span class="icon">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M1.40393 12.0009C1.40393 6.14666 6.14971 1.40088 12.0039 1.40088C17.8582 1.40088 22.6039 6.14666 22.6039 12.0009C22.6039 17.8551 17.8582 22.6009 12.0039 22.6009C6.14971 22.6009 1.40393 17.8551 1.40393 12.0009ZM12.0039 2.60088C6.81245 2.60088 2.60393 6.8094 2.60393 12.0009C2.60393 17.1923 6.81245 21.4009 12.0039 21.4009C17.1954 21.4009 21.4039 17.1923 21.4039 12.0009C21.4039 6.8094 17.1954 2.60088 12.0039 2.60088Z" fill="white" />
						<path fill-rule="evenodd" clip-rule="evenodd" d="M12 5.3999C12.3314 5.3999 12.6 5.66853 12.6 5.9999V12.1718C12.6 12.1718 12.6 12.1718 12.6 12.1718C12.6001 12.543 12.7477 12.8991 13.0102 13.1616L15.4243 15.5756C15.6586 15.81 15.6586 16.1899 15.4243 16.4242C15.19 16.6585 14.8101 16.6585 14.5758 16.4242L12.1618 14.0102C12.1618 14.0102 12.1618 14.0102 12.1618 14.0102C11.6742 13.5227 11.4002 12.8615 11.4 12.172V5.9999C11.4 5.66853 11.6687 5.3999 12 5.3999Z" fill="white" />
					</svg>

				</span><?php echo $postReadTime; ?></p>
		</div>
	<?php
}

/* pagination */
if ( ! function_exists( 'post_pagination' ) ) :
	function post_pagination($passedQuery) {
	  $pager = 999999999; // need an unlikely integer?>
		<div class="post-pagination">
			<div class="post-pagination__wraper">
				<?php echo paginate_links( array(
				'base' => str_replace( $pager, '%#%', esc_url( get_pagenum_link( $pager ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $passedQuery->max_num_pages,
				'show_all' => False,
				'prev_next' => True,
				'prev_text' => __('<svg fill=none height=20 viewBox="0 0 12 20"width=12 xmlns=http://www.w3.org/2000/svg><path d="M10 17.7773L2.22222 9.99957L10 2.22179"stroke=white stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg>'),
				'next_text' => __('<svg fill=none height=20 viewBox="0 0 12 20"width=12 xmlns=http://www.w3.org/2000/svg><path d="M2 17.7773L9.77778 9.99957L2 2.22179"stroke=#2471B5 stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg>'),
				) ); ?>
			</div>
		</div>
<?php } endif; ?>