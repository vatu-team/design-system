<?php

/**
 * Provider: Application
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Application;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceProvider;

final class ApplicationProvider extends ServiceProvider
{
	protected string $identifier = 'Application';

	/**
	 * Service to be loaded.
	 *
	 * @var array<string>
	 */
	protected array $service_collection = [
		Blocks::class,
		Content::class,
		Meta::class,
	];
}
