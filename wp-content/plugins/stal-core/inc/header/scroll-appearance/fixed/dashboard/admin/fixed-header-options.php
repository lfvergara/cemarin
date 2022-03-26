<?php

if ( ! function_exists( 'stal_core_add_fixed_header_options' ) ) {
	function stal_core_add_fixed_header_options( $page ) {
	
	}
	
	add_action( 'stal_core_action_after_header_options_map', 'stal_core_add_fixed_header_options' );
}