<?php
$is_enabled    = stal_core_get_post_value_through_levels( 'qodef_blog_single_enable_related_posts' );
$related_posts = stal_core_get_blog_single_related_posts_type( get_the_ID() );

if ( $is_enabled === 'yes' && ! empty( $related_posts ) ) { ?>
	<div id="qodef-related-posts">
		<?php
		$params = apply_filters( 'stal_core_filter_blog_single_related_posts_params', array(
			'custom_class'      => 'qodef--no-bottom-space',
			'columns'           => '3',
			'posts_per_page'    => 3,
			'additional_params' => 'tax',
			'tax'               => $related_posts['taxonomy'],
			'tax__in'           => $related_posts['items'],
			'title_tag'         => 'h5',
			'excerpt_length'    => '100'
		) );
		
		if ( class_exists( 'StalCoreBlogListShortcode' ) ) {
			echo StalCoreBlogListShortcode::call_shortcode( $params );
		}
		?>
	</div>
<?php } ?>