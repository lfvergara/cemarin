<?php

if ( ! function_exists( 'stal_core_register_portfolio_for_meta_options' ) ) {
	function stal_core_register_portfolio_for_meta_options( $post_types ) {
		$post_types[] = 'portfolio-item';
		
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'stal_core_register_portfolio_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'stal_core_register_portfolio_for_meta_options' );
}

if ( ! function_exists( 'stal_core_add_portfolio_custom_post_type' ) ) {
	/**
	 * Function that adds portfolio custom post type
	 *
	 * @param $cpts array
	 *
	 * @return array
	 */
	function stal_core_add_portfolio_custom_post_type( $cpts ) {
		$cpts[] = 'StalCorePortfolioCPT';
		
		return $cpts;
	}
	
	add_filter( 'stal_core_filter_register_custom_post_types', 'stal_core_add_portfolio_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class StalCorePortfolioCPT extends QodeFrameworkCustomPostType {
		
		public function map_post_type() {
			$name = esc_html__( 'Portfolio', 'stal-core' );
			$this->set_base( 'portfolio-item' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-screenoptions' );
			$this->set_slug( 'portfolio-item' );
			$this->set_name( $name );
			$this->set_path( STAL_CORE_CPT_PATH . '/portfolio' );
			$this->set_labels( array(
				'name'          => esc_html__( 'Stal Portfolio', 'stal-core' ),
				'singular_name' => esc_html__( 'Portfolio Item', 'stal-core' ),
				'add_item'      => esc_html__( 'New Portfolio Item', 'stal-core' ),
				'add_new_item'  => esc_html__( 'Add New Portfolio Item', 'stal-core' ),
				'edit_item'     => esc_html__( 'Edit Portfolio Item', 'stal-core' )
			) );
			$this->add_post_taxonomy( array(
				'base'          => 'portfolio-category',
				'slug'          => 'portfolio-category',
				'singular_name' => esc_html__( 'Category', 'stal-core' ),
				'plural_name'   => esc_html__( 'Categories', 'stal-core' ),
			) );
			$this->add_post_taxonomy( array(
				'base'          => 'portfolio-tag',
				'slug'          => 'portfolio-tag',
				'singular_name' => esc_html__( 'Tag', 'stal-core' ),
				'plural_name'   => esc_html__( 'Tags', 'stal-core' ),
			) );
		}
	}
}