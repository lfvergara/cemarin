<div <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-image">
			<?php stal_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/image', '', $params ); ?>
		</div>
		<div class="qodef-e-content">
			<?php stal_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/role', '', $params ); ?>
			<?php stal_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/title', '', $params ); ?>
		</div>
		<div class="qodef-e-social-content">
			<?php stal_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/social-icons', '', $params ); ?>
		</div>
	</div>
</div>