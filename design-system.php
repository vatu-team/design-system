<?php

/**
 * Plugin Name:   Design System
 * Plugin URI:    https://vatu.dev/
 * Description:   Custom Post Type to display Design System Pages
 * Version:       1.0.0
 * Author:        Vatu
 * Author URI:    https://vatu.dev/
 * Developer:     Michael Bragg
 * Developer URI: https://www.michaelbragg.com/
 * Copyright:     2025 Vatu Limited
 *
 * License:       GNU General Public License v3.0 or later
 * License URI:   http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package   Vatu\Wordpress\Plugin\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3 or later
 * @copyright 2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem;

use Throwable;

/**
 * Block access to file directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

/**
 * Scope hooks identifier.
 */
const HOOK_PREFIX = 'Vatu';

const BLOCK_DIR = __DIR__ . '/build';

/**
 * Autoloader.
 */
$composer_autoloader = __DIR__ . '/vendor/autoload.php';

if ( is_readable( $composer_autoloader ) ) {
	require $composer_autoloader;
}

try {
	/**
	 * The core plugin class that is used to define internationalization,
	 * admin-specific hooks, and public-facing site hooks.
	 */
	( new PluginFactory() )::create( HOOK_PREFIX )->bootstrap();
} catch ( Throwable $exception ) {
	// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log, Squiz.PHP.DiscouragedFunctions.Discouraged
	error_log( $exception->getMessage() );
}
