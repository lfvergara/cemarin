<?php

if ( ! function_exists( 'stal_core_is_boxed_enabled' ) ) {
	function stal_core_is_boxed_enabled() {
		return stal_core_get_post_value_through_levels( 'qodef_boxed' ) === 'yes';
	}
}

if ( ! function_exists( 'stal_core_is_passepartout_enabled' ) ) {
	function stal_core_is_passepartout_enabled() {
		return stal_core_get_post_value_through_levels( 'qodef_passepartout' ) === 'yes';
	}
}

if ( ! function_exists( 'stal_core_add_general_options_body_classes' ) ) {
	function stal_core_add_general_options_body_classes( $classes ) {
		$content_width         = stal_core_get_post_value_through_levels( 'qodef_content_width' );
		$content_behind_header = stal_core_get_post_value_through_levels( 'qodef_content_behind_header' );
		
		$classes[] = stal_core_is_boxed_enabled() ? 'qodef--boxed' : '';
		$classes[] = 'qodef-content-grid-' . $content_width;
		$classes[] = $content_behind_header == 'yes' ? 'qodef-content-behind-header' : '';
		$classes[] = stal_core_is_passepartout_enabled() ? 'qodef--passepartout' : '';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'stal_core_add_general_options_body_classes' );
}

if ( ! function_exists( 'stal_core_add_boxed_wrapper_classes' ) ) {
	function stal_core_add_boxed_wrapper_classes( $classes ) {
		
		if ( stal_core_is_boxed_enabled() ) {
			$classes .= ' qodef-content-grid';
		}
		
		return $classes;
	}
	
	add_filter( 'stal_filter_page_wrapper_classes', 'stal_core_add_boxed_wrapper_classes' );
}

if ( ! function_exists( 'stal_core_set_general_styles' ) ) {
	/**
	 * Function that generates general inline styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function stal_core_set_general_styles( $style ) {
		$styles = array();
		
		$background_color      = stal_core_get_post_value_through_levels( 'qodef_page_background_color' );
		$background_image      = stal_core_get_post_value_through_levels( 'qodef_page_background_image' );
		$background_repeat     = stal_core_get_post_value_through_levels( 'qodef_page_background_repeat' );
		$background_size       = stal_core_get_post_value_through_levels( 'qodef_page_background_size' );
		$background_attachment = stal_core_get_post_value_through_levels( 'qodef_page_background_attachment' );
		
		if ( ! empty( $background_color ) ) {
			$styles['background-color'] = $background_color;
		}
		
		if ( ! empty( $background_image ) ) {
			$styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $background_image, 'full' ) ) . ')';
		}
		
		if ( ! empty( $background_repeat ) ) {
			$styles['background-repeat'] = $background_repeat;
		}
		
		if ( ! empty( $background_size ) ) {
			$styles['background-size'] = $background_size;
		}
		
		if ( ! empty( $background_attachment ) ) {
			$styles['background-attachment'] = $background_attachment;
		}
		
		if ( ! empty( $styles ) ) {
			$selector = stal_core_is_passepartout_enabled() ? '.qodef--passepartout #qodef-page-wrapper' : 'body';
			$style    .= qode_framework_dynamic_style( $selector, $styles );
		}
		
		if ( stal_core_is_boxed_enabled() ) {
			$boxed_styles = array();
			
			$boxed_background_color = stal_core_get_post_value_through_levels( 'qodef_boxed_background_color' );
			
			if ( ! empty( $boxed_background_color ) ) {
				$boxed_styles['background-color'] = $boxed_background_color;
			}
			
			if ( ! empty( $boxed_styles ) ) {
				$style .= qode_framework_dynamic_style( '.qodef--boxed #qodef-page-wrapper', $boxed_styles );
			}
		}
		
		if ( stal_core_is_passepartout_enabled() ) {
			$passepartout_styles = array();
			$passepartout_color  = stal_core_get_post_value_through_levels( 'qodef_passepartout_color' );
			$passepartout_image  = stal_core_get_post_value_through_levels( 'qodef_passepartout_image' );
			$passepartout_size   = stal_core_get_post_value_through_levels( 'qodef_passepartout_size' );
			
			if ( ! empty( $passepartout_color ) ) {
				$passepartout_styles['background-color'] = $passepartout_color;
			}
			
			if ( ! empty( $passepartout_image ) ) {
				$passepartout_styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $passepartout_image, 'full' ) ) . ')';
			}
			
			if ( ! empty( $passepartout_size ) ) {
				
				if ( qode_framework_string_ends_with_space_units( $passepartout_size ) ) {
					$passepartout_styles['padding'] = $passepartout_size;
				} else {
					$passepartout_styles['padding'] = intval( $passepartout_size ) . 'px';
				}
			}
			
			if ( ! empty( $passepartout_styles ) ) {
				$style .= qode_framework_dynamic_style( '.qodef--passepartout', $passepartout_styles );
			}
			
			$passepartout_responsive_styles = array();
			$passepartout_size_responsive   = stal_core_get_post_value_through_levels( 'qodef_passepartout_size_responsive' );
			
			if ( ! empty( $passepartout_size_responsive ) ) {
				if ( qode_framework_string_ends_with_space_units( $passepartout_size_responsive ) ) {
					$passepartout_responsive_styles['padding'] = $passepartout_size_responsive;
				} else {
					$passepartout_responsive_styles['padding'] = intval( $passepartout_size_responsive ) . 'px';
				}
			}
			
			if ( ! empty( $passepartout_responsive_styles ) ) {
				$style .= qode_framework_dynamic_style_responsive( '.qodef--passepartout', $passepartout_responsive_styles, '', '1024' );
			}
		}
		
		$page_content_style = array();
		
		$page_content_padding = stal_core_get_post_value_through_levels( 'qodef_page_content_padding' );
		if ( ! empty ( $page_content_padding ) ) {
			$page_content_style['padding'] = $page_content_padding;
		}
		
		if ( ! empty( $page_content_style ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-page-inner', $page_content_style );
		}
		
		$page_content_style_mobile = array();
		
		$page_content_padding_mobile = stal_core_get_post_value_through_levels( 'qodef_page_content_padding_mobile' );
		if ( ! empty ( $page_content_padding_mobile ) ) {
			$page_content_style_mobile['padding'] = $page_content_padding_mobile;
		}
		
		if ( ! empty( $page_content_style_mobile ) ) {
			$style .= qode_framework_dynamic_style_responsive( '#qodef-page-inner', $page_content_style_mobile, '', '1024' );
		}
		
		return $style;
	}
	
	add_filter( 'stal_filter_add_inline_style', 'stal_core_set_general_styles' );
}

if ( ! function_exists( 'stal_core_set_general_main_color_styles' ) ) {
	/**
	 * Function that generates general main color inline styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function stal_core_set_general_main_color_styles( $style ) {
		$main_color = stal_core_get_post_value_through_levels( 'qodef_main_color' );
		
		if ( ! empty( $main_color ) ) {
			
			// Include main color selectors
			include_once STAL_CORE_INC_PATH . '/general/main-color/main-color.php';
			
			$allowed_selectors = array(
				'color',
				'color_important',
				'background_color',
				'background_color_important',
				'border_color',
				'border_color_important',
				'fill_color',
				'fill_color_important',
				'stroke_color',
				'stroke_color_important',
			);
			
			foreach ( $allowed_selectors as $allowed_selector ) {
				$selector = $allowed_selector . '_selector';
				
				if ( isset( $$selector ) && ! empty( $$selector ) ) {
					
					if ( strpos( $selector, '_important' ) !== false ) {
						$attribute = str_replace( '_important', '', $allowed_selector );
						$color     = $main_color . '!important';
					} else {
						$attribute = $allowed_selector;
						$color     = $main_color;
					}
					
					$style .= qode_framework_dynamic_style( $$selector, array( str_replace( '_', '-', $attribute ) => $color ) );
				}
			}
		}
		
		return $style;
	}
	
	add_filter( 'stal_filter_add_inline_style', 'stal_core_set_general_main_color_styles' );
}

if ( ! function_exists( 'stal_core_print_custom_js' ) ) {
	/**
	 * Prints out custom js from theme options
	 */
	function stal_core_print_custom_js() {
		$custom_js = stal_core_get_post_value_through_levels( 'qodef_custom_js' );
		
		if ( ! empty( $custom_js ) ) {
			wp_add_inline_script( 'stal-main-js', $custom_js );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'stal_core_print_custom_js', 15 ); // Permission 15 is set in order to call a function after the main theme script initialization
}