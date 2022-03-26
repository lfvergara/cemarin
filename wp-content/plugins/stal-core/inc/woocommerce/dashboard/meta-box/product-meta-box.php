<?php

if ( ! function_exists( 'stal_core_add_product_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_product_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'product' ),
				'type'  => 'meta',
				'slug'  => 'product-list',
				'title' => esc_html__( 'Product List', 'stal-core' )
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_product_list_image',
					'title'       => esc_html__( 'Product List Image', 'stal-core' ),
					'description' => esc_html__( 'Upload image to be displayed on product list instead of featured image', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_masonry_image_dimension_product',
					'title'       => esc_html__( 'Image Dimension', 'stal-core' ),
					'description' => esc_html__( 'Choose an image layout for product list. If you are using fixed image proportions on the list, choose an option other than default', 'stal-core' ),
					'options'     => stal_core_get_select_type_options_pool( 'masonry_image_dimension' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_show_new_sign',
					'title'         => esc_html__( 'Show New Sign', 'stal-core' ),
					'description'   => esc_html__( 'Enabling this option will show "New Sign" mark on product.', 'stal-core' ),
					'options'       => stal_core_get_select_type_options_pool( 'no_yes' ),
					'default_value' => 'no'
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_product_single_meta_box_map', $page );
		}
	}

	add_action( 'stal_core_action_default_meta_boxes_init', 'stal_core_add_product_single_meta_box' );
}