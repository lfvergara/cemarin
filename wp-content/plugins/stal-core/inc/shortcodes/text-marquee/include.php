<?php

include_once 'text-marquee.php';

foreach ( glob( STAL_CORE_INC_PATH . '/shortcodes/text-marquee/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}