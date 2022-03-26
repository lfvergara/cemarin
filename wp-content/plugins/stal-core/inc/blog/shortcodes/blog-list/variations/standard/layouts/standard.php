<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		stal_core_theme_template_part( 'blog', 'templates/parts/post-info/media' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post date info
				stal_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );

				// Include post tags info
				stal_core_theme_template_part( 'blog', 'templates/parts/post-info/tags' );

				// Include post category info
				stal_core_theme_template_part( 'blog', 'templates/parts/post-info/category' );
				?>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				stal_core_theme_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => $title_tag ) );
				
				// Include post excerpt
				stal_core_theme_template_part( 'blog', 'templates/parts/post-info/excerpt', '', $params );
				
				// Hook to include additional content after blog single content
				do_action( 'stal_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post read more
					stal_core_theme_template_part( 'blog', 'templates/parts/post-info/read-more' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>