<?php

if ( ! function_exists( 'stal_core_add_sticky_header_meta_options' ) ) {
	function stal_core_add_sticky_header_meta_options( $page, $custom_sidebars ) {
		
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_sticky_header_scroll_amount',
					'title'       => esc_html__( 'Sticky Scroll Amount', 'stal-core' ),
					'description' => esc_html__( 'Enter scroll amount for sticky header to appear', 'stal-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'stal-core' )
					),
					'dependency' => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values' => 'sticky',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_custom_widget_area_one',
					'title'       => esc_html__( 'Choose Custom Sticky Header Widget Area', 'stal-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header widget area', 'stal-core' ),
					'options'     => $custom_sidebars,
					'dependency'  => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_enable_border',
					'title'       => esc_html__( 'Enable Sticky Header Border', 'stal-core' ),
					'options'       => stal_core_get_select_type_options_pool( 'no_yes' ),
					'default_value' => '',
					'dependency' => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values' => 'sticky',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_sticky_header_border_bottom_color',
					'title'       => esc_html__( 'Sticky Header Border Bottom Color', 'stal-core' ),
					'description' => esc_html__( 'Set sticky header border bottom color, if not set no border will be displayed', 'stal-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values' => 'sticky',
								'default_value' => ''
							)
						)
					)
				)
			);
		}
	}
	
	add_action( 'stal_core_action_after_custom_widget_area_header_meta_map', 'stal_core_add_sticky_header_meta_options', 10, 2 );
}