<?php

if ( ! function_exists( 'stal_core_add_product_categories_list_variation_info_on_image' ) ) {
	function stal_core_add_product_categories_list_variation_info_on_image( $variations ) {
		$variations['info-on-image'] = esc_html__( 'Info On Image', 'stal-core' );

		return $variations;
	}

	add_filter( 'stal_core_filter_product_categories_list_layouts', 'stal_core_add_product_categories_list_variation_info_on_image' );
}