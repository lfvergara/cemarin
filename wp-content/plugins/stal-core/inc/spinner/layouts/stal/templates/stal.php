<?php

$image_gallery_valp = stal_core_get_post_value_through_levels( 'qodef_page_spinner_images', qode_framework_get_page_id() );

$image_gallery_array = explode( ',', $image_gallery_valp );

$image_logo = stal_core_get_post_value_through_levels( 'qodef_page_spinner_logo_image', qode_framework_get_page_id() );

?>

<div class="qodef-m-stal">
    <div class="qodef-m-stal-images-holder">
        <?php if ( isset( $image_gallery_array ) && count( $image_gallery_array ) > 0 ) {
            foreach ( $image_gallery_array as $gimg_id ):
                echo '<div>' . wp_get_attachment_image( $gimg_id, 'full' ) . '</div>';
            endforeach;
        } ?>
    </div>
    <div class="qodef-m-stal-logo-image">
        <?php echo wp_get_attachment_image( $image_logo, 'full' ); ?>
    </div>
    <div class="qodef-m-stal-text">
        <span><?php esc_html_e( 'Scroll Down', 'stal-core' ); ?></span>
    </div>
</div>