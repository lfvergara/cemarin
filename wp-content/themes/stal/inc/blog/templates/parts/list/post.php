<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		stal_template_part( 'blog', 'templates/parts/post-info/media' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post date info
				stal_template_part( 'blog', 'templates/parts/post-info/date' );

				// Include post category info
				stal_template_part( 'blog', 'templates/parts/post-info/category' );
				?>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				stal_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => 'h3' ) );
				
				// Include post excerpt
				stal_template_part( 'blog', 'templates/parts/post-info/excerpt' );
				
				// Hook to include additional content after blog single content
				do_action( 'stal_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post read more
					stal_template_part( 'blog', 'templates/parts/post-info/read-more','compact' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>