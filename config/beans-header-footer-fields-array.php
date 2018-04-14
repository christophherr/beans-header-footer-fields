<?php
/**
 * Settings array to register the Header and Footer Fields.
 *
 * @package     ChristophHerr\BeansHeaderFooterFields
 * @since       1.0.0
 * @author      christophherr
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2.0+
 */

namespace ChristophHerr\BeansHeaderFooterFields\Config;

return [
	// Add the Header Fields.
	[
		'id'                => 'beans_header_field',
		'label'             => esc_html__( 'Add scripts or styles to the header.', 'beans-header-footer-fields' ),
		'type'              => 'textarea',
		'description'       => esc_html__( 'This code will output immediately before the closing head tag in the document source.', 'beans-header-footer-fields' ),
		'default'           => '',
		'db_type'           => 'option',
		'capability'        => 'unfiltered_html',
		'sanitize_callback' => 'esc_textarea',

	],
	// Add the Footer fields.
	[
		'id'                => 'beans_footer_field',
		'label'             => esc_html__( 'Add scripts or styles to the footer.', 'beans-header-footer-fields' ),
		'type'              => 'textarea',
		'description'       => esc_html__( 'This code will output immediately before the closing body tag in the document source.', 'beans-header-footer-fields' ),
		'default'           => '',
		'db_type'           => 'option',
		'capability'        => 'unfiltered_html',
		'sanitize_callback' => 'esc_textarea',
	],
];
