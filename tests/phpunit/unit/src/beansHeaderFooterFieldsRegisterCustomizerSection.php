<?php
/**
 * Tests for register_customizer_section()
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
 * Class Tests_BeansHeaderFooterFieldsRegisterCustomizerSection
 *
 * @package ChristophHerr\BeansHeaderFooterFields\Tests\Unit
 */
class Tests_BeansHeaderFooterFieldsRegisterCustomizerSection extends Test_Case {

	/**
	 * Prepares the test environment before each test.
	 */
	public function setUp() {
		parent::setUp();

		// Load the file.
		require_once BEANS_HEADER_FOOTER_FIELDS_PLUGIN_DIR . '/src/beans-customizer-section.php';
	}

	/**
	 * Test register_customizer_section() should call beans_register_wp_customize_options().
	 */
	public function test_should_call_beans_register_wp_customize_options() {
		Monkey\Functions\when( 'plugin_dir_path' )
		->justReturn( dirname( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) ) . '/config/' );

		Monkey\Functions\expect( 'beans_register_wp_customize_options' )->once();

		$this->assertNull( BHFF\register_customizer_section() );
	}
}
