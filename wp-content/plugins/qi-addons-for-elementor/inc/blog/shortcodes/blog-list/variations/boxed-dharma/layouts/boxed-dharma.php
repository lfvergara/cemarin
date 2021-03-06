<article <?php post_class( $item_classes ); ?> style="border: solid 2px #cccccc;">
	<div class="qodef-e-inner">
		<div class="qodef-e-media-holder">
			<?php
			if ( 'no' !== $show_media ) {
				// Include post media
				qi_addons_for_elementor_template_part( 'blog', 'templates/parts/post-info/media', '', $params );
			}
			if ( 'no' !== $show_date ) {
				// Include post date info
				qi_addons_for_elementor_template_part( 'blog', 'templates/parts/post-info/date', 'boxed', $params );
			}
			?>
		</div>
		<div class="qodef-e-content" style="padding: 3% 0px 0px 3%;">
			<?php if ( 'no' !== $show_date || 'no' !== $show_category || 'no' !== $show_author ) { ?>
				<div class="qodef-e-info qodef-info--top">
					<?php

					if ( 'no' !== $show_category ) {
						// Include post category info
						qi_addons_for_elementor_template_part( 'blog', 'templates/parts/post-info/category', '', $params );
					}

					if ( 'no' !== $show_author ) {
						// Include post author info
						qi_addons_for_elementor_template_part( 'blog', 'templates/parts/post-info/author', '', $params );
					}
					?>
				</div>
			<?php } ?>
			<div class="qodef-e-text" style="padding-right: 3%;">
				<?php
				// Include post title
				qi_addons_for_elementor_template_part( 'blog', 'templates/parts/post-info/title', '', $params );

				// Include post excerpt
				qi_addons_for_elementor_template_part( 'blog', 'templates/parts/post-info/excerpt', '', $params );

				// Hook to include additional content after blog single content
				do_action( 'qi_addons_for_elementor_action_after_blog_single_content', $params );
				?>
			</div>
			<?php if ( 'no' !== $show_button ) { ?>
				<div class="qodef-e-info qodef-info--bottom" style="display: block !important; text-align: right; margin-top: 2%;">
					<?php
					// Include post read more
					qi_addons_for_elementor_template_part( 'blog', 'templates/parts/post-info/read-more-dharma', '', $params );
					?>
				</div>
			<?php } ?>
		</div>
	</div>
</article>
