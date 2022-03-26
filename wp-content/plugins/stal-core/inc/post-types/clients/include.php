<?php

include_once 'helper.php';

foreach ( glob( STAL_CORE_CPT_PATH . '/clients/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}