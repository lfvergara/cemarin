<?php

if ( ! function_exists( 'stal_core_add_mobile_header_options' ) ) {
	/**
	 * Function that add mobile header options for this module
	 */
	function stal_core_add_mobile_header_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => STAL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'mobile-header',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Mobile Header', 'stal-core' ),
				'description' => esc_html__( 'Global Mobile Header Options', 'stal-core' )
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'default_value' => 'no',
					'name'          => 'qodef_mobile_header_scroll_appearance',
					'title'         => esc_html__( 'Sticky Mobile Header', 'stal-core' ),
					'description'   => esc_html__( 'Set mobile header to be sticky', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'radio',
					'name'          => 'qodef_mobile_header_layout',
					'title'         => esc_html__( 'Mobile Header Layout', 'stal-core' ),
					'description'   => esc_html__( 'Choose a mobile header layout to set for your website', 'stal-core' ),
					'args'          => array( 'images' => true ),
					'default_value' => 'standard',
					'options'       => apply_filters( 'stal_core_filter_mobile_header_layout_option', $mobile_header_layout_options = array() )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_header_side_padding',
					'title'      => esc_html__( 'Mobile Header Side Padding', 'stal-core' ),
					'args'       => array(
						'suffix' => esc_html__( 'px or %', 'stal-core' )
					)
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_mobile_header_options_map', $page );
		}
	}

	add_action( 'stal_core_action_default_options_init', 'stal_core_add_mobile_header_options', stal_core_get_admin_options_map_position( 'mobile-header' ) );
}