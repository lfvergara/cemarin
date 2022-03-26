<?php

include_once 'media-custom-fields.php';
include_once 'product-categories-list.php';

foreach ( glob( STAL_CORE_INC_PATH . '/woocommerce/shortcodes/product-categories-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}