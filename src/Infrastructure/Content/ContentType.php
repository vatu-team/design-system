<?php

/**
 * Interface: Content Type
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0
 * @copyright 2025 Vatu Ltd.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Infrastructure\Content;

interface ContentType
{
	public function getContentType(): string;

	/**
	 * @return array<string, mixed>
	 */
	public function getContentArgs(): array;
}
