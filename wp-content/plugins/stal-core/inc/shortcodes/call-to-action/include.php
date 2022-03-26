<?php

include_once STAL_CORE_SHORTCODES_PATH . '/call-to-action/call-to-action.php';

foreach ( glob( STAL_CORE_SHORTCODES_PATH . '/call-to-action/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}