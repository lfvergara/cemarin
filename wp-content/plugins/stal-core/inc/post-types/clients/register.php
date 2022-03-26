<?php

if ( ! function_exists( 'stal_core_register_clients_for_meta_options' ) ) {
	function stal_core_register_clients_for_meta_options( $post_types ) {
		$post_types[] = 'clients';
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'stal_core_register_clients_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'stal_core_register_clients_for_meta_options' );
}

if ( ! function_exists( 'stal_core_add_clients_custom_post_type' ) ) {
	/**
	 * Function that adds clients custom post type
	 *
	 * @param $cpts array
	 *
	 * @return array
	 */
	function stal_core_add_clients_custom_post_type( $cpts ) {
		$cpts[] = 'StalCoreClientsCPT';
		
		return $cpts;
	}
	
	add_filter( 'stal_core_filter_register_custom_post_types', 'stal_core_add_clients_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class StalCoreClientsCPT extends QodeFrameworkCustomPostType {
		
		public function map_post_type() {
			$name = esc_html__( 'Clients', 'stal-core' );
			$this->set_base( 'clients' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-screenoptions' );
			$this->set_slug( 'clients' );
			$this->set_name( $name );
			$this->set_path( STAL_CORE_CPT_PATH . '/clients' );
			$this->set_labels( array(
				'name'          => esc_html__( 'Stal Clients', 'stal-core' ),
				'singular_name' => esc_html__( 'Client', 'stal-core' ),
				'add_item'      => esc_html__( 'New Client', 'stal-core' ),
				'add_new_item'  => esc_html__( 'Add New Client', 'stal-core' ),
				'edit_item'     => esc_html__( 'Edit Client', 'stal-core' )
			) );
			$this->set_public( false );
			$this->set_archive( false );
			$this->set_supports( array(
				'title',
				'thumbnail'
			) );
			$this->add_post_taxonomy( array(
				'base'          => 'clients-category',
				'slug'          => 'clients-category',
				'singular_name' => esc_html__( 'Category', 'stal-core' ),
				'plural_name'   => esc_html__( 'Categories', 'stal-core' ),
			) );
		}
		
	}
}