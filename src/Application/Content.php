<?php

/**
 * Register WordPress Meta
 *

 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 *
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Application;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;
use Vatu\DesignSystem\Infrastructure\Content\ContentType;

final class Content extends Service implements Registrable
{
	protected string $name = 'Content';

	/**
	 * @var array<array<string>>
	 */
	private array $content_provider_list = [];

	/**
	 * @var array<ContentType>
	 */
	private array $content_list = [];

	public function register(): void
	{
		\add_action(
			hook_name: 'init',
			callback: [
				$this,
				'registerContentType',
			],
			priority: 5,
			accepted_args: 0
		);
	}

	public function registerContentType(): void
	{
		$this->createContentList();

		foreach ( $this->content_list as $content ) {
			\register_post_type(
				post_type: $content->getContentType(),
				args: $content->getContentArgs()
			);
		}
	}

	private function createContentList(): void
	{
		foreach ( $this->getContentList() as $content ) {
			$this->content_list[] = $this->initContent( content: $content );
		}
	}

	/**
	 * @return array<string>
	 */
	private function getContentList(): array
	{
		return apply_filters(
			hook_name: $this->getHook(),
			value: $this->content_provider_list
		);
	}

	/**
	 * Initialize a Meta object.
	 *
	 * @return ContentType
	 */
	private function initContent( string $content ): ContentType
	{
		/**
		 * @var ContentType $return
		 */
		$return = new $content();
		return $return;
	}
}
