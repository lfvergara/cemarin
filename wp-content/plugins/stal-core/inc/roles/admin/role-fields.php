<?php

if ( ! function_exists( 'stal_core_add_admin_user_options' ) ) {
	function stal_core_add_admin_user_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'administrator', 'author' ),
				'type'  => 'user',
				'title' => esc_html__( 'Social Networks', 'stal-core' ),
				'slug'  => 'admin-options',
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_facebook',
					'title'       => esc_html__( 'Facebook', 'stal-core' ),
					'description' => esc_html__( 'Enter user Facebook profile URL', 'stal-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_instagram',
					'title'       => esc_html__( 'Instagram', 'stal-core' ),
					'description' => esc_html__( 'Enter user Instagram profile URL', 'stal-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_twitter',
					'title'       => esc_html__( 'Twitter', 'stal-core' ),
					'description' => esc_html__( 'Enter user Twitter profile URL', 'stal-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_linkedin',
					'title'       => esc_html__( 'LinkedIn', 'stal-core' ),
					'description' => esc_html__( 'Enter user LinkedIn profile URL', 'stal-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_pinterest',
					'title'       => esc_html__( 'Pinterest', 'stal-core' ),
					'description' => esc_html__( 'Enter user Pinterest profile URL', 'stal-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_position',
					'title'       => esc_html__( 'User Position', 'stal-core' ),
					'description' => esc_html__( 'Enter user position', 'stal-core' ),
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_admin_user_options_map', $page );
		}
	}
	
	add_action( 'stal_core_action_register_role_custom_fields', 'stal_core_add_admin_user_options' );
}