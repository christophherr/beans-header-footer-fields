<?php
/**
 * Add Header and Footer Fields to the WP Customizer.
 *
 * @package     ChristophHerr\BeansHeaderFooterFields
 * @since       1.0.0
 * @author      christophherr
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2.0+
 */

namespace ChristophHerr\BeansHeaderFooterFields;

add_action( 'customize_register', __NAMESPACE__ . '\register_customizer_section' );
/**
 * Register the Header and Footer fields with the WP Customizer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_customizer_section() {
	$fields = require dirname( plugin_dir_path( __FILE__ ) ) . '/config/beans-header-footer-fields-array.php';

	beans_register_wp_customize_options(
		$fields,
		'beans_header_footer_fields',
		[
			'title'    => esc_html__( 'Beans Header and Footer Fields', 'beans-header-footer-fields' ),
			'priority' => 250,
		]
	);
}
