<?php

include_once 'clients-list.php';

foreach ( glob( STAL_CORE_CPT_PATH . '/clients/shortcodes/clients-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}