<?php

include_once STAL_CORE_SHORTCODES_PATH . '/custom-font/custom-font.php';

foreach ( glob( STAL_CORE_SHORTCODES_PATH . '/custom-font/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}