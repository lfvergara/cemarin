<?php

if ( ! function_exists( 'stal_core_get_subscribe_popup' ) ) {
	/**
	 * Loads subscribe popup HTML
	 */
	function stal_core_get_subscribe_popup() {
		if ( stal_core_get_option_value( 'admin', 'qodef_enable_subscribe_popup' ) === 'yes' && stal_core_get_option_value( 'admin', 'qodef_subscribe_popup_contact_form' ) !== '' ) {
			stal_core_load_subscribe_popup_template();
		}
	}

	// Get subscribe popup HTML
	add_action( 'stal_action_before_page_header', 'stal_core_get_subscribe_popup' );
}

if ( ! function_exists( 'stal_core_load_subscribe_popup_template' ) ) {
	/**
	 * Loads HTML template with params
	 */
	function stal_core_load_subscribe_popup_template() {
		$params                     = array();
		$params['title']            = stal_core_get_option_value( 'admin', 'qodef_subscribe_popup_title' );
		$params['subtitle']         = stal_core_get_option_value( 'admin', 'qodef_subscribe_popup_subtitle' );
		$background_image           = stal_core_get_option_value( 'admin', 'qodef_subscribe_popup_background_image' );
		$params['content_style']    = ! empty( $background_image ) ? 'background-image: url(' . esc_url( wp_get_attachment_url( $background_image ) ) . ')' : '';
		$params['contact_form']     = stal_core_get_option_value( 'admin', 'qodef_subscribe_popup_contact_form' );
		$params['enable_prevent']   = stal_core_get_option_value( 'admin', 'qodef_enable_subscribe_popup_prevent' );
		$params['prevent_behavior'] = stal_core_get_option_value( 'admin', 'qodef_subscribe_popup_prevent_behavior' );

		$holder_classes           = array();
		$holder_classes[]         = ! empty( $params['prevent_behavior'] ) ? 'qodef-sp-prevent-' . $params['prevent_behavior'] : 'qodef-sp-prevent-session';
		$params['holder_classes'] = implode( ' ', $holder_classes );

		echo stal_core_get_template_part( 'subscribe-popup', 'templates/subscribe-popup', '', $params );
	}
}