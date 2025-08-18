<?php

/**
 * Service: Blocks Menu
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Domain\Blocks;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class BlocksContentMenu extends Service implements Registrable
{
	protected string $name = 'Menu';

	public function register(): void
	{
		\add_action(
			hook_name: 'admin_menu',
			callback: [ $this, 'addMenu' ],
			priority: 20,
			accepted_args: 0
		);
	}

	public function addMenu(): void
	{
		if ( ! is_admin() || ! is_admin_bar_showing() ) {
			return;
		}

		if ( ! current_user_can( capability: 'edit_pages' ) ) {
			return;
		}

		\add_submenu_page(
			parent_slug: 'design-system',
			page_title: __( 'Blocks', 'design-system' ),
			menu_title: __( 'Blocks', 'design-system' ),
			capability: 'edit_pages',
			menu_slug: 'edit.php?post_type=vatu_blocks'
		);
	}
}
