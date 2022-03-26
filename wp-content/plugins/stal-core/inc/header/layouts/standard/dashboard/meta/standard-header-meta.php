<?php

if ( ! function_exists( 'stal_core_add_standard_header_meta' ) ) {
	function stal_core_add_standard_header_meta( $page ) {
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_standard_header_section',
				'title'      => esc_html__( 'Standard Header', 'stal-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'standard',
							'default_value' => ''
						)
					)
				)
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_standard_header_in_grid',
				'title'       => esc_html__( 'Content in Grid', 'stal-core' ),
				'description' => esc_html__( 'Set content to be in grid', 'stal-core' ),
				'default_value' => '',
				'options'       => stal_core_get_select_type_options_pool( 'no_yes' )
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_height',
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
				'name'        => 'qodef_standard_header_side_padding',
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
				'name'        => 'qodef_standard_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'stal-core' ),
				'description' => esc_html__( 'Enter header background color', 'stal-core' )
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_standard_header_enable_border',
				'title'       => esc_html__( 'Enable Header Border', 'stal-core' ),
				'default_value' => '',
				'options'       => stal_core_get_select_type_options_pool( 'no_yes' )
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_standard_header_border_bottom_color',
				'title'       => esc_html__( 'Header Border Bottom Color', 'stal-core' ),
				'description' => esc_html__( 'Set header border bottom color, if not set no border will be displayed', 'stal-core' )
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_menu_position',
				'title'         => esc_html__( 'Menu position', 'stal-core' ),
				'default_value' => '',
				'options'       => array(
					''       => esc_html__( 'Default', 'stal-core' ),
					'left'   => esc_html__( 'Left', 'stal-core' ),
					'center' => esc_html__( 'Center', 'stal-core' ),
					'right'  => esc_html__( 'Right', 'stal-core' ),
				)
			)
		);

	}
	
	add_action( 'stal_core_action_after_page_header_meta_map', 'stal_core_add_standard_header_meta' );
}