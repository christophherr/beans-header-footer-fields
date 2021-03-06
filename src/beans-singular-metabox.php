<?php
/**
 * Add the Header and Footer Fields to posts and pages.
 *
 * @package     ChristophHerr\BeansHeaderFooterFields
 * @since       1.0.0
 * @author      christophherr
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2.0+
 */

namespace ChristophHerr\BeansHeaderFooterFields;

add_action( 'admin_init', __NAMESPACE__ . '\register_post_meta_fields' );
/**
 * Register Header and Footer fields as post meta.
 *
 * @since 1.0.0
 *
 * @return bool|void False on failure.
 */
function register_post_meta_fields() {

	// If user doesn't have unfiltered html capability, bail out.
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		return false;
	}

	$fields = require dirname( plugin_dir_path( __FILE__ ) ) . '/config/beans-header-footer-fields-array.php';

	\beans_register_post_meta( $fields, true, 'beans_header_footer_fields', [ 'title' => esc_html__( 'Beans Header and Footer Fields', 'beans-header-footer-fields' ) ] );
}
