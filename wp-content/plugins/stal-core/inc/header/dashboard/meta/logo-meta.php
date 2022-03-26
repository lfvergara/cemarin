<?php

if ( ! function_exists( 'stal_core_add_page_logo_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_page_logo_meta_box( $page ) {

		if ( $page ) {

			$logo_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-logo',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Logo Settings', 'stal-core' ),
					'description' => esc_html__( 'Logo settings', 'stal-core' )
				)
			);

			$header_logo_section = $logo_tab->add_section_element(
				array(
					'name'  => 'qodef_header_logo_section',
					'title' => esc_html__( 'Header Logo Options', 'stal-core' ),
				)
			);

			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_logo_height',
					'title'       => esc_html__( 'Logo Height', 'stal-core' ),
					'description' => esc_html__( 'Enter logo height', 'stal-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'stal-core' )
					)
				)
			);
			
			$header_logo_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_logo_source',
					'title'         => esc_html__( 'Logo Source', 'stal-core' ),
					'description'   => esc_html__( 'Select logo type', 'stal-core' ),
					'default_value' => '',
					'options'       => array(
						''       => esc_html__( 'Default', 'stal-core' ),
						'image'   => esc_html__( 'Image', 'stal-core' ),
						'text' => esc_html__( 'Text', 'stal-core' ),
					)
				)
			);

			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_main',
					'title'       => esc_html__( 'Logo - Main', 'stal-core' ),
					'description' => esc_html__( 'Choose main logo image', 'stal-core' ),
					'multiple'    => 'no',
					'dependency' => array(
						'show' => array(
							'qodef_logo_source' => array(
								'values' => 'image',
								'default_value' => ''
							)
						)
					)
				)
			);

			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_dark',
					'title'       => esc_html__( 'Logo - Dark', 'stal-core' ),
					'description' => esc_html__( 'Choose dark logo image', 'stal-core' ),
					'multiple'    => 'no',
					'dependency' => array(
						'show' => array(
							'qodef_logo_source' => array(
								'values' => 'image',
								'default_value' => ''
							)
						)
					)
				)
			);

			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_light',
					'title'       => esc_html__( 'Logo - Light', 'stal-core' ),
					'description' => esc_html__( 'Choose light logo image', 'stal-core' ),
					'multiple'    => 'no',
					'dependency' => array(
						'show' => array(
							'qodef_logo_source' => array(
								'values' => 'image',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_logo_text',
					'title'       => esc_html__( 'Logo Text', 'stal-core' ),
					'description' => esc_html__( 'Enter logo text', 'stal-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_logo_source' => array(
								'values' => 'text',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_logo_text_font_size',
					'title'       => esc_html__( 'Logo Text Font Size', 'stal-core' ),
					'description' => esc_html__( 'Enter logo text font size with unit', 'stal-core' ),
					'show'    => array(
						'qodef_logo_source' => array(
							'values' => 'text',
							'default_value' => ''
						)
					)
				)
			);
			
			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_logo_text_background_color',
					'title'       => esc_html__( 'Enable Logo Background Color', 'stal-core' ),
					'description' => esc_html__( 'Use this option to enable/disable logo background color', 'stal-core' ),
					'options'     => stal_core_get_select_type_options_pool( 'no_yes' ),
					'show'    => array(
						'qodef_logo_source' => array(
							'values' => 'text',
							'default_value' => ''
						)
					)
				)
			);
			
			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_logo_text_background_color',
					'title'       => esc_html__( 'Logo Background Color', 'stal-core' ),
					'description' => esc_html__( 'Enter logo background color', 'stal-core' ),
					'show'    => array(
						'qodef_logo_source' => array(
							'values' => 'text',
							'default_value' => ''
						)
					)
				)
			);
			
			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_logo_text_color',
					'title'       => esc_html__( 'Logo Text Color', 'stal-core' ),
					'description' => esc_html__( 'Enter logo text color', 'stal-core' ),
					'show'    => array(
						'qodef_logo_source' => array(
							'values' => 'text',
							'default_value' => ''
						)
					)
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_page_logo_meta_map', $logo_tab );
		}
	}

	add_action( 'stal_core_action_after_general_meta_box_map', 'stal_core_add_page_logo_meta_box' );
}