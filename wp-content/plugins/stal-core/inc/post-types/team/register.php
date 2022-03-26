<?php

if ( ! function_exists( 'stal_core_register_team_for_meta_options' ) ) {
	function stal_core_register_team_for_meta_options( $post_types ) {
		$post_types[] = 'team';
		
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'stal_core_register_team_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'stal_core_register_team_for_meta_options' );
}

if ( ! function_exists( 'stal_core_add_team_custom_post_type' ) ) {
	/**
	 * Function that adds team custom post type
	 *
	 * @param $cpts array
	 *
	 * @return array
	 */
	function stal_core_add_team_custom_post_type( $cpts ) {
		$cpts[] = 'StalCoreTeamCPT';
		
		return $cpts;
	}
	
	add_filter( 'stal_core_filter_register_custom_post_types', 'stal_core_add_team_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class StalCoreTeamCPT extends QodeFrameworkCustomPostType {
		
		public function map_post_type() {
			$name = esc_html__( 'Team', 'stal-core' );
			$this->set_base( 'team' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-screenoptions' );
			$this->set_slug( 'team' );
			$this->set_name( $name );
			$this->set_path( STAL_CORE_CPT_PATH . '/team' );
			$this->set_labels( array(
				'name'          => esc_html__( 'Stal Team', 'stal-core' ),
				'singular_name' => esc_html__( 'Team Member', 'stal-core' ),
				'add_item'      => esc_html__( 'New Team Member', 'stal-core' ),
				'add_new_item'  => esc_html__( 'Add New Team Member', 'stal-core' ),
				'edit_item'     => esc_html__( 'Edit Team Member', 'stal-core' )
			) );
			if ( ! stal_core_team_has_single() ) {
				$this->set_public( false );
				$this->set_archive( false );
				$this->set_supports( array(
					'title',
					'thumbnail'
				) );
			}
			$this->add_post_taxonomy( array(
				'base'          => 'team-category',
				'slug'          => 'team-category',
				'singular_name' => esc_html__( 'Category', 'stal-core' ),
				'plural_name'   => esc_html__( 'Categories', 'stal-core' ),
			) );
		}
	}
}