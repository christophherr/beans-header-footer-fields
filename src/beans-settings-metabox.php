<?php
/**
 * Add the the Header and Footer Fields to the Beans Settings page.
 *
 * @package     ChristophHerr\BeansHeaderFooterFields
 * @since       1.0.0
 * @author      christophherr
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2.0+
 */

namespace ChristophHerr\BeansHeaderFooterFields;

add_action( 'admin_init', __NAMESPACE__ . '\register_sitewide_header_footer_fields' );
/**
 * Register header and footer fields on the Beans Settings page.
 *
 * @return bool|void False on failure.
 */
function register_sitewide_header_footer_fields() {

	// If user doesn't have unfiltered html capability, bail out.
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		return false;
	}

	$fields = require dirname( plugin_dir_path( __FILE__ ) ) . '/config/beans-header-footer-fields-array.php';

	\beans_register_options( $fields, 'beans_settings', 'beans_header_footer_fields', array(
		'title'   => esc_html__( 'Beans Header and Footer fields', 'beans-header-footer-fields' ),
		'context' => 'normal',
	) );
}
