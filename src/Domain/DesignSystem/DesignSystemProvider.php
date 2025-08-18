<?php

/**
 * Provider: Example
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Domain\DesignSystem;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceProvider;

final class DesignSystemProvider extends ServiceProvider
{
	protected string $identifier = 'Provider';

	/**
	 * Service to be loaded.
	 *
	 * @var array<string>
	 */
	protected array $service_collection = [
		DesignSystemMenu::class,
	];
}
