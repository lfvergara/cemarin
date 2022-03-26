<?php

if ( ! function_exists( 'stal_core_add_team_list_variation_info_on_hover' ) ) {
	function stal_core_add_team_list_variation_info_on_hover( $variations ) {
		
		$variations['info-on-hover'] = esc_html__( 'Info on Hover', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_team_list_layouts', 'stal_core_add_team_list_variation_info_on_hover' );
}