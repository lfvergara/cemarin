<?php if ( has_nav_menu( 'divided-menu-left-navigation' ) ) : ?>
	<nav class="qodef-header-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Divided Left Menu', 'stal-core' ); ?>">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'divided-menu-left-navigation',
				'menu_id'        => 'qodef-divided-menu-left-navigation',
				'container'      => '',
				'link_before'    => '<span class="qodef-menu-item-text">',
				'link_after'     => '</span>',
				'walker'         => new StalCoreRootMainMenuWalker()
			)
		); ?>
	</nav>
<?php endif; ?>