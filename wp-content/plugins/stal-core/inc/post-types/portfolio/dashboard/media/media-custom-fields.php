<?php
if ( ! function_exists( 'stal_core_add_image_portfolio_single_options' ) ) {
	function stal_core_add_image_portfolio_single_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => 'image',
				'type'  => 'attachment',
				'slug'  => 'qodef_image_masonry',
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_image_portfolio_masonry_size',
					'title'       => esc_html__( 'Image Size', 'stal-core' ),
					'description' => esc_html__( 'Choose image size for portfolio single item - Masonry Layout', 'stal-core' ),
					'options'     => stal_core_get_select_type_options_pool( 'masonry_image_dimension' )
				)
			);
		}
	}
	
	add_action( 'qode_framework_action_custom_media_fields', 'stal_core_add_image_portfolio_single_options', 15 );
}