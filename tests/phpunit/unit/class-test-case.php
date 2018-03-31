<?php
/**
 * Test Case for the unit tests.
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
	}

	/**
	 * Cleans up the test environment after each test.
	 */
	protected function tearDown() {
		Monkey\tearDown();
		parent::tearDown();
	}
}
