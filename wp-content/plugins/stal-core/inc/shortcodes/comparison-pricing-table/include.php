<?php

include_once STAL_CORE_SHORTCODES_PATH . '/comparison-pricing-table/comparison-pricing-table.php';

foreach ( glob( STAL_CORE_SHORTCODES_PATH . '/comparison-pricing-table/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}