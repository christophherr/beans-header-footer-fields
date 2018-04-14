<?php
/**
 * Test Case for the unit tests.
 *
 * This file uses parts of the Beans Framework unit test bootstrap.php.
 *
 * @package ChristophHerr\BeansHeaderFooterFields\Tests\Unit
 *
 * @since   1.0.0
 */

namespace ChristophHerr\BeansHeaderFooterFields\Tests\Unit;

use Brain\Monkey;
use PHPUnit\Framework\TestCase;

/**
 * Abstract Class Test_Case
 *
 * @package Beans\Framework\Tests\Unit
 */
abstract class Test_Case extends TestCase {

	/**
	 * Prepares the test environment before each test.
	 */
	protected function setUp() {
		parent::setUp();
		Monkey\setUp();

		$this->setup_common_wp_stubs();
	}

	/**
	 * Cleans up the test environment after each test.
	 */
	protected function tearDown() {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * Setup the stubs for the common WordPress escaping and internationalization functions.
	 */
	protected function setup_common_wp_stubs() {
		// Common escaping functions.
		Monkey\Functions\stubs( [
			'esc_attr',
			'esc_html',
			'esc_textarea',
			'esc_url',
			'wp_kses_post',
		] );

		// Common internationalization functions.
		Monkey\Functions\stubs( [
			'__',
			'esc_html__',
			'esc_html_x',
			'esc_attr_x',
		] );

		foreach ( [ 'esc_attr_e', 'esc_html_e', '_e' ] as $wp_function ) {
			Monkey\Functions\when( $wp_function )->echoArg();
		}
	}
}
