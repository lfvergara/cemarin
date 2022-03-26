<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php echo qode_framework_get_inline_style( $holder_styles ); ?>>
	<div class="qodef-m-inner">
		<?php stal_core_template_part( 'shortcodes/holder-with-image', 'templates/parts/image', '', $params ) ?>
		<?php stal_core_template_part( 'shortcodes/holder-with-image', 'templates/parts/content', '', $params ) ?>
	</div>
</div>