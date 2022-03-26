<?php

if ( ! function_exists( 'stal_core_add_map_options' ) ) {
	/**
	 * Function that add map options
	 */
	function stal_core_add_map_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => STAL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'map',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Maps', 'stal-core' ),
				'description' => esc_html__( 'Global Maps Options', 'stal-core' )
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_maps_api_key',
					'title'       => esc_html__( 'Maps API Key', 'stal-core' ),
					'description' => esc_html__( 'Enter Google Maps API key', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_map_style',
					'title'       => esc_html__( 'Map Style', 'stal-core' ),
					'description' => esc_html__( 'Enter Snazzy Map style JSON code', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_map_zoom',
					'title'       => esc_html__( 'Map Zoom', 'stal-core' ),
					'description' => esc_html__( 'Enter default zoom value for map', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_scroll',
					'title'         => esc_html__( 'Enable Map Scroll', 'stal-core' ),
					'description'   => esc_html__( 'Use this option to enable map scrolling', 'stal-core' ),
					'default_value' => 'no'
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_drag',
					'title'         => esc_html__( 'Enable Map Dragging', 'stal-core' ),
					'description'   => esc_html__( 'Use this option to enable map dragging', 'stal-core' ),
					'default_value' => 'yes'
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_street_view_control',
					'title'         => esc_html__( 'Enable Map Street View Control', 'stal-core' ),
					'description'   => esc_html__( 'Use this option to enable street view control on map', 'stal-core' ),
					'default_value' => 'yes'
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_zoom_control',
					'title'         => esc_html__( 'Enable Map Zoom Control', 'stal-core' ),
					'description'   => esc_html__( 'Use this option to enable zoom control on map', 'stal-core' ),
					'default_value' => 'yes'
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_type_control',
					'title'         => esc_html__( 'Enable Map Type Control', 'stal-core' ),
					'description'   => esc_html__( 'Use this option to enable type control on map', 'stal-core' ),
					'default_value' => 'yes'
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_full_screen_control',
					'title'         => esc_html__( 'Enable Map Full Screen Control', 'stal-core' ),
					'description'   => esc_html__( 'Use this option to enable full screen control on map', 'stal-core' ),
					'default_value' => 'yes'
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_map_options_map', $page );
		}
	}

	add_action( 'stal_core_action_default_options_init', 'stal_core_add_map_options', stal_core_get_admin_options_map_position( 'maps' ) );
}