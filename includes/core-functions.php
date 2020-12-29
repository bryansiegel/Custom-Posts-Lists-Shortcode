<?php //Custom Posts List Shortcode - Core Functions

function custom_loop_shortcode_get_posts( $atts ) {

	global $post;

	extract( shortcode_atts( array(
		// 'category_name' => '',
		// 'author_name' => '',
		// 'sentence' => true,
		'posts_per_page' => 5,
		'orderby' => 'date',
	), $atts ) );

	//define get_post params
	// $args = array( 'posts_per_page' => $posts_per_page, 'orderby' => $orderby, 'category_name' => $category_name, 'author_name' => $author_name, 'sentence' => $sentence );

	$args = array( 'posts_per_page' => $posts_per_page, 'orderby' => $orderby);

	//query the posts with wp_query instead
	// $posts = get_posts( $args );

	$posts = new WP_Query( $args );

	$output = '<h3>Posts</h3>';
	// $output .= '<ul>';

	if ( $posts->have_posts() ) {

		while ( $posts->have_posts() ) {

			$posts->the_post();

			$output .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
			$output .= get_the_content();
			wp_reset_postdata();

		}
	} else {
		$output .= esc_html('Sorry No Posts');
	}

	return $output;

	//loop through the posts
	// foreach ($posts as $post) {

	// 	//prepare post data
	// 	setup_postdata( $post );

	// //continue output
	// 	$output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
	// }

	//reset post
	// wp_reset_postdata();

	// //output complete
	// $output .= '</ul>';

	// return $output;
}


add_shortcode('get_posts_loop', 'custom_loop_shortcode_get_posts');