<?php

include_once STAL_CORE_SHORTCODES_PATH . '/icon-with-text/icon-with-text.php';

foreach ( glob( STAL_CORE_SHORTCODES_PATH . '/icon-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}