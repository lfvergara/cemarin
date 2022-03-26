<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-testimonials-holder">
		<?php
		// Include items
		stal_core_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'templates/loop', '', $params );
		?>
	</div>
	<?php if ( $slider_pagination !== 'no' ) { ?>
		<div class="swiper-pagination"></div>
	<?php } ?>
	<?php if ( $slider_navigation !== 'no' ) { ?>
		<div class="swiper-button-next swiper-button-next-<?php echo esc_attr( $unique ); ?>"></div>
		<div class="swiper-button-prev swiper-button-prev-<?php echo esc_attr( $unique ); ?>"></div>
	<?php } ?>
	<span class="qodef-e-quotes ion-md-quote"></span>
</div>