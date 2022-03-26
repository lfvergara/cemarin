<?php

include_once 'social-share.php';

foreach ( glob( STAL_CORE_INC_PATH . '/social-share/shortcodes/social-share/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}