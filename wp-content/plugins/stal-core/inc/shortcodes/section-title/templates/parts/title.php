<?php if ( ! empty( $title ) ) { ?>
	<div class="qodef-m-title-wrap">
	<?php if ( ! empty( $tagline ) ) { ?>
        <h6 class="qodef-m-title-tagline" <?php qode_framework_inline_style( $tagline_styles ); ?>><?php echo esc_html($tagline); ?></h6>
    <?php }?>
	<<?php echo esc_attr( $title_tag ); ?> class="qodef-m-title" <?php qode_framework_inline_style( $title_styles ); ?>>
		<?php if ( ! empty( $link ) ) : ?>
			<a itemprop="url" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
		<?php endif; ?>
			<?php echo wp_kses_post( $title ); ?>
		<?php if ( ! empty( $link ) ) : ?>
			</a>
		<?php endif; ?>
	</<?php echo esc_attr( $title_tag ); ?>>
	
	</div>
<?php } ?>