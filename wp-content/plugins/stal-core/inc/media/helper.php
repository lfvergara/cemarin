<?php

if ( ! function_exists( 'stal_core_include_image_sizes' ) ) {
	/**
	 * Function that includes icons
	 */
	function stal_core_include_image_sizes() {
		foreach ( glob( STAL_CORE_INC_PATH . '/media/*/include.php' ) as $image_size ) {
			include_once $image_size;
		}
	}
	
	add_action( 'qode_framework_action_before_images_register', 'stal_core_include_image_sizes' );
}