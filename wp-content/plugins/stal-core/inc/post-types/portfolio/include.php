<?php

include_once 'helper.php';

foreach ( glob( STAL_CORE_CPT_PATH . '/portfolio/dashboard/admin/*.php' ) as $module ) {
	include_once $module;
}

foreach ( glob( STAL_CORE_CPT_PATH . '/portfolio/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}

foreach ( glob( STAL_CORE_CPT_PATH . '/portfolio/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}

include_once STAL_CORE_CPT_PATH . '/portfolio/single-navigation/include.php';

if ( ! function_exists( 'stal_core_include_portfolio_tax_fields' ) ) {
	function stal_core_include_portfolio_tax_fields() {
		include_once 'dashboard/taxonomy/taxonomy-options.php';
	}
	
	add_action( 'stal_core_action_include_cpt_tax_fields', 'stal_core_include_portfolio_tax_fields' );
}