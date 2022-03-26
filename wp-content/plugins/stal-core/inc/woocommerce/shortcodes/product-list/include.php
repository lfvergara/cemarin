<?php

include_once 'product-list.php';

foreach ( glob( STAL_CORE_INC_PATH . '/woocommerce/shortcodes/product-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}