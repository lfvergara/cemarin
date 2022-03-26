<?php

include_once 'helper.php';

foreach ( glob( STAL_CORE_CPT_PATH . '/team/dashboard/admin/*.php' ) as $module ) {
	include_once $module;
}

foreach ( glob( STAL_CORE_CPT_PATH . '/team/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}