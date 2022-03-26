<?php if ( $query_result->have_posts() ) {
	while ( $query_result->have_posts() ) : $query_result->the_post();
		$params['item_classes']    = $this_shortcode->get_item_classes( $params );
		
		stal_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'layouts/' . $layout, '', $params );
	endwhile; // End of the loop.
} else {
	stal_core_template_part( 'post-types/team/shortcodes/team-list', 'templates/posts-not-found' );
}

wp_reset_postdata();