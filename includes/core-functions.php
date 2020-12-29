<?php //Custom Posts List Shortcode - Core Functions

function custom_loop_shortcode_get_posts( $atts ) {

	global $post;

	extract( shortcode_atts( array(
		'posts_per_page' => 5,
		'orderby' => 'date',
	), $atts ) );

	//define get_post params
	$args = array( 'posts_per_page' => $posts_per_page, 'orderby' => $orderby );

	//get the posts
	$posts = get_posts( $args );

	$output = '<h3>Posts</h3>';
	$output .= '<ul>';

	//loop through the posts
	foreach ($posts as $post) {
		
		//prepare post data
		setup_postdata( $post );

	//continue output
		$output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
	}

	//reset post
	wp_reset_postdata();

	//output complete
	$output .= '</ul>';

	return $output;
}
add_shortcode('get_posts_loop', 'custom_loop_shortcode_get_posts');