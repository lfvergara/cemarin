<?php
// Include mobile logo
stal_core_get_mobile_header_logo_image();

// Include mobile haeder widget area
dynamic_sidebar( 'qodef-mobile-header-widget-area' );

// Include mobile navigation opener
stal_core_template_part( 'mobile-header', 'templates/parts/mobile-navigation-opener' );

// Include mobile navigation
stal_core_template_part( 'mobile-header', 'templates/parts/mobile-navigation' );