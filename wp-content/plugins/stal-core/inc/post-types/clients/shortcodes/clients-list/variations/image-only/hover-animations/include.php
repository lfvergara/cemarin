<?php

include_once 'hover-animations.php';

foreach ( glob( STAL_CORE_CPT_PATH . '/clients/shortcodes/clients-list/variations/image-only/hover-animations/*/include.php' ) as $animation ) {
	include_once $animation;
}