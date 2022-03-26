<?php

if ( ! function_exists( 'stal_core_add_page_sidebar_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_page_sidebar_meta_box( $page ) {
		
		if ( $page ) {
			
			$sidebar_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-sidebar',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Sidebar Settings', 'stal-core' ),
					'description' => esc_html__( 'Sidebar layout settings', 'stal-core' )
				)
			);
			
			$sidebar_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'stal-core' ),
					'description'   => esc_html__( 'Choose a sidebar layout', 'stal-core' ),
					'options'       => stal_core_get_select_type_options_pool( 'sidebar_layouts' )
				)
			);
			
			$custom_sidebars = stal_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$sidebar_tab->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_page_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'stal-core' ),
						'description' => esc_html__( 'Choose a custom sidebar', 'stal-core' ),
						'options'     => $custom_sidebars
					)
				);
			}
			
			$sidebar_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'stal-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'stal-core' ),
					'options'     => stal_core_get_select_type_options_pool( 'items_space' )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_page_sidebar_meta_box_map', $sidebar_tab );
		}
	}
	
	add_action( 'stal_core_action_after_general_meta_box_map', 'stal_core_add_page_sidebar_meta_box' );
}