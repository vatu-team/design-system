<?php

/**
 * Service: Design System Menu
 *
 * @package   Vatu\Wordpress\Plugin\Vatu\DesignSystem
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Vatu\DesignSystem\Domain\DesignSystem;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class DesignSystemMenu extends Service implements Registrable
{
	protected string $name = 'DesignSystemMenu';

	public function register(): void
	{
		\add_action(
			hook_name: 'admin_menu',
			callback: [ $this, 'addMenu' ],
			priority: 10,
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

		\add_menu_page(
			page_title: __( 'Design System', 'design-system' ),
			menu_title: __( ' Design System', 'design-system' ),
			capability: 'edit_pages',
			menu_slug: 'design-system',
			callback: [ $this, 'renderDesignSystemPage' ],
			icon_url: 'dashicons-layout',
			position: 11
		);
	}

	public function renderDesignSystemPage(): void
	{
		// Render the Design System page content here.
		echo '<h1>' . esc_html__( 'Design System', 'design-system' ) . '</h1>';
		echo '<p>' . esc_html__( 'Welcome to the Design System page!', 'design-system' ) . '</p>';
	}
}
