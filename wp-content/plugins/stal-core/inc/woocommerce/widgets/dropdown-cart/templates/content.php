<?php stal_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/opener' ); ?>
<div class="qodef-m-dropdown">
	<div class="qodef-m-dropdown-inner">
		<?php if ( ! WC()->cart->is_empty() ) {
			stal_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/loop' );
			
			stal_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/order-details' );
			
			stal_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/button' );
		} else {
			stal_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/posts-not-found' );
		} ?>
	</div>
</div>