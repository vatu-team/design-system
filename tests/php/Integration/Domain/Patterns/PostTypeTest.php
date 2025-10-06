<?php

/**
 * Test Suite is running.
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0
 * @copyright 2025 Vatu Ltd.
 */

declare(strict_types=1);

namespace Vatu\Wordpress\Tests\Integration\Domain\Patters;

use Vatu\Wordpress\Tests\TestCase;

class PostTypeTest extends TestCase
{
	/**
	 * This tests makes sure:
	 *
	 * - WordPress functions are defined
	 * - WordPress database can be written to.
	 */
	public function testWordpressInsertPost()
	{
		global  $wpdb;
		$this->assertTrue( condition: is_object( value: $wpdb ) );
		$id = wp_insert_post(
			[
				'post_type'    => 'vatu_patterns',
				'post_title'   => 'Example Patterns',
				'post_content' => 'Example Patterns Content.',
			]
		);

		self::assertTrue(
			condition: is_numeric( value: $id )
		);
	}
}
