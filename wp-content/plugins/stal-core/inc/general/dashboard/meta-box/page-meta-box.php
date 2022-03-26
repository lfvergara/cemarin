<?php

if ( ! function_exists( 'stal_core_add_general_page_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_general_page_meta_box( $page ) {

		$general_tab = $page->add_tab_element(
			array(
				'name'        => 'tab-page',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Page Settings', 'stal-core' ),
				'description' => esc_html__( 'General page layout settings', 'stal-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_page_background_color',
				'title'       => esc_html__( 'Page Background Color', 'stal-core' ),
				'description' => esc_html__( 'Set background color', 'stal-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_page_background_image',
				'title'       => esc_html__( 'Page Background Image', 'stal-core' ),
				'description' => esc_html__( 'Set background image', 'stal-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_repeat',
				'title'       => esc_html__( 'Page Background Image Repeat', 'stal-core' ),
				'description' => esc_html__( 'Set background image repeat', 'stal-core' ),
				'options'     => array(
					''          => esc_html__( 'Default', 'stal-core' ),
					'no-repeat' => esc_html__( 'No Repeat', 'stal-core' ),
					'repeat'    => esc_html__( 'Repeat', 'stal-core' ),
					'repeat-x'  => esc_html__( 'Repeat-x', 'stal-core' ),
					'repeat-y'  => esc_html__( 'Repeat-y', 'stal-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_size',
				'title'       => esc_html__( 'Page Background Image Size', 'stal-core' ),
				'description' => esc_html__( 'Set background image size', 'stal-core' ),
				'options'     => array(
					''        => esc_html__( 'Default', 'stal-core' ),
					'contain' => esc_html__( 'Contain', 'stal-core' ),
					'cover'   => esc_html__( 'Cover', 'stal-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_attachment',
				'title'       => esc_html__( 'Page Background Image Attachment', 'stal-core' ),
				'description' => esc_html__( 'Set background image attachment', 'stal-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'stal-core' ),
					'fixed'  => esc_html__( 'Fixed', 'stal-core' ),
					'scroll' => esc_html__( 'Scroll', 'stal-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding',
				'title'       => esc_html__( 'Page Content Padding', 'stal-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'stal-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding_mobile',
				'title'       => esc_html__( 'Page Content Padding Mobile', 'stal-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'stal-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_boxed',
				'title'         => esc_html__( 'Boxed Layout', 'stal-core' ),
				'description'   => esc_html__( 'Set boxed layout', 'stal-core' ),
				'default_value' => 'no'
			)
		);

		$boxed_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_boxed_section',
				'title'      => esc_html__( 'Boxed Layout Section', 'stal-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_boxed' => array(
							'values'        => 'no',
							'default_value' => ''
						)
					)
				)
			)
		);

		$boxed_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_boxed_background_color',
				'title'       => esc_html__( 'Boxed Background Color', 'stal-core' ),
				'description' => esc_html__( 'Set boxed background color', 'stal-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_passepartout',
				'title'         => esc_html__( 'Passepartout', 'stal-core' ),
				'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'stal-core' ),
				'default_value' => '',
				'options'       => stal_core_get_select_type_options_pool( 'yes_no' )
			)
		);

		$passepartout_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_passepartout_section',
				'dependency' => array(
					'hide' => array(
						'qodef_passepartout' => array(
							'values'        => 'no',
							'default_value' => ''
						)
					)
				)
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_passepartout_color',
				'title'       => esc_html__( 'Passepartout Color', 'stal-core' ),
				'description' => esc_html__( 'Choose background color for passepartout', 'stal-core' )
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_passepartout_image',
				'title'       => esc_html__( 'Passepartout Background Image', 'stal-core' ),
				'description' => esc_html__( 'Set background image for passepartout', 'stal-core' )
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size',
				'title'       => esc_html__( 'Passepartout Size', 'stal-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'stal-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'stal-core' )
				)
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size_responsive',
				'title'       => esc_html__( 'Passepartout Responsive Size', 'stal-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (1024px and below)', 'stal-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'stal-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_content_width',
				'title'       => esc_html__( 'Initial Width of Content', 'stal-core' ),
				'description' => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'stal-core' ),
				'options'     => stal_core_get_select_type_options_pool( 'content_width' )
			)
		);

		$general_tab->add_field_element( array(
			'field_type'    => 'yesno',
			'default_value' => 'no',
			'name'          => 'qodef_content_behind_header',
			'title'         => esc_html__( 'Always put content behind header', 'stal-core' ),
			'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'stal-core' ),
		) );

		// Hook to include additional options after module options
		do_action( 'stal_core_action_after_general_page_meta_box_map', $general_tab );
	}

	add_action( 'stal_core_action_after_general_meta_box_map', 'stal_core_add_general_page_meta_box', 9 );
	add_action( 'stal_core_action_after_portfolio_meta_box_map', 'stal_core_add_general_page_meta_box' );
}