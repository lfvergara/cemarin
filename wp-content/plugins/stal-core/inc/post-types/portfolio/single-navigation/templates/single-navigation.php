<?php
$is_enabled = stal_core_get_post_value_through_levels( 'qodef_portfolio_enable_navigation' );
$back_to_link = stal_core_get_post_value_through_levels( 'qodef_portfolio_single_back_link' );

if ( $is_enabled === 'yes' ) {
	$through_same_category = stal_core_get_post_value_through_levels( 'qodef_portfolio_navigation_through_same_category' ) === 'yes';
	?>
	<div id="qodef-single-portfolio-navigation" class="qodef-m">
		<div class="qodef-m-inner">
			<?php


			$post_navigation = array(
				'prev' => array(
					'label' => '<span class="qodef-m-nav-label">' . esc_html__( 'Previous', 'stal-core' ) . '</span>',
					'icon'  => qode_framework_icons()->render_icon( 'icon-arrows-slim-left', 'linea-icons' )
				),
				'next' => array(
					'label' => '<span class="qodef-m-nav-label">' . esc_html__( 'Next', 'stal-core' ) . '</span>',
					'icon'  => qode_framework_icons()->render_icon( 'icon-arrows-slim-right', 'linea-icons' )
				)
			);
			
			if ( $through_same_category ) {
				if ( get_adjacent_post( true, '', true, 'portfolio-category') !== '' ) {
					$post_navigation['prev']['post'] = get_adjacent_post( true, '', true, 'portfolio-category');
				}
				if ( get_adjacent_post( true, '', false, 'portfolio-category' ) !== '' ) {
					$post_navigation['next']['post'] = get_adjacent_post( true, '', false, 'portfolio-category' );
				}
			} else {
				if ( get_adjacent_post(false, '', true) !== '' ) {
					$post_navigation['prev']['post'] = get_adjacent_post(false, '', true);
				}
				if ( get_adjacent_post(false, '', false) !== '' ) {
					$post_navigation['next']['post'] = get_adjacent_post(false, '', false);
				}
			}
			
			if($back_to_link !== '') { ?>
				<div class="qodef-m-nav qodef--backbtn">
					<a itemprop="url" href="<?php echo esc_url($back_to_link); ?>">
						<span class="qodef-circles">
							<span class="qodef-circle qodef-circle-1"></span>
							<span class="qodef-circle qodef-circle-2"></span>
							<span class="qodef-circle qodef-circle-3"></span>
							<span class="qodef-circle qodef-circle-4"></span>
						</span>
					</a>
				</div>
			<?php }

			foreach ( $post_navigation as $key => $value ) {
				if ( isset( $post_navigation[ $key ]['post'] ) ) {
					$current_post = $value['post'];
					$post_id      = $current_post->ID;
					?>
					<a itemprop="url" class="qodef-m-nav qodef--<?php echo esc_attr( $key ); ?>" href="<?php echo get_permalink( $post_id ); ?>">
						<?php echo wp_kses( $value['icon'], array( 'span' => array( 'class' => true ) ) ); ?>
						<?php echo wp_kses( $value['label'], array( 'span' => array( 'class' => true ) ) ); ?>
					</a>
				<?php }
			}
			?>
		</div>
	</div>
<?php } ?>