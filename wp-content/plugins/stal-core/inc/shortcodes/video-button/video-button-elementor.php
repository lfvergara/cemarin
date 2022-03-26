<?php

class StalCoreElementorVideoButton extends \Elementor\Widget_Base{

	public $object;

	function __construct(array $data = [], $args = null) {
		$this->set_object();
		parent::__construct($data, $args);

	}

	public function set_object(){
			$this->object = qode_framework_get_framework_root()->get_shortcodes()->get_shortcode('stal_core_video_button');
	}

	public function get_name() {
		return $this->object->get_base();
	}

	public function get_title() {
		return $this->object->get_name();
	}

	public function get_icon() {
		return 'qodef-custom-elementor-icon ' .  str_replace('_', '-', $this->get_name());
	}

	public function get_categories() {
		return [ 'qode' ];
	}

	protected function _register_controls() {

		QodeFrameworkElementor_Translator::get_instance()->create_controls( $this, $this->object);

	}

	protected function render(){

		QodeFrameworkElementor_Translator::get_instance()->create_render( $this->object, $this->get_settings_for_display());
	}

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new StalCoreElementorVideoButton() );