<?php

if ( ! function_exists( 'stal_core_search_options' ) ) {
	function stal_core_search_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => STAL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'search',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Search', 'stal-core' ),
				'description' => esc_html__( 'Global Search Options', 'stal-core' )
			)
		);

		if ( $page ) {
			$search_page_section = $page->add_section_element(
				array(
					'name'  => 'qodef_search_page_section',
					'title' => esc_html__( 'Search Page', 'stal-core' )
				)
			);

			$search_page_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_search_page_enable_page_title',
					'title'       => esc_html__( 'Enable Page Title', 'stal-core' ),
					'description' => esc_html__( 'Use this option to enable/disable page title on search page', 'stal-core' ),
					'options'     => stal_core_get_select_type_options_pool( 'no_yes' )
				)
			);

			$search_page_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_search_page_sidebar_layout',
					'title'       => esc_html__( 'Sidebar Layout', 'stal-core' ),
					'description' => esc_html__( 'Choose default sidebar layout for search page', 'stal-core' ),
					'options'     => stal_core_get_select_type_options_pool( 'sidebar_layouts' )
				)
			);

			$custom_sidebars = stal_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$search_page_section->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_search_page_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'stal-core' ),
						'description' => esc_html__( 'Choose a custom sidebar to display on search page', 'stal-core' ),
						'options'     => $custom_sidebars
					)
				);
			}

			$search_page_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_search_page_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'stal-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar for search page', 'stal-core' ),
					'options'     => stal_core_get_select_type_options_pool( 'items_space' )
				)
			);

			$search_page_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_search_page_excerpt_number_of_characters',
					'title'       => esc_html__( 'Number of Characters in Excerpt', 'stal-core' ),
					'description' => esc_html__( 'Fill a number of characters in excerpt for post summary. Default value is 180', 'stal-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_search_page_options_map', $search_page_section );

			$search_opener_section = $page->add_section_element(
				array(
					'name'  => 'qodef_search_opener_section',
					'title' => esc_html__( 'Search Opener', 'stal-core' )
				)
			);

			$search_opener_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_search_icon_source',
					'title'         => esc_html__( 'Search Icon Source', 'stal-core' ),
					'default_value' => 'icon_pack',
					'options'       => stal_core_get_select_type_options_pool( 'icon_source', false, array( 'predefined' ) )
				)
			);

			$search_opener_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_search_icon_pack',
					'title'         => esc_html__( 'Icon Pack', 'stal-core' ),
					'options'       => qode_framework_icons()->get_icon_packs( array(
						'linea-icons',
						'dripicons',
						'simple-line-icons'
					) ),
					'default_value' => 'ionicons',
					'dependency'    => array(
						'show' => array(
							'qodef_search_icon_source' => array(
								'values'        => 'icon_pack',
								'default_value' => 'icon_pack'
							)
						)
					)
				)
			);

			$section_svg_path = $search_opener_section->add_section_element(
				array(
					'title'      => esc_html__( 'SVG Path', 'stal-core' ),
					'name'       => 'qodef_search_svg_path_section',
					'dependency' => array(
						'show' => array(
							'qodef_search_icon_source' => array(
								'values'        => 'svg_path',
								'default_value' => 'icon_pack'
							)
						)
					)
				)
			);

			$section_svg_path->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_search_icon_svg_path',
					'title'       => esc_html__( 'Search Open Icon SVG Path', 'stal-core' ),
					'description' => esc_html__( 'Enter your search open icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'stal-core' )
				)
			);

			$section_svg_path->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_search_close_icon_svg_path',
					'title'       => esc_html__( 'Search Close Icon SVG Path', 'stal-core' ),
					'description' => esc_html__( 'Enter your search close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'stal-core' ),
				)
			);

			$search_opener_section->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_search_icon_size',
					'title'      => esc_html__( 'Search Icon Size', 'stal-core' ),
					'args'       => array(
						'suffix' => esc_html__( 'px', 'stal-core' )
					)
				)
			);

			$color_row = $search_opener_section->add_row_element(
				array(
					'name'  => 'qodef_color_row',
					'title' => esc_html__( 'Search Icon', 'stal-core' ),
				)
			);

			$color_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_search_icon_color',
					'title'      => esc_html__( 'Search Icon Color', 'stal-core' ),
				)
			);

			$color_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_search_icon_hover_color',
					'title'      => esc_html__( 'Search Icon Hover Color', 'stal-core' ),
				)
			);

			$search_opener_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_search_icon_label',
					'title'         => esc_html__( 'Search Icon Label', 'stal-core' ),
					'default_value' => 'no',
					'options'       => stal_core_get_select_type_options_pool( 'no_yes', false )
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_search_options_map', $page );
		}
	}

	add_action( 'stal_core_action_default_options_init', 'stal_core_search_options', stal_core_get_admin_options_map_position( 'search' ) );
}