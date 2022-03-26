<?php
if ( ! function_exists( 'stal_core_register_on_side_search_layout' ) ) {
	function stal_core_register_on_side_search_layout( $search_layouts ) {
		$search_layout = array(
			'on-side' => 'OnSideSearch'
		);
		
		$search_layouts = array_merge( $search_layouts, $search_layout );
		
		return $search_layouts;
	}
	
	add_filter( 'stal_core_filter_register_search_layouts', 'stal_core_register_on_side_search_layout');
}