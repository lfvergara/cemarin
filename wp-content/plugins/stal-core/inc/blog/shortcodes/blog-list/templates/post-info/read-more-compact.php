<?php if ( ! post_password_required() ) { ?>
	<div class="qodef-e-read-more">
		<?php
		$button_params = array(
			'link' => get_the_permalink(),
			'button_layout'    => 'filled',
			'text' => esc_html__( 'Read More', 'stal-core' )
		);
		
		echo StalCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>