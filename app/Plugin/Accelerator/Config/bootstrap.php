<?php
/**
 * Routes
 *
 * example_routes.php will be loaded in main app/config/routes.php file.
 */
	Croogo::hookRoutes('Accelerator');

/**
 * Behavior
 *
 * This plugin's Example behavior will be attached whenever Node model is loaded.
 */
	Croogo::hookBehavior('Node', 'Accelerator.Accelerator', array());

/**
 * Component
 *
 * This plugin's Example component will be loaded in ALL controllers.
 */
	Croogo::hookComponent('*', 'Accelerator.Accelerator');

/**
 * Helper
 *
 * This plugin's Example helper will be loaded via NodesController.
 */
	Croogo::hookHelper('Nodes', 'Accelerator.Accelerator');

/**
 * Admin menu (navigation)
 */
	CroogoNav::add('extensions.children.accelerator', array(
		'title' => __('Accelerator'),
		'url' => '#',
		'children' => array(
			'example1' => array(
				'title' => __('Example 1'),
				'url' => '#',
			),
			'example2' => array(
				'title' => __('Example 2'),
				'url' => '#',
			),
		),
	));

/**
 * Admin row action
 *
 * When browsing the content list in admin panel (Content > List),
 * an extra link called 'Example' will be placed under 'Actions' column.
 */
	Croogo::hookAdminRowAction('Nodes/admin_index', 'Accelerator', 'plugin:accelerator/controller:accelerator/action:index/:id');

/**
 * Admin tab
 *
 * When adding/editing Content (Nodes),
 * an extra tab with title 'Example' will be shown with markup generated from the plugin's admin_tab_node element.
 *
 * Useful for adding form extra form fields if necessary.
 */
	// Croogo::hookAdminTab('Nodes/admin_add', 'Accelerator', 'accelerator.admin_tab_node');
	// Croogo::hookAdminTab('Nodes/admin_edit', 'Accelerator', 'accelerator.admin_tab_node');
