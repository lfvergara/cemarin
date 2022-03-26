<article <?php post_class( 'qodef-portfolio-single-item qodef-e' ); ?>>
    <div class="qodef-e-inner">
        <div class="qodef-e-content qodef-grid qodef-layout--template <?php echo stal_core_get_grid_gutter_classes(); ?>">
            <div class="qodef-grid-inner clear">
                <div class="qodef-grid-item qodef-col--8">
                    <div class="qodef-media">
						<?php stal_core_template_part( 'post-types/portfolio', 'templates/parts/post-info/media', 'gallery' ); ?>
                    </div>
                </div>
                <div class="qodef-grid-item qodef-col--4 ">
					<?php stal_core_template_part( 'post-types/portfolio', 'templates/parts/post-info/title' ); ?>
					<?php stal_core_template_part( 'post-types/portfolio', 'templates/parts/post-info/content' ); ?>
                    <div class="qodef-portfolio-info">
						<?php stal_core_template_part( 'post-types/portfolio', 'templates/parts/post-info/custom-fields' ); ?>
						<?php stal_core_template_part( 'post-types/portfolio', 'templates/parts/post-info/date' ); ?>
						<?php stal_core_template_part( 'post-types/portfolio', 'templates/parts/post-info/categories' ); ?>
						<?php stal_core_template_part( 'post-types/portfolio', 'templates/parts/post-info/social-share' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php stal_core_template_part( 'post-types/portfolio', 'single-navigation/templates/single-navigation' ); ?>
	<?php stal_core_template_part( 'post-types/portfolio', 'templates/parts/related-posts' ); ?>
</article>