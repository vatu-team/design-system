<?php

/**
 * Service: Patterns Archive Template
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Domain\Patterns;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

use const Vatu\DesignSystem\TEMPLATE_DIR;

final class PatternsArchiveTemplate extends Service implements Registrable
{
	protected string $name = 'ArchiveTemplate';

	public function register(): void
	{
		\add_action(
			hook_name: 'init',
			callback: [ $this, 'addTemplate' ],
			priority: 20,
			accepted_args: 0
		);
	}

	public function addTemplate(): void
	{
		register_block_template(
			template_name: 'design-system//archive-vatu_patterns',
			args: [
				'title'       => 'Patterns Archive',
				'description' => 'Archive for Patterns pages',
				'content'     => $this->getTemplate(),
			]
		);
	}

	public function getTemplate(): string
	{
		ob_start();
		include TEMPLATE_DIR . '/archive-vatu_patterns.html';
		$output = ob_get_clean();

		if ( $output === false ) {
			throw new \Exception( message: 'Failed to capture output buffer' );
		}

		return $output;
	}
}
