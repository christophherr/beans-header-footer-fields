<?php
/**
 * Bootstraps the Beans Header Footer Fields Unit Tests.
 *
 * This file is an adjusted version of Beans Framework's bootstrap.php.
 *
 * @package     ChristophHerr\BeansHeaderFooterFields\Tests\Unit
 * @since       1.0.0
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2.0+
 *
 * @group       unit-tests
 */

if ( version_compare( phpversion(), '5.6.0', '<' ) ) {
	trigger_error( 'Beans Unit Tests require PHP 5.6 or higher.', E_USER_ERROR ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- Valid use case for our testing suite.
}

define( 'BEANS_HEADER_FOOTER_FIELDS_TESTS_DIR', __DIR__ );
define( 'BEANS_HEADER_FOOTER_FIELDS_PLUGIN_DIR', dirname( dirname( dirname( __DIR__ ) ) ) . DIRECTORY_SEPARATOR );
define( 'BEANS_HEADER_FOOTER_FIELDS_SRC_DIR', BEANS_HEADER_FOOTER_FIELDS_PLUGIN_DIR . 'src' . DIRECTORY_SEPARATOR );

// Let's define ABSPATH as it is in WordPress, i.e. relative to the filesystem's WordPress root path.
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( dirname( dirname( BEANS_HEADER_FOOTER_FIELDS_PLUGIN_DIR ) ) ) . '/' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedConstantFound -- Valid use case for our testing suite.
}

// Time to load Composer's autoloader.
$beans_header_footer_fields_autoload_path = BEANS_HEADER_FOOTER_FIELDS_PLUGIN_DIR . 'vendor/';

if ( ! file_exists( $beans_header_footer_fields_autoload_path . 'autoload.php' ) ) {
	trigger_error( 'Whoops, we need Composer to run tests. Please type: `composer install`. After the installation is done, run `phpunit` again.', E_USER_ERROR ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- Valid use case for our testing suite.
}
require_once $beans_header_footer_fields_autoload_path . 'autoload.php';
unset( $beans_header_footer_fields_autoload_path );

require_once BEANS_HEADER_FOOTER_FIELDS_TESTS_DIR . '/class-test-case.php';
