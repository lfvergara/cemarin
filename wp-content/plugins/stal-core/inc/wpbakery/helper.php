<?php

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = STAL_CORE_INC_PATH . '/wpbakery/templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'stal_core_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function stal_core_vc_row_map() {

		/******* VC Row shortcode - begin *******/

		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Row Content Width', 'stal-core' ),
				'value'      => array(
					esc_html__( 'Full Width', 'stal-core' ) => 'full-width',
					esc_html__( 'In Grid', 'stal-core' )    => 'grid'
				),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_alignment',
				'heading'    => esc_html__( 'Content Alignment', 'stal-core' ),
				'value'      => array(
					esc_html__( 'Default', 'stal-core' ) => '',
					esc_html__( 'Left', 'stal-core' )    => 'left',
					esc_html__( 'Center', 'stal-core' )  => 'center',
					esc_html__( 'Right', 'stal-core' )   => 'right'
				),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);

		do_action( 'stal_core_action_additional_vc_row_params' );

		/******* VC Row shortcode - end *******/

		/******* VC Row Inner shortcode - begin *******/

		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Row Content Width', 'stal-core' ),
				'value'      => array(
					esc_html__( 'Full Width', 'stal-core' ) => 'full-width',
					esc_html__( 'In Grid', 'stal-core' )    => 'grid'
				),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);

		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_alignment',
				'heading'    => esc_html__( 'Content Alignment', 'stal-core' ),
				'value'      => array(
					esc_html__( 'Default', 'stal-core' ) => '',
					esc_html__( 'Left', 'stal-core' )    => 'left',
					esc_html__( 'Center', 'stal-core' )  => 'center',
					esc_html__( 'Right', 'stal-core' )   => 'right'
				),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);

		/******* VC Row Inner shortcode - end *******/


	}

	add_action( 'vc_after_init', 'stal_core_vc_row_map' );
}

if ( ! function_exists( 'stal_core_vc_column_map' ) ) {
	/**
	 * Map VC Column shortcode
	 * Hooks on vc_after_init action
	 */
	function stal_core_vc_column_map() {

		/******* VC Column shortcode - begin *******/
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1440',
				'heading'    => esc_html__( 'Responsive Padding Under 1440', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1366',
				'heading'    => esc_html__( 'Responsive Padding Under 1366', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1280',
				'heading'    => esc_html__( 'Responsive Padding Under 1280', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1024',
				'heading'    => esc_html__( 'Responsive Padding Under 1024', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_768',
				'heading'    => esc_html__( 'Responsive Padding Under 768', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_680',
				'heading'    => esc_html__( 'Responsive Padding Under 680', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		
		/******* VC Column Inner shortcode - begin *******/
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1440',
				'heading'    => esc_html__( 'Responsive Padding Under 1440', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1366',
				'heading'    => esc_html__( 'Responsive Padding Under 1366', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1280',
				'heading'    => esc_html__( 'Responsive Padding Under 1280', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1024',
				'heading'    => esc_html__( 'Responsive Padding Under 1024', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_768',
				'heading'    => esc_html__( 'Responsive Padding Under 768', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_680',
				'heading'    => esc_html__( 'Responsive Padding Under 680', 'stal-core' ),
				'group'      => esc_html__( 'Stal Core Settings', 'stal-core' )
			)
		);

	}

	add_action( 'vc_after_init', 'stal_core_vc_column_map' );
}

if ( ! function_exists( 'stal_core_add_html_before_wrapper_open' ) ) {
	function stal_core_add_html_before_wrapper_open($html, $atts){

		if ( $atts['row_content_width'] === 'grid' ) {
			$html .= '<div class="qodef-content-grid">';
		}

		return $html;
	}

	add_filter( 'stal_core_filter_vc_row_before_wrapper_open', 'stal_core_add_html_before_wrapper_open',10, 2 );
	add_filter( 'stal_core_filter_vc_row_inner_before_wrapper_open', 'stal_core_add_html_before_wrapper_open',10, 2 );
}

if ( ! function_exists( 'stal_core_add_html_after_wrapper_close' ) ) {
	function stal_core_add_html_after_wrapper_close($html, $atts){

		if ( $atts['row_content_width'] === 'grid' ) {
			$html .= '</div>';
		}

		return $html;
	}

	add_filter( 'stal_core_filter_vc_row_after_wrapper_close', 'stal_core_add_html_after_wrapper_close',10, 2 );
	add_filter( 'stal_core_filter_vc_row_inner_after_wrapper_close', 'stal_core_add_html_after_wrapper_close',10, 2 );
}

if ( ! function_exists( 'stal_core_add_additional_classes_on_row' ) ) {
	function stal_core_add_additional_classes_on_row($classes, $base, $atts){
		if ($base == 'vc_row' || $base == 'vc_row_inner') {
			if ($atts['content_text_alignment'] != '') {
				$classes .= ' qodef-content-alignment-' . $atts['content_text_alignment'];
			}
		}
		return $classes;
	}

	add_filter( 'vc_shortcodes_css_class', 'stal_core_add_additional_classes_on_row',10, 3 );
}

if ( ! function_exists( 'stal_core_init_vc_column_class' ) ) {
	function stal_core_init_vc_column_class( $classes, $base, $atts ) {
		if ( $base == 'vc_column' || $base == 'vc_column_inner' ) {
			if ( isset( $atts['css'] ) ) {
				$css_custom_class = current( explode( '{', $atts['css'] ) );
				$screen_sizes     = array( '1440', '1366', '1280', '1024', '768', '680' );
				
				foreach ( $screen_sizes as $screen_size ) {
					if ( isset( $atts['column_responsive_padding_' . $screen_size] ) && $atts['column_responsive_padding_' . $screen_size] !== '' ) {
						$padding = $atts['column_responsive_padding_' . $screen_size];
						
						add_filter( 'stal_core_filter_add_responsive_' . $screen_size . '_inline_style_in_footer', function ( $style ) use ( $css_custom_class, $padding ) {
							$styles = array();
							
							if ( ! empty( $padding ) ) {
								$styles['padding'] = $padding . '!important';
							}
							
							$style .= qode_framework_dynamic_style( $css_custom_class, $styles );
							
							return $style;
						} );
					}
				}
			}
		}

		return $classes;
	}
	
	add_filter( 'vc_shortcodes_css_class', 'stal_core_init_vc_column_class', 10, 3 );
}