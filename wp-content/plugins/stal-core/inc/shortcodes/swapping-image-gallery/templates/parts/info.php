<div class="qodef-m-info clearfix">
	<div class="qodef-m-title-wrap">
		<?php if ( ! empty( $tagline ) ) { ?>
			<h6 class="qodef-m-title-tagline"><?php echo esc_html($tagline); ?></h6>
		<?php }?>
		<<?php echo esc_attr( $title_tag ); ?> class="qodef-m-title">
		<?php echo wp_kses_post( $info_title ); ?>
	</<?php echo esc_attr( $title_tag ); ?>>
	</div>
	<div class="qodef-m-thumbnails-holder qodef-grid qodef-layout--columns  qodef-gutter--small qodef-col-num--3 qodef--no-bottom-space">
		<div class="qodef-grid-inner clear">
				<?php foreach ( $items as $image_item ): ?>
				<div class="qodef-m-thumbnail qodef-grid-item">
                    <div class="qodef-m-thumbnail-wrapper">
                        <?php echo wp_get_attachment_image( $image_item['thumbnail_image'], 'full' ); ?>
                        <?php echo wp_get_attachment_image( $image_item['hover_thumbnail_image'], 'full', "", ["class" => "qodef-hover-image"] ); ?>
                    </div>
                </div>
			<?php endforeach; ?>
		</div>
	</div>
</div>