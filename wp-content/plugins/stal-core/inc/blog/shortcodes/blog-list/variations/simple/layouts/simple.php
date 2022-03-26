<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php stal_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/image', '', $params ); ?>
		<div class="qodef-e-content">
			<?php
			// Include post date info
			stal_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/date' );
			?>
			<?php stal_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params ); ?>
		</div>
	</div>
</article>