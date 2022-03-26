<?php
$is_enabled = stal_core_get_post_value_through_levels( 'qodef_blog_single_enable_single_post_navigation' );

if ( $is_enabled === 'yes' ) {
	$through_same_category = stal_core_get_post_value_through_levels( 'qodef_blog_single_post_navigation_through_same_category' ) === 'yes';
	?>
	<div id="qodef-single-post-navigation" class="qodef-m">
		<div class="qodef-m-inner">
			<?php
			$post_navigation = array(
				'prev' => array(
					'icon'  => qode_framework_icons()->render_icon( 'icon-arrows-slide-left2', 'linea-icons' )
				),
				'next' => array(
					'icon'  => qode_framework_icons()->render_icon( 'icon-arrows-slide-right2', 'linea-icons' )
				)
			);

			$prevPost = get_previous_post($through_same_category);
			$nextPost = get_next_post($through_same_category);
			
			if ( $through_same_category ) {
				if ( get_previous_post( true ) !== '' ) {
					$post_navigation['prev']['post'] = get_previous_post( true );
				}
				if ( get_next_post( true ) !== '' ) {
					$post_navigation['next']['post'] = get_next_post( true );
				}
			} else {
				if ( get_previous_post() !== '' ) {
					$post_navigation['prev']['post'] = get_previous_post();
				}
				if ( get_next_post() !== '' ) {
					$post_navigation['next']['post'] = get_next_post();
				}
			}

			if(isset($prevPost) && $prevPost !== '' && $prevPost !== null){
				$image = get_the_post_thumbnail($prevPost->ID, 'stal_post_thumb_size');
				$post_navigation['prev']['image'] = '';

				if($image !== ''){
					$post_navigation['prev']['image'] = '<div class="qodef-blog-single-nav-thumbnail">'.wp_kses_post($image).'</div>';
				}
			}

			if(isset($nextPost) && $nextPost !== '' && $nextPost !== null){
				$image = get_the_post_thumbnail($nextPost->ID, 'stal_post_thumb_size');

				$post_navigation['next']['image'] = '';

				if($image !== ''){
					$post_navigation['next']['image'] = '<div class="qodef-blog-single-nav-thumbnail">'.wp_kses_post($image).'</div>';
				}
			}
			
			foreach ( $post_navigation as $key => $value ) {
				if ( isset( $post_navigation[ $key ]['post'] ) ) {
					$current_post = $value['post'];
					$post_id      = $current_post->ID;
					?>
					<a itemprop="url" class="qodef-m-nav qodef--<?php echo esc_attr( $key ); ?>" href="<?php echo get_permalink( $post_id ); ?>">
						<?php echo wp_kses( $value['icon'], array( 'span' => array( 'class' => true ) ) ); ?>
						<?php echo wp_kses_post($value['image']) ?>
					</a>
				<?php }
			}
			?>
		</div>
	</div>
<?php } ?>