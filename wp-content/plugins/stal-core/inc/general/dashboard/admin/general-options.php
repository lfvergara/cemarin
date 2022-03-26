<?php

if ( ! function_exists( 'stal_core_add_general_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_general_options( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_main_color',
					'title'       => esc_html__( 'Main Color', 'stal-core' ),
					'description' => esc_html__( 'Choose the most dominant theme color', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_background_color',
					'title'       => esc_html__( 'Page Background Color', 'stal-core' ),
					'description' => esc_html__( 'Set background color', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_background_image',
					'title'       => esc_html__( 'Page Background Image', 'stal-core' ),
					'description' => esc_html__( 'Set background image', 'stal-core' )
				)
			);

			$page->add_field_element(
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

			$page->add_field_element(
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

			$page->add_field_element(
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

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding',
					'title'       => esc_html__( 'Page Content Padding', 'stal-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding_mobile',
					'title'       => esc_html__( 'Page Content Padding Mobile', 'stal-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_boxed',
					'title'         => esc_html__( 'Boxed Layout', 'stal-core' ),
					'description'   => esc_html__( 'Set boxed layout', 'stal-core' ),
					'default_value' => 'no'
				)
			);

			$boxed_section = $page->add_section_element(
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

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_passepartout',
					'title'         => esc_html__( 'Passepartout', 'stal-core' ),
					'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'stal-core' ),
					'default_value' => 'no'
				)
			);

			$passepartout_section = $page->add_section_element(
				array(
					'name'       => 'qodef_passepartout_section',
					'title'      => esc_html__( 'Passepartout Section', 'stal-core' ),
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

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_content_width',
					'title'         => esc_html__( 'Initial Width of Content', 'stal-core' ),
					'description'   => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'stal-core' ),
					'options'       => stal_core_get_select_type_options_pool( 'content_width', false ),
					'default_value' => '1100'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_custom_js',
					'title'       => esc_html__( 'Custom JS', 'stal-core' ),
					'description' => esc_html__( 'Enter your custom Javascript here', 'stal-core' )
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_general_options_map', $page );
		}
	}

	add_action( 'stal_core_action_default_options_init', 'stal_core_add_general_options', stal_core_get_admin_options_map_position( 'general' ) );
}