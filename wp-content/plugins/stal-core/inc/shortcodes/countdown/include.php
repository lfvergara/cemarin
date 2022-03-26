<?php

include_once STAL_CORE_SHORTCODES_PATH . '/countdown/countdown.php';

foreach ( glob( STAL_CORE_SHORTCODES_PATH . '/countdown/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}