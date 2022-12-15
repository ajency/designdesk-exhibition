<?php 

function filter_portfolios(){
	
	$industry = $_POST['industry'];
	$stallSize = $_POST['stall_size'];
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
	} else {
		ob_start();
			$args = array( 'post_type_title' => 'portfolio' );
	  		$response .= get_template_part('template-parts/state', 'empty', $args);
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
add_action('wp_ajax_filter_portfolios', 'filter_portfolios');
add_action('wp_ajax_nopriv_filter_portfolios', 'filter_portfolios');