<?php
if ( ! function_exists( 'stal_core_add_top_area_meta_options' ) ) {
	function stal_core_add_top_area_meta_options( $page ) {
		$top_area_section = $page->add_section_element(
			array(
				'name'       => 'qodef_top_area_section',
				'title'      => esc_html__( 'Top Area', 'stal-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_header_layout' => array(
							'values'        => stal_core_dependency_for_top_area_options(),
							'default_value' => ''
						)
					)
				)
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header',
				'title'       => esc_html__( 'Top Area', 'stal-core' ),
				'description' => esc_html__( 'Enable top area', 'stal-core' ),
				'options'     => stal_core_get_select_type_options_pool( 'yes_no' )
			)
		);

		$top_area_options_section = $top_area_section->add_section_element(
			array(
				'name'        => 'qodef_top_area_options_section',
				'title'       => esc_html__( 'Top Area Options', 'stal-core' ),
				'description' => esc_html__( 'Set desired values for top area', 'stal-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_top_area_header' => array(
							'values'        => 'yes',
							'default_value' => 'no'
						)
					)
				)
			)
		);
		
		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_in_grid',
				'title'       => esc_html__( 'Content in Grid', 'stal-core' ),
				'description' => esc_html__( 'Set content to be in grid', 'stal-core' ),
				'default_value' => '',
				'options'       => stal_core_get_select_type_options_pool( 'no_yes' )
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_background_color',
				'title'       => esc_html__( 'Top Area Background Color', 'stal-core' ),
				'description' => esc_html__( 'Choose top area background color', 'stal-core' )
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_height',
				'title'       => esc_html__( 'Top Area Height', 'stal-core' ),
				'description' => esc_html__( 'Enter top area height (default is 30px)', 'stal-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'stal-core' )
				)
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_header_side_padding',
				'title'      => esc_html__( 'Top Area Side Padding', 'stal-core' ),
				'args'       => array(
					'suffix' => esc_html__( 'px or %', 'stal-core' )
				)
			)
		);
	}

	add_action( 'stal_core_action_after_page_header_meta_map', 'stal_core_add_top_area_meta_options' );
}