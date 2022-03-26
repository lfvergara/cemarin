<div class="qodef-header-sticky">
    <div class="qodef-header-sticky-inner">
        <div class="qodef-divided--left">
            <?php
            stal_core_get_header_widget_area( '', 'two' );
            stal_core_template_part( 'header/layouts/divided', 'templates/parts/left-navigation' );
            ?>
        </div>

        <?php stal_core_get_header_logo_image(); ?>

        <div class="qodef-divided--right">
            <?php
            stal_core_template_part( 'header/layouts/divided', 'templates/parts/right-navigation' );
            stal_core_get_header_widget_area();
            ?>
        </div>
        <?php do_action('stal_core_action_after_sticky_header'); ?>
    </div>
</div>