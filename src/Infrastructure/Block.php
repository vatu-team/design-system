<?php

/**
 * Interface: WordPress Block
 *
 * @package   ThoughtsIdeas\WordPress\Infrastructure\Contracts
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://thoughtsandideas.uk/
 * @version   1.0.0
 * @license   MIT
 * @copyright (c) 2022-2024 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Infrastructure;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

abstract class Block extends Service
{
	/**
	 * @var array<string>
	 */
	protected array $block_path_list = [];

	/**
	 * @return array<string>
	 */
	public function getPath(): array
	{
		return $this->block_path_list;
	}

	/**
	 * @param array<string> $block_list
	 *
	 * @return array<Block|string>
	 */
	public function registerBlock( array $block_list ): array
	{
		$block_list[] = $this;

		return $block_list;
	}
}
