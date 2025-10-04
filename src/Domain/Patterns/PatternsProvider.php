<?php

/**
 * Provider: Patterns
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Domain\Patterns;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceProvider;

final class PatternsProvider extends ServiceProvider
{
	protected string $identifier = 'Patterns';

	/**
	 * Service to be loaded.
	 *
	 * @var array<string>
	 */
	protected array $service_collection = [
		PatternsContentRegistrar::class,
		PatternsContentMenu::class,
		PatternsArchiveTemplate::class,
		PatternsSingleTemplate::class,
	];
}
