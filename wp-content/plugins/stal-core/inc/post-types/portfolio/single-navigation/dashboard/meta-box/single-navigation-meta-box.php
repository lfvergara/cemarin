<?php

if ( ! function_exists( 'stal_core_add_portfolio_single_navigation_meta_box' ) ) {
	
	function stal_core_add_portfolio_single_navigation_meta_box($page) {
		
		if ( $page ) {
			
			$navigation_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-navigation',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Navigation Settings', 'stal-core' ),
					'description' => esc_html__( 'Portfolio Navigation settings', 'stal-core' )
				)
			);
			
			$navigation_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_portfolio_single_back_link',
					'title'       => esc_html__( 'Set Back To button Link', 'stal-core' ),
					'description' => esc_html__( 'Set a custom link for portfolio single navigation button', 'stal-core' )
				)
			);
		}
	}
	
	add_action( 'stal_core_action_after_portfolio_meta_box_map', 'stal_core_add_portfolio_single_navigation_meta_box' );
}