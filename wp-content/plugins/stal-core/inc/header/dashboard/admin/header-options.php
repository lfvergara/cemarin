<?php

if ( ! function_exists( 'stal_core_add_header_options' ) ) {
	/**
	 * Function that add header options for this module
	 */
	function stal_core_add_header_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => STAL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'header',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Header', 'stal-core' ),
				'description' => esc_html__( 'Global Header Options', 'stal-core' )
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'radio',
					'name'          => 'qodef_header_layout',
					'title'         => esc_html__( 'Header Layout', 'stal-core' ),
					'description'   => esc_html__( 'Choose a header layout to set for your website', 'stal-core' ),
					'args'          => array( 'images' => true ),
					'options'       => apply_filters( 'stal_core_filter_header_layout_option', $header_layout_options = array() ),
					'default_value' => apply_filters( 'stal_core_filter_header_layout_default_option_value', '' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_header_skin',
					'title'       => esc_html__( 'Header Skin', 'stal-core' ),
					'description' => esc_html__( 'Choose a predefined header style for header elements', 'stal-core' ),
					'options'     => array(
						'none'  => esc_html__( 'None', 'stal-core' ),
						'light' => esc_html__( 'Light', 'stal-core' ),
						'dark'  => esc_html__( 'Dark', 'stal-core' )
					)
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_header_scroll_appearance',
					'title'         => esc_html__( 'Header Scroll Appearance', 'stal-core' ),
					'description'   => esc_html__( 'Choose how header will act on scroll', 'stal-core' ),
					'options'       => apply_filters( 'stal_core_filter_header_scroll_appearance_option', $header_scroll_appearance_options = array( 'none' => esc_html__( 'None', 'stal-core' ) ) ),
					'default_value' => 'none',
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_header_options_map', $page );
		}
	}

	add_action( 'stal_core_action_default_options_init', 'stal_core_add_header_options', stal_core_get_admin_options_map_position( 'header' ) );
}