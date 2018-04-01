<?php
/**
 * Tests for register_sitewide_header_footer_fields()
 *
 * @package ChristophHerr\BeansHeaderFooterFields\Tests\Integration
 *
 * @since   1.0.0
 */

namespace ChristophHerr\BeansHeaderFooterFields\Tests\Integration;

use Brain\Monkey;
use ChristophHerr\BeansHeaderFooterFields\Tests\Integration\Test_Case;
use ChristophHerr\BeansHeaderFooterFields as BHFF;

require_once BEANS_HEADER_FOOTER_FIELDS_PLUGIN_DIR . 'tests/phpunit/integration/class-test-case.php';

/**
 * Class Tests_BeansHeaderFooterFieldsRegisterSidewideHeaderFooterFields
 *
 * @package ChristophHerr\BeansHeaderFooterFields\Tests\Integration
 */
class Tests_BeansHeaderFooterFieldsRegisterSidewideHeaderFooterFields extends Test_Case {

	/**
	 * Prepares the test environment before each test.
	 */
	public function setUp() {
		parent::setUp();

		// Load the file.
		require_once BEANS_HEADER_FOOTER_FIELDS_PLUGIN_DIR . '/src/beans-settings-metabox.php';
	}

	/**
	 * Test register_sitewide_header_footer_fields() should return false when unfiltered_html capability is not met.
	 */
	public function test_should_return_false_when_no_capability() {
		wp_set_current_user( self::factory()->user->create( array( 'role' => 'author' ) ) );

		$this->assertFalse( BHFF\register_sitewide_header_footer_fields() );
	}

	/**
	 * Test register_sitewide_header_footer_fields() should call beans_register_options() when unfiltered_html capability is met.
	 */
	public function test_should_register_fields_when_capability_met() {
		wp_set_current_user( self::factory()->user->create( array( 'role' => 'administrator' ) ) );

		Monkey\Functions\expect( 'beans_register_options' )->once();

		$this->assertNull( BHFF\register_sitewide_header_footer_fields() );
	}
}
