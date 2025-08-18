<?php

/**
 * Plugin
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem;

use ThoughtsIdeas\Wordpress\Infrastructure\Main;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceLocator;

final class Plugin extends ServiceLocator implements Main
{
	protected string $identifier = 'Plugin';

	protected string $name = 'DesignSystem';

	/**
	 * @var array<string>
	 */
	protected array $provider_collection = [
		Application\ApplicationProvider::class,
		Domain\DesignSystem\DesignSystemProvider::class,
		Domain\StyleGuide\StyleGuideProvider::class,
		Domain\Patterns\PatternsProvider::class,
		Domain\Blocks\BlocksProvider::class,
	];
}
