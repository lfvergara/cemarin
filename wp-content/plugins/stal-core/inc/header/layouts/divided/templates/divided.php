
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


