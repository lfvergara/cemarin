<a itemprop="url" class="qodef-header-logo-link <?php echo esc_attr( $logo_classes ); ?> <?php echo esc_attr( $additional_logo_classes ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php qode_framework_inline_style( $logo_styles ); ?> rel="home">
	<?php if($logo_source === 'text') { ?>
		<span class="qodef-logo-text" <?php qode_framework_inline_style( $text_styles ); ?>>
                <span class="qodef-logo-text-inner"><?php echo esc_html($logo_text); ?></span>
        </span>
	<?php } else {
		echo wp_kses_post( $logo_main_image );
		echo wp_kses_post( $logo_dark_image );
		echo wp_kses_post( $logo_light_image );
	} ?>
</a>