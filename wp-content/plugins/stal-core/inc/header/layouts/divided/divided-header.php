<?php

class DividedHeader extends StalCoreHeader {
	private static $instance;

	public function __construct() {
		$this->slug = 'divided';
		$this->search_layout = 'on-side';
		$this->default_header_height = 90;

		parent::__construct();
	}

	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}