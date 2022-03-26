<?php

if ( ! function_exists( 'stal_core_add_minimal_header_options' ) ) {
	function stal_core_add_minimal_header_options( $page ) {
		
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_minimal_header_section',
				'title'      => esc_html__( 'Minimal Header', 'stal-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'minimal',
							'default_value' => ''
						)
					)
				)
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'yesno',
				'name'        => 'qodef_minimal_header_in_grid',
				'title'       => esc_html__( 'Content in Grid', 'stal-core' ),
				'description' => esc_html__( 'Set content to be in grid', 'stal-core' ),
				'default_value' => 'no',
				'args'        => array(
					'suffix' => esc_html__( 'px', 'stal-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_minimal_header_height',
				'title'       => esc_html__( 'Header Height', 'stal-core' ),
				'description' => esc_html__( 'Enter header height', 'stal-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'stal-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_minimal_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'stal-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'stal-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'stal-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_minimal_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'stal-core' ),
				'description' => esc_html__( 'Enter header background color', 'stal-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'stal-core' )
				)
			)
		);

	}
	
	add_action( 'stal_core_action_after_header_options_map', 'stal_core_add_minimal_header_options' );
}