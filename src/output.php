<?php
/**
 * Output of the Header and Footer Fields' content on the front-end.
 *
 * @package     ChristophHerr\BeansHeaderFooterFields
 * @since       1.0.0
 * @author      christophherr
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2.0+
 */

namespace ChristophHerr\BeansHeaderFooterFields;

// phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped -- Can't escape without breaking scripts...

add_action( 'wp_head', __NAMESPACE__ . '\output_header_scripts_and_styles', 999 );
/**
 * Echo the scripts or styles from the Beans header field into the head of the website.
 *
 * @since 1.0.0
 *
 * @return void
 */
function output_header_scripts_and_styles() {
	echo get_option( 'beans_header_field' );

	if ( ! is_singular() ) {
		return;
	}

	echo beans_get_post_meta( 'beans_header_field' );
}

add_action( 'wp_footer', __NAMESPACE__ . '\output_footer_scripts_and_styles', 999 );
/**
 * Echo the scripts or styles from the Beans footer field into the footer of the website.
 *
 * @since 1.0.0
 *
 * @return void
 */
function output_footer_scripts_and_styles() {
	echo get_option( 'beans_footer_field' );

	if ( ! is_singular() ) {
		return;
	}

	echo beans_get_post_meta( 'beans_footer_field' );
}

// phpcs:enable WordPress.XSS.EscapeOutput.OutputNotEscaped
