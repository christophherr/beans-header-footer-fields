<?php
/**
 * Tests for register_post_meta_fields()
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
 * Class Tests_BeansHeaderFooterFieldsRegisterPostMetaFields
 *
 * @package ChristophHerr\BeansHeaderFooterFields\Tests\Integration
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
	 * Test register_post_meta_fields() should return false when unfiltered_html capability is not met.
	 */
	public function test_should_return_false_when_no_capability() {
		wp_set_current_user( self::factory()->user->create( array( 'role' => 'author' ) ) );

		$this->assertFalse( BHFF\register_post_meta_fields() );
	}

	/**
	 * Test register_post_meta_fields() should call beans_register_options() when unfiltered_html capability is met.
	 */
	public function test_should_call_beans_register_options_when_capability_met() {
		wp_set_current_user( self::factory()->user->create( array( 'role' => 'administrator' ) ) );

		Monkey\Functions\expect( 'beans_register_post_meta' )->once();

		$this->assertNull( BHFF\register_post_meta_fields() );
	}
}
