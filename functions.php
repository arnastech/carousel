<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

function trim_title($title){
	if(strlen($title) > 25) {
		return substr($title, 0, 25);
	}
	return $title;
}

function trim_excerpt($excerpt){
	if(strlen($excerpt) > 50) {
		return trim(substr($excerpt, 0, 50)).'...';
	}
	return $excerpt;
}
add_filter('the_excerpt', 'custom_short_excerpt');

function carousel_init() {
	add_image_size('carousel_display', 256, 512, true);
	add_shortcode('carousel', 'carousel_display');
    $args = array(
        'public' => true,
        'label' => 'Carousel items',
        'supports' => array(
			'title',
			'excerpt',
            'thumbnail'
        )
    );
    register_post_type('carousel_images', $args);
}
add_theme_support( 'post-thumbnails' );
add_action('init', 'carousel_init');

function carousel_display($type='carousel_display') {
	global $post;
	$args = array(
		'post_type' => 'carousel_images',
		'posts_per_page' => 5,
		'orderby' => 'menu_order'
	);

    $result = '<div id="carousel-main" class="carousel slide carousel-fade" data-ride="carousel">';
    $result .= '<div class="carousel-inner">';

    //the main loop
	$loop = new WP_Query($args);
	$i = 1;
    while ($loop->have_posts()) {
		$loop->the_post();

		if($i == 1) {
			$isactive = 'active';
		} else {
			$isactive = '';
		}
		
		$result .= '<div class="carousel-item '.$isactive.'"><div class="row"><div class="col-12 col-sm-7 col-md-8 col-lg-8">'; 
		$result .= '<h2 class="slide-number">0'.$i.'.</h2>';
		$result .= '<span class="title">'.trim_title(get_the_title()).'</span>';
		$result .= '<p class="description">'.trim_excerpt($post->post_excerpt).'</p>';
		$the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'carousel_display');
		$result .= '</div><div class="col-12 col-sm-5 col-md-4 col-lg-4 image">';
        	$result .='<img title="'.get_the_title().'" src="' . $the_url[0] . '" class="slide-image d-block"/>';
		$result .= '</div></div></div>';

		$i++;
	}
	
	// close out inner
	$result .='</div>';
	
	// controls
	$result .='
			<div class="carousel-controls">
			<a class="left carousel-control-prev " href="#carousel-main" role="button" data-slide="prev">
				<img class="prev-img" src="'.get_template_directory_uri().'/img/arrow.png">
			</a>
			<a class="right carousel-control-next" href="#carousel-main" role="button" data-slide="next">
				<img class="next-img" src="'.get_template_directory_uri().'/img/arrow.png">
			</a>
			</div>
		';
	// indicators
	$result .='<ol class="carousel-indicators">';

	$j=1;
	while ($loop->have_posts()) {
		$loop->the_post();	

		$dataID = $j - 1;

		if($j == 1) {
			$isactive = 'active';
		} else {
			$isactive = '';
		}
			$result .='<li data-target="#carousel-main" class="'.$isactive.'" data-slide-to="'.$dataID.'" class=""><span class="indicator-number">0'.$j.'</span></li>';	
	 $j++;
	}
	$result .='</ol>';

	// close out carousel-main
	$result .='</div>';

    return $result;
}
