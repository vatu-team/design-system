<?php

/**
 * Content: Patterns
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Domain\Patterns;

use Vatu\DesignSystem\Infrastructure\Content\ContentSettings;
use Vatu\DesignSystem\Infrastructure\Content\PostContentType;

final class PatternsContent extends PostContentType
{
	protected string $content_type = 'vatu_patterns';

	public function getContentType(): string
	{
		return $this->content_type;
	}

	public function getContentArgs(): array
	{
		return ( new ContentSettings(
			post_type: $this->getContentType(),
			label: __( 'Patterns', 'design-system' ),
			labels: [
				'singular_name' => __( 'Patterns', 'design-system' ),
				'menu_name'     => __( 'Patterns', 'design-system' ),
			],
			public: true,
			publicly_queryable: true,
			capability_type: 'page',
			hierarchical: true,
			exclude_from_search: true,
			show_in_menu: false,
			show_in_admin_bar: false,
			show_ui: true,
			rewrite: [
				'slug'       => 'style-guide',
				'with_front' => false,
			]
		) )->toArray();
	}
}
