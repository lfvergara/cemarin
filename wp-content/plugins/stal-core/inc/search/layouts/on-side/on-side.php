<?php
class OnSideSearch extends StalCoreSearch {
	private static $instance;
	
	public function __construct() {
		parent::__construct();
		add_action( 'stal_core_action_after_search_opener', array( $this, 'load_template' ), 111 );
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	public function load_template() {
		if(is_active_widget(false,false,'stal_core_search_opener')) {
			stal_core_template_part('search/layouts/' . $this->search_layout, 'templates/' . $this->search_layout);
		}
	}
}