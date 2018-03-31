<?php
/**
 * Tests for output()
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
 * Class Tests_BeansHeaderFooterFieldsOutput
 *
 * @package ChristophHerr\BeansHeaderFooterFields\Tests\Unit
 */
class Tests_BeansHeaderFooterFieldsOutput extends Test_Case {

	/**
	 * Prepares the test environment before each test.
	 */
	public function setUp() {
		parent::setUp();

		// Load the file.
		require_once BEANS_HEADER_FOOTER_FIELDS_PLUGIN_DIR . '/src/output.php';
	}

	/**
	 * Test output() should render the header styles and scripts.
	 */
	public function test_should_render_header_styles_scripts() {
		Monkey\Functions\expect( 'get_option' )
		->once()
		->with( 'beans_header_field' )
		->andReturn( 'This ' );

		Monkey\Functions\expect( 'is_singular' )->once()->andReturn( true );

		Monkey\Functions\expect( 'beans_get_post_meta' )
		->once()
		->with( 'beans_header_field' )
		->andReturn( 'works!' );

		// Run the function and grab the HTML out of the buffer.
		ob_start();
		BHFF\output_header_scripts_and_styles();
		$html = ob_get_clean();

		$this->assertEquals( 'This works!', $html );
	}

	/**
	 * Test output() should render the sitewide header styles and scripts but not post meta on archives.
	 */
	public function test_should_render_sitewide_header_styles_scripts_no_post_meta_on_archives() {
		Monkey\Functions\expect( 'get_option' )
		->once()
		->with( 'beans_header_field' )
		->andReturn( 'Only archives' );

		Monkey\Functions\expect( 'is_singular' )->once()->andReturn( false );

		Monkey\Functions\expect( 'beans_get_post_meta' )->never();

		// Run the function and grab the HTML out of the buffer.
		ob_start();
		BHFF\output_header_scripts_and_styles();
		$html = ob_get_clean();

		$this->assertEquals( 'Only archives', $html );
	}

	/**
	 * Test output() should render post meta styles and scripts on posts and pages when there are no sitewide header styles and scripts.
	 */
	public function test_should_render_post_meta_when_no_sitewide_header_styles_scripts() {
		Monkey\Functions\expect( 'get_option' )
		->once()
		->with( 'beans_header_field' )
		->andReturn( '' );

		Monkey\Functions\expect( 'is_singular' )->once()->andReturn( true );

		Monkey\Functions\expect( 'beans_get_post_meta' )
		->once()
		->with( 'beans_header_field' )
		->andReturn( 'Only post meta' );

		// Run the function and grab the HTML out of the buffer.
		ob_start();
		BHFF\output_header_scripts_and_styles();
		$html = ob_get_clean();

		$this->assertEquals( 'Only post meta', $html );
	}

	/**
	 * Test output() should render nothing when there are no header styles and scripts.
	 */
	public function test_should_render_nothing_when_no_header_styles_scripts() {
		Monkey\Functions\expect( 'get_option' )
		->once()
		->with( 'beans_header_field' )
		->andReturn( '' );

		Monkey\Functions\expect( 'is_singular' )->once()->andReturn( true );

		Monkey\Functions\expect( 'beans_get_post_meta' )
		->once()
		->with( 'beans_header_field' )
		->andReturn( '' );

		// Run the function and grab the HTML out of the buffer.
		ob_start();
		BHFF\output_header_scripts_and_styles();
		$html = ob_get_clean();

		$this->assertEmpty( $html );
	}

	/**
	 * Test output() should render the footer styles and scripts.
	 */
	public function test_should_render_footer_styles_scripts() {
		Monkey\Functions\expect( 'get_option' )
		->once()
		->with( 'beans_footer_field' )
		->andReturn( 'This ' );

		Monkey\Functions\expect( 'is_singular' )->once()->andReturn( true );

		Monkey\Functions\expect( 'beans_get_post_meta' )
		->once()
		->with( 'beans_footer_field' )
		->andReturn( 'works!' );

		// Run the function and grab the HTML out of the buffer.
		ob_start();
		BHFF\output_footer_scripts_and_styles();
		$html = ob_get_clean();

		$this->assertEquals( 'This works!', $html );
	}

	/**
	 * Test output() should render the sitewide footer styles and scripts but not post meta on archives.
	 */
	public function test_should_render_sitewide_footer_styles_scripts_no_post_meta_on_archives() {
		Monkey\Functions\expect( 'get_option' )
		->once()
		->with( 'beans_footer_field' )
		->andReturn( 'Only archives' );

		Monkey\Functions\expect( 'is_singular' )->once()->andReturn( false );

		Monkey\Functions\expect( 'beans_get_post_meta' )->never();

		// Run the function and grab the HTML out of the buffer.
		ob_start();
		BHFF\output_footer_scripts_and_styles();
		$html = ob_get_clean();

		$this->assertEquals( 'Only archives', $html );
	}

	/**
	 * Test output() should render post meta styles and scripts on posts and pages when there are no sitewide footer styles and scripts.
	 */
	public function test_should_render_post_meta_when_no_sitewide_footer_styles_scripts() {
		Monkey\Functions\expect( 'get_option' )
		->once()
		->with( 'beans_footer_field' )
		->andReturn( '' );

		Monkey\Functions\expect( 'is_singular' )->once()->andReturn( true );

		Monkey\Functions\expect( 'beans_get_post_meta' )
		->once()
		->with( 'beans_footer_field' )
		->andReturn( 'Only post meta' );

		// Run the function and grab the HTML out of the buffer.
		ob_start();
		BHFF\output_footer_scripts_and_styles();
		$html = ob_get_clean();

		$this->assertEquals( 'Only post meta', $html );
	}

	/**
	 * Test output() should render nothing when there are no footer styles and scripts.
	 */
	public function test_should_render_nothing_when_no_footer_styles_scripts() {
		Monkey\Functions\expect( 'get_option' )
		->once()
		->with( 'beans_footer_field' )
		->andReturn( '' );

		Monkey\Functions\expect( 'is_singular' )->once()->andReturn( true );

		Monkey\Functions\expect( 'beans_get_post_meta' )
		->once()
		->with( 'beans_footer_field' )
		->andReturn( '' );

		// Run the function and grab the HTML out of the buffer.
		ob_start();
		BHFF\output_footer_scripts_and_styles();
		$html = ob_get_clean();

		$this->assertEmpty( $html );
	}
}
