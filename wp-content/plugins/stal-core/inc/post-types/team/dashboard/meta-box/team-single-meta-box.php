<?php

if ( ! function_exists( 'stal_core_add_team_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function stal_core_add_team_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();
		$has_single     = stal_core_team_has_single();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'team' ),
				'type'  => 'meta',
				'slug'  => 'team',
				'title' => esc_html__( 'Team Single', 'stal-core' )
			)
		);
		
		if ( $page ) {
			$section = $page->add_section_element(
				array(
					'name'        => 'qodef_team_general_section',
					'title'       => esc_html__( 'General Settings', 'stal-core' ),
					'description' => esc_html__( 'General information about team member.', 'stal-core' )
				)
			);
			
			if ( $has_single ) {
				$section->add_field_element( array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_single_layout',
					'title'       => esc_html__( 'Single Layout', 'stal-core' ),
					'description' => esc_html__( 'Choose default layout for team single', 'stal-core' ),
					'options'     => array(
						'' => esc_html__( 'Default', 'stal-core' )
					)
				) );
			}
			
			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_role',
					'title'       => esc_html__( 'Role', 'stal-core' ),
					'description' => esc_html__( 'Enter team member role', 'stal-core' ),
				)
			);
			
			$social_icons_repeater = $section->add_repeater_element(
				array(
					'name'        => 'qodef_team_member_social_icons',
					'title'       => esc_html__( 'Social Networks', 'stal-core' ),
					'description' => esc_html__( 'Populate team member social networks info', 'stal-core' ),
					'button_text' => esc_html__( 'Add New Network', 'stal-core' )
				)
			);
			
			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'iconpack',
					'name'       => 'qodef_team_member_icon',
					'title'      => esc_html__( 'Icon', 'stal-core' )
				)
			);
			
			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_team_member_icon_link',
					'title'      => esc_html__( 'Icon Link', 'stal-core' )
				)
			);
			
			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_team_member_icon_target',
					'title'      => esc_html__( 'Icon Target', 'stal-core' ),
					'options'    => stal_core_get_select_type_options_pool( 'link_target' )
				)
			);
			
			if ( $has_single ) {
				$section->add_field_element( array(
					'field_type'  => 'date',
					'name'        => 'qodef_team_member_birth_date',
					'title'       => esc_html__( 'Birth Date', 'stal-core' ),
					'description' => esc_html__( 'Enter team member birth date', 'stal-core' ),
				) );
				
				$section->add_field_element( array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_email',
					'title'       => esc_html__( 'E-mail', 'stal-core' ),
					'description' => esc_html__( 'Enter team member e-mail address', 'stal-core' ),
				) );
				
				$section->add_field_element( array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_address',
					'title'       => esc_html__( 'Address', 'stal-core' ),
					'description' => esc_html__( 'Enter team member address', 'stal-core' ),
				) );
				
				$section->add_field_element( array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_education',
					'title'       => esc_html__( 'Education', 'stal-core' ),
					'description' => esc_html__( 'Enter team member education', 'stal-core' ),
				) );
				
				$section->add_field_element( array(
					'field_type'  => 'file',
					'name'        => 'qodef_team_member_resume',
					'title'       => esc_html__( 'Resume', 'stal-core' ),
					'description' => esc_html__( 'Upload team member resume', 'stal-core' ),
					'args'        => array(
						'allowed_type' => '[application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]'
					)
				) );
			}
			
			// Hook to include additional options after module options
			do_action( 'stal_core_action_after_team_meta_box_map', $page, $has_single );
		}
	}
	
	add_action( 'stal_core_action_default_meta_boxes_init', 'stal_core_add_team_single_meta_box' );
}