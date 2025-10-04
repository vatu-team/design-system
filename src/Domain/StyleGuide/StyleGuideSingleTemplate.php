<?php

/**
 * Service: StyleGuide Single Template
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Domain\StyleGuide;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

use const Vatu\DesignSystem\TEMPLATE_DIR;

final class StyleGuideSingleTemplate extends Service implements Registrable
{
	protected string $name = 'SingleTemplate';

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
			template_name: 'design-system//single-vatu_style_guide',
			args: [
				'title'       => 'Single Style Guide',
				'description' => 'Single page for Style Guides',
				'content'     => $this->getTemplate(),
			]
		);
	}

	public function getTemplate(): string
	{
		ob_start();
		include TEMPLATE_DIR . '/single-vatu_style_guide.html';
		$output = ob_get_clean();

		if ( $output === false ) {
			throw new \Exception( message: 'Failed to capture output buffer' );
		}

		return $output;
	}
}
