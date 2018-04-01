<?php
/**
 * Tests for register_sitewide_header_footer_fields()
 *
 * @package ChristophHerr\BeansHeaderFooterFields\Tests\Unit
 *
 * @since   1.0.0
 */

namespace ChristophHerr\BeansHeaderFooterFields\Tests\Unit;

use Brain\Monkey;
use ChristophHerr\BeansHeaderFooterFields\Tests\Unit\Test_Case;
use ChristophHerr\BeansHeaderFooterFields as BHFF;

require_once BEANS_HEADER_FOOTER_FIELDS_PLUGIN_DIR . 'tests/phpunit/unit/class-test-case.php';

/**
 * Class Tests_BeansHeaderFooterFieldsRegisterSidewideHeaderFooterFields
 *
 * @package ChristophHerr\BeansHeaderFooterFields\Tests\Unit
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
		Monkey\Functions\expect( 'current_user_can' )->once()->andReturn( false );

		$this->assertFalse( BHFF\register_sitewide_header_footer_fields() );
	}

	/**
	 * Test register_sitewide_header_footer_fields() should call beans_register_options() when unfiltered_html capability is met.
	 */
	public function test_should_call_beans_register_options_when_capability_met() {
		Monkey\Functions\expect( 'current_user_can' )->once()->andReturn( true );

		Monkey\Functions\when( 'plugin_dir_path' )
		->justReturn( dirname( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) ) . '/config/' );

		Monkey\Functions\expect( 'beans_register_options' )->once();

		$this->assertNull( BHFF\register_sitewide_header_footer_fields() );
	}
}
