<?php

if ( ! function_exists( 'stal_core_add_centered_header_options' ) ) {
	function stal_core_add_centered_header_options( $page ) {
		
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_centered_header_section',
				'title'      => esc_html__( 'Centered Header', 'stal-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'centered',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_centered_header_height',
				'title'       => esc_html__( 'Header Height', 'stal-core' ),
				'description' => esc_html__( 'Enter header height', 'stal-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'stal-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_centered_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'stal-core' ),
				'description' => esc_html__( 'Enter header background color', 'stal-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'stal-core' )
				)
			)
		);
	}
	
	add_action( 'stal_core_action_after_header_options_map', 'stal_core_add_centered_header_options' );
}