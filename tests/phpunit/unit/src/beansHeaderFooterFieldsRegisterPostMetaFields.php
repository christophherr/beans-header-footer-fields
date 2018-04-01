<?php
/**
 * Tests for register_post_meta_fields()
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
 * Class Tests_BeansHeaderFooterFieldsRegisterPostMetaFields
 *
 * @package ChristophHerr\BeansHeaderFooterFields\Tests\Unit
 */
class Tests_BeansHeaderFooterFieldsRegisterPostMetaFields extends Test_Case {

	/**
	 * Prepares the test environment before each test.
	 */
	public function setUp() {
		parent::setUp();

		// Load the file.
		require_once BEANS_HEADER_FOOTER_FIELDS_PLUGIN_DIR . '/src/beans-singular-metabox.php';
	}

	/**
	 * Test register_post_meta_fields() should return false unfiltered_html capability is not met.
	 */
	public function test_should_return_false_when_no_capability() {
		Monkey\Functions\expect( 'current_user_can' )->once()->andReturn( false );

		$this->assertFalse( BHFF\register_post_meta_fields() );
	}

	/**
	 * Test register_post_meta_fields() should call beans_register_options() when unfiltered_html capability is met.
	 */
	public function test_should_call_beans_register_options_when_capability_met() {
		Monkey\Functions\expect( 'current_user_can' )->once()->andReturn( true );

		Monkey\Functions\when( 'plugin_dir_path' )
		->justReturn( dirname( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) ) . '/config/' );

		Monkey\Functions\expect( 'beans_register_post_meta' )->once();

		$this->assertNull( BHFF\register_post_meta_fields() );
	}
}
