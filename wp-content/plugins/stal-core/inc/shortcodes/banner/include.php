<?php

include_once STAL_CORE_SHORTCODES_PATH . '/banner/banner.php';

foreach ( glob( STAL_CORE_INC_PATH . '/shortcodes/banner/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}