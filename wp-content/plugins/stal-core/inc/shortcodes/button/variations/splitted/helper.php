<?php

if ( ! function_exists( 'stal_core_add_button_variation_splitted' ) ) {
    function stal_core_add_button_variation_splitted( $variations ) {

        $variations['splitted'] = esc_html__( 'Splitted', 'stal-core' );

        return $variations;
    }

    add_filter( 'stal_core_filter_button_layouts', 'stal_core_add_button_variation_splitted' );
}
