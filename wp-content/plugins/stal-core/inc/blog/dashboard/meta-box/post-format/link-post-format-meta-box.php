<?php

if ( ! function_exists( 'stal_core_add_link_post_format_meta_box' ) ) {
	/**
	 * Function that add options for post format
	 *
	 * @param $page mixed - general post format meta box section
	 */
	function stal_core_add_link_post_format_meta_box( $page ) {
		
		if ( $page ) {
			$post_format_section = $page->add_section_element(
				array(
					'name'  => 'qodef_post_format_link_section',
					'title' => esc_html__( 'Post Format Link', 'stal-core' )
				)
			);
			
			$post_format_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_post_format_link',
					'title'       => esc_html__( 'Link URL', 'stal-core' )
				)
			);
			
			$post_format_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_post_format_link_text',
					'title'       => esc_html__( 'Link Text', 'stal-core' )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_link_post_format_meta_box', $page );
		}
	}
	
	add_action( 'stal_core_action_after_blog_single_meta_box_map', 'stal_core_add_link_post_format_meta_box', 4 );
}