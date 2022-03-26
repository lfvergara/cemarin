<?php

include_once STAL_CORE_SHORTCODES_PATH . '/holder-with-image/holder-with-image.php';

foreach ( glob( STAL_CORE_SHORTCODES_PATH . '/holder-with-image/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}