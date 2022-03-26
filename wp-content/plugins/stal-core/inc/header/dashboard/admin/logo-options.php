<?php

if ( ! function_exists( 'stal_core_add_logo_options' ) ) {
	function stal_core_add_logo_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => STAL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'logo',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Logo', 'stal-core' ),
				'description' => esc_html__( 'Global Logo Options', 'stal-core' ),
				'layout'      => 'tabbed'
			)
		);

		if ( $page ) {

			$header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Header Logo Options', 'stal-core' ),
					'description' => esc_html__( 'Set options for initial headers', 'stal-core' )
				)
			);

			$header_tab->add_field_element(
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
			
			$header_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_logo_source',
					'title'         => esc_html__( 'Logo Source', 'stal-core' ),
					'description'   => esc_html__( 'Select logo type', 'stal-core' ),
					'default_value' => 'image',
					'options'       => array(
						'image'     => esc_html__( 'Image', 'stal-core' ),
						'text' => esc_html__( 'Text', 'stal-core' ),
					),
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'    => 'image',
					'name'          => 'qodef_logo_main',
					'title'         => esc_html__( 'Logo - Main', 'stal-core' ),
					'description'   => esc_html__( 'Choose main logo image', 'stal-core' ),
					'default_value' => defined( 'STAL_ASSETS_ROOT' ) ? STAL_ASSETS_ROOT . '/img/logo.png' : '',
					'multiple'      => 'no',
					'dependency'  => array(
						'show'    => array(
							'qodef_logo_source' => array(
								'values' => 'image',
								'default_value' => 'image'
							)
						)
					)
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_dark',
					'title'       => esc_html__( 'Logo - Dark', 'stal-core' ),
					'description' => esc_html__( 'Choose dark logo image', 'stal-core' ),
					'multiple'    => 'no',
					'dependency'  => array(
						'show'    => array(
							'qodef_logo_source' => array(
								'values' => 'image',
								'default_value' => 'image'
							)
						)
					)
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_light',
					'title'       => esc_html__( 'Logo - Light', 'stal-core' ),
					'description' => esc_html__( 'Choose light logo image', 'stal-core' ),
					'multiple'    => 'no',
					'dependency'  => array(
						'show'    => array(
							'qodef_logo_source' => array(
								'values' => 'image',
								'default_value' => 'image'
							)
						)
					)
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_logo_text',
					'title'       => esc_html__( 'Logo Text', 'stal-core' ),
					'description' => esc_html__( 'Enter logo text', 'stal-core' ),
					'dependency'  => array(
						'show'    => array(
							'qodef_logo_source' => array(
								'values' => 'text',
								'default_value' => 'image'
							)
						)
					)
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_logo_text_font_size',
					'title'       => esc_html__( 'Logo Text Font Size', 'stal-core' ),
					'description' => esc_html__( 'Enter logo text font size with unit', 'stal-core' ),
					'show'    => array(
						'qodef_logo_source' => array(
							'values' => 'text',
							'default_value' => 'image'
						)
					)
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_logo_text_background_color',
					'title'       => esc_html__( 'Enable Logo Background Color', 'stal-core' ),
					'description' => esc_html__( 'Use this option to enable/disable logo background color', 'stal-core' ),
					'options'     => stal_core_get_select_type_options_pool( 'no_yes' ),
					'show'    => array(
						'qodef_logo_source' => array(
							'values' => 'text',
							'default_value' => 'image'
						)
					)
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_logo_text_background_color',
					'title'       => esc_html__( 'Logo Background Color', 'stal-core' ),
					'description' => esc_html__( 'Enter logo background color', 'stal-core' ),
					'show'    => array(
						'qodef_logo_source' => array(
							'values' => 'text',
							'default_value' => 'image'
						)
					)
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_logo_text_color',
					'title'       => esc_html__( 'Logo Text Color', 'stal-core' ),
					'description' => esc_html__( 'Enter logo text color', 'stal-core' ),
					'show'    => array(
						'qodef_logo_source' => array(
							'values' => 'text',
							'default_value' => 'image'
						)
					)
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_header_logo_options_map', $page, $header_tab );
		}
	}

	add_action( 'stal_core_action_default_options_init', 'stal_core_add_logo_options', stal_core_get_admin_options_map_position( 'logo' ) );
}