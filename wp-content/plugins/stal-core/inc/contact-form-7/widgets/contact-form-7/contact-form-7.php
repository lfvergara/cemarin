<?php

if ( ! function_exists( 'stal_core_add_contact_form_7_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function stal_core_add_contact_form_7_widget( $widgets ) {
		$widgets[] = 'StalCoreContactForm7Widget';
		
		return $widgets;
	}
	
	add_filter( 'stal_core_filter_register_widgets', 'stal_core_add_contact_form_7_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class StalCoreContactForm7Widget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'stal_core_contact_form_7' );
			$this->set_name( esc_html__( 'Stal Contact Form 7', 'stal-core' ) );
			$this->set_description( esc_html__( 'Add contact form 7 to widget areas', 'stal-core' ) );
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Widget Title', 'stal-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'select',
					'name'       => 'contact_form_id',
					'title'      => esc_html__( 'Select Contact Form 7', 'stal-core' ),
					'options'    => stal_core_get_contact_form_7_forms()
				)
			);
		}
		
		public function render( $atts ) { ?>
			<div class="qodef-contact-form-7">
				<?php if ( ! empty( $atts['contact_form_id'] ) ) {
					echo do_shortcode( '[contact-form-7 id="' . esc_attr( $atts['contact_form_id'] ) . '"]' ); // XSS OK
				} ?>
			</div>
			<?php
		}
	}
}