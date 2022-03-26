<?php

if ( ! function_exists( 'stal_core_add_list_image_sizes' ) ) {
	function stal_core_add_list_image_sizes( $image_sizes ) {
		$image_sizes[] = array(
			'slug'           => 'stal_image_size_square',
			'label'          => esc_html__( 'Square Size', 'stal-core' ),
			'label_simple'   => esc_html__( 'Square', 'stal-core' ),
			'default_crop'   => true,
			'default_width'  => 650,
			'default_height' => 650
		);
		
		$image_sizes[] = array(
			'slug'           => 'stal_image_size_landscape',
			'label'          => esc_html__( 'Landscape Size', 'stal-core' ),
			'label_simple'   => esc_html__( 'Landscape', 'stal-core' ),
			'default_crop'   => true,
			'default_width'  => 1300,
			'default_height' => 650
		);
		
		$image_sizes[] = array(
			'slug'           => 'stal_image_size_portrait',
			'label'          => esc_html__( 'Portrait Size', 'stal-core' ),
			'label_simple'   => esc_html__( 'Portrait', 'stal-core' ),
			'default_crop'   => true,
			'default_width'  => 650,
			'default_height' => 1300
		);
		
		$image_sizes[] = array(
			'slug'           => 'stal_image_size_huge-square',
			'label'          => esc_html__( 'Huge Square Size', 'stal-core' ),
			'label_simple'   => esc_html__( 'Huge Square', 'stal-core' ),
			'default_crop'   => true,
			'default_width'  => 1300,
			'default_height' => 1300
		);

		$image_sizes[] = array(
			'slug'           => 'stal_post_thumb_size',
			'label'          => esc_html__( 'Post Thumb Size', 'stal-core' ),
			'label_simple'   => esc_html__( 'Post Thumb', 'stal-core' ),
			'default_crop'   => true,
			'default_width'  => 82,
			'default_height' => 82
		);
		
		return $image_sizes;
	}
	
	add_filter( 'qode_framework_filter_populate_image_sizes', 'stal_core_add_list_image_sizes' );
}

if ( ! function_exists( 'stal_core_add_pool_masonry_list_image_sizes' ) ) {
	function stal_core_add_pool_masonry_list_image_sizes( $options, $type, $enable_default ) {
		if ( $type == 'masonry_image_dimension' ) {
			$options = array();
			if ( $enable_default ) {
				$options[''] = esc_html__( 'Default', 'stal-core' );
			}
			$options['stal_image_size_square']      = esc_html__( 'Square', 'stal-core' );
			$options['stal_image_size_landscape']   = esc_html__( 'Landscape', 'stal-core' );
			$options['stal_image_size_portrait']    = esc_html__( 'Portrait', 'stal-core' );
			$options['stal_image_size_huge-square'] = esc_html__( 'Huge Square', 'stal-core' );
		}
		
		return $options;
	}
	
	add_filter( 'stal_core_filter_select_type_option', 'stal_core_add_pool_masonry_list_image_sizes', 10, 3 );
}

if ( ! function_exists( 'stal_core_get_custom_image_size_class_name' ) ) {
	function stal_core_get_custom_image_size_class_name( $image_size ) {
		return ! empty( $image_size ) ? 'qodef-item--' . str_replace( 'stal_image_size_', '', $image_size ) : '';
	}
}

if ( ! function_exists( 'stal_core_get_custom_image_size_meta' ) ) {
	function stal_core_get_custom_image_size_meta( $type, $name, $post_id ) {
		$image_size_meta  = qode_framework_get_option_value( '', $type, $name, '', $post_id );
		$image_size       = ! empty( $image_size_meta ) ? esc_attr( $image_size_meta ) : 'full';

		return array(
			'size'  => $image_size,
			'class' => stal_core_get_custom_image_size_class_name( $image_size )
		);
	}
}