<?php

if ( ! function_exists( 'stal_core_add_mobile_logo_options' ) ) {
	/**
	 * Function that add mobile header options for this module
	 */
	function stal_core_add_mobile_logo_options( $page, $header_tab ) {

		if ( $page ) {
			
			$mobile_header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-mobile-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Mobile Header Logo Options', 'stal-core' ),
					'description' => esc_html__( 'Set options for mobile headers', 'stal-core' )
				)
			);
			
			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_height',
					'title'       => esc_html__( 'Mobile Logo Height', 'stal-core' ),
					'description' => esc_html__( 'Enter mobile logo height', 'stal-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'stal-core' )
					)
				)
			);
			
			$mobile_header_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_mobile_logo_source',
					'title'         => esc_html__( 'Mobile Logo Source', 'stal-core' ),
					'description'   => esc_html__( 'Select mobile logo type', 'stal-core' ),
					'default_value' => 'image',
					'options'       => array(
						'image'     => esc_html__( 'Image', 'stal-core' ),
						'text' => esc_html__( 'Text', 'stal-core' ),
					),
				)
			);
			
			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_mobile_logo_main',
					'title'       => esc_html__( 'Mobile Logo - Main', 'stal-core' ),
					'description' => esc_html__( 'Choose main mobile logo image', 'stal-core' ),
					'default_value' => defined( 'STAL_ASSETS_ROOT' ) ? STAL_ASSETS_ROOT . '/img/logo.png' : '',
					'multiple'    => 'no',
					'dependency'  => array(
						'show'    => array(
							'qodef_mobile_logo_source' => array(
								'values' => 'image',
								'default_value' => 'image'
							)
						)
					)
				)
			);
			
			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_text',
					'title'       => esc_html__( 'Mobile Logo Text', 'stal-core' ),
					'description' => esc_html__( 'Enter mobile logo text', 'stal-core' ),
					'dependency'  => array(
						'show'    => array(
							'qodef_mobile_logo_source' => array(
								'values' => 'text',
								'default_value' => 'image'
							)
						)
					)
				)
			);
			
			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_mobile_logo_text_color',
					'title'       => esc_html__( 'Mobile Logo Text Color', 'stal-core' ),
					'description' => esc_html__( 'Enter mobile logo text color', 'stal-core' ),
					'show'    => array(
						'qodef_mobile_logo_source' => array(
							'values' => 'text',
							'default_value' => 'image'
						)
					)
				)
			);
			
			do_action( 'stal_core_action_after_mobile_logo_options_map', $page );
		}
	}
	
	add_action( 'stal_core_action_after_header_logo_options_map', 'stal_core_add_mobile_logo_options', 10, 2 );
}