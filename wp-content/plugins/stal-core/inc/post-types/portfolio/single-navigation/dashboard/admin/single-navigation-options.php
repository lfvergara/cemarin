<?php

if ( ! function_exists( 'stal_core_add_portfolio_single_navigation_options' ) ) {

	function stal_core_add_portfolio_single_navigation_options( $page ) {

		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_portfolio_enable_navigation',
					'title'         => esc_html__( 'Navigation', 'stal-core' ),
					'description'   => esc_html__( 'Enabling this option will turn on portfolio navigation functionality', 'stal-core' ),
					'default_value' => 'yes'
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_portfolio_navigation_through_same_category',
					'title'         => esc_html__( 'Navigation Through Same Category', 'stal-core' ),
					'description'   => esc_html__( 'Enabling this option will make portfolio navigation sort through current category', 'stal-core' ),
					'default_value' => 'no',
					'dependency'    => array(
						'show' => array(
							'qodef_portfolio_enable_navigation' => array(
								'values'        => 'yes',
								'default_value' => 'yes'
							)
						)
					)
				)
			);
		}
	}

	add_action( 'stal_core_action_after_portfolio_options_single', 'stal_core_add_portfolio_single_navigation_options' );
}