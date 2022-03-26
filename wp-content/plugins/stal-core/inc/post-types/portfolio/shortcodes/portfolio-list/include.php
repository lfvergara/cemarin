<?php

include_once 'portfolio-list.php';

foreach ( glob( STAL_CORE_CPT_PATH . '/portfolio/shortcodes/portfolio-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}