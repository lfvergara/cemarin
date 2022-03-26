<?php

if ( ! function_exists( 'stal_core_add_portfolio_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_portfolio_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => STAL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'portfolio-item',
				'layout'      => 'tabbed',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Portfolio', 'stal-core' ),
				'description' => esc_html__( 'Global settings related to portfolio', 'stal-core' )
			)
		);

		if ( $page ) {
			$archive_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-archive',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Portfolio List', 'stal-core' ),
					'description' => esc_html__( 'Settings related to portfolio archive pages', 'stal-core' )
				)
			);

			// Hook to include additional options after archive module options
			do_action( 'stal_core_action_after_portfolio_options_archive', $archive_tab );

			$single_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-single',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Portfolio Single', 'stal-core' ),
					'description' => esc_html__( 'Settings related to portfolio single pages', 'stal-core' )
				)
			);
			$single_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_single_layout',
					'title'         => esc_html__( 'Single Layout', 'stal-core' ),
					'description'   => esc_html__( 'Choose default layout for portfolio single', 'stal-core' ),
					'default_value' => apply_filters( 'stal_core_filter_portfolio_single_layout_default_value', '' ),
					'options'       => apply_filters( 'stal_core_filter_portfolio_single_layout_options', array() )
				)
			);
			
			$single_tab->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_portfolio_enable_related',
					'title'         => esc_html__( 'Show Related?', 'stal-core' ),
					'description'   => esc_html__( 'Enabling this option will display related items on single portfolio pages', 'stal-core' ),
					'default_value' => 'yes'
				)
			);

			// Hook to include additional options after single module options
			do_action( 'stal_core_action_after_portfolio_options_single', $single_tab );

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_portfolio_options_map', $page );
		}
	}

	add_action( 'stal_core_action_default_options_init', 'stal_core_add_portfolio_options', stal_core_get_admin_options_map_position( 'portfolio' ) );
}