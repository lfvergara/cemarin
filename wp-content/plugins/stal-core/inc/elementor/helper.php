<?php

if ( ! function_exists( 'stal_core_load_elementor_widgets' ) ) {
	function stal_core_load_elementor_widgets() {
		$check_code = class_exists( 'StalCoreDashboard' ) ? StalCoreDashboard::get_instance()->get_code() : true;
		
		if ( ! empty( $check_code ) ) {
			if ( qode_framework_is_installed( 'elementor' ) ) {
				foreach ( glob( STAL_CORE_SHORTCODES_PATH . '/*/*-elementor.php' ) as $shortcode_load ) {
					include_once $shortcode_load;
				}
				
				foreach ( glob( STAL_CORE_INC_PATH . '/*/shortcodes/*/*-elementor.php' ) as $shortcode_load ) {
					include_once $shortcode_load;
				}
				
				foreach ( glob( STAL_CORE_CPT_PATH . '/*/shortcodes/*/*-elementor.php' ) as $shortcode_load ) {
					include_once $shortcode_load;
				}
			}
		}
	}
	
	add_action( 'elementor/widgets/widgets_registered', 'stal_core_load_elementor_widgets' );
}

if ( ! function_exists( 'stal_core_get_elementor_instance' ) ) {
	function stal_core_get_elementor_instance() {
		return \Elementor\Plugin::instance();
	}
}

if ( ! function_exists( 'stal_core_get_elementor_widgets_manager' ) ) {
	function stal_core_get_elementor_widgets_manager() {
		return stal_core_get_elementor_instance()->widgets_manager;
	}
}