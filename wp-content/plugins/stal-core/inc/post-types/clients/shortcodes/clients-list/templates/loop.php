<?php if ( $query_result->have_posts() ) {
	while ( $query_result->have_posts() ) : $query_result->the_post();
		stal_core_list_sc_template_part( 'post-types/clients/shortcodes/clients-list', 'layouts/' . $layout, '', $params );
	endwhile; // End of the loop.
} else {
	stal_core_template_part( 'post-types/clients/shortcodes/clients-list', 'templates/posts-not-found' );
}

wp_reset_postdata();