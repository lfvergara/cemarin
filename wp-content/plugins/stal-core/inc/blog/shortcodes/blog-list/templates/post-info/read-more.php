<?php if ( ! post_password_required() ) { ?>
	<div class="qodef-e-read-more">
		<?php
		$button_params = array(
            'button_layout' => 'splitted',
			'link'          => get_the_permalink(),
			'text'          => esc_html__( 'Read More', 'stal-core' )
		);
		
		echo StalCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>