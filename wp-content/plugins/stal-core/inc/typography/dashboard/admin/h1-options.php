<?php

if ( ! function_exists( 'stal_core_add_h1_typography_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_h1_typography_options( $page ) {
		
		if ( $page ) {
			$h1_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-h1',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'H1 Typography', 'stal-core' ),
					'description' => esc_html__( 'Set values for Heading 1 HTML element', 'stal-core' )
				)
			);
			
			$h1_typography_section = $h1_tab->add_section_element(
				array(
					'name'  => 'qodef_h1_typography_section',
					'title' => esc_html__( 'General Typography', 'stal-core' )
				)
			);
			
			$h1_typography_row = $h1_typography_section->add_row_element(
				array (
					'name'  => 'qodef_h1_typography_row',
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_h1_color',
					'title'      => esc_html__( 'Color', 'stal-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_h1_font_family',
					'title'      => esc_html__( 'Font Family', 'stal-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_font_size',
					'title'      => esc_html__( 'Font Size', 'stal-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_line_height',
					'title'      => esc_html__( 'Line Height', 'stal-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'stal-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h1_font_weight',
					'title'      => esc_html__( 'Font Weight', 'stal-core' ),
					'options'    => stal_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h1_text_transform',
					'title'      => esc_html__( 'Text Transform', 'stal-core' ),
					'options'    => stal_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h1_font_style',
					'title'      => esc_html__( 'Font Style', 'stal-core' ),
					'options'    => stal_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_margin_top',
					'title'      => esc_html__( 'Margin Top', 'stal-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'stal-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			/* 1024 styles */
			$h1_1024_typography_section = $h1_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1024_typography_h1',
					'title' => esc_html__( 'Responsive 1024 Typography', 'stal-core' )
				)
			);
			
			$responsive_1024_typography_h1_row = $h1_1024_typography_section->add_row_element(
				array(
					'name'  => 'qodef_responsive_1024_h1_typography_row'
				)
			);
			
			$responsive_1024_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_1024_font_size',
					'title'      => esc_html__( 'Font Size', 'stal-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_1024_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_1024_line_height',
					'title'      => esc_html__( 'Line Height', 'stal-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_1024_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_1024_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'stal-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			/* 768 styles */
			$h1_768_typography_section = $h1_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_768_typography_h1',
					'title' => esc_html__( 'Responsive 768 Typography', 'stal-core' )
				)
			);
			
			$responsive_768_typography_h1_row = $h1_768_typography_section->add_row_element(
				array(
					'name'  => 'qodef_responsive_768_h1_typography_row'
				)
			);
			
			$responsive_768_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_768_font_size',
					'title'      => esc_html__( 'Font Size', 'stal-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_768_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_768_line_height',
					'title'      => esc_html__( 'Line Height', 'stal-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_768_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_768_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'stal-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			/* 680 styles */
			$h1_680_typography_section = $h1_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_680_typography_h1',
					'title' => esc_html__( 'Responsive 680 Typography', 'stal-core' )
				)
			);
			
			$responsive_680_typography_h1_row = $h1_680_typography_section->add_row_element(
				array(
					'name'  => 'qodef_responsive_680_h1_typography_row'
				)
			);
			
			$responsive_680_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_680_font_size',
					'title'      => esc_html__( 'Font Size', 'stal-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_680_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_680_line_height',
					'title'      => esc_html__( 'Line Height', 'stal-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_680_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_680_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'stal-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
		}
	}
	
	add_action( 'stal_core_action_after_typography_options_map', 'stal_core_add_h1_typography_options' );
}