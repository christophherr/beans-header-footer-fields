<?php
/**
 * Beans Header and Footer Fields Plugin
 *
 * @package     ChristophHerr\BeansHeaderFooterFields
 * @author      christophherr
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Beans Header and Footer Fields
 * Plugin URI:  https://github.com/christophherr/beans-header-footer-script-fields
 * Description: Custom fields to add scripts and styles to the header and footer of a website.
 * Version:     1.0.0
 * Author:      christophherr
 * Author URI:  https://www.christophherr.com
 * Text Domain: beans-header-footer-fields
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace ChristophHerr\BeansHeaderFooterFields;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Nothing to see here.' );
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\maybe_activate_plugin' );
/**
 * This function runs on plugin activation. It checks to make sure the
 * Beans Framework is active. If not, it deactivates the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */
function maybe_activate_plugin() {

	if ( ! function_exists( '\beans_define_constants' ) ) {
		// Deactivate.
		deactivate_plugins( plugin_basename( __FILE__ ) );
		add_action( 'admin_notices', __NAMESPACE__ . '\admin_notice_message' );
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\maybe_deactivate_plugin' );
add_action( 'switch_theme', __NAMESPACE__ . '\maybe_deactivate_plugin' );
/**
 * This function is triggered when the WordPress theme is changed.
 * It checks if the Beans Framework is active. If not, it deactivates the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */
function maybe_deactivate_plugin() {

	if ( ! function_exists( '\beans_define_constants' ) ) {
		// Deactivate.
		deactivate_plugins( plugin_basename( __FILE__ ) );
		add_action( 'admin_notices', __NAMESPACE__ . '\admin_notice_message' );
	}
}

/**
 * Error message if you're not using the Beans Framework.
 *
 * @since 1.0.0
 *
 * @return void
 */
function admin_notice_message() {
	// phpcs:disable WordPress.XSS.EscapeOutput -- Need to build the link.
	$error = sprintf(
		// translators: Link to the Beans website.
		__( 'Sorry, you can\'t use the Beans Header and Footer Fields Plugin unless the <a href="%s">Beans Framework</a> is active. The plugin has been deactivated.', 'beans-header-footer-fields' ),
		'https://getbeans.io'
	);

	printf( '<div class="error"><p>%s</p></div>', $error );
	// phpcs:enable

	if ( isset( $_GET['activate'] ) ) { // phpcs:ignore WordPress.CSRF.NonceVerification.NoNonceVerification -- Internal usage
		unset( $_GET['activate'] );
	}
}

/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	if ( ! function_exists( '\beans_define_constants' ) ) {
		return;
	}

	$plugin_dir = plugin_dir_path( __FILE__ );

	require $plugin_dir . 'src/beans-customizer-section.php';
	require $plugin_dir . 'src/beans-settings-metabox.php';
	require $plugin_dir . 'src/beans-singular-metabox.php';
	require $plugin_dir . 'src/output.php';
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\setup' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup() {
	load_plugin_textdomain( 'beans-header-footer-fields', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

	add_action( 'init', __NAMESPACE__ . '\launch' );
}

