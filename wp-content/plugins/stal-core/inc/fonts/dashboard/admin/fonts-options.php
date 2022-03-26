<?php

if ( ! function_exists( 'stal_core_add_fonts_options' ) ) {
	/**
	 * Function that add options for this module
	 */
	function stal_core_add_fonts_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => STAL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'fonts',
				'title'       => esc_html__( 'Fonts', 'stal-core' ),
				'description' => esc_html__( 'Global Fonts Options', 'stal-core' ),
				'icon'        => 'fa fa-cog'
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_fonts',
					'title'         => esc_html__( 'Enable Google Fonts', 'stal-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'custom_class' => 'qodef-enable-google-fonts'
					)
				)
			);

			$google_fonts_section = $page->add_section_element(
				array(
					'name'       => 'qodef_google_fonts_section',
					'title'      => esc_html__( 'Google Fonts Options', 'stal-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_google_fonts' => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				)
			);

			$page_repeater = $google_fonts_section->add_repeater_element(
				array(
					'name'        => 'qodef_choose_google_fonts',
					'title'       => esc_html__( 'Google Fonts to Include', 'stal-core' ),
					'description' => esc_html__( 'Choose Google Fonts which you want to use on your website', 'stal-core' ),
					'button_text' => esc_html__( 'Add New Google Font', 'stal-core' )
				)
			);

			$page_repeater->add_field_element( array(
				'field_type'  => 'googlefont',
				'name'        => 'qodef_choose_google_font',
				'title'       => esc_html__( 'Google Font', 'stal-core' ),
				'description' => esc_html__( 'Choose Google Font', 'stal-core' ),
				'args'        => array(
					'include' => 'google-fonts'
				)
			) );

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_weight',
					'title'       => esc_html__( 'Google Fonts Weight', 'stal-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts weights for your website. Impact on page load time', 'stal-core' ),
					'options'     => array(
						'100'  => esc_html__( '100 Thin', 'stal-core' ),
						'100i' => esc_html__( '100 Thin Italic', 'stal-core' ),
						'200'  => esc_html__( '200 Extra-Light', 'stal-core' ),
						'200i' => esc_html__( '200 Extra-Light Italic', 'stal-core' ),
						'300'  => esc_html__( '300 Light', 'stal-core' ),
						'300i' => esc_html__( '300 Light Italic', 'stal-core' ),
						'400'  => esc_html__( '400 Regular', 'stal-core' ),
						'400i' => esc_html__( '400 Regular Italic', 'stal-core' ),
						'500'  => esc_html__( '500 Medium', 'stal-core' ),
						'500i' => esc_html__( '500 Medium Italic', 'stal-core' ),
						'600'  => esc_html__( '600 Semi-Bold', 'stal-core' ),
						'600i' => esc_html__( '600 Semi-Bold Italic', 'stal-core' ),
						'700'  => esc_html__( '700 Bold', 'stal-core' ),
						'700i' => esc_html__( '700 Bold Italic', 'stal-core' ),
						'800'  => esc_html__( '800 Extra-Bold', 'stal-core' ),
						'800i' => esc_html__( '800 Extra-Bold Italic', 'stal-core' ),
						'900'  => esc_html__( '900 Ultra-Bold', 'stal-core' ),
						'900i' => esc_html__( '900 Ultra-Bold Italic', 'stal-core' )
					)
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_subset',
					'title'       => esc_html__( 'Google Fonts Style', 'stal-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts style for your website. Impact on page load time', 'stal-core' ),
					'options'     => array(
						'latin'        => esc_html__( 'Latin', 'stal-core' ),
						'latin-ext'    => esc_html__( 'Latin Extended', 'stal-core' ),
						'cyrillic'     => esc_html__( 'Cyrillic', 'stal-core' ),
						'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'stal-core' ),
						'greek'        => esc_html__( 'Greek', 'stal-core' ),
						'greek-ext'    => esc_html__( 'Greek Extended', 'stal-core' ),
						'vietnamese'   => esc_html__( 'Vietnamese', 'stal-core' )
					)
				)
			);

			$page_repeater = $page->add_repeater_element(
				array(
					'name'        => 'qodef_custom_fonts',
					'title'       => esc_html__( 'Custom Fonts', 'stal-core' ),
					'description' => esc_html__( 'Add custom fonts', 'stal-core' ),
					'button_text' => esc_html__( 'Add New Custom Font', 'stal-core' )
				)
			);

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_ttf',
				'title'      => esc_html__( 'Custom Font TTF', 'stal-core' ),
				'args'       => array(
					'allowed_type' => 'font/ttf'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_otf',
				'title'      => esc_html__( 'Custom Font OTF', 'stal-core' ),
				'args'       => array(
					'allowed_type' => 'font/otf'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_woff',
				'title'      => esc_html__( 'Custom Font WOFF', 'stal-core' ),
				'args'       => array(
					'allowed_type' => 'font/woff'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_woff2',
				'title'      => esc_html__( 'Custom Font WOFF2', 'stal-core' ),
				'args'       => array(
					'allowed_type' => 'font/woff2'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'text',
				'name'       => 'qodef_custom_font_name',
				'title'      => esc_html__( 'Custom Font Name', 'stal-core' ),
			) );

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_page_fonts_options_map', $page );
		}
	}

	add_action( 'stal_core_action_default_options_init', 'stal_core_add_fonts_options', stal_core_get_admin_options_map_position( 'fonts' ) );
}