<?php

/**
 * PHPUnit bootstrap file.
 *
 * @package Polar_Core
 */

declare(strict_types=1);

$root_dir = dirname( path: __DIR__, levels: 3 );

require_once $root_dir . '/tools/vendor/autoload.php';
require_once $root_dir . '/vendor/autoload.php';
require_once $root_dir . '/tests/php/TestCase.php';


$_tests_dir = getenv( name: 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

// var_dump($_tests_dir ); exit();

// Forward custom PHPUnit Polyfills configuration to PHPUnit bootstrap file.
$_phpunit_polyfills_path = getenv( 'WP_TESTS_PHPUNIT_POLYFILLS_PATH' );

if ( $_phpunit_polyfills_path !== false ) {
	define( 'WP_TESTS_PHPUNIT_POLYFILLS_PATH', $_phpunit_polyfills_path );
}

if ( ! file_exists( "{$_tests_dir}/includes/functions.php" ) ) {
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo "Could not find {$_tests_dir}/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL;
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once "{$_tests_dir}/includes/functions.php";

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin()
{
	require dirname( __FILE__, 4 ) . '/public/app/plugins/design-system/design-system.php';
}

tests_add_filter(
	hook_name: 'muplugins_loaded',
	callback: '_manually_load_plugin'
);

// Start up the WP testing environment.
require "{$_tests_dir}/includes/bootstrap.php";
