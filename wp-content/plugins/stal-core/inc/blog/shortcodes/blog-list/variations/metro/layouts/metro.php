<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php stal_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/image', 'background', $params ); ?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post date info
				stal_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/date' );
				?>
			</div>
			<?php stal_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params ); ?>
		</div>
		<?php stal_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/link' ); ?>
	</div>
</article>