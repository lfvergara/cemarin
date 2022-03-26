<?php

if ( ! function_exists( 'stal_core_add_nav_menu_options' ) ) {
	function stal_core_add_nav_menu_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'nav_menu_item' ),
				'type'  => 'nav-menu'
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef-enable-mega-menu',
					'title'      => esc_html__( 'Enable mega menu', 'stal-core' ),
					'options'    => array(
						'enable' => esc_html__( 'Enable', 'stal-core' )
					),
					'args'       => array(
						'depth' => 0
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef-menu-item-appearance',
					'title'      => esc_html__( 'Menu Item Appearance', 'stal-core' ),
					'options'    => array(
						'none'      => esc_html__( 'None', 'stal-core' ),
						'hide-item' => esc_html__( 'Hide Item', 'stal-core' ),
						'hide-link' => esc_html__( 'Hide Link', 'stal-core' )
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'iconpack',
					'name'       => 'qodef-menu-item-icon-pack',
					'title'      => esc_html__( 'Icon Pack', 'stal-core' ),
					'args'       => array(
						'width' => 'thin'
					)
				)
			);
		}
	}
	
	add_action( 'qode_framework_action_custom_nav_menu_fields', 'stal_core_add_nav_menu_options' );
}