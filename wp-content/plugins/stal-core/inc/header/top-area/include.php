<?php

include_once STAL_CORE_INC_PATH . '/header/top-area/top-area.php';
include_once STAL_CORE_INC_PATH . '/header/top-area/helper.php';
foreach ( glob( STAL_CORE_INC_PATH . '/header/top-area/dashboard/*/*.php' ) as $dashboard ) {
	include_once $dashboard;
}