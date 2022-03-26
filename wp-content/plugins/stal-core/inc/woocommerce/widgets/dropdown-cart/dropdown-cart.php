<?php

if ( ! function_exists( 'stal_core_add_woo_dropdown_cart_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function stal_core_add_woo_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'StalCoreWooDropDownCartWidget';
		
		return $widgets;
	}
	
	add_filter( 'stal_core_filter_register_widgets', 'stal_core_add_woo_dropdown_cart_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class StalCoreWooDropDownCartWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'stal_core_woo_dropdown_cart' );
			$this->set_name( esc_html__( 'Stal WooCommerce DropDown Cart', 'stal-core' ) );
			$this->set_description( esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'stal-core' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'widget_padding',
					'title'       => esc_html__( 'Widget Padding', 'stal-core' ),
					'description' => esc_html__( 'Insert padding in format: top right bottom left', 'stal-core' )
				)
			);
		}
		
		public function render( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['widget_padding'] ) ) {
				$styles[] = 'padding: ' . $atts['widget_padding'];
			}
			?>
			<div class="qodef-woo-dropdown-cart qodef-m" <?php qode_framework_inline_style( $styles ) ?>>
				<div class="qodef-woo-dropdown-cart-inner qodef-m-inner">
					<?php stal_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/content' ); ?>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'stal_core_woo_dropdown_cart_add_to_cart_fragment' ) ) {
	function stal_core_woo_dropdown_cart_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
		<div class="qodef-woo-dropdown-cart-inner qodef-m-inner">
			<?php stal_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/content' ); ?>
		</div>
		
		<?php
		$fragments['.qodef-woo-dropdown-cart-inner'] = ob_get_clean();
		
		return $fragments;
	}
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'stal_core_woo_dropdown_cart_add_to_cart_fragment' );
}
?>