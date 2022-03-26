<?php

class MinimalMobileHeader extends StalCoreMobileHeader {
	private static $instance;
	
	public function __construct() {
		$this->slug                  = 'minimal';
		$this->default_header_height = 70;
		
		add_action( 'stal_action_before_wrapper_close_tag', array( $this, 'fullscreen_menu_template' ) );
		
		parent::__construct();
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	public function enqueue_additional_assets() {
	}
	
	function fullscreen_menu_template() {
		$header = stal_core_get_post_value_through_levels( 'qodef_header_layout' );
		
		if( $header != 'minimal' ) {
			$parameters = array(
				'fullscreen_menu_in_grid' => stal_core_get_post_value_through_levels( 'qodef_fullscreen_menu_in_grid' ) === 'yes'
			);
			
			stal_core_template_part( 'fullscreen-menu', 'templates/full-screen-menu', '', $parameters );
		}
	}
}