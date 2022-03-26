<?php

include_once STAL_CORE_SHORTCODES_PATH . '/button/button.php';

foreach ( glob( STAL_CORE_SHORTCODES_PATH . '/button/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}