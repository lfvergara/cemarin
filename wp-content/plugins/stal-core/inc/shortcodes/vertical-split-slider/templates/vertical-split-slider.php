<div <?php qode_framework_class_attribute( $holder_classes ); ?>>

    <div class="ms-left">

		<?php foreach ( $items as $key => $item ) :
			$slide_image_styles = $this_object->get_slide_image_styles( $item );
			$slide_data = $this_object->get_slide_data( $item );
			?>

			<?php if ( $item['slide_layout'] === 'image-left' ) : ?>

                <div class="qodef-m-slide-image ms-section ms-table" <?php echo qode_framework_get_inline_attrs( $slide_data ); ?> <?php qode_framework_inline_style( $slide_image_styles ); ?>></div>

            <?php else : ?>
			
			<div class="qodef-m-slide-content ms-section ms-table" <?php echo qode_framework_get_inline_attrs( $slide_data ); ?>>
				<?php
				if ( qode_framework_is_installed( 'elementor' ) ) {
					$content = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $item['predefined_section'] );
					echo do_shortcode( $content );
				} ?>
			
			</div>

            <?php endif; ?>
		<?php endforeach; ?>

    </div><!-- .ms-left -->

    <div class="ms-right">

		<?php foreach ( $items as $key => $item ) :
			$slide_image_styles = $this_object->get_slide_image_styles( $item );
			?>

			<?php if ( $item['slide_layout'] === 'image-right' ) : ?>

                <div class="qodef-m-slide-image ms-section ms-table" <?php qode_framework_inline_style( $slide_image_styles ); ?>></div>

            <?php else : ?>
			
			<div class="qodef-m-slide-content ms-section ms-table">
				<?php
				if ( qode_framework_is_installed( 'elementor' ) ) {
					$content = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $item['predefined_section'] );
					echo do_shortcode( $content );
				} ?>
			</div>

            <?php endif; ?>
		<?php endforeach; ?>

    </div><!-- .ms-right -->

</div>

<div class="qodef-vss-responsive qodef-m">

	<?php foreach ( $items as $key => $item ) :
		$slide_image_styles = $this_object->get_slide_image_styles( $item );
		?>
		
		<div class="qodef-m-slide-content">
			<?php
			if ( qode_framework_is_installed( 'elementor' ) ) {
				$content = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $item['predefined_section'] );
				echo do_shortcode( $content );
			} ?>
		</div>

        <div class="qodef-m-slide-image" <?php qode_framework_inline_style( $slide_image_styles ); ?>></div>

	<?php endforeach; ?>

</div>