<?php

if ( ! function_exists( 'stal_core_side_area_options' ) ) {
	function stal_core_side_area_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => STAL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'sidearea',
				'icon'        => 'fa fa-indent',
				'title'       => esc_html__( 'Side Area', 'stal-core' ),
				'description' => esc_html__( 'Global Side Area Options', 'stal-core' )
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_side_area_width',
					'title'       => esc_html__( 'Side Area Width', 'stal-core' ),
					'description' => esc_html__( 'Enter a width for Side Area (px or %).', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_side_area_content_overlay_color',
					'title'       => esc_html__( 'Content Overlay Background Color', 'stal-core' ),
					'description' => esc_html__( 'Choose a background color for a content overlay', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_side_area_background_color',
					'title'       => esc_html__( 'Background Color', 'stal-core' ),
					'description' => esc_html__( 'Choose a background color for side area', 'stal-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'image',
					'name'          => 'qodef_side_area_background_image',
					'title'         => esc_html__( 'Side Area Background Image', 'stal-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_side_area_icon_source',
					'title'         => esc_html__( 'Icon Source', 'stal-core' ),
					'default_value' => 'predefined',
					'options'       => stal_core_get_select_type_options_pool( 'icon_source', false )
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_side_area_icon_pack',
					'title'         => esc_html__( 'Icon Pack', 'stal-core' ),
					'default_value' => 'elegant-icons',
					'options'       => qode_framework_icons()->get_icon_packs( array(
						'linea-icons',
						'dripicons',
						'simple-line-icons'
					) ),
					'dependency'    => array(
						'show' => array(
							'qodef_side_area_icon_source' => array(
								'values'        => 'icon_pack',
								'default_value' => 'predefined'
							)
						)
					)
				)
			);

			$section_svg_path = $page->add_section_element(
				array(
					'title'      => esc_html__( 'SVG Path', 'stal-core' ),
					'name'       => 'qodef_side_area_svg_path_section',
					'dependency' => array(
						'show' => array(
							'qodef_side_area_icon_source' => array(
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
					'name'        => 'qodef_side_area_icon_svg_path',
					'title'       => esc_html__( 'Side Area Open Icon SVG Path', 'stal-core' ),
					'description' => esc_html__( 'Enter your side area open icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'stal-core' )
				)
			);

			$section_svg_path->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_side_area_close_icon_svg_path',
					'title'       => esc_html__( 'Side Area Close Icon SVG Path', 'stal-core' ),
					'description' => esc_html__( 'Enter your side area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'stal-core' ),
				)
			);

			$color_section = $page->add_section_element(
				array(
					'name'  => 'qodef_side_area_color_section',
					'title' => esc_html__( 'Colors', 'stal-core' )
				)
			);

			$color_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_side_area_icon_color',
					'title'      => esc_html__( 'Color', 'stal-core' )
				)
			);

			$color_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_side_area_icon_hover_color',
					'title'      => esc_html__( 'Hover Color', 'stal-core' )
				)
			);

			$color_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_side_area_close_icon_color',
					'title'      => esc_html__( 'Close Icon Color', 'stal-core' )
				)
			);

			$color_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_side_area_close_icon_hover_color',
					'title'      => esc_html__( 'Close Icon Hover Color', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_side_area_alignment',
					'title'       => esc_html__( 'Text Alignment', 'stal-core' ),
					'description' => esc_html__( 'Choose text alignment for side area', 'stal-core' ),
					'options'     => array(
						''       => esc_html__( 'Default', 'stal-core' ),
						'left'   => esc_html__( 'Left', 'stal-core' ),
						'center' => esc_html__( 'Center', 'stal-core' ),
						'right'  => esc_html__( 'Right', 'stal-core' )
					)
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_side_area_options_map', $page );
		}
	}

	add_action( 'stal_core_action_default_options_init', 'stal_core_side_area_options', stal_core_get_admin_options_map_position( 'side-area' ) );
}