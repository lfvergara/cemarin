<?php

if ( ! function_exists( 'stal_core_add_page_spinner_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_page_spinner_options( $page ) {
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_spinner',
					'title'         => esc_html__( 'Enable Page Spinner', 'stal-core' ),
					'description'   => esc_html__( 'Enable Page Spinner Effect', 'stal-core' ),
					'default_value' => 'no'
				)
			);
			
			$spinner_section = $page->add_section_element(
				array(
					'name'       => 'qodef_page_spinner_section',
					'title'      => esc_html__( 'Page Spinner Section', 'stal-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_page_spinner' => array(
								'values'        => 'yes',
								'default_value' => 'no'
							)
						)
					)
				)
			);
			
			$spinner_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_spinner_type',
					'title'         => esc_html__( 'Select Page Spinner Type', 'stal-core' ),
					'description'   => esc_html__( 'Choose a page spinner animation style', 'stal-core' ),
					'options'       => apply_filters( 'stal_core_filter_page_spinner_layout_options', array() ),
					'default_value' => apply_filters( 'stal_core_filter_page_spinner_default_layout_option', '' ),
				)
			);
			
			$spinner_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_background_color',
					'title'       => esc_html__( 'Spinner Background Color', 'stal-core' ),
					'description' => esc_html__( 'Choose the spinner background color', 'stal-core' ),
                    'dependency'  => array(
                        'hide' => array(
                            'qodef_page_spinner_type' => array(
                                'values'        => 'stal',
                                'default_value' => ''
                            )
                        )
                    )
				)
			);
			
			$spinner_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_color',
					'title'       => esc_html__( 'Spinner Color', 'stal-core' ),
					'description' => esc_html__( 'Choose the spinner color', 'stal-core' ),
                    'dependency'  => array(
                        'hide' => array(
                            'qodef_page_spinner_type' => array(
                                'values'        => 'stal',
                                'default_value' => ''
                            )
                        )
                    )
				)
			);

            $spinner_section->add_field_element(
                array(
                    'field_type'  => 'image',
                    'name'        => 'qodef_page_spinner_images',
                    'title'       => esc_html__( 'Spinner Images', 'stal-core' ),
                    'description' => esc_html__( 'Choose your preloader images. Please note that these images will be shown only when "Stal" is set as Spinner Type', 'stal-core' ),
                    'multiple'   => 'yes',
                    'dependency'  => array(
                        'show' => array(
                            'qodef_page_spinner_type' => array(
                                'values'        => 'stal',
                                'default_value' => ''
                            )
                        )
                    )
                )
            );

            $spinner_section->add_field_element(
                array(
                    'field_type'  => 'image',
                    'name'        => 'qodef_page_spinner_logo_image',
                    'title'       => esc_html__( 'Spinner Logo Image', 'stal-core' ),
                    'description' => esc_html__( 'Choose your preloader logo image. Please note that this image will be shown only when "Stal" is set as Spinner Type', 'stal-core' ),
                    'dependency'  => array(
                        'show' => array(
                            'qodef_page_spinner_type' => array(
                                'values'        => 'stal',
                                'default_value' => ''
                            )
                        )
                    )
                )
            );
			
			$spinner_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_page_spinner_fade_out_animation',
					'title'         => esc_html__( 'Enable Fade Out Animation', 'stal-core' ),
					'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'stal-core' ),
					'default_value' => 'no',
				)
			);
		}
	}
	
	add_action( 'stal_core_action_after_general_options_map', 'stal_core_add_page_spinner_options' );
}