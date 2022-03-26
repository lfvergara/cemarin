<?php if ( class_exists( 'StalCoreSocialShareShortcode' ) ) { ?>
	<div class="qodef-e-info-item qodef-e-info-social-share">
		<?php
		$params = array();
		$params['title'] = esc_html__( 'Share:', 'stal-core' );
		
		echo StalCoreSocialShareShortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>