<?php

if ( ! function_exists( 'stal_core_add_working_hours_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_working_hours_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => STAL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'working-hours',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Working Hours', 'stal-core' ),
				'description' => esc_html__( 'Global Working Hours Options', 'stal-core' )
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_monday',
					'title'      => esc_html__( 'Working Hours For Monday', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_tuesday',
					'title'      => esc_html__( 'Working Hours For Tuesday', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_wednesday',
					'title'      => esc_html__( 'Working Hours For Wednesday', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_thursday',
					'title'      => esc_html__( 'Working Hours For Thursday', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_friday',
					'title'      => esc_html__( 'Working Hours For Friday', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_saturday',
					'title'      => esc_html__( 'Working Hours For Saturday', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_sunday',
					'title'      => esc_html__( 'Working Hours For Sunday', 'stal-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef_working_hours_special_days',
					'title'      => esc_html__( 'Special Days', 'stal-core' ),
					'options'    => array(
						'monday'    => esc_html__( 'Monday', 'stal-core' ),
						'tuesday'   => esc_html__( 'Tuesday', 'stal-core' ),
						'wednesday' => esc_html__( 'Wednesday', 'stal-core' ),
						'thursday'  => esc_html__( 'Thursday', 'stal-core' ),
						'friday'    => esc_html__( 'Friday', 'stal-core' ),
						'saturday'  => esc_html__( 'Saturday', 'stal-core' ),
						'sunday'    => esc_html__( 'Sunday', 'stal-core' ),
					)
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_special_text',
					'title'      => esc_html__( 'Featured Text For Special Days', 'stal-core' )
				)
			);

			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_working_hours_options_map', $page );
		}
	}

	add_action( 'stal_core_action_default_options_init', 'stal_core_add_working_hours_options', stal_core_get_admin_options_map_position( 'working-hours' ) );
}