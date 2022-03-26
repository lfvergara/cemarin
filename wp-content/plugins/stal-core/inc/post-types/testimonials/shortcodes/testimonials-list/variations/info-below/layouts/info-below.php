<div <?php qode_framework_class_attribute( $item_classes ); ?> data-slide-index="<?php echo esc_attr($params['itemnum']); ?>">
	<div class="qodef-e-inner">
        <?php stal_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/title', '', $params ); ?>
        <?php stal_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/text', '', $params ); ?>
        <?php stal_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/author', '', $params ); ?>
	</div>
</div>