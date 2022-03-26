<?php

if ( ! function_exists( 'stal_core_add_page_footer_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_page_footer_meta_box( $page ) {
		
		if ( $page ) {
			
			$footer_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-footer',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Footer Settings', 'stal-core' ),
					'description' => esc_html__( 'Footer layout settings', 'stal-core' )
				)
			);
			
			$footer_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_page_footer',
					'title'       => esc_html__( 'Enable Page Footer', 'stal-core' ),
					'description' => esc_html__( 'Use this option to enable/disable page footer', 'stal-core' ),
					'options'     => stal_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$page_footer_section = $footer_tab->add_section_element(
				array(
					'name'       => 'qodef_page_footer_section',
					'title'      => esc_html__( 'Footer Area', 'stal-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_footer' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			// Top Footer Area Section
			
			$page_footer_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_top_footer_area',
					'title'       => esc_html__( 'Enable Top Footer Area', 'stal-core' ),
					'description' => esc_html__( 'Use this option to enable/disable top footer area', 'stal-core' ),
					'options'     => stal_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$top_footer_area_section = $page_footer_section->add_section_element(
				array(
					'name'       => 'qodef_top_footer_area_section',
					'title'      => esc_html__( 'Top Footer Area', 'stal-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_top_footer_area' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$top_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_top_area_in_grid',
					'title'         => esc_html__( 'Top Footer Area in Grid', 'stal-core' ),
					'description'   => esc_html__( 'Enabling this option will set page top footer area to be in grid', 'stal-core' ),
					'options'       => stal_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$top_footer_area_styles_section = $top_footer_area_section->add_section_element(
				array(
					'name'       => 'qodef_top_footer_area_styles_section',
					'title'      => esc_html__( 'Top Footer Area Styles', 'stal-core' )
				)
			);
			
			$top_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_top_footer_area_background_color',
					'title'      => esc_html__( 'Background Color', 'stal-core' )
				)
			);
			
			$top_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_top_footer_area_background_image',
					'title'      => esc_html__( 'Background Image', 'stal-core' ),
					'multiple'   => 'no'
				)
			);
			
			$top_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_top_footer_area_top_border_color',
					'title'      => esc_html__( 'Top Border Color', 'stal-core' )
				)
			);
			
			$top_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_top_footer_area_top_border_width',
					'title'      => esc_html__( 'Top Border Width', 'stal-core' ),
					'args'       => array(
						'suffix' => esc_html__( 'px', 'stal-core' )
					)
				)
			);
			
			// Bottom Footer Area Section
			
			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_enable_bottom_footer_area',
					'title'         => esc_html__( 'Enable Bottom Footer Area', 'stal-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable bottom footer area', 'stal-core' ),
					'options'       => stal_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$bottom_footer_area_section = $page_footer_section->add_section_element(
				array(
					'name'       => 'qodef_bottom_footer_area_section',
					'title'      => esc_html__( 'Bottom Footer Area', 'stal-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_bottom_footer_area' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_bottom_area_in_grid',
					'title'         => esc_html__( 'Bottom Footer Area in Grid', 'stal-core' ),
					'description'   => esc_html__( 'Enabling this option will set page bottom footer area to be in grid', 'stal-core' ),
					'options'       => stal_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$bottom_footer_area_styles_section = $bottom_footer_area_section->add_section_element(
				array(
					'name'       => 'qodef_bottom_footer_area_styles_section',
					'title'      => esc_html__( 'Bottom Footer Area Styles', 'stal-core' )
				)
			);
			
			$bottom_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_bottom_footer_area_background_color',
					'title'      => esc_html__( 'Background Color', 'stal-core' )
				)
			);
			
			$bottom_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_bottom_footer_area_top_border_color',
					'title'      => esc_html__( 'Top Border Color', 'stal-core' )
				)
			);
			
			$bottom_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_footer_area_top_border_width',
					'title'      => esc_html__( 'Top Border Width', 'stal-core' ),
					'args'       => array(
						'suffix' => esc_html__( 'px', 'stal-core' )
					)
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_page_footer_meta_box_map', $footer_tab );
		}
	}
	
	add_action( 'stal_core_action_after_general_meta_box_map', 'stal_core_add_page_footer_meta_box' );
}