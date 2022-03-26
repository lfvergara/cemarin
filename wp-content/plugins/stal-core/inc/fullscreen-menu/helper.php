<?php

if ( ! function_exists( 'stal_core_get_fullscreen_icon_html' ) ) {
	/**
	 * Returns html for icon sources
	 * @param bool $is_close_icon
	 *
	 * @return string/html
	 */
	function stal_core_get_fullscreen_icon_html($is_close_icon = false) {
		$html = '';

		$icon_source         = stal_core_get_option_value('admin', 'qodef_fullscreen_menu_icon_source' );
		$icon_pack           = stal_core_get_option_value('admin', 'qodef_fullscreen_menu_icon_pack' );
		$icon_svg_path       = stal_core_get_option_value('admin', 'qodef_fullscreen_menu_icon_svg_path' );
		$close_icon_svg_path = stal_core_get_option_value('admin', 'qodef_fullscreen_menu_close_icon_svg_path' );


		if ( $icon_source === 'icon_pack' && !empty( $icon_pack ) ) {
			if ( $is_close_icon ) {
				$html .= qode_framework_icons()->get_specific_icon_from_pack('close', $icon_pack);

			} else {
				$html .= qode_framework_icons()->get_specific_icon_from_pack('menu', $icon_pack);
			}

		} else if ( $icon_source === 'svg_path' && ((isset( $icon_svg_path ) && ! empty( $icon_svg_path ) ) || ( isset($close_icon_svg_path) && ! empty($close_icon_svg_path))) ) {

			if ( $is_close_icon ) {
				$html .= $close_icon_svg_path;
			} else {
				$html .= $icon_svg_path;
			}

		} else if ( $icon_source === 'predefined' ) {
			$html .= '<span class="qodef-lines">';
			$html .= '<span class="qodef-line qodef-line-1"></span>';
			$html .= '<span class="qodef-line qodef-line-2"></span>';
			$html .= '<span class="qodef-line qodef-line-3"></span>';
			$html .= '<span class="qodef-line qodef-line-4"></span>';
			$html .= '<span class="qodef-line qodef-line-5"></span>';
			$html .= '</span>';
		}


		return $html;
	}
}

if ( ! function_exists( 'stal_core_register_fullscreen_menu' ) ) {
	function stal_core_register_fullscreen_menu($menus) {

		$menus['fullscreen-menu-navigation'] = esc_html__( 'Fullscreen Navigation', 'stal-core' );

		return $menus;
	}
	add_filter('stal_filter_register_navigation_menus','stal_core_register_fullscreen_menu');
}

if ( ! function_exists( 'stal_core_set_fullscreen_menu_styles' ) ) {
	/**
	 * Function that generates page fullscreen menu inline styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function stal_core_set_fullscreen_menu_styles( $style ) {
		$fullscreen_menu_styles = array();
		$fullscreen_menu_additional_styles = array();
		
		$fullscreen_menu_background_color = stal_core_get_post_value_through_levels( 'qodef_fullscreen_menu_background_color' );
		$fullscreen_menu_background_image = stal_core_get_post_value_through_levels( 'qodef_fullscreen_menu_background_image' );
		
		if ( ! empty( $fullscreen_menu_background_color ) ) {
			$fullscreen_menu_styles['background-color'] = $fullscreen_menu_background_color;
		}
		
		if ( ! empty( $fullscreen_menu_background_image ) ) {
			$fullscreen_menu_styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url($fullscreen_menu_background_image, 'full')) . ')';
			$fullscreen_menu_styles['background-size'] = 'cover';
			
			if ( ! empty( $fullscreen_menu_background_color ) ) {
				$fullscreen_menu_additional_styles['background-color'] = $fullscreen_menu_background_color;
			}
		}
		
		if ( ! empty( $fullscreen_menu_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-fullscreen-menu-holder', $fullscreen_menu_styles );
		}
		if ( ! empty( $fullscreen_menu_additional_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-fullscreen-menu-holder > .qodef-fullscreen-menu-holder-inner', $fullscreen_menu_additional_styles );
		}
		
		return $style;
	}
	
	add_filter( 'stal_filter_add_inline_style', 'stal_core_set_fullscreen_menu_styles' );
}